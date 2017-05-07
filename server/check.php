<?php

//Eğer textarea ile veri girişi yapıldıysa devam
if(isset($_POST['code'])){
	$code = $_POST['code'];
	//Data adında preview halinde olacak dosya kaydediliyor.Normalde yetiştirebilseydim burada her kullanıcıyana özel bir dosya oluşturacaktım.
	$dosya = fopen('data.php', 'w');
	//Post ile gelen kodları yazdırıyoruz.
	fwrite($dosya, $code);
	fclose($dosya);
}

?>
