<?php
    namespace model\Managers;
        
    use app\Manager;
    use model\Entities\Message;

    class MessageManager extends Manager{

        protected $className = "model\Entities\Message";
        protected $tableName = "message";

        public function __construct(){
            parent::connect();
        }

        /*public function findAll(){
            return parent::findAll();
        }

        public function findOneById($id){
            return parent::findOneById($id);
        }*/
    }