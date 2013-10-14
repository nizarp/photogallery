
    <div id="home-page">
        <div class="banner">
            <h2>Home</h2>            
        </div>
        <div id="success-message">
            <div class="error">
                <?php echo validation_errors(); ?>
                <?php if(!empty($error)) echo '<div class="red">'.$error.'</div>'; ?>
            </div>
            <?php echo form_open($formName); ?>
                
                Enter your email: 
                <input type="text" id="email" name="email"
                           value="<?= set_value('email', $email) ?>"/>
                <input type="submit" value="Submit">
                <input type="button" onclick="window.location='/index.php/login'" value="Cancel">
            </form>
        </div>
    </div>
<div class="spacer"></div>
