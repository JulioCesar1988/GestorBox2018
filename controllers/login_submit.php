        <?php
          require_once("../models/connection.php");
          require_once("../models/user.php");

          $email = $_POST['email'];
          $clave = $_POST['clave'];

          $connection = new Connection();
          $connection = $connection->getConnection();

          $user = new User();
          if($row = $user->loginCorrect($email, $clave)){
            // Existe user
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['clave'] = $clave;
            $_SESSION['id_sector'] = $row['id_sector'];
            $_SESSION['rol'] = $row['rol'];
            $_SESSION['id_usuario'] = $row['id_usuario'];
            $_SESSION['nombre'] = $row['nombre'];

            header('location:/gestorbox2018/index.php');


          }
          else {
            // Que lo vuelva a intentar. 
            header('location:../views/login.php');
            
            
          }
        ?>
