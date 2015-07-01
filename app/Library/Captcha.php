<?php namespace App\Library;
use Illuminate\Support\Facades\Session;
class Captcha {
	
	public static function make(){
		$str=str_random(6,'alpha');
		Session::put('key',$str);
		$w=100;
		$h=25;
		$img=imagecreatetruecolor($w, $h);
		$text=imagecolorallocate($img, 255, 255, 255);
		$bg=imagecolorallocate($img, 0, 0, 0);
		imagefilledrectangle($img, 0, 0, $w, $h, $bg);
		imagestring($img, 5, 25, 5, $str, $text);
		ob_start();
		imagejpeg($img);
		$jpg=ob_get_clean();
		return "data:image/jpeg;base64,".base64_encode($jpg);
	}
}