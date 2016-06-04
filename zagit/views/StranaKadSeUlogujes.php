
<br/><br/><br/><br/>
<div class ='container'>
<?php
if (!empty($data)) {
    foreach ($data as $row) {
        echo "<div class = 'wrapper'>"; echo $row->korisnickoIme." ".$row->lozinka." ";
       
        echo "</div>";
    }
}
else
{   
    echo "DATA EMPTY";
}?>
</div>

