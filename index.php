<!DOCTYPE html>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Propietarios IP-RMP-MPA-HE</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/normalize.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script type="text/javascript" src="js/bootstrap.min.js"></script>


</head>
<body>

  <?php 
    if (isset($_GET['error'])) {
        switch ($_GET['error']) {
            case '1':
                echo '<div class="alert alert-danger"><strong>¡Error!</strong> Usuario inexistente.</div>';
                break;
            case '2':
                echo '<div class="alert alert-danger"><strong>¡Error!</strong> Contraseña incorrecta.</div>';
                break;
            case '3':
                echo '<div class="alert alert-danger"><strong>¡Error!</strong> Acceso restringido.</div>';
                break;
            default:
                 break;
        }                
    }
  ?>

  <div class="form">
    <h1>Propietarios IP-RMP-MPA-HE</h1>
  <div id="signup">   
    <h3>Verifique que es un usuario con acceso</h3>
    
    <form action="proceso_login.php" method="post">
    
      <div class="field-wrap">
      <label>
        Usuario<span class="req">*</span>
      </label>
      <input type="user" name="user" id="user" required autocomplete="off"/>
    </div>
    
    <div class="field-wrap">
      <label>
        Contraseña<span class="req">*</span>
      </label>
      <input type="password" name="password" id="password" required autocomplete="off"/>
    </div>
    
    <button class="button button-block"/>ENTRAR</button>
    
    </form>
  </div>
</div> <!-- /form -->
  <script src='js/jquery.min.js'></script>
  <script src="js/index.js"></script>
</body>
</html>