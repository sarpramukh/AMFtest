<?php

set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/');

include 'PHPExcel/Classes/PHPExcel/IOFactory.php';


$inputFileType = 'Excel2007';
$inputFileName = 'programmertest2019.xlsx';

$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($inputFileName);

echo '<hr />';

$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
//echo count($sheetData[1]);
//echo $sheetData[1]['C'];

?>