<? 
include "phpqrcode.php"; 
$value="http://www.baidu.com"; 
$errorCorrectionLevel = "L"; 
$matrixPointSize = "4"; 
QRcode::png($value, false, $errorCorrectionLevel, $matrixPointSize); 
exit; 
?>