
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Seznam knih | Přihlášení</title>
</head>
<body>

<style> 
@font-face{font-family: mujfont; src:url("AMSANSR.otf");}

body{background-image:url(wood.jpg); min-width:1000px; min-height:1500px; width: auto !important; width:1000px;}
.title{color:white; font-weight:bold; font-size:30px; text-align:center; font-family:mujfont; margin-top:6%; text-shadow:1px 1px 1px black;}
.input{font-size:17px; margin-top:-10px; font-family:mujfont; font-weight: bold; margin-left:26%;}
.banner{ font-family: mujfont; text-align:center; font-size:40px; color:white; font-weight:bold; border-top:3px solid white; border-bottom:3px solid white; width:100%;}
.banner p{text-shadow:1px 1px 1px black;}

.submit{font-size:18px; margin-left:30%; margin-top: 2%; font-family: mujfont; }
.submit:hover{box-shadow:1px 1px 2px black;}
.reset{font-size:18px; margin-left:0%; margin-top: -6.5%; font-family: mujfont;} 
.reset:hover{box-shadow:1px 1px 2px black;}
.log{margin-left: 40.7%; background: rgba(255, 255, 255, 0.2); width:350px; height:350px; }
.log p{color:white; font-family:mujfont; font-size:19px; text-align:center; font-style:italic; padding-top: 3%;}
.err{color:red; font-family:mujfont; font-size:16px; text-align:center; font-style:italic; padding: 3%; margin-top:-10.5%; text-shadow:1px 1px 2px black;}
</style>

<div class="banner">
<p>Seznam knih</p>

</div>








		
		
<p class="title">Přihlášení</p>

<div class="log">	



	
<form method="POST">
	<p>Přihlašovací jméno:</p>
						<input type="text" name="login" class="input">
   <p>Heslo:</p>
						<input type="password" name="heslo" class="input">
						
	              
					<input type="submit" name="odeslat" value="Přihlásit se" class="submit">
                    
                    <input type="reset" name="reset" value="Reset" class="reset">
				   	
					
				</form>
			
<p>*Nápověda:<br> login: uzivatel/heslo:knihy <br> login:administrator/heslo:administrator</p>			
</div>  

<?php

session_start();
if(isset($_POST["login"])){
$login = $_POST["login"];
$pass = $_POST["heslo"];


if($login && $pass) {
	include "connect.php";
	
	$q = "SELECT * FROM users WHERE login='$login'";
    
    $query = mysqli_query($spojeni,$q);
	
	$result = mysqli_num_rows($query);
	
	if($result!=0) {
		while($row = mysqli_fetch_array($query)){
		$id = $row["id"];
		$dblogin = $row["login"];
		$dbpass = $row["heslo"];
		$role = $row["role"];
	
			
	}
	
   if($login==$dblogin && $pass==$dbpass && $role==0){
   	header('location:viewBooks.php');
   	$_SESSION["id"] = $id; 
   	$_SESSION["login"] = $dblogin;
   	$_SESSION["role"] = $role;
   	
   	
    }elseif($role == 1) {
        header("location:viewBooksA.php"); 
        $_SESSION["login"] = $dblogin; 
        $_SESSION["id"] = $id; 
   	  $_SESSION["role"] = $role;
    	}   
    
   	
	else{
	  echo "<div class=\"err\">Nesprávné heslo.<br></div>";
}
	  	
 }
 else
    die("<div class=\"err\">Uživatel neexistuje!<br></div>");	
}
else
   die("<div class=\"err\">Vložte přihlašovací jméno a heslo!<br></div>");
	
   
}   
?>



</body>
</html>