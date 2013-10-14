<?php 
/** Includes **/    
    echo script_tag('js/lib/lightbox/js/jquery-1.10.2.min.js');
    echo script_tag('js/lib/lightbox/js/lightbox-2.6.min.js');
    echo script_tag('js/album.js');
    echo link_tag('js/lib/lightbox/css/lightbox.css');
?>
<div id="album-create">
    <div class="banner">
        <h2><?= character_limiter($title,35) ?></h2>
        <div class="banner-buttons">
            <a href="/index.php/photo/add/<?php echo $album['id']; ?>" class="btn-grn">Add Photos</a>
            <a id="play-btn" href="#" class="btn-grn" data-lightbox="topphotos">Slideshow</a>
        </div>
    </div>
    <div id="album-display">        
        <table id="photo-list" class="grid-list">
            <colgroup>
                <col width="35%"/>
                <col width="55%"/>
                <col width="10%"/>                
            </colgroup>
            <tbody>
                <?php foreach ($album['photos'] as $photo): ?>
                <tr>
                    <td class="photo-cell">          
                        <div class="photo-box">
                            <?php
                            echo "<a href='/index.php/photo/display/{$photo['id']}'>".
                                "<img src='{$photo['photo']}' width='290'/></a>"; 
                            ?>
                            <a href="<?php echo $photo['photo'] ?>" data-lightbox="topphotos"></a>
                        </div>                        
                    </td>
                    <td class="desc-cell" title="<?php echo $photo['description']; ?>">                        
                        <div class="photo-title">
                            <strong><?php echo character_limiter($photo['title'],60) ?></strong>
                            <br/> by <?php echo $photo['name']; ?>
                        </div>
                        <div class="photo-desc">
                            <?php echo nl2br($photo['description']); ?><br/>
                            <div style="text-align: right;">
                                <em>Posted on: <?php echo date('M d, Y', strtotime($photo['created_on'])); ?></em>
                            </div>
                            <div id="rating-box">
                                <img src="/css/images/comment.png"/> 
                                    <?php echo $photo['comment_count'] ?>&nbsp;
                                <img src="/css/images/rating.png"/>&nbsp;<?php echo round($photo['avg_rating']) ?>
                            </div>
                        </div>
                    </td>
                    <td class="action-cell">                        
                        <?php if($username == 'admin' || $photo['user'] == $userId): ?>
                        <img rel="<?= $photo['id'] ?>" class="photo-edit-btn" 
                             src="/css/images/edit.png">
                        <img class="photo-delete-btn" rel="<?php echo $photo['id'] ?>" 
                             src="/css/images/delete.png">
                        <? endif; ?>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        
        
    </div>

</div>
<div class="clear"></div>
<div class="spacer"></div>
<script type='text/javascript'>
    setPlay();
</script>