<?php
    $this->load->helper('url');
?>


<!--chosen-->
<meta charset="utf-8">
<link rel="stylesheet" href="<?php echo base_url();?>assets/Pretraga/chosen.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/Pretraga/chosen.jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/Pretraga/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>

<style type="text/css" media="all">
    /* fix rtl for demo */
    .chosen-rtl .chosen-drop { left: -9000px; }
</style>

<!--end chosen-->	



	
<!-- ============= CONTAINER STARTS HERE ============== -->
<div class="main-wrap">	
   <div class="container">		        
   <!-- ============= CONTENT AREA STARTS HERE ============== -->
<div id="content" class="clearfix "><div id="left-area" class="clearfix" style="width:892px;">
<div id="post-content">

<div class="side-by-side clearfix">
<div style="float: left;margin-right: 80px;padding-bottom:50px;">
		
<div>
</br>
    <br/><br/><br/>
<em>Meso</em>
</br>
						 
<?php           
		echo "<select name = 'meso' data-placeholder='Unesite meso' style='width:350px;' multiple class='chosen-select'>";
		echo " <option value = ''></option>";
				foreach ($meso as $row) {
					echo "<option value ='" . $row->naziv . "'>" . $row->naziv . "</option>";
				}
		echo "</select>";
		echo "<br></br>";

?>
						  
</div>


<div>
<em>Riba i morski plodovi</em>
</br>
<?php
        echo "<select name ='riba'  data-placeholder='Unesite ribu i morske plodove...' multiple class='chosen-select' style='width:350px;'>";
        echo " <option value = ''></option>";
        foreach ($riba as $row) {
            echo "<option value ='" . $row->naziv . "'>" . $row->naziv . "</option>";
        }
        echo "</select>";
        echo "<br></br>";
        
?>						  
</div>



<div>
<em>Mlečni proizvodi</em>
</br>
<?php
        echo "<select name ='mlecniproizvodi'  data-placeholder='Unesite mlečne proizvode...' multiple class='chosen-select' style='width:350px;'>";
        echo " <option value = ''></option>";
        foreach ($mlecniproizvodi as $row) {
            echo "<option value ='" . $row->naziv . "'>" . $row->naziv . "</option>";
        }
        echo "</select>";
        echo "<br></br>";
        
?>
						  
</div>	
						

<div>
<em>Povrće i voće</em>
</br>
<?php
        echo "<select name ='vocepovrce'  data-placeholder='Unesite voće i povrće...' multiple class='chosen-select' style='width:350px;'>";
        echo " <option value = ''></option>";
        foreach ($vocepovrce as $row) {
            echo "<option value ='" . $row->naziv . "'>" . $row->naziv . "</option>";
        }
        echo "</select>";
        echo "<br></br>";
        
?>						  
</div>	
						

<div>
<em>Začini i začinsko bilje</em>
</br>
<?php
        echo "<select name ='zacini'  data-placeholder='Unesite začine...' multiple class='chosen-select' style='width:350px;'>";
        echo " <option value = ''></option>";
        foreach ($zacini as $row) {
            echo "<option value ='" . $row->naziv . "'>" . $row->naziv . "</option>";
        }
        echo "</select>";
        echo "<br></br>";
        
?>
					  
</div>	
						

<div>
<em>Ostalo</em>
</br>
<?php
        echo "<select name ='ostalo'  data-placeholder='Unesite ostale sastojke...' multiple class='chosen-select' style='width:350px;'>";
        echo " <option value = ''></option>";
        foreach ($ostalo as $row) {
            echo "<option value ='" . $row->naziv . "'>" . $row->naziv . "</option>";
        }
        echo "</select>";
        echo "<br></br>";
        
?>						  						  						 
</div>	
						


<!-- dugme -->
	<div style="margin-left: 30px;padding-top:20px;float:left;">
	<button id = "DugmeSIF" class= "sifdugme" type="button">Potraži recepte</button>
	</div>
<!-- dugme kraj -->


</div>

<!-- gif -->
<center><div id="loadingGif" style="display:none;position:relative;"><img src="<?php echo base_url();?>assets/Pretraga/ajax-loader.gif" /></div></center>
<!-- kraj gif -->

<!-- desni deo -->
<div id="resultat" style="display:none;"></div>
<!-- kraj desnog dela -->
</div>
</div>


</form>
<!--skriptovi chosen-->
<script type="text/javascript">
		function listText() 
		{ 
			var ul = document.getElementsByClassName('search-choice');
			for( var i = 0; i < ul.length; i++ ) 
			{ 
				var liChildren = ul.item(i).childNodes; 
				for( var j = 0; j < liChildren.length; j++ ) 
				{ 
					
					if(liChildren[j].tagName.toLowerCase()=='span')
					{
						alert(liChildren[j].innerHTML);
					}
				} 
			} 
		} 
</script>
<script type="text/javascript">						
			$("#DugmeSIF").click(function () {
				document.getElementById('resultat').style.display='none';//jQuery("#resultat").html(results);
				var $promenljive = '';
				var ul = document.getElementsByClassName('search-choice');
				for( var i = 0; i < ul.length; i++ ) 
				{ 
					var liChildren = ul.item(i).childNodes; 
					for( var j = 0; j < liChildren.length; j++ ) 
					{ 	
						if(liChildren[j].tagName.toLowerCase()=='span')
						{
							$promenljive += liChildren[j].innerHTML+',';//alert(liChildren[j].innerHTML);
						}
					} 
				} 
			  $("#loadingGif").show();
			  
			  jQuery.ajax({
				url:"<?php echo base_url(); ?>" + "index.php/PretragaController/index",
				type:'POST',
				data: ({ action: 'my_function', username: $promenljive}),//data:'username: $promenljive',
				success:function(results) {
					//document.getElementById('resultat').innerHTML='jscript: '+$promenljive+'<br/>'+'data promenljiva: '+results;
					document.getElementById('resultat').innerHTML='<center><H1><br/><br/>Recepti</H1></center>'+results;
					document.getElementById('resultat').style.display='block';//jQuery("#resultat").html(results);
					$("#loadingGif").hide();
				}
			});
			});
	</script>
	  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
	<!--skriptovi chosen end-->		
</div>
  				</div><!-- end of content div -->
                <div class="bot-ads-area">
                		                </div>
        		<!-- CONTENT ENDS HERE -->
                                
		</div><!-- end of container div -->
    </div>
	<div class="w-pet-border"></div>
<!-- ============= CONTAINER AREA ENDS HERE ============== -->

