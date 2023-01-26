<?php
    class countryManager{
        public static function select(){
            global $con;

            $stmt=$con->prepare("SELECT * FROM country");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }
?>