<?php
include '../vendor/autoload.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);
  
  $content = $data['content'];

  // You'll need a library like TCPDF or FPDF to generate the PDF
  // For example, using TCPDF
  require_once('tcpdf/tcpdf.php');

  $pdf = new TCPDF();
  $pdf->AddPage();
  $pdf->writeHTML($content);
  $pdf->Output('downloaded_pdf.pdf', 'I');
}
?>
