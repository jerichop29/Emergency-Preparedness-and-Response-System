<?php
// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require __DIR__ . '/vendor/autoload.php';
require 'head/header.php';
use Twilio\Rest\Client;

// Find your Account Sid and Auth Token at twilio.com/console
// DANGER! This is insecure. See http://twil.io/secure
$sid    = "ACeb662e0675eb21bdd83e490f2fa65af4";
$token  = "8abecce2ed540ddca8293c899ffbd114";
$twilio = new Client($sid, $token);

if(isset($_POST['sent'])) {
	$message = $twilio->messages
                  ->create("+63 905 097 2017", // to
                           array(
                               "body" => $_POST['message'],
                               "from" => "+15169906656"
                           )
                  );

	//print($message->sid);
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
}
?>