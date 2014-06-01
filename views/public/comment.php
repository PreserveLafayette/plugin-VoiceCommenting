<div class='comment-author'>
    <?php
        if(!empty($comment->author_name)) {
            if(empty($comment->author_url)) {
                $authorText = $comment->author_name;
            } else {
                $authorText = "<a href='{$comment->author_url}'>{$comment->author_name}</a>";
            }
        } else {
            $authorText = __("Anonymous");
        }
    ?>
    <p class='comment-author-name'><?php echo $authorText?></p>
    <?php
        $hash = md5(strtolower(trim($comment->author_email)));
        $url = "http://www.gravatar.com/avatar/$hash";
        echo "<img class='gravatar' src='$url' />";
    ?>
</div>
<div class='comment-body <?php if($comment->flagged):?>comment-flagged<?php endif;?> '><?php echo $comment->body; ?></div>
<?php if(!empty($comment->comment_url)): ?><audio controls>
  <source src=<?php $comment->comment_url?> type="audio/mpeg">
</audio><?php endif;?>
<?php if(is_allowed('VoiceCommenting_Comment', 'unflag')): ?>
 <p class='comment-flag' <?php if($comment->flagged): ?> style='display:none;'<?php endif;?> ><?php echo __("Flag inappropriate"); ?></p>
 <p class='comment-unflag' <?php if(!$comment->flagged): ?>style='display:none;'<?php endif;?> ><?php echo __("Unflag inappropriate"); ?></p>

            
<li class='delete'><a id='delete' class='action' href='<?php echo record_url($comment, 'delete-confirm'); ?>'><?php echo __("Delete"); ?></a></li>
<?php endif; ?>
<p class='comment-reply'><?php echo __("Reply"); ?></p>
