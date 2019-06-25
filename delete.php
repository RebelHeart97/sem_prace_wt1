<?php
require("connect.php");

$sql = "DELETE FROM books WHERE id_knihy = '$_GET[oc]'";
$sql2 = "DELETE FROM autori WHERE id_knihy = '$_GET[oc]'";

if (mysqli_query($spojeni, $sql)) {
    if (mysqli_query($spojeni, $sql2)) {
    echo "Záznam byl úspěšně smazán";
    header("refresh:2;url=viewBooksA.php");
} else {
    echo "Chyba při mazání: " . mysqli_error($spojeni);
    header("refresh:2;url=viewBooksA.php");
}
 }
mysqli_close($spojeni);
 ?>

<BR>
<A HREF="viewBooksA.php">Zpět na výpis knih</A>






