<!DOCTYPE html>
<?php
    include_once "./class/class_sesion.php";
    Sesion::crearSesion();
    Sesion::setId();
    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php?error=3');
    }
?>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Propietarios IP-RMP-MPA-HE</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="css/inicio.css"/>
    <link rel="stylesheet" type="text/css" href="css/datepicker.css"/>
    <script>
      $(function(){
        $('.datepicker').datepicker();
      });
    </script>

</head>
<body>
<!-- bcs verde #179b77 -->
<div class="topnav">
  <a class="active" href="?pag=inicio">IP-RMP-MPA-HE</a>
  <a href="?pag=ingresos">Ingresos</a>
  <a href="?pag=gastos">Gastos</a>
  <a href="?pag=deudas">Deudas</a>
  <a href="?pag=informes">Informes</a>
  <a href="?pag=salir">Salir</a>
</div>

<!DOCTYPE html>
<?php
    if (isset($_GET['pag'])) {
        $pag = $_GET['pag'];
        if ($pag === "ingresos"){
            include 'inicio_ingresos.php';
        }
        else if ($pag === "gastos"){
            include 'inicio_gastos.php';
        }
        else if ($pag === "deudas"){
            include 'inicio_deudas.php';
        }
        else if ($pag === "informes"){
            include 'inicio_informes.php';
        }
        else if ($pag === "salir"){
            include 'proceso_salir.php';
        }
        else{//recien logueado
            include 'inicio_ayuda.php';
        }      
    }
    else {
        include 'inicio_ayuda.php';
    }
?>
<footer class="footer footer-copyright text-center py-3">© 2018 Por: Nelson Díaz y Fabricio Murillo</footer>
</body>
</html>