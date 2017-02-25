<?php 
/** 
  * Cat UI 情托于物。人情冷暖，世态炎凉。
  * @package Cat UI 
  * @author 折影轻梦 
  * @version 1.1
  * @link http://i.chainwon.com/ 
*/ 
$this->need('header.php'); ?>
<body>
    <div id="content">
        <div class="container">
            <?php $this->need('header-t.php'); ?>
            <?php while($this->next()): ?>
            <article class="p">
                <a href="<?php $this->permalink() ?>">
                  <h2 class="p-title"><?php $this->sticky(); $this->title() ?></h2></a>
                    <ul class="p-meta">
                      <li><i class="fa fa-tags"></i> <?php $this->category(','); ?></li>
                      <li tooltip="该文章于<?php $this->date('Y'); ?>年<?php $this->date('n'); ?>月<?php $this->date('d'); ?>日最后发布"><i class="fa fa-clock-o"></i> <?php $this->date('n'); ?>月<?php $this->date('d'); ?>日</li>
                      <li tooltip="该文章共有<?php art_count($this->cid); ?>个汉字"><i class="fa fa-bar-chart"></i> <?php art_count($this->cid); ?>汉字</li>
                      <li tooltip="该文章已经有<?php get_post_view($this) ?>次围观了"><i class="fa fa-eye"></i> <?php get_post_view($this) ?>围观</li>
                      <?php if($this->user->hasLogin()):?>
                      <li><a href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>" tooltip="编辑该文章" class="edit-btn" target="_blank"><i class="fa fa-edit"></i> 编辑</a></li>
                      <?php endif;?>
                    </ul>
                        <a href="<?php $this->permalink() ?>"><?php Cover($this->cid); ?></a>
                <div class="p-text">
                    <?php $this->content('<i class="float-button-light waves-circle fa fa-plus waves-effect waves-float waves-light"></i>'); ?></div>
            </article>
            <?php endwhile; ?>
            <?php $this->pageNav(); ?>
            <?php $this->need('copyright.php'); ?>
            </div>
            </div>
    <?php $this->need('footer.php'); ?>
    </body>