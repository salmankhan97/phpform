
<?php
    class crud{
        //Private database object
        private $db;
        //contstructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }

        //Function to insert new data to databse
        public function insert($fname, $lname, $email, $phone_number, $dob, $feedback, $subject_id){
            try {
                //define sql statement to be executed
                $sql = "INSERT INTO students_info (first_name, last_name, email_address, phone_number, date_of_birth, feedback,  subject_id) VALUES (:fname, :lname, :email, :phone_number, :dob, :feedback, :subject_id)";

                //prepare the sql statement execution
                $stmt = $this->db->prepare($sql);

                //bind all placeholders to actual values
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone_number',$phone_number);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':feedback',$feedback);
                $stmt->bindparam(':subject_id',$subject_id);

                $stmt->execute();
                return true;

            } catch (PDOException $th) {
                echo $th->getMessage();
                return false;            }
        }
        public function update($id, $fname, $lname, $email, $phone_number, $dob, $feedback, $subject_id){
            try{
                $sql = "UPDATE students_info SET first_name = :fname, last_name = :lname, email_address = :email, phone_number = :phone_number, date_of_birth = :dob, feedback = :feedback, subject_id = :subject_id WHERE student_id = :id";

                //prepare the sql statement execution
                $stmt = $this->db->prepare($sql);

                //bind all placeholders to actual values
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone_number',$phone_number);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':feedback',$feedback);
                $stmt->bindparam(':subject_id',$subject_id);

                $stmt->execute();
                return true;
            } catch (PDOException $th) {
            echo $th->getMessage();
            return false;            }
            
        }


        public function getdata(){
            $sql = "SELECT * FROM students_info a inner join subject_info b on a.subject_id = b.subjects_id";
            $result = $this->db->query($sql);
            return $result;

        }

        public function getinfo($id){
            $sql = "SELECT * FROM students_info a inner join subject_info b on a.subject_id = b.subjects_id WHERE student_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();  //must for single column data
            return $result;
        }
        public function deleteinfo($id){
            try{
                $sql = "DELETE FROM students_info WHERE student_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
            } catch (PDOException $th) {
            echo $th->getMessage();
            return false;            
            }
            
        }
        public function getSubject(){
            $sql = "SELECT * FROM subject_info";
            $result = $this->db->query($sql);
            return $result;

        }
    }