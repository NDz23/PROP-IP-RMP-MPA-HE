<?php 
if (isset($_GET['alerta'])) {
    switch ($_GET['alerta']) {
        case '1':
            echo '<div class="alert alert-danger"><strong>Error!</strong> Asegurese de llenar todos los campos solicitados.</div>';
            break;
        case '2':
            echo '<div class="alert alert-danger"><strong>Error!</strong> Asegurese de que las cantidades ingresadas sean valores numéricos.</div>';
            break;
        case '3':
            echo '<div class="alert alert-success"><strong>Éxito!</strong> Se insertó correctamente a la base de datos, para verificarlo, desplácese hacia abajo.</div>';
            break;
        case '10':
            echo '<div class="alert alert-danger"><strong>¡Error!</strong> Hay un error al conectar con  la base de datos.</div>';
            break;
        default:
             break;
    }                
}
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-ms-12 col-sm-12 col-xs-12">
            <p style="color:#ffffff">Seleccione una opción</p>
            <select class="form-control" id="slcDeuda" name="slcDeuda">
              <option>Seleccione</option>
              <option id="slcNuevaDeuda" name="slcNuevaDeuda" onclick="mostrarNuevaDeuda()">Agregar nueva deuda</option>
              <option id="slcVerDeuda" name="slcVerDeuda" onclick="mostrarVerDeuda()">Ver deudas pendientes</option>
              <option id="slcDeudaSaldada" name="slcDeudaSaldada" onclick="mostrarDeudaSaldada()">Ver deudas saldadas</option>
            </select>
        </div>
    </div>
</div>

<div id="divCuerpo" name="divCuerpo">

</div>

<div class="container" id="divNuevaDeuda" name="divNuevaDeuda" style='display:none;'>
    <form action="proceso_nuevo_deuda.php" class="form-horizontal" method="post">    
            <h2>Tabule los datos de la deuda</h2>
            
            <div class="form-group">
                    <label>Descripción de la deuda</label>
                    <input class="text" id="descripcion" name="descripcion" placeholder="Ingrese la descripción de la deuda aquí." rows="0"></input>
            </div>
            
            <div class="form-group">
                <label>Fecha</label>
                <input class="datepicker" id="fecha" name="fecha" type="text" value=
                <?php
                    $hoy = getdate();
                    echo '"'.$hoy['year'].'-';
                    if ($hoy['mon']<10) {
                        echo "0";
                    }
                    echo $hoy['mon'].'-';
                    if ($hoy['mday']<10) {
                        echo "0";
                    }
                    echo $hoy['mday'].'"';
                ?> readonly>
            </div>
                
            <div class="form-group">
                    <label>Cantidad adeudada</label>
                    <input class="text" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad adeudada aquí." rows="0"></input>
            </div>
            <div class="form-group">
                    <label>Acreedor</label>
                    <input class="text" id="acreedor" name="acreedor" placeholder="Ingrese el nombre del acreedor aquí." rows="0"></input>
            </div>
            <div class="form-group">
                    <label>Cantidad pagada</label>
                    <input class="text" id="cantidad_paga" name="cantidad_paga" placeholder="Ingrese la cantidad pagada aquí." rows="0"></input>
            </div>

            <div class="form-group">
                    <button type="submit" class="button">Terminar</button>
            </div>
    </form>
</div>

<?php
include_once "./class/class_conexion.php";
$conexion = new Conexion();
$sql = 'SELECT * FROM `tbl_deudas` WHERE `CANTIDAD`>`CANT_PAGADA`';
$sql2 = 'SELECT * FROM `tbl_deudas` WHERE `CANTIDAD`-`CANT_PAGADA`=0';
$res = $conexion->ejecutarConsulta($sql);
if(!$res){
    header('Location: inicio.php?pag=deudas&error=10');
    $conexion->cerrarConexion();
    exit();
}
?>
<div class="container" id="divVerDeuda" name="divVerDeuda" style='display:none;'>  
    <h2>Deudas pendientes</h2>
    <table class="table">
	  <thead>
	    <tr>
	      <th class="desc">Descripción</th>
	      <th class="desc">Fecha</th>
	      <th class="desc">Cantidad</th>
	      <th class="desc">Cantidad pagada</th>
	      <th class="desc">Acreedor</th>
	      <th class="desc">Editar</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
        while ($fila = $res->fetch_assoc()) {
            echo '<tr scope="row"><form action="proceso_pago_deuda.php" method="post"><td class="desc">'.$fila['DESCRIPCION'].'</td><td class="desc">'.$fila['FECHA'].'</td><td class="desc">'. $fila['CANTIDAD'].'</td><td class="desc"><input class="text" id="cant" name="cant" placeholder="'. $fila['CANT_PAGADA'].'" rows="0"></input></td><td class="desc">'. $fila['ACREEDOR'].'</td><td class="desc"><input type="hidden" name="id" value="'.$fila['ID_DEUDA'].'"/><button type="submit" class="button">Editar</button></td></form></tr>';
        }
    	?>
	  </tbody>
	</table>
</div>
<div class="container" id="divDeudaSaldada" name="divDeudaSaldada" style='display:none;'>  
    <h2>Deudas saldadas</h2>
    <table class="table">
	  <thead>
	    <tr>
	      <th class="desc">Descripción</th>
	      <th class="desc">Fecha</th>
	      <th class="desc">Cantidad</th>
	      <th class="desc">Cantidad pagada</th>
	      <th class="desc">Acreedor</th>
	    </tr>
	  </thead>
	  <tbody>
    <?php
        $res = $conexion->ejecutarConsulta($sql2);
        if(!$res){
            header('Location: inicio.php?pag=deudas&error=10');
            $conexion->cerrarConexion();
            exit();
        }
        while ($fila = $res->fetch_assoc()) {
            echo '<tr scope="row"><td class="desc">'.$fila['DESCRIPCION'].'</td><td class="desc">'.$fila['FECHA'].'</td><td class="desc">Lps. '. $fila['CANTIDAD'].'</td><td class="desc">Lps. '. $fila['CANT_PAGADA'].'</td><td class="desc">'. $fila['ACREEDOR'].'</td></tr>';
        }
    ?>
      </tbody>
	</table>
</div>
<footer class="footer footer-copyright text-center py-3">© 2018 Por: Nelson Díaz y Fabricio Murillo</footer>
  <script src='js/jquery.min.js'></script>
  <script src="js/index.js"></script>
  <script src="js/deuda.js"></script>
</body>
</html>