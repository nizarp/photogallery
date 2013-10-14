
<?php 
/** Includes **/
    echo script_tag('js/album.js');
?>

    <div id="home-page">
        <div class="banner">
            <h2>Albums</h2>            
            <div class="banner-buttons">
                <a href="/index.php/album/create" class="btn-grn">Create Album</a>
            </div>
        </div>        
        <?php echo form_open('album/search'); ?>
            <div id="album-search">
                <input type="text" name="search" value="<?php echo $keyword; ?>" 
                       title="Enter keyword" placeholder="Enter Keyword"/>
                <input type="submit" value="Search" id="search_btn" />
            </div>
        <?php echo form_close(); ?>
        <div class="clear"><?php echo $this->pagination->create_links(); ?></div>
        <table id="album-list" class="grid-list">
            <colgroup>
                <col width="25%"/>
                <col width="65%"/>
                <col width="10%"/>                
            </colgroup>
            <tbody>
                <?php
                    $alternate = false;
                ?>
                <?php foreach ($albums as $album): ?>
                <?php $alternate = !$alternate; ?>
                <tr <?php echo ($alternate)?'class="row"':'' ?>>
                    <td class="photo-cell">                        
                        <?php 
                        $photo = (!empty($album['photo'])) ? $album['photo'] : '/photos/no_photo.png';
                        echo "<a href='/index.php/album/display/{$album['id']}'>".
                            "<img src='{$photo}' width='180'/></a>"; 
                        ?>
                    </td>
                    <td class="desc-cell" title="<?php echo $album['description']; ?>">                        
                        <p>
                            <strong><?php echo character_limiter($album['title'],60) ?></strong>
                            <?php echo '('. $album['count']. (($album['count'] == 1) ? ' Photo': ' Photos'). ')'; ?>
                            <br/> by <?php echo $album['name']; ?>
                        </p>
                        <p><?php echo nl2br(character_limiter($album['description'], 250)); ?></p>
                        <em>Created on: <?php echo date('M d, Y', strtotime($album['created_on'])); ?></em>
                    </td>
                    <td>                        
                        <?php if($username == 'admin' || $album['user'] == $userId): ?>
                        <img rel="<?= $album['id'] ?>" class="album-edit-btn" 
                             src="/css/images/edit.png">
                        <img class="album-delete-btn" rel="<?php echo $album['id'] ?>" 
                             src="/css/images/delete.png">
                        <? endif; ?>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
<div class="spacer"></div>
