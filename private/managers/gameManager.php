<?php
    class gameManager{
        public static function select(){
            global $con;

            $stmt=$con->prepare("SELECT * FROM game JOIN platform ON game.platform_idplatform=platform.idplatform");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public static function select2($id){
            global $con;

            $stmt=$con->prepare("SELECT * FROM customer_game JOIN game ON customer_game.game_idgame=game.idgame JOIN platform ON game.platform_idplatform=platform.idplatform WHERE customer_idcustomer = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public static function link($id, $game){
            global $con;

            $stmt=$con->prepare("INSERT INTO customer_game(customer_idcustomer, game_idgame) VALUES (?, ?)");
            $stmt->bindValue(1, $id);
            $stmt->bindValue(2, $game);
            $stmt->execute();
        }
        public static function remove($id, $game){
            global $con;

            $stmt=$con->prepare("DELETE FROM customer_game WHERE idtable1 = ?");
            $stmt->bindValue(1, $game);
            $stmt->execute();

            return header("location: games.php?id=$id");
        }
        public static function count($id){
            global $con;

            $stmt=$con->prepare("select count(*) as nr from customer_game where customer_idcustomer = ?;");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject();
        }
    }
?>