
<!DOCTYPE html>
<html>
<head>
<title>User Register Form Widget Flat Responsive Widget Template :: w3layouts</title>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="User Register Form Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300italic,300,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Amaranth:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href="../public/css/styleRegister.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
    <div class="content">
		<h1>Kayıt Ol!</h1>
		<div class="main">
			<h2>Formu Doldur ve Ücretsiz Kayıt Ol</h2>
			<form action="<?php echo URLROOT;?>/Users/userRegister" method="POST">
				<h5>Kullanıcı Adı</h5>
				<input type="text" name="username" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">
				<span class="invalidFeedback">
                    <?php echo $data['userNameError'];?>
                </span>
				<h5>Email</h5>
				<input type="text" name="email" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'johnkeith@mail.com';}" required="">
				<span class="invalidFeedback">
                    <?php echo $data['emailError'];?>
                </span>
				<h5>Şifre</h5>
				<input type="password" name="password" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
				<span class="invalidFeedback">
                    <?php echo $data['passwordError'];?>
                </span>
				<h5>Şifreyi Doğrula</h5>
				<input type="password" name="confirmPassword" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
				<span class="invalidFeedback">
                    <?php echo $data['confirmPasswordError'];?>
                </span>
				<input type="submit" value="Hesap Oluştur">
			</form>
		</div>
		<p class="footer">&copy; 2021 Tüm hakları saklıdır</p>
	</div>
</body>
</html>
