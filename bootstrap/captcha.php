<?php 
	session_start();
	 $image = imagecreatetruecolor(100, 30);
	 $bgcolor = imagecolorallocate($image, 255, 255, 255);
	 imagefill($image, 0, 0, $bgcolor);

	 $captcha_code = '';



	 // for($i=0;$i<4;$i++){
	 // 	$fontsize = 6;
	 // 	$fontcolor= imagecolorallocate($image, rand(0,150), rand(0,150), rand(0,150));
	 // 	$data = 'qwertyupasdfghjkxcvbnm3456789';
	 // 	$fontcontent = substr($data, rand(0,strlen($data)-1),1);

	 // 	$captcha_code .= $fontcontent;

	 // 	$x=($i*100/4)+rand(5,10);
	 // 	$y=rand(5,10);

	 // 	imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
	 // }


	 // $fontsize = 10;
	 $fontcolor= imagecolorallocate($image, rand(0,150), rand(0,150), rand(0,150));
	 $data = '123456789';
	 $fontcontent = substr($data, rand(0,strlen($data)-1),1);
	 $captcha_code .= $fontcontent;

	 imagestring($image, 6,rand(5,10),rand(5,10), $fontcontent, $fontcolor);


	 $plus = array(
	 	'0'=>'+',
	 	'1'=>'X'
	 	);

	 $fontcontent = $plus[rand(0,1)];
	 $captcha_code .=$fontcontent;

	 $fontcolor= imagecolorallocate($image, rand(0,150), rand(0,150), rand(0,150));
	 imagestring($image, 6,25+rand(5,10),rand(5,10), $fontcontent, $fontcolor);

	 $fontcontent = substr($data, rand(0,strlen($data)-1),1);
	 $captcha_code .= $fontcontent;

	 $fontcolor= imagecolorallocate($image, rand(0,150), rand(0,150), rand(0,150));
	 imagestring($image, 6,50+rand(5,10),rand(5,10), $fontcontent, $fontcolor);

	 $fontcontent = '=';
	 $fontcolor= imagecolorallocate($image, rand(0,150), rand(0,150), rand(0,150));
	 imagestring($image, 6,75+rand(5,10),rand(5,10), $fontcontent, $fontcolor);

	 if(substr($captcha_code,1,1)=='+'){
	 	$_SESSION['captcha']=substr($captcha_code,0,1)+substr($captcha_code,2,1);
	 } else {
	 	$_SESSION['captcha']=substr($captcha_code,0,1)*substr($captcha_code,2,1);
	 }

	 



	 for ($i=0;$i<200;$i++){
	 	$pointcolor = imagecolorallocate($image, rand(50,200),rand(50,200) , rand(50,200));
	 	imagesetpixel($image, rand(1,99), rand(1,29), $pointcolor);
	 }


	 for($i=0;$i<4;$i++){
	 	$linecolor = imagecolorallocate($image, rand(80,220),rand(80,220),rand(80,220));
	 	imageline($image, rand(1,99), rand(1,29) , rand(1,99), rand(1,29), $linecolor);
	 }


	 header('content-type:image/png');
	 imagepng($image); 
	 //end
	 imagedestroy($image);

 ?>
