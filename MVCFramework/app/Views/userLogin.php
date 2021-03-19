<!DOCTYPE html>
<html>
<head>
<title><?php echo SITENAME?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Flaty User login Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="../public/css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //Custom Theme files -->
<!-- js -->
<script src="../public/js/jquery-2.2.3.min.js"></script>
<!-- //js -->  
<!-- web font -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'><!--web font-->
<!-- //web font -->
</head>
<body>

	<div class="navbar">
		<?php
		require APPROOT . '/views/includes/nav_bar.php';
		?>
	</div>

	<?php var_dump($_SESSION); ?>


	<!-- main -->
	<div class="main-agileits">
		<h1>Giriş Ekranı</h1>
        <form action="<?php echo URLROOT?>/users/userLogin" method="POST">
		<div class="mainw3-agileinfo form">
			<div id="login">    
					<div class="field-wrap">
						<input type="username" name="username" required autocomplete="off" placeholder="Kullanıcı Adı *"/>
                        <span class="invalidFeedback">
                            <?php echo $data['userNameError'];?>
                        </span>
					</div> 
					<div class="field-wrap">
						<input type="password" name="password" required autocomplete="off" placeholder="Parola *"/>
                        <span class="invalidFeedback">
                            <?php echo $data['passwordError'];?>
                        </span>
					</div> 
					<p class="forgot"><a href="<?php echo URLROOT?>/Users/userRegister">Henüz hesap oluşturmadın mı?</a></p> 
					<button class="button button-block" id="submit" type="submit" value="submit">Log In</button> 
				</form> 
			</div>
         
		</div>	
        </form>
	</div>	
	<!-- //main -->
	<!-- copyright -->
	<div class="w3copyright-agile">
		<p>© 2021 Tüm hakları saklıdır!</p>
	</div>
	<!-- //copyright --> 
	<script>
	$('.form').find('input, textarea').on('keyup blur focus', function (e) { 
	  var $this = $(this),
		  label = $this.prev('label');

		  if (e.type === 'keyup') {
				if ($this.val() === '') {
			  label.removeClass('active highlight');
			} else {
			  label.addClass('active highlight');
			}
		} else if (e.type === 'blur') {
			if( $this.val() === '' ) {
				label.removeClass('active highlight'); 
				} else {
				label.removeClass('highlight');   
				}   
		} else if (e.type === 'focus') {
		  
		  if( $this.val() === '' ) {
				label.removeClass('highlight'); 
				} 
		  else if( $this.val() !== '' ) {
				label.addClass('highlight');
				}
		}
 
	}); 
	</script>
</body>
</html>