<?php
header("Access-Control-Allow-Origin: *");
//载入qrcode类
include "./phpqrcode.php";

//取得GET参数
$text        = isset($_GET["text"]) ? $_GET["text"] : 'none';
$errorLevel = isset($_GET["e"]) ? $_GET["e"] : 'H';
$PointSize  = isset($_GET["p"]) ? $_GET["p"] : '10';
$margin     = isset($_GET["m"]) ? $_GET["m"] : '1';
$code     = isset($_GET["code"]) ? $_GET["code"] : '0';
$software     = isset($_GET["software"]) ? $_GET["software"] : '0';
preg_match('/http:\/\/([\w\W]*?)\//si', $text, $matches);

//简单判断

if( $code == '1')//是否是内部版本
{
    if( $software== "wechat")//内部的那个二维码
        createqr("http://weixin.qq.com/r/cUiBmejEgLX-raz69x1j", $errorLevel, 10, $margin);//给老子变
    
    if( $software== "qq")//内部的那个二维码
    {
        header("Content-type: text/html; charset=utf-8");
        echo '<a href="https://jq.qq.com/?_wv=1027&k=5WzngLU">交流群：627849299 </a><br><img src="http://api.lt5d.cn/qrcode?p=10&text=https://qm.qq.com/cgi-bin/qm/qr?k=I406VmaS7bQpP4VwuPzSOHoJvWUmqDWS&authKey=3ccYQXtXlM78mupKtImHkcR4sQs2ODEQIXS9v8+okTUkmw+0i3KOFVjWCLc8l3Uc"/>';
	    exit();
    }
}
else{
	if ( $text == 'none'){
		header("Content-type: text/html; charset=utf-8");
		echo '请参考<a href="../">文档/Docs</a>来使用该API';
		exit();
	} 
	else  
	{
		//调用二维码生成函数
		createqr($text, $errorLevel, $PointSize, $margin);
	}
}
//简单二维码生成函数
function createqr($value,$errorCorrectionLevel,$matrixPointSize,$margin) {
    QRcode::png($value, false, $errorCorrectionLevel, $matrixPointSize, $margin);
}
?>