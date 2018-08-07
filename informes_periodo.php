<div class="container">
    <form action=".php" class="form-horizontal" method="post">    
            <h2 class="text-center header">Tabule los datos de la deuda:</h2>
            
            <div class="radio">
                <label for="nofuncional">Anual</label>
                <input type="radio" name="funcion" value="0" id="anual">
                <label for="funcional">Mensual</label>
                <input type="radio" name="funcion" value="1" id="mensual">
                <label for="funcional">Semanal</label>
                <input type="radio" name="funcion" value="2" id="semanal" checked>
            </div>
            <div class="form-group">
                    <button type="submit" class="button">Terminar</button>
            </div>
    </form>
</div>