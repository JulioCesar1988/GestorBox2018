<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestorboxdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id_caja = $_GET['id_caja'];

$sql = "SELECT *  FROM caja where id_caja = $id_caja";
$result = $conn->query($sql);
    $codigo = "null ";
    $sector = "null ";
    $precintoA = "null";
    $precintoB = "null";
    $ubicacion ="null";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $codigo = $row["codigo"];
      $sector = $row["id_sector"];
      $precintoA = $row["precintoA"];
      $precintoB = $row["precintoB"];
      $ubicacion = $row["ubicacion"];

    }


 echo "Datos encontrados vamos a tratar de enviarlos por correo ";

 echo " codigo ->   $codigo";
 echo " sector ->  $sector";
 echo " precintoA ->   $precintoA";
 echo " precintoB ->   $precintoB";
 echo " Ubicacion ->   $ubicacion";
 
  
} else {
    echo "0 results";
}
$conn->close();
?>

<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
//Load Composer's autoloader
//require 'vendor/autoload.php';
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;            // Enable SMTP authentication
    $mail->SMTPSecure = false;                            
    $mail->Username = 'gestorbox2018@gmail.com';                 // SMTP username
    $mail->Password = 'millerBI.1';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('gestorbox2018@gmail.com', 'gestorbox2018');
    $mail->addAddress('jcontreras@millerbi.net', 'gestorbox2018');     // Add a recipient
    //$mail->addAddress('lmiaton@millerbi.net', 'gestorbox2018'); 
    //$mail->addAddress('eguadarrama@millerbi.net');
    //$mail->addAddress('jcontreras@millerbi.net');               // Name is optional
    //$mail->addReplyTo('jcontreras@millerbi.net', 'Information');
    //$mail->addCC('jcontreras@millerbi.net');
    //$mail->addBCC('jcontreras@millerbi.net');
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'GestorBox';
    $datos = '<center> <h2>Se Genero un pedido de caja</h2> <br>'. '<p> Codigo de caja :</p> '.$codigo.'<br><p> sector : </p>'.$sector.'<br><p> precintoA : </p>'.$precintoA.'<br><p> precintoB :</p>'.$precintoB .' <p><br> Ubicacion :</p>'.$ubicacion.'</center> <br>' ;   
    $mail->Body    =  $datos; 
    $mail->AltBody = 'aaa ';
    $mail->send();
    //echo 'Message has been sent';
    header('location:../views/list_cajas.php');
} catch (Exception $e) {
    echo 'No se pudo enviar ', $mail->ErrorInfo;
} 

