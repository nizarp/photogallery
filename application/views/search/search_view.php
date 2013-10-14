
<?php 
/** Includes **/
?>

    <div id="search-page">
        <div class="banner">
            <h2>Search</h2>            
        </div>
        
        <div id="search-photos">
            <h3>Search in Flickr</h3>
            <?php echo form_open($formName); ?>
                <input placeholder="Enter keyword" type="text" name="keyword" 
                       value="<?php echo $keyword ?>" size="20"/>
                <input type="submit" id="search_btn" value="Search in Flickr"/>
            </form>
            <?php if(!empty($photos)) { ?>
                <?php foreach($photos as $photo) { ?>
                <div id="top-photo" class="photo-box">
                    <a href="<?php echo $photo['photo']; ?>" target="_new">
                        <img src="<?php echo $photo['thumbnail']; ?>" height="180"/></a>
                </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
<div class="spacer"></div>