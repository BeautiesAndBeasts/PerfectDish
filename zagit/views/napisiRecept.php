

<div class="container">
    <?php $attributes = array("class" => "form_horizontal", "name" => "NapisiRecept");
     echo form_open("NapisiRecepte/upload", $attributes); ?>
    
    <filedset>
        
                <div class ="form-group">
                    <div class="row">
                        <div class ="col-md-6">
                            <label for = "naziv" class="control-label"> Naziv </label>
                        </div>
                    </div>
                    <div class ="row">
                        
                        <div class="col-md-4">
                            <input class ="form-control" name="naziv" type="text" value="<?php echo set_value('naziv'); ?>"/>
                            <span class ="text-danger"><?php echo form_error('naziv');?></span>
                        </div>
                    </div>
                </div>
                
                 <div class ="form-group">
                    <div class="row">
                        <div class ="col-md-6">
                            <label for = "tekstRecepta" class="control-label"> Tekst Recepta </label>
                        </div>
                    </div>
                    <div class ="row">
                        
                        <div class="col-md-4">
                            <textarea class ="form-control" name="tekstRecepta" rows="4" /> <?php echo set_value('naziv'); ?> </textarea>
                            <span class ="text-danger"><?php echo form_error('naziv');?></span>
                        </div>
                    </div>
                </div>
        
                 <div class ="form-group">
                    <div class="row">
                        <div class ="col-md-6">
                            <label for = "vremePripreme" class="control-label"> Vreme Pripreme </label>
                        </div>
                    </div>
                    <div class ="row">
                        
                        <div class="col-md-4">
                            <input class ="form-control" name="vremePripreme" type="text" /> <?php echo set_value('vremePripreme'); ?> </input>
                            <span class ="text-danger"><?php echo form_error('vremePripreme');?></span>
                        </div>
                    </div>
                </div>
        
                 <div class ="form-group">
                    <div class="row">
                        <div class ="col-md-6">
                            <label for = "vrsta" class="control-label"> Vrsta Recepta </label>
                        </div>
                    </div>
                    <div class ="row">
                        
                        <div class="col-md-4">
                            <select name ="vrsta">
                                <option value="Porodični ručak">Porodični ručak</option>
                                <option value="Romantična večera">Romantična večera</option>
                                <option value="Ostala jela">Ostala jela</option>
                            </select>
                            <span class ="text-danger"><?php echo form_error('vremePripreme');?></span>
                        </div>
                    </div>
                </div>
        
                <div class ="form-group">
                    <div class="row">
                        <div class ="col-md-6">
                            <label for = "kategorijaRecepta" class="control-label"> Kategorija Recepta </label>
                        </div>
                    </div>
                    <div class ="row">
                        
                        <div class="col-md-4">
                            <select name ="kategorijaRecepta">
                                <?php 
                                    foreach($vrsteRecepta as $row)
                                    {
                                        echo "<option value = '".$row->idKategorijaR."'>".$row->naziv."</option>";
                                    }
                                ?>
                            </select>
                            <span class ="text-danger"><?php echo form_error('kategorijaRecepta');?></span>
                        </div>
                    </div>
                </div>
        
                 <div class ="form-group">
                    <div class="row">
                        <div class ="col-md-6">
                            <label for = "slika" class="control-label"> Naziv Slike </label>
                        </div>
                    </div>
                    <div class ="row">
                        
                        <div class="col-md-4">
                            <input type="file" name="slika" size='20'/>
                            <span class ="text-danger"><?php echo form_error('kategorijaRecepta');?></span>
                        </div>
                    </div>
                </div>
        
                <div class ="row">
                    <input name="submit" type="submit" class="btn btn-primary" value="Potvrdi"/>
                </div>
    </filedset>
    
    <?php echo form_close();?>
    <?php echo $this->session->flashdata('imgMSG'); ?>

</div>
