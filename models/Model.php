<?php
    namespace Models;

    use Config\Database;

    class Model{
        public $table;
        public $primaryKey = 'id';
        public $db;

        public function __construct(){
            $this->db = Database::cn();
        }

        public function all(){
            $sql = "select * from $this->table ";
            return $this->db->query($sql)->fetch_object();
        }

        public function create(){
            $args = func_get_args()[0];
            $keys = implode(',',array_keys($args));
            $sql = "insert into $this->table ($this->primaryKey,$keys) values(null,".$this->format($args).")";
            echo $sql;
            #return $this->db->query($sql);
        }

        public function format($data){
            $attr = '';
            $pre = '';
            foreach($data as $value){
                if(gettype($value) == 'string'){
                    $attr.=$pre."'".$value."'";
                }else{
                    $attr.=$pre.$value;
                }
                $pre = ',';
            }
            return $attr;
        }

    }