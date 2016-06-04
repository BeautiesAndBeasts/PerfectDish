<br/><br/>
<div class = "container">
  <div class = 'col-md-6'>
    <div class ="recepti">
       
            <?php
            $this->load->helper("url");
            if (!empty($data)) {
                foreach ($data as $red) {
                    echo "<div class = 'row'><div class = 'col-md-6'><div class = 'recept'><br><h4>"; 
                    echo $red->naziv." ";
                    echo "</br><br></h4><h5>";
                    echo $red->tekstRecepta." ";
                    echo "<br></br>";
                    echo '<img src="data:image/jpeg;base64,'.base64_encode( $red->slikaRecepta ).'"/>';
                    echo "</div></div></div></br></h5>";
                }
            }
            ?>
    </div>
  </div>   
</div>    
  