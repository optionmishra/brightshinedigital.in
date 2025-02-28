<?php 
ob_start();
// Include library
//require_once('../libraries/tcpdf/tcpdf.php');
$this->load->library('Pdf');

//make TCPDF object
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);

//remove header and footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

//$pdf->SetTitle('Title');


//add page
$pdf->Addpage();


$pdf->SetFont('Helvetica', '', 14);
//$pdf->Cell(190,10,"Student Result",0,0,'C');

$pdf->SetFont('Helvetica', '', 9);

$html = <<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style>
    h1 {
        color: navy;
        font-family: times;
        font-size: 24pt;
        text-decoration: underline;
    }
    p {
        color: #000;
        font-family: helvetica;
        font-size: 10pt;
    }
    p.first span {
        color: #006600;
        font-style: italic;
    }
    p#second {
        color: rgb(00,63,127);
        font-family: times;
        font-size: 12pt;
        text-align: justify;
    }
    p#second > span {
        background-color: #FFFFAA;
    }
    table.first {
        color: #003300;
        font-family: helvetica;
        font-size: 10pt;
    }
    td {
       
    }
    td.second {
        border: 2px dashed green;
    }
    div.test {
        color: #CC0000;
        background-color: #FFFF66;
        font-family: helvetica;
        font-size: 10pt;
        border-style: solid solid solid solid;
        border-width: 2px 2px 2px 2px;
        border-color: green #FF00FF blue red;
        text-align: center;
    }
    .lowercase {
        text-transform: lowercase;
    }
    .uppercase {
        text-transform: uppercase;
    }
    .capitalize {
        text-transform: capitalize;
    }
	.res-sect{
		position:relative;
	}

</style>
<h1 class="uppercase" style="text-align:center;color:#990000;font-size:18px;">Student Result</h1>
<table class="first" cellpadding="6">
 <tr>
  <td width="270" align="left" style="font-size:10px;">Student Name : <b>Nikhil Verma</b></td>
  <td width="270" align="right" style="font-size:10px;">Student Class : <b>6A</b></td>
 </tr>
 <tr>
  <td width="270" align="left" style="font-size:10px;">Marks : <b>60</b></td>
  <td width="270" align="right" style="font-size:10px;">Max Marks  : <b>100</b></td>
 </tr>
</table>

<div class="res-sect">
<p>Q1 : Example of paragraph with class selector. Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
<p>Ans : himenaeos</p>
<p style="color:#990000;">Marks : 5</p>

<p>Q2 : Example of paragraph with class selector. Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
<p>Ans : himenaeos</p>
<p style="color:#990000;">Marks : 5</p>
</div>
EOF;


$pdf->WriteHTMLCell(192,3,'9','',$html,0);

ob_end_clean();
//output
//$pdf->Output('Paper.pdf', 'D');
$pdf->Output();

?>
