<?php 
/** Includes **/    
    echo script_tag('js/lib/datePicker/date.js');
    echo script_tag('js/lib/datePicker/jquery.datePicker.min.js');
    echo script_tag('js/user.js');
    echo link_tag('js/lib/datePicker/datePicker.css');
    echo link_tag('css/datePicker.css');
?>
<div id="staff-create">
<?php echo form_open($formName) ?>    
    <div class="banner">
        <h2><?= $title ?></h2>            
    </div>
    <div id="staff-form">        
        <div class="error"><?php echo validation_errors(); ?></div>
            <div class="grid_1 alpha">
                <p>
                    <label for="name">Name:<span class="red">*</span></label>
                    <input type="text" id="purpose" name="name"
                           value="<?= set_value('name', $user['name']) ?>"/>
                </p>
                <p <?php if($formName == 'user/edit') echo 'style="display:none;"' ?>>
                    <label for="name">Username:<span class="red">*</span></label>
                    <input type="text" id="username" name="username"
                           value="<?= set_value('username', $user['username']) ?>"/>
                </p>
                <p>
                    <label for="name">Password:<span class="red">*</span></label>
                    <input type="password" id="password" name="password"
                           value="<?= set_value('password', $user['password']) ?>"/>
                </p>
                <p>
                    <label for="email">Email:<span class="red">*</span></label>
                    <input type="text" id="email" name="email"
                           value="<?= set_value('email', $user['email']) ?>"/>
                </p>
                <p>
                    <label for="contact">Contact:</label>
                    <input type="text" id="contact" name="contact"
                           value="<?= set_value('contact', $user['contact']) ?>"/>
                </p>                
                <p>
                    <label for="dob">Date of Birth:</label>
                    <input type="text" id="dob" name="dob" class="dp-applied" 
                           placeholder="DD/MM/YYYY" readonly="readonly"
                           value="<?= set_value('promised_date', $user['dob']) ?>"/>
                    <span id="dob-btn" class="cal-input"></span>
                </p>
                <p>
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location"
                           value="<?= set_value('location', $user['location']) ?>"/>
                </p>
            </div>      
        <div class="clear"></div>    
    </div>
    
    <div class="nextprev">
        <input type="submit" value="Save">
        <input type="button" onclick="window.location='/index.php/login'" value="Cancel">
    </div>
</form>


</div>
