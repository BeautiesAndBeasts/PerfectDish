<div class ="container">
<?php

    echo "<br/><br/><br/>";
    
    foreach($data as $row)
    {
        echo "<div class = 'row'>";
        echo "<p><font size = '20'>".$row->korisnickoIme."</font></p>";
        echo "</div>";
        echo "<div class = 'row'>";
        echo "<p><font size = '10'>"."korisniki aktivan : ".$row->statusValidnosti."</font></p>";
        echo "</div>";
            
    }
?>   
    <div class = "row">
            <div class ="col-md-6">
                <img src ='<?php echo base_url('assets/goku.jpg'); ?>'/>
            </div>
            <div class = "col-md-6">
                <?php
                    if($recepti == null)
                    {
                        echo "<p><font size='20'> Korisnik jos nije uneo nijedan recept </font><p>";
                    }
                    else
                    {
                        foreach ($recepti as $row)
                        {
                            echo "<div>".$row->naziv."<br/>".$row->tekstRecepta."</div><br/><br/>";
                        }
                    }
                ?>
            </div>
    </div>   
     <br/>
     <div class = "row">
     <?php  foreach($data as $row)
            {
            echo "<a class='btn btn-primary'>";
            echo anchor("adminController/ObrisiKorisnika/".$row->idKorisnika, "Obrisi Korisnika");
            echo "</a>";
                    
            }
     ?>
     </div>
</div>