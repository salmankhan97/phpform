
<?php
    class crud{
        //Private database object
        private $db;
        //contstructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }

        //Function to insert new data to databse
        public function insert($fname, $lname, $email, $phone_number, $dob, $subject_id){
            try {
                //define sql statement to be executed
                $sql = "INSERT INTO students_info (first_name, last_name, email_address, phone_number, date_of_birth,  subject_id) VALUES (:fname, :lname, :email, :phone_number, :dob, :subject_id)";

                //prepare the sql statement execution
                $stmt = $this->db->prepare($sql);

                //bind all placeholders to actual values
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone_number',$phone_number);
                $stmt->bindparam(':dob',$dob);
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
            $result = $stmt->fetch();  //must for single cplumn data
            return $result;
        }
        public function getSubject(){
            $sql = "SELECT * FROM subject_info";
            $result = $this->db->query($sql);
            return $result;

        }

        

    }
?>