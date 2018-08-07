<?php 
if (isset($_GET['alerta'])) {
    switch ($_GET['alerta']) {
        case '1':
            echo '<div class="alert alert-danger"><strong>¡Error!</strong> Asegurese de llenar todos los campos solicitados.</div>';
            break;
        case '2':
            echo '<div class="alert alert-danger"><strong>¡Error!</strong> Asegurese de que las cantidades ingresadas sean valores numéricos.</div>';
            break;
        case '3':
            echo '<div class="alert alert-success"><strong>¡Éxito!</strong> Se insertó correctamente a la base de datos, para verificarlo, vaya a “Informes”.</div>';
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
    <form action="proceso_nuevo_ingreso.php" class="form-horizontal" method="post">    
            <h2>Tabule los datos del ingreso</h2>
            
            <div class="form-group">
                    <label>Descripción del ingreso</label>
                    <input class="text" id="descripcion" name="descripcion" placeholder="Ingrese la descripción del ingreso aquí." rows="0"></input>
            </div>
            
            <div class="form-group">
                <label>Fecha de corte semanal</label>
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
                    <label>Cantidad Lps. del ingreso</label>
                    <input class="text" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad aquí." rows="0"></input>
            </div>

            <div class="form-group">
                    <button type="submit" class="button">Terminar</button>
            </div>
    </form>
</div>
<div class="container">
    <form action="proceso_nuevo_ingreso_leche.php" class="form-horizontal" method="post">    
            <h2>Venta de leche</h2>
            
            <div class="form-group">
                <label>Fecha de corte semanal</label>
                <input class="datepicker" id="fecha_leche" name="fecha_leche" type="text" value=
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
                    <label>Cantidad de litros vendidos en la semana</label>
                    <input class="text" id="cantidad_leche" name="cantidad_leche" placeholder="Ingrese litros vendidos en la semana aquí." rows="1"></input>
            </div>
            <div class="form-group">
                    <label>Precio por litro de leche en la semana</label>
                    <input class="text" id="precio_leche" name="precio_leche" placeholder="Ingrese el precio por litro de leche de la semana aquí." rows="1"></input>
            </div>

            <div class="form-group">
                    <button type="submit" class="button">Terminar</button>
            </div>
    </form>
</div>