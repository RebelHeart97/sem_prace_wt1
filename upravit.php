<HTML>
<HEAD>
<TITLE>Seznam knih | Úprava knihy</TITLE>

<style>
@font-face{font-family: mujfont; src:url("AMSANSR.otf");}

body{background-image:url(wood.jpg); min-width:1000px; min-height:1500px; width: auto !important; width:1000px;}
.title2{color:white; font-weight:bold; font-size:25px; text-align:center; font-family:mujfont; text-shadow:1px 1px 1px black;}

.title{color:white; font-weight:bold; font-size:20px; font-family:mujfont;}
.title a{text-decoration: none; color: white;}
.title a:hover{text-decoration: underline; color: white;}
.input{font-size:17px; margin-top:-10px; font-family:mujfont; font-weight: bold;}
.inputt{font-size:17px; margin-top:-10px; font-family:mujfont; font-weight: bold;text-align:left;}


.button{margin-top:-1%; font-size: 19px; font-family: mujfont; margin-left:24%;width:120px; height:30px;}
.button2{margin-top:-8.5%; font-size: 19px; font-family: mujfont; margin-left:49%;width:60px; height:30px;}
.banner{ font-family: mujfont; text-align:center; font-size:40px; color:white; font-weight:bold; border-top:3px solid white; border-bottom:3px solid white; width:100%; }
.banner p{text-shadow:1px 1px 1px black;}
.menu a{text-decoration: none; list-style-type: none;  color:white; font-family:mujfont; font-size:19px;}
.menu p{color:white; font-family:mujfont; font-size:19px; font-style:italic; margin-left: 15%; margin-bottom: -2%; text-decoration: underline;}
.menu a:hover{text-decoration:underline;font-size:20px;}
.menu{background-color: rgba(255, 255, 255, 0.3); width:200px; border-radius:10px; margin-top:2%;}
.addGame{color:white; font-family: mujfont;}
.add{margin-left: 36.5%; background: rgba(255, 255, 255, 0.2); width:500px; height:250px; color:white; font-family: mujfont; text-align:center; padding-top:0.5%;}
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
 <div class="title2">
<H2>Úprava knihy</H2>
</div>
<?php
  require("connect.php");


  $sql = "select * from books WHERE id_knihy='$_GET[oc]'";  
  $sql2 = "select * from autori WHERE id_knihy='$_GET[oc]'";     

$vysledek = mysqli_query($spojeni, $sql);
$vysledek2 = mysqli_query($spojeni, $sql2);
 
$radek = mysqli_fetch_assoc($vysledek);
$radek2 = mysqli_fetch_assoc($vysledek2);

$oc = $radek["id_knihy"];



?>

<!-- vypsani polozek zaznamu do formulare pro upravy -->
<div class="add">
<FORM ACTION="update.php" METHOD=GET>

<TABLE>
<tr><td>Číslo knihy: <?php echo $oc?><td></tr>
<TR><TD>Nazev knihy: <TD><INPUT NAME=nazev VALUE="<?php echo $radek["nazev"] ?>"SIZE=30 class="input"></tr>
<TR><TD>Autor: <TD><INPUT NAME=autor VALUE="<?php echo $radek2["jmeno_autora"] ?>"SIZE=30 class="input"></tr>
<TR><TD>Žánr: <TD>
<select NAME=zanr class="input">
                    <?php
                               
                                
                                $sqlm = "select id_genre, genre from genre"; 
                                $vysledekm = mysqli_query($spojeni, $sqlm);  
                                   
                                while($radekm = mysqli_fetch_assoc($vysledekm)) 
                                {
                               
					?>
                                    <option value="<?php echo $radekm["id_genre"];?>" 
                                    <?php if($radekm["id_genre"]==$radek["zanr"]) echo "selected"; ?> >

					<?php echo $radekm["genre"]?>
				</option>
                                <?php
                                }



                                mysqli_close($spojeni);
                                ?>
						
</select></tr>
<TR><TD>Jazyk: <TD>
<select NAME=jazyk class="input">
                        <option value="česky">česky</option>
						<option value="slovensky">slovensky</option>
						<option value="anglicky">anglicky</option>
                        <option value="německy">německy</option>
						<option value="italsky">italsky</option>
                        <option value="francouzsky">francouzsky</option>
                        <option value="španělsky">španělsky</option>
                        <option value="portugalsky">portugalsky</option>
                        <option value="polsky">polsky</option>
                        <option value="jiný">jiný(uvedte v poznamce)</option>
</select></tr>
<TR><TD>Počet stran: <TD><INPUT NAME=pocet_stran VALUE="<?php echo $radek["pocet_stran"] ?>"SIZE=30 class="input"></tr>
<TR><TD>Poznámka: <TD><INPUT NAME=poznamka VALUE="<?php echo $radek["poznamka"] ?>"SIZE=30 class="input"></tr>



</TABLE>

<INPUT type="hidden"  NAME=oc VALUE="<?php echo $oc ?>"SIZE=11>


<P>
<div class="button">
<INPUT TYPE=SUBMIT VALUE="Zapiš změny" class="button">
</div>
</FORM>
<FORM ACTION="viewBooksA.php" method=GET>
<div class="button2">
<INPUT TYPE=SUBMIT VALUE="Zpět" class="button2">
</div>
</FORM>
</div>
<?php

?>


</BODY>
</HTML>
