<div id="comments"> 
<?php if($this->allow('comment')): ?>
<div class="ds-thread" data-thread-key="<?php echo $this->cid;?>" data-title="<?php echo $this->title;?>" data-author-key="<?php echo $this->authorId;?>" data-url="<?php $this->permalink(); ?>"></div>
<?php else: ?>
<h4><?php _e('评论已关闭'); ?></h4> 
<?php endif; ?> 
</div>