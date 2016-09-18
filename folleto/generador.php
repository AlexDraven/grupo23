<?php
include ('fpdf/fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();

        $pdf->SetFont('Helvetica', 'B', 40);
		$pdf->Write (20,$_POST['nombre']);
		$pdf->Ln();
		$pdf->Image('loro.jpg', 15 ,50, 180 , 100,'JPG');
		$pdf->Ln(140);
		$pdf->SetFont('Helvetica', 'B', 24);
		$pdf->Write(15,$_POST['desc']);
		$pdf->SetTextColor('255','0','0');
        $pdf->Output("folleto.pdf",'F');
		echo "<script language='javascript'>window.open('folleto.pdf','_self','');</script>";//para ver el archivo pdf generado
		exit;
	?>
