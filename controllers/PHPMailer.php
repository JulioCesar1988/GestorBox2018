<?php
include_once ("../include/params.php");
require_once("../models/user.php");
require_once("../models/evento.php");
require_once("../models/connection.php");

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
// Create connection
$conn = new mysqli(Params::$DB_Host,Params::$DB_usuario,Params::$DB_clave,Params::$DB_nombre);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$id_caja = $_GET['id_caja'];

            // agregando un evento 
            $evento = new Evento();
            $id_usuario = $_SESSION['email'];
            $tipo_evento = " Solicitud de Pedido";
            $fecha = date("Y/m/d");
            $evento->insert($id_usuario, $id_caja , $tipo_evento,$fecha);

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
  
} else {
    echo "0 results";
}
$conn->close();

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
    $mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    //$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;            // Enable SMTP authentication
    $mail->Username = 'noreply@millerbi.net';                 // SMTP username
    $mail->Password = 'nor.mbi2017';                           // SMTP password
    $mail->setFrom('noreply@millerbi.net', 'gestorbox2018');
    $mail->addAddress('jcontreras@millerbi.net', 'gestorbox2018');
    $mail->addAddress('archivador@millerbi.net', 'gestorbox2018');     // Add a recipient
    $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'GestorBox';
    $datos = '<center> <h2>Se Genero un pedido de caja</h2> <br>'. '<p> Codigo de caja :</p> '.$codigo.'<br><p> Usuario : </p><br>'.$_SESSION['email'].'<p> precintoA : </p>'.$precintoA.'<br><p> precintoB :</p>'.$precintoB .' <p><br> Ubicacion :</p>'.$ubicacion.'</center> <br>' ;   
    $mail->Body    =  $datos; 
    $mail->AltBody = 'aaa ';

    if(!$mail->send()) {

        header('location:../views/list_cajas.php');
    //echo 'Message could not be sent.';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {

    //echo 'Message has been sent';
    header('location:../views/list_cajas.php');

}
    //echo 'Message has been sent';
  //  header('location:../views/list_cajas.php');
} catch (Exception $e) {
    echo 'No se pudo enviar ', $mail->ErrorInfo;
} 

