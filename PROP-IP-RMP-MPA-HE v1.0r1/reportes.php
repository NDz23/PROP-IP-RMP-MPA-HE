<?php
	include_once "./class/class_conexion.php";
    $conexion = new Conexion();
    $op = $_GET['op'];

    if ($op){
    	include_once "pdf.php";

	    if($op === 'deudas-pendientes'){
            $sql = 'SELECT * FROM `tbl_deudas` WHERE `CANTIDAD`>`CANT_PAGADA`';
            $res = $conexion->ejecutarConsulta($sql);

			$filas=array();

			while ($filas=$conexion->obtenerFila($res)) {
				$filas[]=$res;
			}

		$titulo = 'REPORTE DE DEUDAS PENDIENTES';
		$pdf = new PDF($titulo);
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Times','',12);
		for($i=0; $i < count($filas); $i++)
			$pdf->Cell(0, 10, $i, 0, 1);

		$pdf->Output();
		}
	}else{
		echo header('Location: inicio.php');
	}
	$conexion->cerrarConexion();
?>