<HTML>
<HEAD>
<TITLE>Seznam knih | Smazání knihy</TITLE>
<style>
@font-face{font-family: mujfont; src:url("AMSANSR.otf");}

body{background-image:url(wood.jpg); min-width:1000px; min-height:1500px; width: auto !important; width:1000px;}
.title2{color:white; font-weight:bold; font-size:25px; text-align:center; font-family:mujfont; text-shadow:1px 1px 1px black;}

.title{color:white; font-weight:bold; font-size:20px; font-family:mujfont;}
.title a{text-decoration: none; color: white;}
.title a:hover{text-decoration: underline; color: white;}
.input{font-size:17px; margin-top:-10px; font-family:mujfont; font-weight: bold;}
.inputt{font-size:17px; margin-top:-10px; font-family:mujfont; font-weight: bold;text-align:left;}


.button{margin-top:-1.8%; font-size: 19px; font-family: mujfont; margin-left:42%;width:120px; height:30px;}
.button2{margin-top:-2.6%; font-size: 19px; font-family: mujfont; margin-left:51%;width:60px; height:30px;}
.banner{ font-family: mujfont; text-align:center; font-size:40px; color:white; font-weight:bold; border-top:3px solid white; border-bottom:3px solid white; width:100%;}
.banner p{text-shadow:1px 1px 1px black;}
.menu a{text-decoration: none; list-style-type: none;  color:white; font-family:mujfont; font-size:19px;}
.menu p{color:white; font-family:mujfont; font-size:19px; font-style:italic; margin-left: 15%; margin-bottom: -2%; text-decoration: underline;}
.menu a:hover{text-decoration:underline;font-size:20px;}
.menu{background-color: rgba(255, 255, 255, 0.3); width:200px; border-radius:10px; margin-top:2%;}
.addGame{color:white; font-family: mujfont;}
.add{margin-left: 36.5%; background: rgba(255, 255, 255, 0.2); width:500px; height:250px; color:white; font-family: mujfont; text-align:center; padding-top:0.5%;}
table{margin:auto;}
table td{color:white; font-family:mujfont; font-size:19px;}






</style>
</HEAD>
<BODY>

<div class="banner">
<p>Seznam knih</p>

</div>

<div class="menu">

<ul>

<a href="logout.php">Odhlásit se</a><br>
<a href="viewBooksA.php">Zpět na knihy</a>


</ul>
</div>
</div>
 <div class="title2">
<H2>Smazání knihy</H2>
</div>
<?php
  require("connect.php");

  $sql = "select * from books WHERE id_knihy='$_GET[oc]'";
  $sql2 = "select * from autori WHERE id_knihy='$_GET[oc]'";      

$vysledek = mysqli_query($spojeni, $sql);
$vysledek2 = mysqli_query($spojeni, $sql2);
 
$radek = mysqli_fetch_assoc($vysledek);
$radek2 = mysqli_fetch_assoc($vysledek2);
  
$oc=$radek[id_knihy];

echo "<div class='add'>"   ;
echo "<table>";
echo "<tr>";
echo "<td style= text-decoration:underline>Chcete tento záznam opravdu smazat?</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Číslo:".$radek['id_knihy']."  </td.";
echo "</tr>";

echo "<tr>";
echo "<td>Nazev knihy:        ". $radek['nazev']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Autor:        ". $radek2['jmeno_autora']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Žánr:        ". $radek['zanr']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Jazyk:        ". $radek['jazyk']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Počet stran:        ". $radek['pocet_stran']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Poznámka:        ". $radek['poznamka']."</td>";

 echo "</tr>"  ;
 echo "</table>"  ;
 echo "<hr>";
 echo "</div>";
  mysqli_close($spojeni);
?>
<FORM ACTION=delete.php method=GET>
<INPUT TYPE=HIDDEN NAME=oc VALUE="<?php echo $_GET[oc] ?>">
<div class="buttom">
<INPUT TYPE=SUBMIT VALUE="Ano" class="button">
</div>
</FORM>



<FORM ACTION=viewBooksA.php>
<div class="button2">
<INPUT TYPE=SUBMIT VALUE="Zpět" class="button2">
</div>
</FORM>

</BODY>
</HTML>
