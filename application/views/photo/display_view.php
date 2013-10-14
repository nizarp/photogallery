<?php 
/** Includes **/    
    echo script_tag('js/lib/jquery_impromptu/jquery-impromptu.js');
    echo script_tag('js/photo.js');
    echo link_tag('js/lib/jquery_impromptu/jquery-impromptu.css');
?>
<div id="photo-create">
    <div class="banner">
        <h2><?= character_limiter($title,35) ?></h2>
    </div>
    <div id="photo-display">        
        <table class="photo-table" align="center">
            <colgroup>
                <col width="61%"/>
                <col width="39%"/>
            </colgroup>
            <tr>
                <td class="photo-cell">
                    <div class="photo-box">
                        <a title="Click here to view Full resolution" href="<?php echo $photo['photo'] ?>" target="_new">
                            <img src="<?php echo $photo['photo'] ?>" width="550"/></a>
                    </div>
                </td>
                <td class="desc-cell">
                    <div class="photo-title">
                        <strong><?php echo $photo['title']; ?></strong><br/>
                        <em>by <?php echo $photo['user']; ?></em>
                    </div>
                    <div class="photo-desc">
                        <?php echo nl2br($photo['description']); ?>
                    </div>                    
                    <div style="text-align: right;">
                        <em>Posted on: <?php echo date('M d, Y', strtotime($photo['created_on'])); ?></em>
                    </div>
                </td>                
            </tr>
            <tr>
                <td>                    
                    <div id="rating-box">
                        <img src="/css/images/comment.png"/> 
                            <?php echo count($photo['comments']) ?>&nbsp;
                            <img src="/css/images/rating.png"/>&nbsp;
                            <span id="avg_rating"><?php echo round($photo['rating']) ?></span>
                    </div>
                    <div id="add-rating">
                        <strong>Rate: </strong>
                        <input type="hidden" id="photo_id" value="<?php echo $photo['id']; ?>"/>
                        <select id="rating" rel="<?php echo $userId; ?>" name="rating">
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td id="comments">
                    <?php foreach($photo['comments'] as $comment): ?>
                        <div id="comment_<?php echo $comment['id']; ?>">
                            <div class="comment-box">
                                <span class="blue"><strong><?php echo $comment['name']; ?></strong></span>&nbsp;&nbsp;
                                <span class="gry">
                                    On <?php echo date('l, M d', strtotime($comment['posted_on'])); ?></em>
                                </span>
                                <br/>
                                <?php echo nl2br($comment['comment']); ?>
                            </div>                        
                            <?php if($comment['user_id'] == $userId || $username == 'admin') { ?>
                                <div id="comment-del">
                                    <img class="comment-delete-btn" 
                                         rel="<?php echo $comment['id'] ?>"
                                         src="/css/images/trash.png">
                                </div>
                            <?php } ?>
                        </div>                        
                    <?php endforeach; ?>
                    <div id="add-comment">
                        <textarea id="comment" placeholder="Add a comment"></textarea><br/>
                        <input type="button" 
                               rel="<?php echo $userId; ?>" 
                               id="add-comment-btn" value="Post Comment"/>
                    </div>
                </td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </div>

</div>
<div class="clear"></div>
<div class="spacer"></div>