<?php
@include 'head/header.php';
$conn = mysqli_connect('localhost','root','','user_db');
if(isset($_POST['register'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM tbl_login WHERE email = '$email' && password ='$pass'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = "<script>
        Swal.fire({
           icon: 'error',
           title: 'User already Exist'
         })
     </script>"; 

    }else{
        if($pass != $cpass){
            $error[] = "<script>
            Swal.fire({
               icon: 'error',
               title: 'Password not matched',         
             })
         </script>"; ;

        }else{
            $insert = "INSERT INTO tbl_login(name, email, password, user_type) VALUES ('$name', '$email', '$pass', '$user_type')";

            mysqli_query($conn, $insert);
            echo "<script>
                                 Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Registered Successfully',
                                showConfirmButton: true,
                                timer: 50000 
                            }).then(function() {
                                window.location.href = 'login_form.php';
                              })
                              </script>";         
                              
        
        }

    }
};
?>



