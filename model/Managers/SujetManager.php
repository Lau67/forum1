<?php
    namespace model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Entities\Sujet;

    class SujetManager extends Manager{

        protected $className = "model\Entities\Sujet";
        protected $tableName = "sujet";

        public function __construct(){
            parent::connect();
        }

        /*
        public function findAll(){
            return parent::findAll();
        }
        
        public function findOneById($id){
            return parent::findOneById($id);
        }
        */

        public function findBySujet($idsujet){
            $sql = "SELECT *
                    FROM ".$this->tableName." v WHERE v.id_sujet = :id
                    ";

            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $idsujet]), 
                $this->className
            );
        }

    }