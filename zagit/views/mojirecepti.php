    
<div class ="container">
    <div class = 'col-md-6'>
        <br/><br/>
        <?php

            if($data != null)
            {
                foreach ($data as $red) {

                        echo "<div class = 'row'><div class = 'col-md-6'><div class = 'recept'><br><h4>"; 
                        echo $red->naziv." ";
                        echo "</br><br></h4><h5>";
                        echo $red->tekstRecepta." ";
                        echo "<br></br>";
                        echo '<img src="data:image/jpeg;base64,'.base64_encode( $red->slikaRecepta ).'"/>';
                        echo "</div></div></div></br></h5>";
                        echo anchor("MojReceptController/obrisiRecept/".$red->idRecepta, "Obrisite ovaj recept");

                    }
            }
        ?>
    </div>
</div>
