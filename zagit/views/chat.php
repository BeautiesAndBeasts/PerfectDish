<br/><br/><br/>
<div class = "container">
    
    <div class="col-lg-8" >
        <div class="row">
            <div class="col-lg-12 col-md-offset-3 well">
                <?php $attributes = array("class" => "form-horizontal", "name" => "ChatController");
                echo form_open("ChatController/index", $attributes);?>
                <fieldset>
                    <legend>Chat</legend>
                    
                    
                    <div class="form-group">
                    <div class="col-lg-12">
                        <label for="poruke" class="control-label">Poruke</label>
                    </div>
                    <div class="col-lg-12">
                        
                        <textarea readonly="true" class="form-control" name="poruke" rows="13" placeholder="">
                            <?php
                                foreach($data as $row)
                                {
                                    echo $row->korisnickoIme." : ".$row->sadrzajPoruke."\n";
                                }
                                
                            ?>
                        </textarea>
                        <br/>
                        <label for="poruke" class="control-label">Poruka</label>
                        <textarea  class="form-control" name="message" rows="3" placeholder=""><?php echo set_value('message'); ?></textarea>
                        <span class="text-danger"><?php echo form_error('message'); ?></span>
                    </div>
                    </div>
                    
               
                    <div class="form-group">
                        <div class="col-md-12">
                            <input name="submit" type="submit" class="btn btn-primary" value="Potvrdi" />
                        </div>
                    </div>
                </fieldset>
                <?php echo form_close(); ?>
                <?php echo $this->session->flashdata('chat'); ?>
            </div>
        </div>
    </div>
</div>