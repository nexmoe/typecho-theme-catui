<?php $this->need('header.php'); ?>
<body>
    <div id="content">
        <div class="container">
            <?php $this->need('header-t.php'); ?>
            <article>
                 <h2 class="p-title"><?php $this->title(); ?></h2>
                <ul class="p-meta">
                    <li tooltip="该页面于<?php $this->date('Y'); ?>年<?php $this->date('n'); ?>月<?php $this->date('d'); ?>日最后发布"><i class="fa fa-clock-o"></i> 
                        <?php $this->date('n'); ?>月
                        <?php $this->date('d'); ?>日</li>
                    <li tooltip="该页面共有<?php art_count($this->cid); ?>个汉字"><i class="fa fa-bar-chart"></i> 
                        <?php art_count($this->cid); ?>汉字</li>
                    <li tooltip="该页面已经有<?php get_post_view($this) ?>次围观了"><i class="fa fa-eye"></i> 
                        <?php get_post_view($this) ?>围观</li>
                    <?php if($this->user->hasLogin()):?>
                    <li><a href="<?php $this->options->adminUrl(); ?>write-<?php if($this->is('post')): ?>post<?php else: ?>page<?php endif;?>.php?cid=<?php echo $this->cid;?>" tooltip="编辑该页面" class="edit-btn" target="_blank"><i class="fa fa-edit flat-icon-light"></i> 编辑</a>
                    </li>
                    <?php endif;?>
                </ul>
                <div class="p-text">
                    <?php $this->content(); ?></div>
                <?php $this->need('comments.php'); ?></article>
            <?php $this->need('copyright.php'); ?></div>
    </div>
    <?php $this->need('footer.php'); ?>
</body>