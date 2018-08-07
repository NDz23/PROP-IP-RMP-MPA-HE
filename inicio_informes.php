<?php
	if (isset($_GET['error'])) {
	    switch ($_GET['error']) {
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
    if (!isset($_GET['per'])) {//Se define el periodo para mostrar informes
    ?>
        <div class="container">
            <form action="proceso_periodo_informes.php" class="form-horizontal" method="post">    
                <h2>Informes</h2>
                
                <div class="form-group">
                    <label for="periodo">Periodo en el que desea ver los informes</label>
                    <select class="form-control" id="periodo" name="periodo">
                      <option value="0">Semanal</option>
                      <option value="1">Mensual</option>
                      <option value="2">Anual</option>
                    </select>
                </div>
                <div class="form-group">
                        <button type="submit" class="button">Terminar</button>
                </div>
            </form>
        </div>
    <?php
    }else {
   		include_once "./class/class_conexion.php";
    	$conexion = new Conexion();
    	if (!isset($_GET['fecha'])){//Se define la fecha
    		$pag = $_GET['per'];
	        if ($pag === "semanal"){
	        ?>
	            <div class="container">
		            <form action="proceso_fecha_informes.php" class="form-horizontal" method="post">    
		                <h2>Informes</h2>
		                <input type="hidden" name="per" value="semanal"/>
		                <div class="form-group">
		                    <label for="fecha">Seleccione la semana de la que desea ver los informes</label>
		                    <select class="form-control" id="fecha" name="fecha">
		                    	<?php
		                    		$sql = "SELECT `FECHA` FROM `tbl_ingresos` GROUP BY `FECHA`";
		                    		$res = $conexion->ejecutarConsulta($sql);
									if(!$res){
										header('Location: inicio.php?pag=informes&error=10');
										$conexion->cerrarConexion();
										exit();
									}
									while ($fila = $res->fetch_assoc()) {
									    echo '<option value="'.$fila['FECHA'].'">'.$fila['FECHA'].'</option>';
									}
		                    	?>
		                    </select>
		                </div>
		                <div class="form-group">
		                        <button type="submit" class="button">Terminar</button>
		                </div>
		            </form>
		        </div>
	        <?php
	    	}else if ($pag === "mensual"){	
	        ?>
	            <div class="container">
		            <form action="proceso_fecha_informes.php" class="form-horizontal" method="post">    
		                <h2>Informes</h2>
		                <input type="hidden" name="per" value="mensual"/>
		                <div class="form-group">
		                    <label for="fecha">Seleccione el mes del que desea ver los informes</label>
		                    <select class="form-control" id="fecha" name="fecha">
		                    	<?php
		                    		$sql = "SELECT YEAR(`FECHA`) AS 'ANIO', MONTH(`FECHA`) AS 'MES' FROM `tbl_ingresos` GROUP BY ANIO, MES";
		                    		$res = $conexion->ejecutarConsulta($sql);
									if(!$res){
										header('Location: inicio.php?pag=informes&error=10');
										$conexion->cerrarConexion();
										exit();
									}
									while ($fila = $res->fetch_assoc()) {
									    echo '<option value="'.$fila['ANIO'].'-'.$fila['MES'].'-'.'1">'.$fila['MES'].'-'.$fila['ANIO'].'</option>';
									}
		                    	?>
		                    </select>
		                </div>
		                <div class="form-group">
		                        <button type="submit" class="button">Terminar</button>
		                </div>
		            </form>
		        </div>
	        <?php     
	        }
	        else if ($pag === "anual"){
	            ?>
	            <div class="container">
		            <form action="proceso_fecha_informes.php" class="form-horizontal" method="post">    
		                <h2>Informes</h2>
		                <input type="hidden" name="per" value="anual"/>
		                <div class="form-group">
		                    <label for="fecha">Seleccione el año del que desea ver los informes</label>
		                    <select class="form-control" id="fecha" name="fecha">
		                    	<?php
		                    		$sql = "SELECT YEAR(`FECHA`) AS 'ANIO' FROM `tbl_ingresos` GROUP BY ANIO";
		                    		$res = $conexion->ejecutarConsulta($sql);
									if(!$res){
										header('Location: inicio.php?pag=informes&error=10');
										$conexion->cerrarConexion();
										exit();
									}
									while ($fila = $res->fetch_assoc()) {
									    echo '<option value="'.$fila['ANIO'].'-1-'.'1">'.$fila['ANIO'].'</option>';
									}
		                    	?>
		                    </select>
		                </div>
		                <div class="form-group">
		                        <button type="submit" class="button">Terminar</button>
		                </div>
		            </form>
		        </div>
	        <?php 
	        }
    	}else{//Se presentan los informes segun la fecha y el periodo dado
	    	$per = $_GET['per'];
	    	$fecha = $_GET['fecha'];
	    	$sql='';
	    	$sql2='';
	    	if ($per === 'semanal') {//Consulta segun periodo y fecha
	    		$sql = "SELECT * FROM `tbl_ingresos` WHERE `FECHA`=STR_TO_DATE('".$fecha."', '%Y-%m-%d')";
	    		$sql2 = "SELECT * FROM `tbl_gastos` WHERE `FECHA`=STR_TO_DATE('".$fecha."', '%Y-%m-%d')";
	    	}else if ($per === 'mensual') {
	    		$sql = "SELECT * FROM `tbl_ingresos` WHERE YEAR(`FECHA`)=YEAR(STR_TO_DATE('".$fecha."', '%Y-%m-%d')) AND MONTH(`FECHA`)=MONTH(STR_TO_DATE('".$fecha."', '%Y-%m-%d'))";
	    		$sql2 = "SELECT * FROM `tbl_gastos` WHERE YEAR(`FECHA`)=YEAR(STR_TO_DATE('".$fecha."', '%Y-%m-%d')) AND MONTH(`FECHA`)=MONTH(STR_TO_DATE('".$fecha."', '%Y-%m-%d'))";
	    	}else if ($per === 'anual') {
	    		$sql = "SELECT * FROM `tbl_ingresos` WHERE YEAR(`FECHA`)=YEAR(STR_TO_DATE('".$fecha."', '%Y-%m-%d'))";
	    		$sql2 = "SELECT * FROM `tbl_gastos` WHERE YEAR(`FECHA`)=YEAR(STR_TO_DATE('".$fecha."', '%Y-%m-%d'))";
	    	}
	    	?>
		    	<div class="container">
	                <h2>Informes</h2>
	                <div class="form-group">
	                    <h3>Informe 
	                    	<?php
	                    		echo $per.' ('.$fecha.')';
	                    	?>
	                    </h3>
                    	<?php
                    		$res = $conexion->ejecutarConsulta($sql);
                    		$totalIngresos = 0;
                    		$totalGastos = 0;
                    		$superavit = 0;
							if(!$res){
								header('Location: inicio.php?pag=informes&error=10');
								$conexion->cerrarConexion();
								exit();
							}
							echo '<p class="desc">INGRESOS: </p>';
							while ($fila = $res->fetch_assoc()) {
								$totalIngresos += $fila['CANTIDAD'];
								$superavit += $fila['CANTIDAD'];
							    echo '<p class="desc">Descripcion: '.$fila['DESCRIPCION'].' Fecha: '.$fila['FECHA'].' Cantidad: '. $fila['CANTIDAD'].'</p>';
							}
							$res = $conexion->ejecutarConsulta($sql2);
							if(!$res){
								header('Location: inicio.php?pag=informes&error=10');
								$conexion->cerrarConexion();
								exit();
							}
							echo '<p class="desc">GASTOS: </p>';
							while ($fila = $res->fetch_assoc()) {
								$totalGastos += $fila['CANTIDAD'];
								$superavit -= $fila['CANTIDAD'];
							    echo '<p class="desc">Descripcion: '.$fila['DESCRIPCION'].' Fecha: '.$fila['FECHA'].' Cantidad: '. $fila['CANTIDAD'].'</p>';
							}
							echo '<p class="desc">Ingresos: '.$totalIngresos." Gastos:".$totalGastos."</p>";
							echo '<p class="desc">Superávit: '.$superavit."</p>";
                    	?>
	                </div>
		        </div>
	        <?php
    	}
    	$conexion->cerrarConexion();
	}

?>