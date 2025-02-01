<?php 
    @include 'head/header.php';
    Class Mo{
 
        private $server = "localhost";
        private $username = "root";
        private $password = "";
        private $db = "user_db";
        private $conn;
 
        public function __construct(){
            try {
                 
                $this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
            } catch (Exception $e) {
                echo "connection failed" . $e->getMessage();
            }
        }
 
        public function insert(){
 
            if (isset($_POST['sent'])) {
                if (isset($_POST['name']) && isset($_POST['subject']) && isset($_POST['message'])) {
                    if (!empty($_POST['name']) && !empty($_POST['subject']) && !empty($_POST['message'])) {
                         
                        $name = $_POST['name'];
                        $subject = $_POST['subject'];
                        $message = $_POST['message'];
                        
                       
 
                        $query = "INSERT INTO tbl_message (name,subject,message) VALUES ('$name','$subject','$message')";
                        if ($sql = $this->conn->query($query)) {
                            echo "<script>
                                 Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Sent',
                                showConfirmButton: false,
                                timer: 1000 
                            }).then(function() {
                                window.location.href = 'admin_page.php#resume';
                              })
                              </script>";            
                              
                          
                        }else{
                            echo "<script>
                                 Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Failed',
                                showConfirmButton: true,
                                timer: 50000 
                            }).then(function() {
                                window.location.href = 'admin_page.php';
                              })
                              </script>";   
                        }
 
                    }else{
                        echo "<script>
                                 Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Empty',
                                showConfirmButton: true,
                                timer: 50000 
                            }).then(function() {
                                window.location.href = 'admin_page.php';
                              })
                              </script>";   
                        }
                    }
                }
        }
 
        public function fetch(){
            $data = null;
 
            $query = "SELECT * FROM tbl_message";
            if ($sql = $this->conn->query($query)) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $data[] = $row;
                }
            }
            return $data;
        }
 
        public function delete($id){
 
            $query = "DELETE FROM tbl_message where id = '$id'";
            if ($sql = $this->conn->query($query)) {
                echo "<script>Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Deleted Successfully',
                    showConfirmButton: false,
                    timer: 1000
                  }).then(function() {
                    window.location.href = '../admin/admin_index.php';
                  })</script>"; 
            }else{
                return false;
            }
        }
 
        public function fetch_single($id){
 
            $data = null;
 
            $query = "SELECT * FROM tbl_message WHERE id = '$id'";
            if ($sql = $this->conn->query($query)) {
                while ($row = $sql->fetch_assoc()) {
                    $data = $row;
                }
            }
            return $data;
        }
 
        public function edit($id){
 
            $data = null;
 
            $query = "SELECT * FROM tbl_message WHERE id = '$id'";
            if ($sql = $this->conn->query($query)) {
                while($row = $sql->fetch_assoc()){
                    $data = $row;
                }
            }
            return $data;
        }
 
        public function update($data){
 
            $query = "UPDATE tbl_message SET name='$data[name]', subject='$data[subject]', message='$data[message]', WHERE id='$data[id] '";
 
            if ($sql = $this->conn->query($query)) {
                return true;
            }else{
                return false;
            }
        }
    }
 ?>
 