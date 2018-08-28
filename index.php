<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>PT. World Trans|Login</title>
  <link rel="shortcut icon" type="image/x-icon" href="image/logo.png">  
  <link rel="stylesheet" href="css/logincss.css">
</head>

<body>
  <div class="wrapper">
	<div class="container">
		<h1>PT. World Trans <br>Login</h1>
		
		<form class="form" action="" method="post">
			<input type="email" placeholder="Email" name="user" id="lgn_user" maxlength="30" autocomplete="off">
			<input type="password" placeholder="Password"  name="pass" id="lgn_pass" maxlength="6" autocomplete="off">
			<button type="button"  id="login-btn">Login</button>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
  <script src='vendor/jquery/jquery.min.js'></script>
  <!-- <script  src="js/loginjs.js"></script> -->


  <script>
  	$(document).ready(function(){
  		$("#login-btn").click(function(e){
  			e.preventDefault();
  			user=$("#lgn_user").val();
  			pass=$("#lgn_pass").val();

  			if($.trim(user)=="" && $.trim(pass)==""){
  				alert("Username Dan Password Harus Diisi!!");
          $("#lgn_user").focus();
  			}else if($.trim(user)==""){
  				alert("Username Tdak Boleh Kosong!!");
  				$("#lgn_user").focus();
  			}else if($.trim(pass)==""){
  				alert("Paassword Tdak Boleh Kosong!!");
  				$("#lgn_pass").focus();
  			}else{
  				$.ajax({
  					url:"pro_login.php",
  					type:"post",
  					data:"lgn_user="+user+"&lgn_pass="+pass,
  					cache:false,
  					success:function(html){
  						// alert(html);
  						if(html==""){
  							window.location='home.php';

  						}else{
  							 alert(html);
  							 $("#lgn_user").val("");
  							 $("#lgn_pass").val("");
  						}
  					}
  				});
  			}

  		});
      // jika textbox username di enter
        $("#lgn_user").keyup(function(event) {
           user=$("#lgn_user").val();
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                if($.trim(user)==""){
                  alert("Username Tdak Boleh Kosong!!");
                  $("#lgn_user").focus();
                }else{
                    $("#lgn_pass").focus();
                }
            

            }
        });
        // jika textbox password di enter
       $("#lgn_pass").keyup(function(event) {
           pass=$(this).val();
            var charcode =(event.which)?event.which:event.keycode;
            if(charcode==13){
                if($.trim(pass)==""){
                  alert("Password Tdak Boleh Kosong!!");
                 $("#lgn_pass").focus();
                }else{
                   $("#login-btn").focus();
                }
            

            }
        });

  	});
  </script>
</body>

</html>
