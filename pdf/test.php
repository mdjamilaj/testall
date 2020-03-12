<?php

// Composer's auto-loading functionality
// require "vendor/autoload.php";

// use Dompdf\Dompdf;
// $fileUrl = "index.php";

// //get file content after the script is server-side interpreted
// $fileContent = file_get_contents( $fileUrl ) ;


// $dompdf = new DOMPDF();

// //load stored html string
// $dompdf->load_html($fileContent);

// // (Optional) Setup the paper size and orientation
// $dompdf->setPaper('A4');

// $dompdf->set_option('defaultMediaType', 'all');
// $dompdf->set_option('isFontSubsettingEnabled', true);


// $dompdf->render();
// $dompdf->stream("sample.pdf");

////////////////////////////////////////////////////////////////////////////////////////////////

require "vendor/autoload.php";

use Dompdf\Dompdf;

$html ='<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
@font-face {
  font-family: SolaimanLipi;
  font-style: normal;
  font-weight: normal;
  src: url(http://files.ekushey.org/Ekushey_OpenType_Bangla_Fonts/SolaimanLipi_22-02-2012.ttf) format(\'true-type\');
}
</style>

</head>
<body>
    <p style="font-family: SolaimanLipi">আস্ফাস্ফাস্ফাদ সদফাদস্ফাফাদস্ফ স্ফাদফ</p>
    <p>asdasdasdas dfsdf sdfsdf</p>
</body>
</html>';

$dompdf = new DOMPDF();

//load stored html string
$dompdf->load_html($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4');

$dompdf->set_option('defaultMediaType', 'all');
$dompdf->set_option('isFontSubsettingEnabled', true);


$dompdf->render();
$dompdf->stream("sample.pdf");