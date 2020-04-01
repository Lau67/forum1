<?php
    namespace app;

    abstract class Entity{

        protected function hydrate($data){

            foreach($data as $field => $value){

                //field = id_sujet
                //fieldarray = ['id','sujet']
                $fieldArray = explode("_", $field);

                if(isset($fieldArray[0]) && $fieldArray[0] == "id"){
                    $manName = ucfirst($fieldArray[1])."Manager";
                    $FQCName = "model\Managers".DS.$manName;
                    
                    $man = new $FQCName();
                    $value = $man->findOneById($value);
                }
                
                $method = "set".ucfirst($fieldArray[1]);
                if(method_exists($this, $method)){
                    $this->$method($value);
                }

            }
        }

        public function getClass(){
            return get_class($this);
        }
    }