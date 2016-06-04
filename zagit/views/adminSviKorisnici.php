<br/><br/><br/><br/>
<div class ='container'>
    <ul>
<?php
if (!empty($data)) {
    foreach ($data as $row) { echo '<li>';
        echo "<div class = 'wrapper'>"; echo $row->korisnickoIme;
        echo " "; echo anchor("adminController/detalji/".$row->idKorisnika, "Detaljnije");
       
        echo "</div>"; echo '</li>';
    }
}
else
{   
    echo "DATA EMPTY";
}?>
    </ul>
</div>