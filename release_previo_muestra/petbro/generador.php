<?php
include ('fpdf/fpdf.php');
$id = $_POST['id'];
$imagen = "data/public_$id.jpg";
    
    if (file_exists($imagen)){
        $logo = $imagen;
    }else{
        $logo="";
    }
        $pdf = new FPDF();
        $pdf->AddPage();

        $pdf->SetFont('Helvetica', 'B', 40);

		if ($_POST['tipo']=="perdida"){
			$pdf->Write (20,"Buscado ".$_POST['nombre']);
		}else{
			$pdf->Write (20,"Encontrado ".$_POST['nombre']);
		}

		
		$pdf->Ln(20);
		$pdf->SetFont('Helvetica', 'B', 20);
		$pdf->Write (10,"Fecha:".$_POST['fecha']);
		$pdf->Ln(20);
		$pdf->Write (10,"Hora:".$_POST['hora']);
		$pdf->Ln(20);
		$pdf->Write (10,"Detalle:".$_POST['extra']);
		$pdf->Ln(20);
		
		$pdf->Ln();
		$pdf->Image($logo, 15 ,100, 180 , 100,'JPG');
		$pdf->Ln(140);
		$pdf->SetFont('Helvetica', 'B', 24);
		$pdf->Write(15,$_POST['desc']);
		$pdf->SetTextColor('255','0','0');
        $pdf->Output("folleto.pdf",'F');
		echo "<script language='javascript'>window.open('folleto.pdf','_self','');</script>";//para ver el archivo pdf generado
		exit;
	?>
