<?php if (!empty($this->options->OtherTool) && in_array('footercopyright', $this->options->OtherTool)): ?>
<div class="t-copyright">
    <div class="t-info flat-icon waves-effect waves-circle">
        <p>&copy; <?php echo date( "Y");?> <?php $this->options->title() ?></p>
        <div class="cloud">
            <div class="tag-cloud">
                <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
                <?php if($tags->have()): ?>
                <?php while ($tags->next()): ?>
                    <a href="<?php $tags->permalink(); ?>" rel="tag" class="size-<?php $tags->split(5, 10, 20, 30); ?>" title="<?php $tags->count(); ?> 个话题"><?php $tags->name(); ?></a>
                <?php endwhile; ?>
                <?php else: ?>
                    <a><?php _e('没有任何标签'); ?></a>
                <?php endif; ?>
            </div>
            <div class="post">
                <?php $this->widget('Widget_Contents_Post_Recent')
            ->parse('<a href="{permalink}">{title}</a>'); ?>
            </div>
            <div class="comments">
                <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
                <?php while($comments->next()): ?>
                <a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?>: <?php $comments->excerpt(35, '...'); ?></a>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<?php endif;?>