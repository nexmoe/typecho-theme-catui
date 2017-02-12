<?php 
/** 
  * Cat UI 情托于物。人情冷暖，世态炎凉。 * 
  * @package Cat UI 
  * @author 折影轻梦 
  * @version 0.9 
  * @link http://i.chainwon.com/ 
*/ 
$this->need('header.php'); ?>
<body>
    <div id="content">
        <?php $this->need('header-t.php'); ?>
        <div class="container">
            <?php while($this->next()): ?>
            <article class="p">
                <a href="<?php $this->permalink() ?>">
                  <h2 class="p-title"><?php $this->sticky(); $this->title() ?></h2></a>
                    <ul class="p-meta">
                      <li><i class="fa fa-tags"></i> <?php $this->category(','); ?></li>
                      <li><i class="fa fa-clock-o"></i> <?php $this->date('n'); ?>月<?php $this->date('d'); ?>日</li>
                      <li><i class="fa fa-bar-chart"></i> <?php art_count($this->cid); ?>字</li>
                      <li><i class="fa fa-eye"></i> <?php $this->viewsNum(); ?> 次浏览</li>
                      <?php if($this->user->hasLogin()):?>
                      <li><a href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>" class="edit-btn flat-icon-light" target="_blank"><i class="fa fa-edit"></i> 编辑</a></li>
                      <?php endif;?>
                    </ul>
                    <?php if (!empty($this->options->OtherTool) && in_array('cover', $this->options->OtherTool)): ?>
                        <a href="<?php $this->permalink() ?>"><div class="cover flat-icon-light waves-effect waves-circle waves-light"><img src="<?php img_postthumb($this->cid); ?>"></div></a>
                    <?php endif;?>
                <div class="p-text">
                    <?php $this->content('<i class="float-button-light waves-circle fa fa-plus waves-effect waves-float waves-light"></i>'); ?></div>
            </article>
            <?php endwhile; ?>
            <div class="page">
               <?php $this->pageLink('加载更旧的文章…','next'); ?>
            </div>
            </div>
            </div>
    <?php $this->need('footer.php'); ?>
    </body>