<!DOCTYPE html>
<html>
<head>
	<!-- 
		Real-Time Markdown Editörü
		duygu@atolye15.com
		Bu scripti Long Polling yöntemi ile yaptım.Her harf girişinde server'a ajax post ile request atması sonucunda geri dönüş sağlanmaktadır.
	!-->


	<!-- Bootstrap Kütüphanesi-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

	<!-- Realtime Kütüphane Kaynak Kodları -->
    <script type="text/javascript" src="client/client.js"></script>
	
	<title>Real-Time Markdown Editörü</title>
	
	<script type="text/javascript">
	//Sayfa hazır olduğunda	
	$( document ).ready(function() {
		// "Code" ID'li textarea'ya her harf yazıldığında POST ile gönderip dosyaya yazdır.
		$('#code').on('keyup', function() {
				  	var code = $('#code').val(); // Code ID'li Textareadan gelen değeri hafızaya al.
				  	var data = 'code='+code; // Bunu code isimli data verisine aktar.
				  	$.ajax({ /* AJAX İle POST Et */
				  		type:'POST',
				  		url:'server/check.php', 
				  		data:data, 
				  		success:function(cevap){
				  			$("#sonuc").html(cevap);  
				  		}
				  	});
		});
	});

	
	</script>
</head>
<body>
<!-- Responsive olması için container ile divleri ekrana hizala -->
<div class="container-fluid" style="margin-top: 20px">


	<!-- Linkin üretilip paylaşıldığı yer. -->
	<div class="alert alert-success" style="text-align: center;">
		<b><h4>Yapacağınız değişikliği bu adres ile anlık olarak paylaşıma sunabilirsiniz.</h4></b>
		<p><a target="_blank" href="<?php echo $_SERVER['REQUEST_URI'];?>goruntule.php"><code>http://localhost<?php echo $_SERVER['REQUEST_URI'];?>goruntule.php</code></a></p>
	</div>

	<!-- Kullanıcının kod girişi yapacağı sol 6 kolonluk alan -->
	<div class="col-md-6">
		<textarea id="code" style="height:450px" class="form-control" placeholder="Kodlarınızı buraya yazabilirsiniz..."></textarea>
	</div>


	<!-- Kullanıcının kod çıktısının bulunduğu sağ 6 kolonluk alan -->
	<div class="col-md-6">
		        <div id="response"></div>
	</div>
</div>

</body>
</html>