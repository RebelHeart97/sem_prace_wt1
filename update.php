<?php
require("connect.php");
    $sql = "UPDATE books SET nazev = '$_GET[nazev]', zanr = '$_GET[zanr]', jazyk = '$_GET[jazyk]', pocet_stran = '$_GET[pocet_stran]', poznamka = '$_GET[poznamka]' WHERE id_knihy='$_GET[oc]'";
    $sql2 = "UPDATE autori SET jmeno_autora = '$_GET[autor]' WHERE id_knihy='$_GET[oc]'";

if (mysqli_query($spojeni, $sql)) {
    if (mysqli_query($spojeni, $sql2)) {
    
    echo "Záznam byl úspěšně opraven";
     header("refresh:2;url=viewBooksA.php");
} else {
    echo "Chyba pri opravě: " . mysqli_error($spojeni);
     header("refresh:2;url=viewBooksA.php");
}
}
mysqli_close($spojeni);





?>
<BR>
<A HREF="viewBooksA.php">Zpět na výpis knih</A>


