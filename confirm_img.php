<?php    
       session_start();
       header('Content-type: image/jpeg');

        $text = $_SESSION['text'];
        $text_size = 35;
        $image_width = 180;
        $image_height = 40;
        $image = imagecreate($image_width, $image_height);
        imagecolorallocate($image, 255, 255, 255);
        $text_color = imagecolorallocate($image, 0, 0, 0);
        imagettftext($image, $text_size, 0, 15, 35, $text_color, 'DroidSans.ttf', $text);
        for($x=0; $x<40; $x++){
          $x1 = rand(0,100);
          $y1 = rand(0,100);
          $x2 = rand(0,100);
          $y2 = rand(0,100);
          imageline($image, $x1, $y1, $x2, $y2, $text_color);
        }
        imagejpeg($image);


?>

