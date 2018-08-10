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
    <form action="proceso_nuevo_gasto.php" class="form-horizontal" method="post">    
            <h2>Tabule los datos del gasto</h2>
            
            <div class="form-group">
                    <label>Descripción del gasto</label>
                    <input class="text" id="descripcion" name="descripcion" placeholder="Ingrese la descripción del gasto aquí." rows="0"></input>
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
                    <label>Cantidad Lps. del gasto</label>
                    <input class="text" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad aquí." rows="0"></input>
            </div>

            <div class="form-group">
                    <button type="submit" class="button">Terminar</button>
            </div>
    </form>
</div>