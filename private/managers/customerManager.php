<?php
    class customerManager{
        public static function select(){
            global $con;

            $stmt=$con->prepare("SELECT * FROM customer JOIN country ON customer.country_idcountry=country.idcountry");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }public static function selectId($id){
            global $con;

            $stmt=$con->prepare("SELECT * FROM customer WHERE idcustomer = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject();
        }
        public static function update($post, $id){
            global $con;

            $stmt=$con->prepare("UPDATE customer SET firstname = ?, lastname = ?, email = ?, premium_member = ?, country_idcountry = ? WHERE idcustomer = ?");
            $stmt->bindValue(1, $post["firstname"]);
            $stmt->bindValue(2, $post["lastname"]);
            $stmt->bindValue(3, $post["email"]);
            if(isset($post["premium_member"])){
                $stmt->bindValue(4, 1);
            } else{
                $stmt->bindValue(4, 0);
            }
            $stmt->bindValue(5, $post["country"]);
            $stmt->bindValue(6, $id);
            $stmt->execute();
            return header("location: index.php");
        }
        public static function insert($post){
            global $con;

            $stmt=$con->prepare("INSERT INTO customer(firstname, lastname, email, premium_member, country_idcountry) VALUES (?, ?, ?, ?, ?)");
            $stmt->bindValue(1, $post["firstname"]);
            $stmt->bindValue(2, $post["lastname"]);
            $stmt->bindValue(3, $post["email"]);
            if(isset($post["premium_member"])){
                $stmt->bindValue(4, 1);
            } else{
                $stmt->bindValue(4, 0);
            }
            $stmt->bindValue(5, $post["country"]);
            $stmt->execute();
            return header("location: index.php");
        }
        public static function delete($id){
            global $con;

            $stmt=$con->prepare("DELETE FROM customer_game WHERE customer_idcustomer = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $stmt=$con->prepare("DELETE FROM customer WHERE idcustomer = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return header("location: index.php");
        }
    }
?>