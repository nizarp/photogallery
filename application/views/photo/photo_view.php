
<?php 
/** Includes **/
    echo script_tag('js/photo.js');
?>

    <div id="home-page">
        <div class="banner">
            <h2>Photos</h2>            
            <div class="banner-buttons">
                <a href="/index.php/album/create" class="btn-grn">Upload Photo</a>
            </div>
        </div>        
        <?php echo form_open('photo/search'); ?>
            <div id="album-search">
                <input type="text" name="search" value="<?php echo $keyword; ?>" 
                       title="Enter keyword" placeholder="Enter Keyword"/>
                <input type="submit" value="Search" id="search_btn" />
            </div>
        <?php echo form_close(); ?>
        <div class="clear"><?php echo $this->pagination->create_links(); ?></div>
        <table id="photo-list" class="grid-list">
            <colgroup>
                <col width="35%"/>
                <col width="55%"/>
                <col width="10%"/>                
            </colgroup>
            <tbody>
                <?php foreach ($photos as $photo): ?>
                <tr>
                    <td class="photo-cell">          
                        <div class="photo-box">
                            <?php
                            echo "<a href='/index.php/photo/display/{$photo['id']}'>".
                                "<img src='{$photo['photo']}' width='290'/></a>"; 
                            ?>
                        </div>                        
                    </td>
                    <td class="desc-cell" title="<?php echo $photo['description']; ?>">                        
                        <div class="photo-title">
                            <strong><?php echo character_limiter($photo['title'],60) ?></strong>
                            <br/> by <?php echo $photo['name']; ?>
                        </div>
                        <div class="photo-desc">
                            <?php echo nl2br(character_limiter($photo['description'], 250)); ?><br/>
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
<div class="spacer"></div>
