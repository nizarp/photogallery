<?php 
/** Includes **/
    echo script_tag('js/photo.js');
?>
<div id="photo-create">
<?php echo form_open($formName) ?>    
    <div class="banner">
        <h2><?= $title ?></h2>            
    </div>
    <div id="photo-form">        
        <div class="error">
            <?php echo validation_errors(); ?>
        </div>
            <div class="grid_1 alpha">
                <p>
                    <label for="title">Title:<span class="red">*</span></label>
                    <input type="text" id="title" name="title"
                           value="<?= set_value('title', $photo['title']) ?>"/>
                </p>
                <p>
                    <label for="description">Description:</label>
                    <textarea 
                        id="description" 
                        name="description" 
                        rows="5"><?= set_value('description', $photo['description']) ?></textarea>
                </p>                                
                
            </div>        
            <div class="grid_1 beta">
                <div class="photo-box">
                    <img src="<?php echo $photo['photo']; ?>" width="300"/>
                </div>
            </div>
        <div class="clear"></div>    
    </div>
    
    <div class="nextprev">
        <input type="submit" value="Save">
        <input type="button" onclick="window.location='/index.php/album'" value="Cancel">
    </div>
</form>


</div>
