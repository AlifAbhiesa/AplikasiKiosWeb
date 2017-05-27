<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
 

  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='/admin/font-awesome/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">
<?php include 'admin/config.php'; ?>
  
</head>

<body>
  <?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "<div style='margin-bottom:-55px' class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Login Gagal !! Username dan Password Salah !!</div>";
			}
		}
		?>
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Login Page <i class='fa fa-code'></i></h1> by <a href='http://noobsgnu.com'>Kausar</a></span>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">Click Me</div>
  </div>
  <div class="form">
    <h2>Login to your account</h2>
    <form action="login_act.php" method="post">
      <input type="text" class="form-control" placeholder="Username" name="uname">
      <input type="password" class="form-control" placeholder="Password" name="pass">
      <button>Login</button>
    </form>
  </div>
  <div class="form">
    <center> Silahkan Login </center>
    </form>
  </div>
  <div class="cta"><a href="http://facebook.com/router.z">Copyright &copy; kausar 2016</a></div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='/css/link.css'></script>

    <script src="js/index.js"></script>

</body>
</html>
