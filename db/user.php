<?php

    class user{
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }


        public function insertUser($email,$password,$avatar){
            try{
                $result = $this->getUsersByEmail($email);
                if($result['num'] > 0){
                    return false;

                } else{
                    $new_password = md5($password.$email);
                    $sql = 'INSERT INTO userinfo (email, password, avatar) VALUES (:email, :password, :avatar)';
                    $stmt = $this->db->prepare($sql);

                    $stmt->bindparam(':email',$email);
                    $stmt->bindparam(':password',$new_password);
                    $stmt->bindparam(':avatar',$avatar);
                    $stmt->execute();
                    return true;
                }
                
            } catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getUser($email, $password){
            try{
                $sql = 'SELECT * FROM userinfo WHERE email = :email AND password = :password';
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':password',$password);

                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getUsersByUserName($username){
            try{
                $sql = 'SELECT COUNT(*) as num FROM userinfo WHERE username = :username';
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':username',$username);

                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
        public function getUsersByEmail($email){
            try{
                $sql = 'SELECT COUNT(*) as num FROM userinfo WHERE email = :email';
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':email',$email);

                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function generateTicket($email){
            try{
                $reset_ticket = md5($email).mt_rand();
                $sql = "UPDATE userinfo SET reset_ticket = :reset_ticket WHERE email = :email";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':reset_ticket',$reset_ticket);
                $stmt->execute();
                return true;
            } catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function checkTicket($ticket){
            try{
                $sql = 'SELECT COUNT(*) AS num FROM userinfo WHERE reset_ticket = :ticket';
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':ticket',$ticket);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function updatePassword($ticket,$password){
            try{
                //getting email from ticket
                $sql = 'SELECT COUNT(*) AS num FROM userinfo WHERE reset_ticket = :ticket';
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':ticket',$ticket);
                $stmt->execute();
                $result = $stmt->fetch_assoc();
                

            }
        }
    } //ends class user

