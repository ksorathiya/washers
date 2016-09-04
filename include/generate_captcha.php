<?php
	define('CAPTCHA_NUMCHARS',6);
	define('CAPTCHA_WIDTH',100);
	define('CAPTCHA_HEIGHT',25);

	$captcha="";
	for($i=0;$i<CAPTCHA_NUMCHARS;$i++)
	{
		$captcha.=chr(rand(97,122));
	}
	$img=imagecreatetruecolor(CAPTCHA_WIDTH,CAPTCHA_HEIGHT);

	$bg_color=imagecolorallocate($img,255,255,255);
	$text_color=imagecolorallocate($img,0,0,0);
	$graphic_color=imagecolorallocate($img,64,64,64);

	imagefilledrectangle($img,0,0,CAPTCHA_WIDTH,CAPTCHA_HEIGHT,$bg_color);

	for($i=0;$i<5;$i++)
	{
		imageline($img,0,rand()%CAPTCHA_HEIGHT,CAPTCHA_WIDTH,rand()%CAPTCHA_HEIGHT,$graphic_color);
	}

	for($i=0;$i<50;$i++)
	{
		imagesetpixel($img,rand()%CAPTCHA_WIDTH,rand()%CAPTCHA_HEIGHT,$graphic_color);
	}

	imagettftext($img,18,0,5,CAPTCHA_HEIGHT-5,$text_color,'../fonts/opensans-regular_0-webfont.ttf',$captcha);

	header("Content_Type: image/png");
	imagepng($img,"../images/captcha.png");
	imagedestroy($img);

	$_SESSION['captcha']=sha1($captcha);
 ?>
