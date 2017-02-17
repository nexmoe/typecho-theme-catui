<?php $this->need('header.php'); ?>
<body>
    <div id="content">
        <?php $this->need('header-t.php'); ?>
        <div class="container">
            <article class="p">
            	<h2 class="p-title"><?php $this->title(); ?></h2>
                <ul class="p-meta">
                      <li><i class="fa fa-tags"></i> <?php $this->category(','); ?></li>
                      <li><i class="fa fa-clock-o"></i> <?php $this->date('n'); ?>月<?php $this->date('d'); ?>日</li>
                      <li><i class="fa fa-bar-chart"></i> <?php art_count($this->cid); ?>字</li>
                      <li><i class="fa fa-eye"></i> <?php $this->viewsNum(); ?> 次浏览</li>
                      <?php if($this->user->hasLogin()):?>
                      <li><a href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>" class="edit-btn flat-icon-light" target="_blank"><i class="fa fa-edit"></i> 编辑</a></li>
                      <?php endif;?>
                    </ul>
                    <?php Cover($this->cid); ?>
                <div class="p-text">
                    <?php $this->content(); ?></div>
                    <div class="others">
                        <?php if (!empty($this->options->OtherTool) && in_array('hitokoto', $this->options->OtherTool)): ?>
                        <hr><blockquote><p><?php hitokoto (); ?></p></blockquote>
                        <?php endif;?>
                        <?php if (!empty($this->options->OtherTool) && in_array('copyright', $this->options->OtherTool)): ?>
                         <div class="copyright">原创文章采用<a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.zh" target="_new"> CC BY-NC-SA 4.0协议 </a>进行许可，转载请著名转自：<a href="<?php $this->permalink() ?>" target="_new"><?php $this->title() ?></a></div>
                        <?php endif;?>
                      <div class="tags"><?php $this->tags(' ', true); ?></div>
                      <?php if (!empty($this->options->OtherTool) && in_array('share', $this->options->OtherTool)): ?>
                        <div class="share">
                        <a href="http://connect.qq.com/widget/shareqq/index.html?url=<?php $this->permalink() ?>&amp;desc=<?php $this->title(); ?>&amp;pics=<?php echo img_postthumb($this->cid); ?>&amp;site=qqcom" target="_blank" class="flat-icon-light fa fa-qq waves-effect waves-circle waves-light"></a>
                        <a href="http://service.weibo.com/share/share.php?title=<?php $this->title(); ?>&amp;url=<?php $this->permalink() ?>&amp;pic=<?php echo img_postthumb($this->cid); ?>" target="_blank" class="fa fa-weibo flat-icon-light waves-effect waves-circle waves-light"></a>
                        <a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php $this->permalink() ?>&amp;title=<?php $this->title(); ?>&amp;pics=<?php echo img_postthumb($this->cid); ?>" target="_blank" class="fa fa-star flat-icon-light waves-effect waves-circle waves-light"></a>
                      </div>
                      <?php endif;?>
                    </div>
                    <?php $this->need('comments.php'); ?>
            </article>
        </div>
    </div>
    <?php $this->need('footer.php'); ?></body>
