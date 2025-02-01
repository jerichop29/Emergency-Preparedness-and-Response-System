<?php 
    @include 'head/header.php';
    Class Mode{
 
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
                if (isset($_POST['name']) && isset($_POST['roles']) && isset($_POST['teamname'])) {
                    if (!empty($_POST['name']) && !empty($_POST['roles']) && !empty($_POST['teamname'])) {
                         
                        $name = $_POST['name'];
                        $roles = $_POST['roles'];
                        $teamname = $_POST['teamname'];
                       
 
                        $query = "INSERT INTO tbl_teams (name,roles,teamname) VALUES ('$name','$roles','$teamname')";
                        if ($sql = $this->conn->query($query)) {
                            echo "<script>
                                 Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Record added successfully',
                                showConfirmButton: false,
                                timer: 1000
                            }).then(function() {
                                window.location.href = 'admin_page.php#services';
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
 
            $query = "SELECT * FROM tbl_teams";
            if ($sql = $this->conn->query($query)) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $data[] = $row;
                }
            }
            return $data;
        }
 
        public function delete($id){
 
            $query = "DELETE FROM tbl_teams where id = '$id'";
            if ($sql = $this->conn->query($query)) {
                echo "<script>Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Deleted Successfully',
                    showConfirmButton: false,
                    timer: 1000
                  }).then(function() {
                    window.location.href = '../admin_page.php#services';
                  })</script>"; 
            }else{
                return false;
            }
        }
 
        public function fetch_single($id){
 
            $data = null;
 
            $query = "SELECT * FROM tbl_teams WHERE id = '$id'";
            if ($sql = $this->conn->query($query)) {
                while ($row = $sql->fetch_assoc()) {
                    $data = $row;
                }
            }
            return $data;
        }
 
        public function edit($id){
 
            $data = null;
 
            $query = "SELECT * FROM tbl_teams WHERE id = '$id'";
            if ($sql = $this->conn->query($query)) {
                while($row = $sql->fetch_assoc()){
                    $data = $row;
                }
            }
            return $data;
        }
 
        public function update($data){
 
            $query = "UPDATE tbl_teams SET name='$data[name]', roles='$data[roles]', teamname='$data[teamname]' WHERE id='$data[id] '";
 
            if ($sql = $this->conn->query($query)) {
                return true;
            }else{
                return false;
            }
        }
    }
 ?>