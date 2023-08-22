<?php


class Pdf2 extends FPDF

{
    private $checkbox_x;
    private $checkbox_y;
    private $checked;
    
    function SetCheckBoxPosition($x, $y)
    {
        $this->checkbox_x = $x;
        $this->checkbox_y = $y;
    }
    
    function SetCheckBoxValue($checked)
    {
        $this->checked = $checked;
    }
    
    function CheckBox($label)
    {
        $this->SetBackgroundColor(255, 255, 255);
        $this->SetFont('Arial', '', 10);
        $this->SetXY($this->checkbox_x, $this->checkbox_y);
        if ($this->checked) {
            $this->Cell(5, 5, 'X', 1, 0, 'C');
        } else {
            $this->Cell(5, 5, '', 1, 0, 'C');
        }
        $this->Cell(5, 5, $label, 0, 1);
    }
    
    function AddCheckBox($label)
    {
        $this->Ln(2);
        $this->CheckBox($label);
    }


private $text_x;
    private $text_y;
    private $background_color;
    
    function SetTextPosition($x, $y)
    {
        $this->text_x = $x;
        $this->text_y = $y;
    }
    
    function SetBackgroundColor($r, $g, $b)
    {
        $this->background_color = array($r, $g, $b);
    }
    
    function AddText($text, $width = 0, $align = '',$height = 5)
    {
        // $this->SetFont('Arial', '', 10);
        $this->SetXY($this->text_x, $this->text_y);
        if ($width > 0) {
            $this->Cell($width, $height, '', 0, 0, $align, true);
            $this->SetXY($this->text_x, $this->text_y);
        }
        if (!empty($this->background_color)) {
            $this->SetFillColor($this->background_color[0], $this->background_color[1], $this->background_color[2]);
            $this->Cell(0, $height, '', 0, 1, $align, true);
            $this->SetXY($this->text_x, $this->text_y);
        }
        $this->Cell(0, $height, $text, 0, 1, $align);
        $this->background_color = array();
    }



function multicell_data($pdf, $data, $x, $y, $w, $h, $align = 'C'){
    // Set the x and y position
    $pdf->SetXY($x, $y);
    // Loop through the data and create a cell for each item with text wrapping
    foreach($data as $row_data){
        foreach($row_data as $cell_data){
            $pdf->MultiCell($w, $h, $cell_data, 0, $align);
        }
        $pdf->Ln($h);
    }
}





    function letak($gambar)

    {

        //memasukkan gambar untuk header
        // draft
        // $this->Image($gambar, 0, 0, -170);


        $this->Cell(0, 10, $teks1, 0, 1, 'C');
        $this->Image($gambar, -2, -2, -87);

        //menggeser posisi sekarang

    }

    function qrcode($qrcode)
    {

        //memasukkan gambar untuk header
        // draft
        // $this->Image($gambar, 0, 0, -170);
        // $this->SetXY(40, 80);

        $this->Image($qrcode,  180, 225, 25, 25);
        // $this->Image($iascb,  150, 205, 25, 25);
        // $this->Image($vrc,  120, 205, 25, 25);

        //menggeser posisi sekarang

    }

    function signature($signature)
    {

        $this->Image($signature,  15, 215, 25, 25);

        $this->SetTextColor(0, 0, 0);
        $this->SetFont('times','B',10);
        $this->SetXY(22, 235);
        $this->Cell(15, 5, "Director", 0, 1, 'R');
    }

    function cover($logo)
    {
        $this->SetLineWidth(0.5);

        $this->Line(12, 10, 200, 10);
        $this->Line(12, 280, 12, 10);
        $this->Line(200, 280, 200, 10);
        $this->Line(12, 280, 200, 280);

        $this->Image($logo,  29, 15, 55, 55);

        $this->SetFont('times', '', '11');

        $this->SetXY(125, 25);
        $this->Cell(65, 20, '', 1, 1, 'C');
        $this->SetXY(125, 20);
        $this->Cell(65, 20, 'Report No :', 0, 1, 'C');
        $this->SetXY(125, 28);
        $this->Cell(65, 20, 'IQCR313-DR53.91445K-2022', 0, 1, 'C');
        // $this->Cell(65,20, '',1,0,'L');
        // $this->SetXY(115, 28);
        $this->SetFont('arial', 'b', '8');

        // $this->Cell(65, 20, 'Smart Sertifikasi Indonesia', 0, 1, 'C');
        $this->MultiCell(95, 30, 'Smart Sertifikasi Indonesia', 0, 'C', false);
        $this->MultiCell(95, -20, 'smarsertifikasi.co.id', 0, 'C', false);

        $this->SetFont('arial', 'b', '9');
        $this->MultiCell(95, 42, 'Head Office :', 0, 'C', false);


        $this->SetFont('arial', '', '8');
        $this->MultiCell(95, -32, 'Cipayung Green View Blok A 15', 0, 'C', false);
        $this->MultiCell(95, 42, 'Kelurahan Cipayung, Jakarta Timur, DKI Jakarta.', 0, 'C', false);
        $this->MultiCell(95, -12, 'Email : ssicertify@gmail.com', 0, 'C', false);

        $this->SetFont('arial', 'B', '26');
        $this->MultiCell(285, -38, 'CONFIDENTIAL', 0, 'C', false);
        $this->MultiCell(285, 65, 'AUDIT REPORT', 0, 'C', false);

        $this->SetFont('arial', 'b', '14');
        $this->MultiCell(282, -8, 'Type of Audit :', 0, 'C', false);
        $this->MultiCell(282, 22, 'INITIAL', 0, 'C', false);
        

        $this->SetFont('arial', 'b', '10');


        $this->MultiCell(282, 3, 'Ownership of is report and the information', 0, 'C', false);
        $this->MultiCell(282,8, 'contained within re main the property of IQC', 0, 'C', false);
        $this->MultiCell(280,2, 'Certification Body', 0, 'C', false);

        $this->SetFont('times', 'b', '22');
        $this->MultiCell(0,34, 'PT. Sumatra Timur Indonesia', 0, 'C', false);
        $this->SetFont('ARIAL', '', '10');
        $this->SetXY(30, 175);
        $this->MultiCell(150,4, 'Jl. Kayu Putih Blok III A-A Kav.55, Kel. Pulo Gadung, Kec. Pulogadung, Kota Jakarta Timur, Provinsi DKI Jakarta, 13260', 0, 'C', false);


        $this->SetFont('ARIAL', 'b', '8');
        $this->SetXY(30, 195);
        $this->MultiCell(150,4, 'Standard(s) to be Certified :', 0, 'C', false);


        $this->SetFont('Helvetica', 'b', '22');
        $this->SetXY(30, 205);
        $this->MultiCell(160,8, 'ISO 9001 : 2015, ISO 14001:2015 and ISO 45001:2018', 0, 'C', false);

        $this->SetFont('ARIAL', '', '12');
        $this->SetXY(30, 230);
        $this->MultiCell(160,8, 'Scope :', 0, 'C', false);

        $this->SetFont('ARIAL', '', '10');
        $this->SetXY(30, 240);
        $this->MultiCell(160,5, 'Construction Services for Architecture, Civil & Mechanical , Janitorial & Cleaning Services, Supply and Maintenance Clea Maintenance Clea Maintenance Clea Maintenance Clea Maintenance Clea .', 0, 'C', false);

        $this->SetFont('ARIAL', 'b', '7');
        $this->SetXY(30, 255);
        $this->MultiCell(160,4, 'Auditing is based on a sampling process of the available information. Any Audit recommendations contained within are subject to an independent review, prior to any decision concerning the awarding or renewal of certification', 0, 'C', false);

        $this->SetFont('ARIAL', 'bi', '7');
        $this->SetXY(30, 268);
        $this->MultiCell(160,5, 'This report is confidential and distribution is limited to the audit team, the company and the IQC Certification office', 0, 'C', false);        // $this->MultiCell(95, 42, 'Kelurahan Cipayung, Jakarta Timur, DKI Jakarta.', 0, 'C', false);


        // $this->Cell(10);

        // $this->SetTextColor(0, 0, 128);

        // // $this->SetX(45);

        // $this->SetFont('ARIAL', 'B', '25');
        // $this->Cell(0, 8, $teks2, 0, 1, 'C');
        // // $this->MultiCell(120, 15, $teks2, 0, 'C', false);

        // $this->SetX(50);

        // $this->SetTextColor(0, 0, 0);


        // $this->SetFont('ARIAL', '', '14');
        // // $this->Cell(0, 8, $teks2, 0, 1, 'C');
        // $this->MultiCell( 120, 5, $teks3, 0, 'C', false);

        // $this->SetY(110);
        // // $this->Cell(0, 50);
        // $this->SetFont('ARIAL', '', '11');
        // $this->Cell(0, 10, $teks4, 0, 1, 'C');

        // $this->SetTextColor(0, 0, 128);

        // $this->SetX(45);

        // $this->SetFont('ARIAL', 'B', '25');
        // // $this->Cell(0, 8, $teks2, 0, 1, 'C');
        // $this->MultiCell( 120, 15, $teks5, 0, 'C', false);


        // // Scope
        // $this->SetX(40);
        // $this->SetTextColor(0, 0, 128);


        // $this->SetFont('ARIAL', 'B', '14');
        // $this->MultiCell(130, 5, $teks7, 0, 'C', false);


        // $this->Cell(10);

        // $this->SetTextColor(0, 0, 0);


        // $this->SetFont('arial', 'B', '14');

        // $this->Cell(0, 10, $teks8, 0, 1, 'C');

        // $this->SetX(45);

        // $this->SetTextColor(0, 0, 0);


        // $this->SetFont('ARIAL', '', '14');
        // // $this->Cell(0, 8, $teks2, 0, 1, 'C');
        // $this->MultiCell( 120, 5, $teks9, 0, 'C', false);


        // $this->MultiCell(120, 5, $teks4, 0, 'C', false);


        // $this->SetFont('Helvetica', 'B', '12');

        // $this->MultiCell( 150, 10, $teks3, 0, );
        // // $this->Cell(0, 5, $teks3, 0, , 'C');

        // $this->Cell(10);

        // $this->SetFont('Helvetica', 'B', '12');

        // $this->Cell(0, 5, $teks4, 0, 1, 'C');

        // $this->Cell(20);
        // $this->SetFont('Helvetica', '', '8');
        // $this->Cell(0, 2, $teks5, 0, 1, 'C');

    }

    function garis()

    {

        $this->SetLineWidth(1);

        $this->Line(6, 195, 180, 195);

        // $this->SetLineWidth(0);

        // $this->Line(25, 37, 185, 37);

    }

    function page2()

    {

        $this->SetLeftMargin(120);
        $this->SetFont('Arial','',15);

        $this->SetLineWidth(1);
        $this->SetFillColor(170,170,170);
        $this->setX(12.5);
        $this->Cell(187, 24.5, '      AUDIT REPORT', 0, 1, 'L', true);

        // $this->SetLineWidth(0.5);

        // $this->Line(12, 10, 200, 10);
        // $this->Line(12, 280, 12, 10);
        // $this->Line(200, 280, 200, 10);
        // $this->Line(12, 280, 200, 280);

        //bagian judul
        $this->Line(12, 35, 200, 35);
        $this->Line(167, 10, 167, 35);


        $this->SetFillColor(184,204,227);

        $this->setXY(12.5, $this->GetX()-85);
        $this->SetFont('Arial','B',9);
        $this->SetLineWidth(0.5);
        $this->Cell(187, 12, 'Company Information', 0, 1, 'C', true);



        // bagian company info
        $this->SetLineWidth(0);
        $this->Line(12, 47, 200, 47);

        $this->SetFillColor(184,204,227);
        $this->setXY(12.5, $this->GetX()-72.8);
        $this->SetFont('Arial','',11);
        $this->SetLineWidth(0.5);
        $this->Cell(34, 5.5, '  Company Name', 0, 1, 'L', true);
        
        // from db        
        $this->setXY(45.5, $this->GetX()-72.8);
        $this->SetFillColor(184,204,227);
        $this->Cell(34, 5.5, '  Company Name', 0, 1, 'L', false);

        // bagian company name
        $this->SetDrawColor(20,10,41);
        $this->Line(12, 53, 200, 53);

        $this->SetFillColor(184,204,227);
        $this->setXY(12.5, $this->GetX()-67);
        $this->SetFont('Arial','',12);
        $this->SetLineWidth(0.5);
        $this->Cell(34, 14, '  Address', 0, 1, 'L', true);

        // from db        
        $this->setXY(47, $this->GetX()-65);
        $this->SetFont('Arial','',11);
        $this->SetFillColor(184,204,227);
        $this->MultiCell(220, 4, 'Jl. Kayu Putih Blok III A-A Kav.55, Kel. Pulo Gadung, Kec. Pulogadung, Kota Jakarta
Timur, Provinsi DKI Jakarta, 13260
', 0, 'l', false);



        // bagian address
        $this->Line(12, 67, 200, 67);

        $this->SetFillColor(184,204,227);
        $this->setXY(12.5, $this->GetX()-53);
        $this->SetFont('Arial','',11);
        $this->SetLineWidth(0.5);
        $this->Cell(34, 5.5, '  Other Site(s)', 0, 1, 'L', true);

        // from db        
        $this->setXY(45.5, $this->GetX()-53);
        $this->SetFillColor(184,204,227);
        $this->Cell(34, 5.5, '  -', 0, 1, 'L', false);


        // bagian other site(s)
        $this->Line(12, 73, 200, 73);

        $this->SetFillColor(184,204,227);
        $this->setXY(12.5, $this->GetX()-46.8);
        $this->SetFont('Arial','',11);
        $this->SetLineWidth(0.5);
        $this->Cell(34, 7, '  Phone', 0, 1, 'L', true);

        // from db        
        $this->setXY(45.5, $this->GetX()-46.8);
        $this->SetFillColor(184,204,227);
        $this->Cell(34, 5.5, '  -', 0, 1, 'L', false);

        $this->setXY(92.5, $this->GetX()-46.8);
        $this->SetFillColor(184,204,227);
        $this->Cell(34, 6.5, '  Fax No', 0, 1, 'L', true);

        $this->setXY(132.5, $this->GetX()-46.8);
        $this->SetFillColor(184,204,227);
        $this->Cell(34, 6.5, '  -', 0, 1, 'L', false);


        // bagian phone)
        $this->Line(12, 80, 200, 80);

        $this->SetFillColor(184,204,227);
        $this->setXY(12.5, $this->GetX()-39.8);
        $this->SetFont('Arial','',11);
        $this->SetLineWidth(0.5);
        $this->Cell(34, 6, '  Website Address', 0, 1, 'L', true);

        // from db        
        $this->setXY(45.5, $this->GetX()-39.8);
        $this->SetFillColor(184,204,227);
        $this->Cell(34, 5.5, '  -', 0, 1, 'L', false);


        // bagian website
        $this->Line(12, 86, 200, 86);


        $this->SetFillColor(184,204,227);
        $this->setXY(12.5, $this->GetX()-33.8);
        $this->SetFont('Arial','',11);
        $this->SetLineWidth(0.5);
        $this->Cell(187, 9.5, '  Contact & Audit Information', 0, 1, 'C', true);
        $this->setXY(12.5, $this->GetX()+41.8);
        $this->Cell(187, 9.5, '  Auditor Information', 0, 1, 'C', true);


        $this->setXY(12.5, $this->GetX()+65);
        $this->Cell(187, 9.5, '  Summary of audit findings', 0, 1, 'C', true);

        $this->SetFont('Arial','B',11);

        $this->setXY(12.5, $this->GetX()+115.5);
        $this->Cell(187, 5, '  Scope of Certification', 0, 1, 'C', true);


        // bagian contract audit information
        $this->Line(12, 96, 200, 96);

        $this->SetFillColor(184,204,227);
        $this->setXY(12.5, $this->GetX()-23.7);
        $this->SetFont('Arial','',11);
        $this->SetLineWidth(0.5);
        $this->Cell(34, 6.2, '  Contact Person', 0, 1, 'L', true);

        // from db        
        $this->setXY(45.5, $this->GetX()-23.7);
        $this->SetFillColor(184,204,227);
        $this->Cell(34, 5.5, '  Wisnu Gunawan', 0, 1, 'L', false);        

        $this->setXY(92.5, $this->GetX()-23.7);
        $this->SetFillColor(184,204,227);
        $this->Cell(34, 6.5, '  Phone', 0, 1, 'L', true);

        $this->setXY(132.5, $this->GetX()-23.7);
        $this->SetFillColor(184,204,227);
        $this->Cell(34, 6.5, '  -', 0, 1, 'L', false);


        // bagian contact person
        $this->Line(12, 103, 200, 103);
        $this->SetFillColor(184,204,227);
        $this->setXY(12.5, $this->GetX()-16.8);
        $this->SetFont('Arial','',11);
        $this->SetLineWidth(0.5);
        $this->Cell(34, 6.2, '  Email Address', 0, 1, 'L', true);

        // from db        
        $this->setXY(45.5, $this->GetX()-16.8);
        $this->SetFillColor(184,204,227);
        $this->Cell(34, 5.5, '  Aziezgt@gmail.com', 0, 1, 'L', false);        


        // bagian email
        $this->Line(12, 109, 200, 109);

        $this->SetFillColor(184,204,227);
        $this->setXY(12.5, $this->GetX()-10.5);
        $this->SetFont('Arial','',11);
        $this->SetLineWidth(0.5);
        $this->Cell(34, 6.2, '  Audit Standard(s)', 0, 1, 'L', true);

        // from db        
        $this->setXY(45.5, $this->GetX()-10.5);
        $this->SetFillColor(184,204,227);
        $this->Cell(34, 5.5, '  ISO 9001:2015 ISO 14001:2015 and ISO 45001:2018', 0, 1, 'L', false);        


        // bagian audit standard
        $this->Line(12, 115, 200, 115);

        $this->SetFillColor(184,204,227);
        $this->setXY(12.5, $this->GetX()-4.5);
        $this->SetFont('Arial','',11);
        $this->SetLineWidth(0.5);
        $this->Cell(34, 6.2, '  EA Code', 0, 1, 'L', true);

        // from db        
        $this->setXY(45.5, $this->GetX()-4.5);
        $this->SetFillColor(184,204,227);
        $this->Cell(34, 5.5, '  25, 35', 0, 1, 'L', false);        

        // bagian ea code
        $this->Line(12, 121, 200, 121);

        $this->SetFillColor(184,204,227);
        $this->setXY(12.5, $this->GetX()+1.5);
        $this->SetFont('Arial','',11);
        $this->SetLineWidth(0.5);
        $this->Cell(34, 6.2, '  No of Employee', 0, 1, 'L', true);

        // from db        
        $this->setXY(45.5, $this->GetX()+1.5);
        $this->SetFillColor(184,204,227);
        $this->Cell(34, 5.5, '  25, 35', 0, 1, 'L', false);   


        $this->setXY(92.5, $this->GetX()+1.5);
        $this->SetFillColor(184,204,227);
        $this->Cell(34, 6.5, '  No of Shift', 0, 1, 'L', true);


        $this->setXY(132.5, $this->GetX()+1.5);
        $this->SetFillColor(184,204,227);
        $this->Cell(34, 6.5, '  -', 0, 1, 'L', false);

        // bagian no of employee
        $this->Line(12, 128, 200, 128);

        $this->SetFillColor(184,204,227);
        $this->setXY(12.5, $this->GetX()+8.5);
        $this->SetFont('Arial','',11);
        $this->SetLineWidth(0.5);
        $this->Cell(34, 20, '  No of Employee', 0, 1, 'L', true);










        // bagian type of audit
        $this->Line(12, 149, 200, 149);



        // bagian date of audit start
        $this->Line(12, 155, 200, 155);

        // bagian date of next audit
        $this->Line(12, 161, 200, 161);



        // bagian auditor information
        $this->Line(12, 172, 200, 172);


        // bagian lead auditor
        $this->Line(12, 178, 200, 178);


        // bagian auditor(s)
        $this->Line(12, 185, 200, 185);

       // bagian summary of audit
        $this->Line(12, 195, 200, 195);


       // bagian number of non 
        $this->Line(12, 202, 200, 202);


       // bagian number of non 
        $this->Line(12, 209, 200, 209);

       // bagian number of non 
        $this->Line(12, 216, 200, 216);



       // bagian Follow-up audit remarks: 
        $this->Line(12, 235, 200, 235);

       // bagian scoper 
        $this->Line(12, 241, 200, 241);


       // bagian end scope 
        $this->Line(12, 273, 200, 273);


        $this->SetLineWidth(0.5);

        $this->Line(12, 10, 200, 10);
        $this->Line(12, 280, 12, 10);
        $this->Line(200, 280, 200, 10);
        $this->Line(12, 280, 200, 280);




        // $this->SetLineWidth(0);

        // $this->Line(25, 37, 185, 37);

    }



function page3()
{
    $this->SetLeftMargin(120);
        $this->SetFont('Arial','',15);

        $this->SetLineWidth(1);
        $this->SetFillColor(170,170,170);
        $this->setX(12.5);
        $this->Cell(187, 24.5, '      AUDIT REPORT', 0, 1, 'L', true);


        //bagian judul
        $this->Line(12, 35, 200, 35);
        $this->Line(167, 10, 167, 35);


        $this->SetFillColor(184,204,227);

        $this->setXY(12.5, $this->GetX()-85);
        $this->SetFont('Arial','B',9);
        $this->SetLineWidth(0.5);
        $this->Cell(187, 12, 'Recommendation of the audit team', 0, 1, 'C', true);

        $this->setXY(12.5, $this->GetX()-32);
        $this->SetFont('Arial','B',9);
        $this->SetLineWidth(0.5);
        $this->Cell(187, 12, 'Recommendation of the audit team', 0, 1, 'C', true);
        

}
function page4()
{
    $this->SetLeftMargin(120);
        $this->SetFont('Arial','',15);

        $this->SetLineWidth(1);
        $this->SetFillColor(170,170,170);
        $this->setX(12.5);
        $this->Cell(187, 24.5, '      AUDIT REPORT', 0, 1, 'L', true);

        $this->SetLineWidth(0.5);

        $this->Line(12, 10, 200, 10);
        $this->Line(12, 280, 12, 10);
        $this->Line(200, 280, 200, 10);
        $this->Line(12, 280, 200, 280);

}
}


//instantisasi objek


$pdf = new Pdf2();

//Mulai dokumen

$pdf->AddPage('P', 'A4');



$pdf->cover('assets/images/logo.png');
$pdf->AddPage('P', 'A4');


$pdf->page2();

$pdf->SetCheckBoxPosition(50, 129);
$pdf->SetCheckBoxValue(true);
$pdf->AddCheckBox('Initial (Certification stage 1 and stage 2) audit');
$pdf->SetCheckBoxPosition(50, 136);
$pdf->SetCheckBoxValue(false);
$pdf->AddCheckBox('1st Surveillance audit');
$pdf->SetCheckBoxPosition(50, 143);
$pdf->SetCheckBoxValue(false);
$pdf->AddCheckBox('Continuing Assessment ');

$pdf->SetCheckBoxPosition(130, 129);
$pdf->SetCheckBoxValue(false);
$pdf->AddCheckBox('Recertification audit');


$pdf->SetCheckBoxPosition(130, 136);
$pdf->SetCheckBoxValue(false);
$pdf->AddCheckBox('Special audit');


$pdf->SetCheckBoxPosition(130, 143);
$pdf->SetCheckBoxValue(false);
$pdf->AddCheckBox('Transfer Assessment');

// ====================================================================

$pdf->SetFont('Arial','',11);
// date of audit
$pdf->SetBackgroundColor(184,204,227);
$pdf->SetTextPosition(12.5, 149.5);
$pdf->AddText('Date of audit start', 10);

//value date of audit
$pdf->SetBackgroundColor(255, 255, 255);
$pdf->SetTextPosition(49, 149.5);
$pdf->AddText('01 November 2022', 10);

// date of audit
// $pdf->SetTextColor(255, 255, 255);
$pdf->SetBackgroundColor(184,204,227);
$pdf->SetTextPosition(92, 149.5);
$pdf->AddText('Date of audit end', 1);

//value date of audit
$pdf->SetBackgroundColor(255, 255, 255);
$pdf->SetTextPosition(132, 149.5);
$pdf->AddText('04 November 2022');

//Date of next audit 
$pdf->SetBackgroundColor(184,204,227);
$pdf->SetTextPosition(12.5, 155.6);
$pdf->AddText('Date of next audit ', 10);


//value Date of next audit 
$pdf->SetBackgroundColor(255, 255, 255);
$pdf->SetTextPosition(49, 155.6);
$pdf->AddText('04 November 2022');


// Duration Of Audit

//Label

$pdf->SetBackgroundColor(184,204,227);
$pdf->SetTextPosition(92, 155.7);
$pdf->AddText('Duration of audit', 10);


// //value 
$pdf->SetTextColor(0, 0, 0);
$pdf->SetBackgroundColor(255, 255, 255);
$pdf->SetTextPosition(132, 155.7);
$pdf->AddText('04 November 2022');

// Lead Auditor
// Label
$pdf->SetBackgroundColor(184,204,227);
$pdf->SetTextPosition(12.5, 172.5);
$pdf->AddText('Lead Auditor ', 10);


//value Date of next audit 
$pdf->SetBackgroundColor(255, 255, 255);
$pdf->SetTextPosition(49, 172.5);
$pdf->AddText('04 November 2022');

// Lead Auditor
// Label
$pdf->SetBackgroundColor(184,204,227);
$pdf->SetTextPosition(12.5, 178.9);
$pdf->AddText('Auditor(s) ', 10);


//value Date of next audit 
$pdf->SetBackgroundColor(255, 255, 255);
$pdf->SetTextPosition(49, 178.9);
$pdf->AddText('-');


// Expert
// Label
$pdf->SetTextColor(0, 0, 0);
$pdf->SetBackgroundColor(184,204,227);

$pdf->SetTextPosition(92, 178.9);
$pdf->AddText('Expert', 10);


//value Date of next audit 
$pdf->SetTextColor(0, 0, 0);

$pdf->SetBackgroundColor(255, 255, 255);
$pdf->SetTextPosition(132, 178.9);
$pdf->AddText('-');


// Number of Non conformities raised 
// Label
$pdf->SetTextColor(0, 0, 0);
$pdf->SetBackgroundColor(184,204,227);

$pdf->SetTextPosition(12.5, 196);
$pdf->AddText('Number of Non conformities raised ');

$pdf->SetTextColor(0, 0, 0);
$pdf->SetBackgroundColor(184,204,227);
$pdf->Line(80, 195.5, 80, 201.5);
$pdf->SetTextPosition(85, 196);
$pdf->AddText('Major ', 10);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetBackgroundColor(255, 255, 255);
$pdf->SetTextPosition(100, 196);
$pdf->AddText('0');

$pdf->Line(140, 195.5, 140, 201.5);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetBackgroundColor(184,204,227);
$pdf->SetTextPosition(141, 196);
$pdf->AddText('Minor ', 10);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetBackgroundColor(255, 255, 255);
$pdf->SetTextPosition(180, 196);
$pdf->AddText('0', 10);


// Define data for the multicell
$pdf->SetFont('Arial','',10);


$data = array(
    array("Is a follow up audit required? "),
);

// Set the x, y position of the multicell and the width and height of each cell
$x = 25;
$y = 202.5;
$w = 40;
$h = 3;

// Set the font and font size

// Call the multicell_data function to create the dynamic multicell with text wrapping
$pdf->multicell_data($pdf, $data, $x, $y, $w, $h);

$pdf->Line(65, 202, 65, 208);


$pdf->SetTextColor(0, 0, 0);
$pdf->SetBackgroundColor(255, 255, 255);
$pdf->SetTextPosition(68, 203);
$pdf->AddText('Y', 10);

$pdf->Line(75, 202, 75, 208);


$pdf->SetTextColor(0, 0, 0);
$pdf->SetBackgroundColor(184,204,227);
$pdf->SetTextPosition(75.5, 203);
$pdf->AddText('Follow up audit start date', 10);


$pdf->Line(140, 202, 140, 208);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetBackgroundColor(255,255,255);
$pdf->SetTextPosition(140.5, 203);
$pdf->AddText('-', 10);

$pdf->Line(170, 202, 170, 208);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetBackgroundColor(255,255,255);
$pdf->SetTextPosition(171, 203);
$pdf->AddText('day(s)', 10);



$pdf->SetFont('Arial','',11);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetBackgroundColor(184,204,227);
$pdf->SetTextPosition(13, 210);
$pdf->AddText('Actual follow up date(s)', 10, 'R');

$pdf->SetFont('Arial','',11);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetBackgroundColor(184,204,227);
$pdf->SetTextPosition(13, 210);
$pdf->AddText('Actual follow up date(s)', 90, 'C');

$pdf->Line(140, 210, 140, 215);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetBackgroundColor(255,255,255);
$pdf->SetTextPosition(140.3, 210);
$pdf->AddText('Start : -', 10);

$pdf->Line(170, 210, 170, 215);


$pdf->SetTextColor(0, 0, 0);
$pdf->SetBackgroundColor(255,255,255);
$pdf->SetTextPosition(170.3, 210);
$pdf->AddText('End : -', 10);


$pdf->SetFont('Arial','',12);


$data = array(
    array("Follow-up audit remarks: Improvements of nonconformity findings will be checked during the next audit"),
);

// Set the x, y position of the multicell and the width and height of each cell
$x = 25;
$y = 220;
$w = 150;
$h = 5;

// Set the font and font size

// Call the multicell_data function to create the dynamic multicell with text wrapping
$pdf->multicell_data($pdf, $data, $x, $y, $w, $h);


$pdf->SetFont('Arial','',12);


$data = array(
    array("Construction Services for Architecture, Civil & Mechanical , Janitorial & Cleaning Services, Supply and Maintenance Cleaning &Janitorial Equipment, Business Process Outsourcing & Consulting."),
);

// Set the x, y position of the multicell and the width and height of each cell
$x = 25;
$y = 250;
$w = 150;
$h = 5;

// Set the font and font size

// Call the multicell_data function to create the dynamic multicell with text wrapping
$pdf->multicell_data($pdf, $data, $x, $y, $w, $h);


$pdf->SetLineWidth(0.5);

$pdf->Line(12, 10, 200, 10);
$pdf->Line(12, 280, 12, 10);
$pdf->Line(200, 280, 200, 10);
$pdf->Line(12, 280, 200, 280);



$pdf->AddPage('P', 'A4');


$pdf->page3();

$pdf->Line(12, 47, 200, 47);
$pdf->Line(12, 55, 200, 55);
$pdf->Line(12, 63, 200, 63);
$pdf->Line(12, 63+(8*3), 200, 63+(8*3));


// Akreditasi
$pdf->SetBackgroundColor(184,204,227);
$pdf->SetTextPosition(12.5, 47.5);
$pdf->AddText('Accreditation ', 10, "L", 6.9);

$pdf->SetBackgroundColor(255,255,255);

$pdf->SetTextPosition(49, 47.5);
$pdf->AddText(' ', 10, "L", 6.9);
$pdf->SetCheckBoxPosition(52, 48.5);
$pdf->SetCheckBoxValue(true);
$pdf->AddCheckBox('ASCB');

$pdf->SetCheckBoxPosition(125, 48.5);
$pdf->SetCheckBoxValue(false);
$pdf->AddCheckBox('Non Accreditation');

// Standard
$pdf->SetBackgroundColor(184,204,227);
$pdf->SetTextPosition(12.5, 55.5);
$pdf->AddText('Standard ', 10, "L", 6.9);

$pdf->SetBackgroundColor(255,255,255);

$pdf->SetTextPosition(49, 55.5);
$pdf->AddText(' ', 10, "L", 6.9);
$pdf->SetCheckBoxPosition(52, 56.5);
$pdf->SetCheckBoxValue(true);
$pdf->AddCheckBox('ISO 9001:2015');

$pdf->SetCheckBoxPosition(85, 56.5);
$pdf->SetCheckBoxValue(true);
$pdf->AddCheckBox('ISO 14001:2015');

$pdf->SetCheckBoxPosition(85+40, 56.5);
$pdf->SetCheckBoxValue(false);
$pdf->AddCheckBox('OHSAS 18001:2007');

$pdf->SetCheckBoxPosition(85+40+40, 56.5);
$pdf->SetCheckBoxValue(true);
$pdf->AddCheckBox('ISO 45001:2018');


$pdf->SetBackgroundColor(184,204,227);
$pdf->SetTextPosition(12.5, 63.5);
$pdf->AddText('Recommendation ', 40, "L", 22.8);
// set bag white
$pdf->SetBackgroundColor(255,255,255);
$pdf->SetTextPosition(49, 63.5);
$pdf->AddText('', 40, "L", 22.8);

$pdf->SetCheckBoxPosition(52, 65);
$pdf->SetCheckBoxValue(true);
$pdf->AddCheckBox('Certificate (Issue, Continuance, Change or Revision)');

$pdf->SetCheckBoxPosition(52, 65 + 8);
$pdf->SetCheckBoxValue(true);
$pdf->AddCheckBox('Not Recommended');

$pdf->SetCheckBoxPosition(70 + 75, 65 + 8);
$pdf->SetCheckBoxValue(true);
$pdf->AddCheckBox('Suspend certificate');


$pdf->SetCheckBoxPosition(52, 73 + 8);
$pdf->SetCheckBoxValue(true);
$pdf->AddCheckBox('Off-site review and NC closed by action plan review');

$pdf->SetCheckBoxPosition(70 + 75, 73 + 8);
$pdf->SetCheckBoxValue(true);
$pdf->AddCheckBox('Withdrawn certificate');

$pdf->Line(49, 63+(8), 200, 63+(8));
$pdf->Line(49, 63+(8*2), 200, 63+(8*2));
$pdf->Line(49, 63+(8*2), 200, 63+(8*2));

$data = array(
    array("the auditors confirm that they have not performed any management system consultancy to the audited organization during the previous 2 years and that they will not perform any consultancy during the of certification and 2 years after. the auditors also confirm that there was no conflict of interest present during the certification process."),
);

// Set the x, y position of the multicell and the width and height of each cell
$x = 15;
$y = 100;
$w = 182;
$h = 5;

// Set the font and font size

// Call the multicell_data function to create the dynamic multicell with text wrapping
$pdf->multicell_data($pdf, $data, $x, $y, $w, $h, "J");


$pdf->Line(110, 160, 180, 160);
$pdf->Line(20, 160, 90, 160);

$pdf->SetTextPosition(40, 153);
$pdf->AddText('01 JUNE 2022', 5, 'L');

$pdf->SetFont('Arial','I',9);

$pdf->SetTextPosition(47, 161);
$pdf->AddText('Date', 5, 'L');

$pdf->SetTextPosition(130, 153);
$pdf->AddText('01 November 2022', 5, 'L');


$pdf->SetTextPosition(134, 161);
$pdf->AddText('Lead Auditor', 5, 'L');

$pdf->SetTextPosition(20, 175);
$pdf->AddText('Signatures in wet or electronic signature format', 5, 'L');
$pdf->SetLineWidth(0.5);
$pdf->Line(12, 180, 200, 180);

$pdf->SetFont('Arial','B',12);
$pdf->SetTextPosition(20, 190);
$pdf->AddText('1. GENERAL AUDIT REPORT', 5, 'L');

$pdf->SetTextPosition(20, 225);
$pdf->AddText('2. AUDIT CRITERIA AND AUDIT OBJECTIVES', 5, 'L');

$pdf->SetFont('Arial','',10);
$data = array(
    array("the findings in this report represent only a sample of the actual management system in place at the company and do not exclude any further deviations that may still be present. the audit does not absolve the company from continuing the internal audit regime, maintaining the system and further looking for continuous improvement opportunities.
the management has been informed of the decision of the audit team during the closing meeting.
"),
);

// Set the x, y position of the multicell and the width and height of each cell
$x = 21;
$y = 197;
$w = 174;
$h = 5;

// Set the font and font size

// Call the multicell_data function to create the dynamic multicell with text wrapping
$pdf->multicell_data($pdf, $data, $x, $y, $w, $h, "J");

$data = array(
    array("- Related Auditing Standard and Customer Management system documentation created by and defined processes; 
- Reviewing the appropriateness of the standard requirements and deficiencies, reporting on
opportunities for improvement;
- To ensure that the organisation has effectively implemented its planned arrangements;
- To ensure that the management system is capable of achieving the organization’s policies
objectives.   

"),
);

// Set the x, y position of the multicell and the width and height of each cell
$x = 21;
$y = 230;
$w = 174;
$h = 5;

// Set the font and font size

// Call the multicell_data function to create the dynamic multicell with text wrapping
$pdf->multicell_data($pdf, $data, $x, $y, $w, $h, "J");

        $pdf->SetLineWidth(0.5);

        $pdf->Line(12, 10, 200, 10);
        $pdf->Line(12, 280, 12, 10);
        $pdf->Line(200, 280, 200, 10);
        $pdf->Line(12, 280, 200, 280);

$pdf->AddPage('P', 'A4');


$pdf->page4();

$pdf->SetBackgroundColor(255,255,255);
$pdf->SetFont('times','BI',20);
$pdf->SetTextPosition(15, 50);
$pdf->AddText('RECOMMENDATION for CERTIFICATION', 5, 'C');

$pdf->SetFont('times','BI',18);
$pdf->SetTextPosition(20, 65);
$pdf->AddText('Congratulations -', 5, 'L');


$pdf->SetFont('times','BI',18);
$pdf->SetTextPosition(20, 75);
$pdf->AddText('we recommend certification for the Scope detailed below :', 5, 'L');




$pdf->SetFont('arial','',11);
$data = array(
    array("the non-conformities advised, indicate areas where you may improve your Management System. 
Auditor shall look forward to receiving your Corrective Action Programme. 
Once this recommendation is verified we shall be able to issue your Certificate of Registration 
IQC believes the best approach is one of partnership and we shall be re-visiting your Company 
1 (one) time(s) per year for 4 (four) day(s) per visit. 

"),
);

// Set the x, y position of the multicell and the width and height of each cell
$x = 20;
$y = 85;
$w = 174;
$h = 10;

// Set the font and font size

// Call the multicell_data function to create the dynamic multicell with text wrapping
$pdf->multicell_data($pdf, $data, $x, $y, $w, $h, "J");


$pdf->Line(22, 140, 180, 140);
$pdf->Line(22,140, 22, 170);
$pdf->Line(180,140, 180, 170);
$pdf->Line(22, 170, 180, 170);

$pdf->SetFont('arial','',10);
$pdf->SetTextPosition(25, 142);
$pdf->AddText('Recommended Scope of Registration:', 5, 'L');

$pdf->SetFont('arial','i',10);
$data = array(
    array("Construction Services for Architecture, Civil & Mechanical , Janitorial & Cleaning Services, Supply and Maintenance Cleaning &  Janitorial Equipment, Business Process Outsourcing & Consulting.
"),
);

// Set the x, y position of the multicell and the width and height of each cell
$x = 25;
$y = 150;
$w = 150;
$h = 5;

// Set the font and font size

// Call the multicell_data function to create the dynamic multicell with text wrapping
$pdf->multicell_data($pdf, $data, $x, $y, $w, $h, "C");

$pdf->SetFont('arial','BI',11);
$data = array(
    array("1. This Assessment is based on random samples and therefore nonconformities      may exist which have not been identified
"),
);

// Set the x, y position of the multicell and the width and height of each cell
$x = 25;
$y = 180;
$w = 150;
$h = 5;

// Set the font and font size

// Call the multicell_data function to create the dynamic multicell with text wrapping
$pdf->multicell_data($pdf, $data, $x, $y, $w, $h, "L");

$data = array(
    array("2. Nonconformity Reports are observed nonconformities against the requirement of
    the Management Standard, other relevant Standards or your Quality System."),
);

// Set the x, y position of the multicell and the width and height of each cell
$x = 25;
$y = 200;
$w = 180;
$h = 5;

// Set the font and font size

// Call the multicell_data function to create the dynamic multicell with text wrapping
$pdf->multicell_data($pdf, $data, $x, $y, $w, $h, "L");

$pdf->SetFont('arial','b',10);
$pdf->SetTextPosition(25, 220);
$pdf->AddText('Signatures:', 5, 'L');


$pdf->SetFont('arial','',10);
$pdf->SetTextPosition(50, 250);
$pdf->AddText('Client : Wisnu Gunawan', 5, 'L');


$pdf->SetFont('arial','',10);
$pdf->SetTextPosition(130, 250);
$pdf->AddText('Team Leader : Ari Siswanto', 5, 'L');

$pdf->SetLineWidth(0.5);

$pdf->Line(12, 10, 200, 10);
$pdf->Line(12, 280, 12, 10);
$pdf->Line(200, 280, 200, 10);
$pdf->Line(12, 280, 200, 280);
$pdf->Output('kopsurat.pdf', 'I');