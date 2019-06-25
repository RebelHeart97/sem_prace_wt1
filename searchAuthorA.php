 <!DOCTYPE html>
<html>
<head>


<meta charset="utf-8" />
<title>Seznam knih | Hledání autora</title>
<style>
@font-face{font-family: mujfont; src:url("AMSANSR.otf");}

body{background-image:url(wood.jpg); min-width:1000px; min-height:1500px; width: auto !important; width:1000px;}
.title{color:white; font-weight:bold; font-size:20px; font-family:mujfont;}
.title a{text-decoration: none; color: white;}
.title a:hover{text-decoration: underline; color: white;}
.input{font-size:15px; font-family:mujfont; margin-left:14%; font-weight: bold;}
.submit{font-size:16px; margin-left:10%; margin-top:3%; font-family: mujfont;}

.button{margin-left: -18%;}
.banner{ font-family: mujfont; text-align:center; font-size:40px; color:white; font-weight:bold; border-top:3px solid white; border-bottom:3px solid white; width:100%;}
.banner p{text-shadow:1px 1px 1px black;}
.menu a{text-decoration: none; list-style-type: none;  color:white; font-family:mujfont; font-size:19px; text-shadow:1px 1px 2px black;}
.menu p{color:white; font-family:mujfont; font-size:19px; font-style:italic; margin-left: 15%; margin-bottom: -2%; text-decoration: underline;}
.menu a:hover{text-decoration:underline;font-size:20px;}
.menu{background-color: rgba(255, 255, 255, 0.3); width:150px; border-radius:10px; margin-top:-2%;}
h1{color:white; font-family: mujfont; text-align:center;}
h4{color:white; font-family: mujfont;}


table{background-color: white; border:3px solid grey; margin:auto; font-family: mujfont; border-spacing: 1px; font-size: 17px; overflow:scroll; margin-top:-15%; margin-left:46.5%;}
table td{border:2px solid grey; border-collapse: collapse; padding: 1%; width:160px; height:18px;}
table td a{font-family: mujfont; color:black; text-decoration: none;}
table td a:hover{text-decoration:underline;}
.tabulka{max-width:700px; max-height:300px;}
.searchform{font-size:19px;}
.hledej{margin-left:0;margin-top:20px;}
.hledani{margin:auto; width:500px; height:200px; margin-left:0; margin-top:5%;}
.h2{color:white; font-family: mujfont; text-align:center; font-size:19px; margin-top:2%; text-shadow:1px 1px 1px  black;}
.vysl{color:white; font-family: mujfont; text-align:center; font-size:19px; margin-top:-15%; font-style:italic; text-shadow:1px 1px 1px  black;}
h1{text-shadow:1px 1px 1px  black;}


</style>  




</head>
<body>

<div class="banner">
<p>Seznam knih</p>

</div>

<h1>Hledání autora</h1>

<?php
echo "<div class='h2'>"  ;
echo "<h2>Nalezení autoři podle zadaného kritéria</h2>"   ;
echo "</div>" ;

?>

<div class="menu">

<ul>

<a href="logout.php">Odhlásit se</a>
<a href="viewBooksA.php">Zpět na knihy</a>


</form> 
</ul>


</div>

<div class="hledani">
<form action="searchBookA.php" method="GET" id="searchform">
<p style="color:white; font-weight:bold; font-family:mujfont">Vyhledávání podle názvu knihy</p> 
    <input  type="text" name="name" placeholder="Název knihy"> 
    <div class="hledej">
	<input  type="submit" name="submit" value="Hledej"> 
    </div>
</form>

<form action="searchAuthorA.php" method="GET" id="searchform">
<p style="color:white; font-weight:bold; font-family:mujfont">Vyhledávání podle autora</p> 
    <input  type="text" name="name" placeholder="Jméno autora"> 
    <div class="hledej">
	<input  type="submit" name="submit" value="Hledej"> 
    </div>
</form>
</div>



<?php

require "connect.php" ; 
$query = $_GET['name']; 
    // gets value sent over search form
    
     
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        
         
         
        $q = "SELECT DISTINCT jmeno_autora FROM autori WHERE (jmeno_autora LIKE '%".$query."%')";
        $raw_results = mysqli_query($spojeni,$q);
             
       
         
        if(mysqli_num_rows($raw_results) > 0){
         
                   echo "<table>";
                    
                    echo "<tr>";
                 echo "<td>";
                echo "Jméno autora";
                 echo "</td>";
                
                
                 echo "</tr>";          
            while($results = mysqli_fetch_array($raw_results)){
              
                 
       
       
                  echo "<tr>";
                 echo "<td>";
                echo $results["jmeno_autora"];
                 echo "</td>";
             
                  echo "</tr>";
                 
                
            }
         
                 echo "</table>";   
        }
        else{
        echo "<div class='vysl'>"  ; 
            echo "<h2>0 nalezených výsledků</h2>";
             echo "</div>"  ; 
        }
         
    }
    else{ 
        echo "<div class='vysl'>";
        echo "<h2>Minimální délka fráze jsou ".$min_length." znaky</h2>";
         echo "</div>";
    }
?>

</body>
</html>