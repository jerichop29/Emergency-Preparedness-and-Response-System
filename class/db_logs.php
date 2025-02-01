<?php 
    @include 'head/header.php';
    Class Mod{
 
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
 
            if (isset($_POST['send'])) {
                if (isset($_POST['name']) && isset($_POST['email'])) {
                    if (!empty($_POST['name']) && !empty($_POST['email'])) {
                         
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                       
                       
 
                        $query = "INSERT INTO tbl_login (name,email) VALUES ('$name','$email')";
                        if ($sql = $this->conn->query($query)) {
                            echo "<script>
                                 Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Record added successfully',
                                showConfirmButton: true,
                                timer: 50000 
                            }).then(function() {
                                window.location.href = 'team_index.php';
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
 
            $query = "SELECT * FROM tbl_login ";
            if ($sql = $this->conn->query($query)) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $data[] = $row;
                }
            }
            return $data;
        }
 
        public function delete($id){
 
            $query = "DELETE FROM tbl_login where id = '$id'";
            if ($sql = $this->conn->query($query)) {
                echo "<script>Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Deleted Successfully',
                    showConfirmButton: false,
                    timer: 1000
                  }).then(function() {
                    window.location.href = 'admin_logs.php';
                  })</script>"; 
            }else{
                return false;
            }
        }
 
        public function fetch_single($id){
 
            $data = null;
 
            $query = "SELECT * FROM tbl_login  WHERE id = '$id'";
            if ($sql = $this->conn->query($query)) {
                while ($row = $sql->fetch_assoc()) {
                    $data = $row;
                }
            }
            return $data;
        }
 
        public function edit($id){
 
            $data = null;
 
            $query = "SELECT * FROM tbl_login WHERE id = '$id'";
            if ($sql = $this->conn->query($query)) {
                while($row = $sql->fetch_assoc()){
                    $data = $row;
                }
            }
            return $data;
        }
 
        public function update($data){
 
            $query = "UPDATE tbl_login  SET name='$data[name]', email='$data[email]' WHERE id='$data[id] '";
 
            if ($sql = $this->conn->query($query)) {
                return true;
            }else{
                return false;
            }
        }
    }
 ?>