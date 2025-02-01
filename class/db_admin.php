<?php 
    @include 'head/header.php';
    Class Model{
 
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
 
            if (isset($_POST['submit'])) {
                if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['lastname']) && isset($_POST['age']) && isset($_POST['bday'])  && isset($_POST['address'])) {
                    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile'])  && !empty($_POST['lastname']) && !empty($_POST['age']) && !empty($_POST['bday']) && !empty($_POST['address']) ) {
                         
                        $name = $_POST['name'];
                        $lastname = $_POST['lastname'];
                        $age = $_POST['age'];
                        $bday = $_POST['bday'];
                        $mobile = $_POST['mobile'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
 
                        $query = "INSERT INTO tbl_admin (name,email,mobile,lastname,age,bday,address) VALUES ('$name','$email','$mobile','$lastname','$age','$bday','$address')";
                        if ($sql = $this->conn->query($query)) {
                            echo "<script>
                                 Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Record Added Successfully',
                                showConfirmButton: false,
                                timer: 50000 
                            }).then(function() {
                                window.location.href = 'admin_page.php#portfolio';
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
                                window.location.href = 'admin_page.php#portfolio';
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
                                window.location.href = 'admin_page.php#portfolio';
                              })
                              </script>";   
                        }
                    }
                }
        }
 
        public function fetch(){
            $data = null;
 
            $query = "SELECT * FROM tbl_admin";
            if ($sql = $this->conn->query($query)) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $data[] = $row;
                }
            }
            return $data;
        }
 
        public function delete($id){
 
            $query = "DELETE FROM tbl_admin where id = '$id'";
            if ($sql = $this->conn->query($query)) {
                echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Deleted Successfully',
                    showConfirmButton: false,
                    timer: 1000
                  }).then(function() {
                    window.location.href = '../admin_page.php#portfolio';
                  })</script>"; 
            }else{
                return false;
            }
        }
 
        public function fetch_single($id){
 
            $data = null;
 
            $query = "SELECT * FROM tbl_admin WHERE id = '$id'";
            if ($sql = $this->conn->query($query)) {
                while ($row = $sql->fetch_assoc()) {
                    $data = $row;
                }
            }
            return $data;
        }
 
        public function edit($id){
 
            $data = null;
 
            $query = "SELECT * FROM tbl_admin WHERE id = '$id'";
            if ($sql = $this->conn->query($query)) {
                while($row = $sql->fetch_assoc()){
                    $data = $row;
                }
            }
            return $data;
        }
 
        public function update($data){
 
            $query = "UPDATE tbl_admin SET name='$data[name]', email='$data[email]', mobile='$data[mobile]', lastname='$data[lastname]', age='$data[age]', bday='$data[bday]', address='$data[address]' WHERE id='$data[id] '";
 
            if ($sql = $this->conn->query($query)) {
                return true;
            }else{
                return false;
            }
        }
    }
 ?>

