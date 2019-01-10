<?php
require "vendor/autoload.php";
$mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);

$html = '
<html>
<head>
<style>
    @page {
        size: 21.6cm 35.6cm;
        margin-top: 6cm;
		margin-bottom: 3cm;
		margin-left: 4cm;
		margin-right: 1.5cm;
		font-family: "Arial", Arial, serif;
		font-size: 12px;
		font-style: normal;
        odd-header-name: html_myHeader1;
        even-header-name: html_myHeader2;
        odd-footer-name: html_myFooter1;
        even-footer-name: html_myFooter2;
    }
    @page chapter2 {
        odd-header-name: html_Chapter2HeaderOdd;
        even-header-name: html_Chapter2HeaderEven;
        odd-footer-name: html_Chapter2FooterOdd;
        even-footer-name: html_Chapter2FooterEven;
    }
    @page noheader {
        odd-header-name: _blank;
        even-header-name: _blank;
        odd-footer-name: _blank;
        even-footer-name: _blank;
    }
    div.chapter2 {
        page-break-before: right;
        page: chapter2;
    }
    div.noheader {
        page-break-before: right;
        page: noheader;
    }
    p{
		text-align: justify;
		line-height: 23pt;
	}
    .float-right{
    	margin-top: -0.5cm;
		font-size: 8px;
		text-align: right;
	}
</style>
</head>

<body>
    
    <htmlpageheader name="myHeader1" style="display:none">
    	<img src="logo-mineco2.png" alt="" width="125" height="100"><br>
    	<u>8ª. Avenida 10-43, Zona 1</u><br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guatemala, C.A. <br>
		<div class="float-right">
			Contrato No. {{$contrato->numero_contrato}} entre MINISTERIO DE <br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ECONOMÍA Y <span class="upper">{{$empleado->nombre1}} {{$empleado->nombre2}} {{$empleado->nombre3}} {{$empleado->apellido1}} {{$empleado->apellido2}} {{$empleado->apellido3}}</span><br>
			({{Auth::user()->name}}) <br>
			Página {PAGENO}/{nbpg}
		</div>
    </htmlpageheader>
      
    <htmlpagefooter name="myFooter1" style="display:none">
        <table width="100%">
            <tr>
                <td width="33%">
                </td>
                <td width="33%" align="center" style="font-weight: bold; font-style: italic;">
                </td>
                <td width="33%" style="text-align: right;">
                    {PAGENO}
                </td>
            </tr>
        </table>
    </htmlpagefooter>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde non inventore ratione cupiditate voluptates reiciendis, nesciunt voluptatem similique natus ipsa deserunt at, nisi necessitatibus tempora dolorem quibusdam omnis ducimus hic. Vero enim placeat, corporis at sit dignissimos soluta, rerum fugit. Sequi praesentium atque ad id, minus ullam dolorum fugit fuga voluptatem, aliquid vitae earum recusandae aliquam cumque fugiat facere blanditiis porro voluptates. Dolor, minima blanditiis. Voluptatibus architecto sunt aliquam ad at inventore repellat repellendus doloribus officiis porro, ducimus nobis nam odit aperiam quis ex praesentium impedit adipisci est a fuga earum. Aspernatur, rem similique dolore error! Fugiat ad assumenda quo..</p>
    
</body>
</html>';

$mpdf->WriteHTML($html);

$mpdf->Output();
?>
