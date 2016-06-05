
<br/><br/>
<div class = "container">
    
    <div class="col-md-6" >
        <div class="row">
            <div class="col-md-6 col-md-offset-3 well">
                <?php $attributes = array("class" => "form-horizontal", "name" => "EmailController");
                echo form_open("EmailController/index", $attributes);?>
                <fieldset>
                <legend>Contact Form</legend>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="name" class="control-label">Name</label>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" name="name" placeholder="Your Full Name" type="text" value="<?php echo set_value('name'); ?>" />
                        <span class="text-danger"><?php echo form_error('name'); ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="email" class="control-label">Email ID</label>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" name="email" placeholder="Your Email ID" type="text" value="<?php echo set_value('email'); ?>" />
                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="subject" class="control-label">Subject</label>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" name="subject" placeholder="Your Subject" type="text" value="<?php echo set_value('subject'); ?>" />
                        <span class="text-danger"><?php echo form_error('subject'); ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="message" class="control-label">Message</label>
                    </div>
                    <div class="col-md-12">
                        <textarea class="form-control" name="message" rows="4" placeholder="Your Message"><?php echo set_value('message'); ?></textarea>
                        <span class="text-danger"><?php echo form_error('message'); ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <input name="submit" type="submit" class="btn btn-primary" value="Send" />
                    </div>
                </div>
                </fieldset>
                <?php echo form_close(); ?>
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
        </div>
    </div>
   
    <div class="col-md-1">
        <img src ="<?php echo base_url('assets/gr1.jpg'); ?>"/> 
    </div>
</div>
