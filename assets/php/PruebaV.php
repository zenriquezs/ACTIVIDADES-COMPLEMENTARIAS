<?php

require('fpdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        global $nombreInstructor, $nombreAlumno, $matricula, $nombreCarrera, $nivelDesempeño, $numeroComplementaria, $periodo;
        $this->SetFont('Arial', 'B', 8);
        $this->SetTextColor(0, 0, 0);

        $this->SetX(5);
        $this->Cell(40, 20, $this->Image('fpdf/LOGO_ITSOEH.png', 5, 6, 40), 1, 0, 'C');
        $this->Cell(120, 10, utf8_decode('INSTITUTO TECNOLÓGICO SUPERIOR DEL OCCIDENTE DEL ESTADO DE HIDALGO'), 1, 0, 'C');
        $this->Cell(40, 20, $this->Image('fpdf/LOGO_ITSOEH.png', 165, 6, 40), 1, 1, 'C');
        $this->SetX(5);
        $this->Cell(40);
        $this->Cell(120, -10, utf8_decode('ACTIVIDADES COMPLEMENTARIAS'), 1, 0, 'C');
        $this->Cell(40);

        $this->SetY(40);
        $this->SetFont('Arial', '', 11);
        $this->Cell(0, 10, utf8_decode('ANEXO XVI. CONSTANCIA DE CUMPLIMIENTO DE ACTIVIDAD COMPLEMENTARIA'), 0, 1, 'C');


        $this->SetY(40);
        $this->SetFont('Arial', '', 11);
        $this->Cell(0, 10, utf8_decode('ANEXO XVI. CONSTANCIA DE CUMPLIMIENTO DE ACTIVIDAD COMPLEMENTARIA'), 0, 1, 'C');

        $this->SetY(70);
        $this->SetFont('Arial', '', 8);
        $this->Cell(42, 4, utf8_decode('LIC. ROCÍO MONTOYA PÉREZ'), 0, 1, 'C');
        $this->Cell(72, 4, utf8_decode('JEFA DEL DEPARTAMENTO DE CONTROL ESCOLAR'), 0, 1, 'C');
        $this->Cell(17, 4, utf8_decode('PRESENTE'), 0, 1, 'C');

        $this->SetY(100);
        $this->SetFont('Arial', '', 10);

        $texto = utf8_decode("Está dirigido por $nombreInstructor. Por este medio hago de su conocimiento que el estudiante $nombreAlumno con número de control $matricula del Programa Educativo de $nombreCarrera ha cumplido su actividad complementaria con el nivel de desempeño $nivelDesempeño y un valor numérico de $numeroComplementaria, durante el período $periodo, con un valor curricular de 1 crédito.");

        $lineas = $this->MultiCell(0, 5, $texto, 0, 'J');

        if ($this->GetY() + 10 > $this->PageBreakTrigger) {
            $this->AddPage();
        }
        $this->Cell(0, 10);

        for ($i = $lineas + 1; $i < count(explode("\n", $texto)); $i++) {
            $this->Cell(1, 4, '', 0, 1, 'C');
        }
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $hoy = date('d/m/Y');
        $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C');
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "complementarias";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT EMAIL, NOMBRE_COMPLETO_ALUMNO, ID_COMPLEMENTARIAS, ID_ALUMNO, PERIODO, NIVEL_DE_DESEMPEÑO, NUMERO_DE_COMPLEMENTARIA, NOMBRE_COMPLETO_INSTRUCTOR, NOMBRE_CARRERA FROM VistaEmailAlumnoComplementariasFormatoLiberacion WHERE ID_ALUMNO = '21011711';";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $matricula = $row['ID_ALUMNO'];
    $periodo = $row['PERIODO'];
    $numeroComplementaria = $row['NUMERO_DE_COMPLEMENTARIA'];
    $nivelDesempeño = $row['NIVEL_DE_DESEMPEÑO'];
    $nombreAlumno = $row['NOMBRE_COMPLETO_ALUMNO'];
    $nombreInstructor = $row['NOMBRE_COMPLETO_INSTRUCTOR'];
    $nombreCarrera = $row['NOMBRE_CARRERA'];

    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->AliasNbPages();

    $pdf->Output('FormatoComplementarias.pdf', 'I');
     header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="FormatoComplementarias.pdf"');
    readfile('FormatoComplementarias.pdf');
    
}

?>
