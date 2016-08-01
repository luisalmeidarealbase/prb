<?php 

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$erro = false;

//verifica se houve input de dados no formulario de login

if (isset($_POST['username'])) {

  # caso exista input de dados, verifica o login

  //prevent to mysql injection
  $username = mysqli_real_escape_string($link, $_POST['username']);
  $password = $_POST['password'];
  

  $query = "SELECT * FROM tbl_users WHERE email_address = '$username' AND password =  '$password'";

  $result = mysqli_query($link,$query);
 
  if (mysqli_num_rows($result) == 1) {
   // get data from the user logged in
    /* fetch associative array */
    while ($row = mysqli_fetch_object($result)) {
        
        //save data in sessions variables
        $_SESSION['firstname'] = utf8_decode($row->first_name);
        
        $_SESSION['lastname'] = utf8_decode($row->last_name);
        
        $_SESSION['iduser'] = $row->id_user;

        $_SESSION['tipouser'] = $row->tbl_tipo_users_id_tipo_user;

        $_SESSION['fullname'] = $_SESSION['firstname']." ".$_SESSION['lastname'];

         header('Location: starter.php');
//        echo $_SESSION['fullname'];

    }

  //Pass - validou e envia para o dashboard
   
  }

  else {
   //Fail
   $erro = true;
  // $error = "houve um erro na sua autenticação";
   //echo $error;
 }
}

// else{
//   #indicar que nao houve input de dados
//   echo "nao existem dados para validar.";
// }


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Realbase Qualidade | Entrar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
      <body class="hold-transition login-page">
        <div class="login-box">
          <div class="login-logo">
            <a href="index.php"><b>Portal</b>Realbase</a>
          </div><!-- /.login-logo -->
          <div class="login-box-body">
            <p class="login-box-msg">Inicie sessão com os seus dados de acesso</p>
            
            <form action="index.php" method="post">
              <div class="form-group has-feedback">
                <input type="email" class="form-control" name="username" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="row">
                <div class="col-xs-8">
                  <div class="checkbox icheck">
                    <label>
                      <input type="checkbox"> Lembrar-me
                    </label>
                  </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                </div><!-- /.col -->
              </div>
            </form>

       <!--  <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div> --><!-- /.social-auth-links -->
        <?php 
        if ($erro){
          ?><div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Erro</h4>
                    Os dados introduzidos estão incorrectos.
                  </div>
        <?php }
        ?>

        <center>Caso não consiga aceder, por favor entre em contacto com o <a href="mailto:suporte@realbase.pt">Suporte Realbase.</a></center>
<!--         <a href="" class="text-center">caso não consiga aceder, por favor contacte o suporte Realbase</a>
-->
</div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
  });
</script>
</body>
</html>
