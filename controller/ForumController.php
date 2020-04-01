<?php
    namespace Controller;

    use App\Session;
    use model\Managers\SujetManager;
    use model\Managers\MessageManager;
    
    class ForumController{

        public function index(){

            $sman = new SujetManager();
            $mman = new MessageManager();

            $sujets = $sman->findAll();
            $messages = $mman->findAll();

            return [
                "view" => VIEW_DIR."forum/liste_sujet.php",
                "data" => [
                    "sujets" => $sujets,
                    "messages" => $messages
                ]
            ];
        }

        public function voir($id){
            
            $man = new SujetManager();

            $sujet = $man->findOneById($id);

            return [
                "view" => VIEW_DIR."forum/voir.php",
                "data" => $sujet
            ];
        }

        public function newSujet(){

            if(!empty($_POST)){

                $data["titre"] = $_POST['titre'];
                $data["date_creation"] = $_POST['date_creation'];
                $data["verrouillage"] = $_POST['verrouillage'];
                $data["id_visiteur"] = $_POST['visiteur'];

                if( $data["titre"] !== ""){
                    
                    $sman = new SujetManager();

                    //si l'ajout s'effectue correctement (càd que le DAO a renvoyé l'id de ce qu'on a inséré en base
                    if($idNewSujet = $sman->add($data)){
                        //on met un message de succès en session
                        Session::addFlash("success", "NOUVEAU SUJET AJOUTE AVEC SUCCES !");
                        //et on redirige (via une redirect 302 serveur) vers une toute nouvelle requète
                        //pour ne plus avoir de refresh de POST
                        header("Location:index.php?ctrl=forum&action=voir&id=".$idNewSujet);
                        //TRES IMPORTANT, il faut arrêter l'exécution de la suite du script !
                        //même si on a fait une redirection, le script s'exécute jusqu'au bout...
                        die();
                    }
                    else{
                        //on met un message d'erreur en session (cas où l'ajout ne s'est pas effectué en base)
                        Session::addFlash("error", "UN PROBLEME EST SURVENU... !!!!");
                    }
                }
                else{
                    //on met un message d'erreur en session (cas où le formulaire n'est pas bien rempli)
                    Session::addFlash("error", "LES CHAMPS OBLIGATOIRES SONT VIDES !!!!");
                }
            }
            //s'il n'y a pas eu de redirection, on va jusqu'à l'affichage du formulaire quoi qu'il arrive
            $mman = new MessageManager();
            $messages = $mman->findAll();

            return [
                "view" => VIEW_DIR."forum/formMessage.php",
                "data" => $messages
            ]; 
            
            
        }

     
        public function newMessage(){

            if(!empty($_POST)){

                $data["texte"] = $_POST['texte'];
                $data["date_creation"] = $_POST['date_creation'];
                $data["id_sujet"] = $_POST['sujet'];
                $data["id_visiteur"] = $_POST['visiteur'];

                if( $data["texte"] !== ""){
                    
                    $mman = new MessageManager();

                    //si l'ajout s'effectue correctement (càd que le DAO a renvoyé l'id de ce qu'on a inséré en base
                    if($idNewMessage = $mman->add($data)){
                        //on met un message de succès en session
                        Session::addFlash("success", "MESSAGE AJOUTE AVEC SUCCES !");
                        //et on redirige (via une redirect 302 serveur) vers une toute nouvelle requète
                        //pour ne plus avoir de refresh de POST
                        header("Location:index.php?ctrl=forum&action=voir&id=".$idNewMessage);
                        //TRES IMPORTANT, il faut arrêter l'exécution de la suite du script !
                        //même si on a fait une redirection, le script s'exécute jusqu'au bout...
                        die();
                    }
                    else{
                        //on met un message d'erreur en session (cas où l'ajout ne s'est pas effectué en base)
                        Session::addFlash("error", "UN PROBLEME EST SURVENU... !!!!");
                    }
                }
                else{
                    //on met un message d'erreur en session (cas où le formulaire n'est pas bien rempli)
                    Session::addFlash("error", "LES CHAMPS OBLIGATOIRES SONT VIDES !!!!");
                }
            }
            //s'il n'y a pas eu de redirection, on va jusqu'à l'affichage du formulaire quoi qu'il arrive
            $man = new SujetManager();
            $sujets = $man->findAll();

            return [
                "view" => VIEW_DIR."forum/formSujet.php",
                "data" => $sujets
            ]; 
            
            
        }

        public function listeParSujet($idsujet){
            
            $sman = new SujetManager();
            $mman = new MessageManager();

           
            $sujet = $sman->findOneById($idsujet);
            $messages = $mman->findBySujet($idsujet);

            return [
                "view" => VIEW_DIR."forum/liste_sujet.php",
                "data" => [
                    "sujet" => $sujet,
                    "messages" => $messages
                ]
            ];
        }


        
    }
