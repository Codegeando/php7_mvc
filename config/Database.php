<?php
    namespace Config;
    
    class Database{
        public static function cn(){
            $cn = new \mysqli('localhost','root','','ventas');
            return $cn;
        }
    }