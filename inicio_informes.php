<?php
    if (isset($_GET['per'])) {
        $pag = $_GET['per'];
        if ($pag === "semanal"){
            include 'inicio_ayuda.php';
        }
        else if ($pag === "mensual"){
            include 'inicio_ayuda.php';     
        }
        else if ($pag === "anual"){
            include 'inicio_ayuda.php';
        }
    }
    else {
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
    }
?>