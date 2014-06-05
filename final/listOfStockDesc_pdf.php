<?php
require_once("includes/connection.php");
require("fpdf.php");
$db = mysql_connect("localhost","root","pass123");
mysql_select_db("sad",$db);
$q = "SELECT * FROM tbl_product";
$r = mysql_query($q);
    class PDF extends FPDF
    {
        function Header()
        {
          $this->Image('images/site_01.gif',10,12,33);
          $this->SetFont('Arial','B',14);
          $this->SetXY(40, 10);
          $this->Cell(0,10,'Jorona Aquatic Resource and International Trading Inc.',0,0,'C');
          $this->SetFont('Arial','',12);
          $this->SetXY(40, 15);
          $this->Cell(0,10,'ND Shipping Bldg., A. Santos St., Nova Tierra Village',0,0,'C');
          $this->SetXY(40, 20);
          $this->Cell(0,10,'Lanang, Davao City',0,0,'C');
         }
      
        function Footer()
        {
          //Position at 1.5 cm from bottom
        $this->SetY(-15);
        //Arial italic 8
        $this->SetFont('Arial','I',8);
        //Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'',0,0,'C');
        }
        
        function FancyTable($header,$r)
        {
            //Colors, line width and bold font
            $this->SetFillColor(255,0,0);
            $this->SetTextColor(255);
            $this->SetDrawColor(128,0,0);
            $this->SetLineWidth(.3);
            $this->SetFont('','B');
            //Header
            $w=array(15,60,70);
            for($i=0;$i<count($header);$i++)
                $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
            $this->Ln();
            //Color and font restoration
            $this->SetFillColor(224,235,255);
            $this->SetTextColor(0);
            $this->SetFont('');
            //Data
            $fill=false;
            while($row = mysql_fetch_array($r))
            {
                $this->Cell($w[0],6,$row['prod_id'],'LR',0,'L',$fill);
                $this->Cell($w[1],6,$row['prod_name'],'LR',0,'L',$fill);
                $this->Cell($w[2],6,$row['prod_desc'],'LR',0,'J',$fill);
                $this->Ln();
                $fill=!$fill;
            }
            $this->Cell(array_sum($w),0,'','T');
        }
    }   
        $pdf=new PDF();
        $header=array('Code','Name','Description');
        $pdf->AddPage();
        $date = date("F j, Y");
        $date1 = date("m_d_Y");
        $pdf->SetXY(20, 30);
        $pdf->Cell(0,20,'List of Stocks(Description) as of '.$date.'',0,1,'C');
        $pdf->Cell(0,10,'',0,1);
        $pdf->FancyTable($header,$r);
        $pdf->Output('listOfStocksDesc_'.$date1.'.pdf','D');
        mysql_close($connection);
?>