
<?php 
/** Includes **/
    echo script_tag('js/lib/lightbox/js/jquery-1.10.2.min.js');
    echo script_tag('js/lib/lightbox/js/lightbox-2.6.min.js');
    echo link_tag('js/lib/lightbox/css/lightbox.css');
?>

    <div id="home-page">
        <div class="banner">
            <h2>Home</h2>            
        </div>
        
        <div id="home-photos">        
            <div id="top-photos">
                <h3>Top Photos</h3>
                <?php foreach($top_photos as $photo): ?>
                    <div id="top-photo" class="photo-box">
                        <a title="<?php echo ucfirst($photo['title']); ?>" target="_new" 
                           href="/index.php/photo/display/<?php echo $photo['id'] ?>">
                            <img src="<?php echo $photo['photo'] ?>" height="170"/></a>
                    </div>
                <?php endforeach; ?>                
            </div>
            <div style="height:30px;">&nbsp;</div>
            <div id="top-photos">
                <h3>Latest Photos</h3>
                <?php foreach($latest_photos as $photo): ?>
                    <div id="top-photo" class="photo-box">
                        <a title="<?php echo ucfirst($photo['title']); ?>" target="_new" 
                           href="/index.php/photo/display/<?php echo $photo['id'] ?>">
                            <img src="<?php echo $photo['photo'] ?>" height="170"/></a>
                    </div>
                <?php endforeach; ?>                
            </div>
        </div>
    </div>
<div class="spacer"></div>