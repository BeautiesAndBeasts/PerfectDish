<br/><br/><br/>
<div class = "container">
    
    <div class="col-md-6" >
        <div class="row">
            <div class="col-md-12 col-md-offset-3 well">
                <?php $attributes = array("class" => "form-horizontal", "name" => "RegistrationController");
                echo form_open("RegistrationController/index", $attributes);?>
                <fieldset>
                    <legend>Registraciona Forma</legend>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="korisnickoIme" class="control-label">Korisnicko Ime</label>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" name="korisnickoIme" placeholder="username" type="text" value="<?php echo set_value('korisnickoIme'); ?>" />
                            <span class="text-danger"><?php echo form_error('korisnickoIme'); ?></span>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="lozinka" class="control-label">Lozinka</label>
                        </div>
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="lozinka" placeholder="password" type="text" value="<?php echo set_value('lozinka'); ?>" />
                            <span class="text-danger"><?php echo form_error('lozinka'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="potvrdiLozinka" class="control-label">Potvrdite Lozinku</label>
                        </div>
                        <div class="col-md-12">
                            <input type ="password" class="form-control" name="potvrdiLozinka" placeholder="password" type="text" value="<?php echo set_value('potvrdiLozinka'); ?>" />
                            <span class="text-danger"><?php echo form_error('potvrdiLozinka'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="ime" class="control-label">Ime</label>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" name="ime" placeholder="name" type="text" value="<?php echo set_value('ime'); ?>" />
                            <span class="text-danger"><?php echo form_error('ime'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="prezime" class="control-label">Prezime</label>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" name="prezime" placeholder="last name" type="text" value="<?php echo set_value('prezime'); ?>" />
                            <span class="text-danger"><?php echo form_error('prezime'); ?></span>
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="email" class="control-label">Email</label>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" name="email" placeholder="Your Email ID" type="text" value="<?php echo set_value('email'); ?>" />
                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                        </div>
                    </div>





                    <div class="form-group">
                        <div class="col-md-12">
                            <input name="submit" type="submit" class="btn btn-primary" value="Potvrdi" />
                        </div>
                    </div>
                </fieldset>
                <?php echo form_close(); ?>
                <?php echo $this->session->flashdata('regMSG'); ?>
            </div>
        </div>
    </div>
</div>