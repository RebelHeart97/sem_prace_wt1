<!DOCTYPE html>
<html>
<head>


<meta charset="utf-8" />
<title>Seznam knih | Výpis knih</title>
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
.menu{background-color: rgba(255, 255, 255, 0.3); width:150px; border-radius:10px; margin-top:2%;}
h1{color:white; font-family: mujfont; text-align:center;}
h4{color:white; font-family: mujfont;}


table{background-color: white; border:3px solid grey; margin:auto; font-family: mujfont; border-spacing: 1px; font-size: 17px; overflow:scroll; margin-top:-15%; margin-left:25%;}
table td{border:2px solid grey; border-collapse: collapse; padding: 1%; width:150px; height:18px;}
table td a{font-family: mujfont; color:black; text-decoration: none;}
.tabulka{max-width:700px; max-height:300px;}
.searchform{font-size:19px;}
.hledej{margin-left:0;margin-top:20px;}
.hledani{margin:auto; width:500px; height:200px; margin-left:0; margin-top:5%;}
h1{text-shadow:1px 1px 1px black;}



</style>

</head>
<body>

<div class="banner">
<p>Seznam knih</p>

</div>

<h1>Knihy</h1>


<div class="menu">

<ul>

<a href="logout.php">Odhlásit se</a>


</form> 
</ul>


</div>

<div class="hledani">
<form action="searchBook.php" method="GET" id="searchform">
<p style="color:white; font-weight:bold; font-family:mujfont">Vyhledávání podle názvu knihy</p> 
    <input  type="text" name="name" placeholder="Název knihy"> 
    <div class="hledej">
	<input  type="submit" name="submit" value="Hledej"> 
    </div>
</form>

<form action="searchAuthor.php" method="GET" id="searchform">
<p style="color:white; font-weight:bold; font-family:mujfont">Vyhledávání podle autora</p> 
    <input  type="text" name="name" placeholder="Jméno autora"> 
    <div class="hledej">
	<input  type="submit" name="submit" value="Hledej"> 
    </div>
</form>
</div>
<?php
session_start();

?>



<?php
require "connect.php";
function TlacitkoProRazeni($polozka,$popis)
{
 global $Nazev;
  return
 "<A HREF='viewBooks.php?orderby=$polozka&Nazev=".
  URLEncode($_GET[Nazev])."'>". "<IMG SRC=arr_up.png WIDTH=20 HEIGHT=20 title=Vzestupně(A-Z,0-9)></A>&nbsp;".$popis."&nbsp;".
"<A HREF='viewBooks.php?orderby=$polozka+DESC&Nazev=".
URLEncode($_GET[Nazev])."'>"."<IMG SRC=arr_d.png BORER=0 WIDTH=20 HEIGHT=20 title=Sestupně(Z-A,9-0)></A>";
}

// spojeni s databazi

if ($_GET[Nazev]!="")
    $Podminka="WHERE nazev LIKE '".AddSlashes($_GET[Nazev])."%'";
else
    $Podminka =" ";

if($_GET[orderby]!="")
    $Orderby = "ORDER BY $_GET[orderby]";
else
   $Orderby = "ORDER BY nazev";
   


$query = "select * from books,autori,genre where books.id_knihy = autori.id_knihy AND books.zanr=genre.id_genre".$Podminka.$Orderby;

$res = mysqli_query($spojeni,$query);
mysqli_close();


echo "<div class=\"tab\">";
echo "<table>";

echo "<tr>";
  echo "<td>";
  echo TlacitkoProRazeni("books.id_knihy","Id knihy");
  echo "</td>";
  
  
  echo "<td>";
  echo TlacitkoProRazeni("nazev","Název");
  echo "</td>";
  
  
  echo "<td>";
  echo TlacitkoProRazeni("jmeno_autora","Autor");
  echo "</td>";
  
  
  echo "<td>";
  echo TlacitkoProRazeni("genre","Žánr");
  echo "</td>";
  
  echo "<td>";
  echo TlacitkoProRazeni("jazyk","Jazyk");
  echo "</td>";
  
  echo "<td>";
  echo TlacitkoProRazeni("pocet_stran","Počet stran");
  echo "</td>";
  
  echo "<td>";
  echo "Poznámka";
  echo "</td>";
  
  
  
 
 
 	
 
echo "</tr>";  
while($row = mysqli_fetch_array($res)) {

	
	
  echo "<tr>";
  echo "<td>";
  echo $row["id_knihy"];
  echo "</td>";
  
  
  echo "<td>";
  echo $row["nazev"];
  echo "</td>";
  
  
  echo "<td>";
  echo $row["jmeno_autora"];
  echo "</td>";
  
  
  echo "<td>";
  echo $row["genre"];
  echo "</td>";
  
  echo "<td>";
  echo $row["jazyk"];
  echo "</td>";
  
  echo "<td>";
  echo $row["pocet_stran"];
  echo "</td>";
  
   echo "<td>";
  echo $row["poznamka"];
  echo "</td>";
  
  echo "</tr>";
 }
 
 echo "</table>";
 echo "</div>";
 ?>


</body>
</html>