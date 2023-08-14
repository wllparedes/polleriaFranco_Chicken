<?php
include("./../../../../databases/db.php");
require('./../../../../assets/modules/fpdf186/fpdf.php');


$id_empresa = 1;
$valor = $_GET['pedido_id'];

$queryE = "SELECT * FROM Empresa WHERE id_empresa = ?";
$stmtE = $conn->prepare($queryE);
$stmtE->bind_param('i', $id_empresa);
$stmtE->execute();
$resultE = $stmtE->get_result();
$rowE = $resultE->fetch_object();

$pdf = new FPDF('P', 'mm', array(80, 130));;
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// * Cabecera

$pdf->SetFont('Helvetica', '', 12);
$pdf->Cell(60, 4, $rowE->razon_social, 0, 1, 'C');
$pdf->SetFont('Helvetica', '', 8);
$pdf->Cell(60, 4, 'RUC: ' . $rowE->ruc , 0, 1, 'C');
$pdf->Cell(60, 4, $rowE->ciudad, 0, 1, 'C');
$pdf->Cell(60, 4, utf8_decode($rowE->direccion), 0, 1, 'C');
$pdf->Cell(60, 4,'Telefono: ' . $rowE->telefono, 0, 1, 'C');
$pdf->Cell(60, 4,'Telefono fijo: ' . $rowE->telefono_fijo, 0, 1, 'C');



$query = "SELECT * FROM VER_PEDIDO WHERE id_pedido = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $valor);
$stmt->execute();
$result = $stmt->get_result();
$sw = 0;
$sub_total = 0;


while ($row = $result->fetch_object()) {
    
    if ($sw == 0) {
        
        $partes = explode(" ", $row->fecha_hora);
        $fecha = $partes[0];
        $hora = $partes[1];
        // * Datos Ticket
        $pdf->Ln(5);
        $pdf->Cell(60, 4, 'Nombre del cliente: ' . $row->nom_cliente , 0, 1, '');
        $pdf->Cell(60, 4, utf8_decode('Número de mesa: ' . $row->n_mesa) , 0, 1, '');
        $pdf->Cell(60, 4, 'Fecha: ' . $fecha , 0, 1, '');
        $pdf->Cell(60, 4, 'Hora: ' . $hora, 0, 1, '');
        
        // * Columnas
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 10, 'Consumible', 0);
        $pdf->Cell(5, 10, 'Cantidad', 0, 0, 'R');
        $pdf->Cell(25, 10, 'Precio S/.', 0, 0, 'R');
        $pdf->Ln(8);
        $pdf->Cell(60, 0, '', 'T');
        $pdf->Ln(0);

        $sub_total += $row->sub_total;

        $sw += 1;

    }

    $pdf->SetFont('Helvetica', '', 7);
    $pdf->MultiCell(30, 4, $row->nom_consumible, 0, 'L');
    $pdf->Cell(30, -5, $row->cantidad, 0, 0, 'R');
    $pdf->Cell(28, -5, $row->precio, 0, 0, 'R');
    $pdf->Ln(1);
        
    
}

$pdf->Ln(3);
$pdf->Cell(60, 0, '', 'T');
$pdf->Ln(2);
$pdf->Cell(25, 10, 'SUBTOTAL', 0);
$pdf->Cell(20, 10, '', 0);
$pdf->Cell(15, 10, 'S/. ' . $sub_total, 0, 0, 'R');
$pdf->Ln(10);
$pdf->Cell(60, 0, 'NO INCLUYE IGV', 0, 1, 'C');
$pdf->Ln(3);

$pdf->Output();

?>