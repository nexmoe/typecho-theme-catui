<?php $this->need('header.php'); ?>
<body>
    <div id="content">
        <?php $this->need('header-t.php'); ?>
        <div class="container">
            <article class="p">
                <h2 class="p-title"><?php $this->title(); ?></h2>
                <ul class="p-meta">
                      <li><i class="fa fa-clock-o"></i> <?php $this->date('n'); ?>月<?php $this->date('d'); ?>日</li>
                      <li><i class="fa fa-bar-chart"></i> <?php echo art_count($this->cid); ?>字</li>
                      <li><i class="fa fa-eye"></i> <?php $this->viewsNum(); ?> 次浏览</li>
                      <?php if($this->user->hasLogin()):?>
                    <li><a href="<?php $this->options->adminUrl(); ?>write-<?php if($this->is('post')): ?>post<?php else: ?>page<?php endif;?>.php?cid=<?php echo $this->cid;?>" class="edit-btn" target="_blank"><i class="fa fa-edit flat-icon-light"></i> 编辑</a>
                    </li>
                    <?php endif;?>
                </ul>
                <div class="p-text">
                    <?php $this->content(); ?></div>
                    <?php $this->need('comments.php'); ?>
            </article>
        </div>
    </div>
    <?php $this->need('footer.php'); ?></body>