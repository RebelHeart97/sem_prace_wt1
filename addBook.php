<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Seznam knih | Přidání knihy</title>
<style>
@font-face{font-family: mujfont; src:url("AMSANSR.otf");}

body{background-image:url(wood.jpg); min-width:1000px; min-height:1500px; width: auto !important; width:1000px;}
.title2{color:white; font-weight:bold; font-size:25px; text-align:center; font-family:mujfont;}

.title{color:white; font-weight:bold; font-size:20px; font-family:mujfont;}
.title a{text-decoration: none; color: white;}
.title a:hover{text-decoration: underline; color: white;}
.input{font-size:17px; margin-top:-10px; font-family:mujfont; font-weight: bold;}
.inputt{font-size:17px; margin-top:-10px; font-family:mujfont; font-weight: bold;text-align:left;}


.button{margin-top:3%; font-size: 25px; font-family: mujfont;}
.banner{ font-family: mujfont; text-align:center; font-size:40px; color:white; font-weight:bold; border-top:3px solid white; border-bottom:3px solid white; width:100%;}
.banner p{text-shadow:1px 1px 1px black;}
.menu a{text-decoration: none; list-style-type: none;  color:white; font-family:mujfont; font-size:19px;}
.menu p{color:white; font-family:mujfont; font-size:19px; font-style:italic; margin-left: 15%; margin-bottom: -2%; text-decoration: underline;}
.menu a:hover{text-decoration:underline;font-size:20px;}
.menu{background-color: rgba(255, 255, 255, 0.3); width:200px; border-radius:10px; margin-top:2%;}
.addGame{color:white; font-family: mujfont;}
.add{margin-left: 36.5%; background: rgba(255, 255, 255, 0.2); width:500px; height:550px; color:white; font-family: mujfont; text-align:center; padding-top:0.5%;}






</style>

</head>
<body>
<div class="banner">
<p>Seznam knih</p>

</div>

<div class="menu">

<ul>

<a href="logout.php">Odhlásit se</a><br>
<a href="viewBooksA.php">Zpět na knihy</a>


</ul>
</div>


		
<?php
require "connect.php";

if(isset($_POST["submit"])){
	   $nazev = $_POST["nazev"];
	   $autor = $_POST["autor"];
       $zanr = $_POST["zanr"];
       $jazyk = $_POST["jazyk"];
       $pocet_stran = $_POST["pocet_stran"];
       $poznamka = $_POST["poznamka"];
	   	
	
		
		
	
		
	if($nazev && $autor){
  	 
  		$q = "select * from books where nazev=\"$nazev\"";
         
  	     $query = mysqli_query($spojeni,$q); 
  	  	if(mysqli_num_rows($query) > 0) {
  	  		echo "<font color=\"red\">Kniha již je v seznamu.<br></font>";
  	  		
  	  		}
  	  	else {
  	  	 
  	  
    	$query = "insert into books(nazev,zanr,jazyk,pocet_stran,poznamka) values (\"$nazev\",\"$zanr\",\"$jazyk\",\"$pocet_stran\",\"$poznamka\")";
        
    	$query2 = "insert into autori(jmeno_autora) values (\"$autor\")"; 
     
        
    	$vlozeni = mysqli_query($spojeni,$query);
        $vlozeni2 = mysqli_query($spojeni,$query2);
    	
    	
        
       
    	
    	echo "<font color=\"green\">Kniha byla uložena do seznamu<br></font>";
        
        $g="SELECT MAX(books.id_knihy) FROM books";
        $get = mysqli_query($spojeni,$g);
        $got = mysqli_fetch_array($get); 
        $next_id = $got['MAX(books.id_knihy)'];
        
        $g2="SELECT MAX(autori.id_autora) FROM autori";
        $get2 = mysqli_query($spojeni,$g2);
        $got2 = mysqli_fetch_array($get2); 
        $next_id2 = $got2['MAX(autori.id_autora)'];
    
    $que = "update autori set autori.id_knihy = \"$next_id\" where jmeno_autora=\"$autor\"";
    $que2 = "update books set books.id_autora = \"$next_id2\" where nazev=\"$nazev\"";
    
    $updt = mysqli_query($spojeni,$que);
    $updt2 = mysqli_query($spojeni,$que2);
    
    /*    
	$que = "select id_knihy from books order by id_knihy desc limit 1";
    $que2 = "select id_autora from autori oder by id_autora desc limit 1";	
    
    $q2 = "update books set id_autora = id_autora+1 where nazev=\"$nazev\"";
    $q3 = "update autori set id_knihy = id_knihy+1 where autor = \"$autor\"";
    
    
    	$vlozeni3 = mysqli_query($spojeni,$q2);
        $vlozeni4 = mysqli_query($spojeni,$q3);

      */
    	header("location:viewBooksA.php");
    					

		}    	
    	
  	 } else {
          echo "<font color=\"red\">Nevyplnil jste všechny požadované údaje o knize<br></font>" ; 	 	
  	 	
  	 	}

	
}
    
?>



		<div class="title2">	
			<h2>Přidat knihu</h2>	
		</div>			
			
	<div class="add">
			<form method="post">
				<p>Název knihy:*</p>
					<input type="text" name="nazev" class="input">
				<p>Autor:*</p>
					<input type="text" name="autor" class="input">	
			
				
				
				<p>Žánr:*</p>
					<select size="1" name="zanr" class="input">
                       <?php
                        $q = "select * from genre";
                        $vysledek = mysqli_query($spojeni,$q);
                        
                        while ($res = mysqli_fetch_assoc($vysledek)): ?>
<option value="<?php echo $res["id_genre"]?>"><?php echo $res["genre"]?></option>
                 <?php endwhile;?>
                       
                       ?>
						
					</select>
                    
                <p>Jazyk:*</p>
				<select name="jazyk" class="input">
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
			          </select>
			  <p>Počet stran:*</p>
					<input type="text" name="pocet_stran" class="input">
                    
                <p>Poznamka pro jiný jazyk:</p>
					<input type="text" name="poznamka" class="input">
			 <div class="button">
			 <input type="submit" name="submit" value="Přidat" class="button">
			  </div>
				
			</form>
			<p>Pole označená * jsou povinná</p>
			</div>

 

</body>
</html>