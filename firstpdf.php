<?php 
include('fpdf/fpdf.php');
include('includes/dbcon.php');

$query= "SELECT * from interns";
$run_query= mysqli_query($con, $query);
$row= mysqli_fetch_assoc($run_query);

$fname= $row['first_name'];
$lname= $row['last_name'];
$age= $row['age'];



class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('header.jpg', 0, 0, 210);
        // Arial bold 13
        
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->Image('footer.jpg', 0, 270, 210);

    }


}


// Instantiation of inherited class
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetLeftMargin(20);
$pdf->SetRightMargin(20);

$pdf->Ln(40);

$pdf->SetFont('Arial', 'B', 10);

// Date and Ref. No.
$date = '04/07/2024';
$refNo = 'SMM2024ML99628';
$pdf->Cell(0, 5, 'Date: ' . $date, 0, 1, 'L');
$pdf->Cell(0, 5, 'Ref. No. ' . $refNo, 0, 1, 'R');


// Line break
$pdf->Ln(2);
$pdf->SetFont('Arial', 'B', 12);


$main = 'INTERNSHIP OFFER LETTER';


$pdf->Cell(0, 10, ' ' . $main, 0, 1, 'C');

$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(0, 5, 'To,', 0, 1);
$pdf->Ln(5);
// Recipient
$pdf->SetFont('Arial', 'B', 10);

$fname__y= $pdf->GetY();
$pdf->setXY(20,$fname__y-2);
$pdf->Cell(0,1,"$fname",0,1,"L");
$pdf->SetXY(32,$fname__y-2);
$pdf->Cell(0,1," $lname,",0,1,"L");





// Line break
$pdf->Ln(6);
$pdf->SetFont('Arial', '', 10);

// Offer letter body
$pdf->MultiCell(0, 5, 'We are pleased to offer you the position of "Machine Learning Intern" at Suvidha Foundation (Suvidha Mahila Mandal) with the following terms and conditions:');
$pdf->Ln(6);
$pdf->SetLeftMargin(30);
$pdf->SetRightMargin(20);

$terms = [
    'Role: Machine Learning Services and Social activities',
    'Internship Period: July 05, 2024 to August 05, 2024',
    'Position: Work-from-home, six days a week',
    'This is an honorary position and does not entail any financial remuneration',
    'Completion Certificate: Issued upon fulfilling internship requirements, including daily time commitment'
];

foreach ($terms as $term) {
    $pdf->MultiCell(0, 6, '* ' . $term);
    $pdf->Ln(1);
}

$pdf->Ln(2);
$pdf->SetLeftMargin(20);
$pdf->SetRightMargin(20);
$pdf->Ln(4);
$pdf->SetFont('Arial', 'B', 10);

$pdf->MultiCell(0, 5, 'Confidentiality and Conduct:');
$pdf->Ln(6);
$pdf->SetFont('Arial', '', 10);

$pdf->SetLeftMargin(30);
$pdf->SetRightMargin(20);
$confidentiality = [
    'Maintain confidentiality during and after the internship.',
    'Misconduct may lead to termination without a completion certificate.',
    'All developed materials are the property of Suvidha Mahila Mandal.',
    'Return all organisation property upon completion.',
    'Legal action will be taken for piracy or information leakage.'
];

foreach ($confidentiality as $item) {
    $pdf->MultiCell(0, 5, '* ' . $item);
    $pdf->Ln(1);
}

// Line break
$pdf->Ln(6);
$pdf->SetLeftMargin(20);
$pdf->SetRightMargin(20);
$pdf->Ln(2);

// Acceptance section
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetLeftMargin(20);
$pdf->SetRightMargin(20);
$pdf->MultiCell(0, 5, 'Acceptance: I accept the offer and agree to the terms and conditions.');
$pdf->Ln(8);
$pdf->Cell(0, 5, 'Signature: ________________________________  Date: _________________________________', 0, 1);

// Line break
$pdf->Ln(9);

// Signature
$pdf->SetFont('Arial', 'B', 9);
$pdf->Image('sign.jpg', 20, 230, 45);
$pdf->Ln(8);

$pdf->Cell(0, 5, 'Mrs. Shobha Motghare', 0, 1, 'L');
$pdf->Cell(0, 5, 'Secretary, Suvidha Mahila Mandal', 0, 1, 'L');

$pdf->Output();
?>
