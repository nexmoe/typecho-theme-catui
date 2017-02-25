<?php $this->need('header.php'); ?>
<body>
    <div id="content">
        <div class="container">
            <?php $this->need('header-t.php'); ?>
            <article class="p">
            	<h2 class="p-title"><?php $this->title(); ?></h2>
                  <ul class="p-meta">
                      <li><i class="fa fa-tags"></i> <?php $this->category(','); ?></li>
                      <li tooltip="该文章于<?php $this->date('Y'); ?>年<?php $this->date('n'); ?>月<?php $this->date('d'); ?>日最后发布"><i class="fa fa-clock-o"></i> <?php $this->date('n'); ?>月<?php $this->date('d'); ?>日</li>
                      <li tooltip="该文章共有<?php art_count($this->cid); ?>个汉字"><i class="fa fa-bar-chart"></i> <?php art_count($this->cid); ?>汉字</li>
                      <li tooltip="该文章已经有<?php get_post_view($this) ?>次围观了"><i class="fa fa-eye"></i> <?php get_post_view($this) ?>围观</li>
                      <?php if($this->user->hasLogin()):?>
                      <li><a href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>" tooltip="编辑该文章" class="edit-btn" target="_blank"><i class="fa fa-edit"></i> 编辑</a></li>
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
                         <div class="copyright">原创文章采用<a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.zh" tooltip="CC BY-NC-SA 4.0协议" target="_new"> CC BY-NC-SA 4.0协议 </a>进行许可，转载请著名转自：<a href="<?php $this->permalink() ?>" target="_new" tooltip="<?php $this->title() ?>"><?php $this->title() ?></a></div>
                        <?php endif;?>
                        <?php if (!empty($this->options->OtherTool) && in_array('pages', $this->options->OtherTool)): ?>
                        <div class="pages">
                            <div class="prev flat-icon-light waves-effect waves-circle waves-light"><?php $this->thePrev('<i class="fa fa-arrow-left"></i> %s', '<i class="fa fa-arrow-left"></i> <a>没有上一篇文章了！<a/>'); ?></div>
                            <div class="pnext flat-icon-light waves-effect waves-circle waves-light"><?php $this->theNext('%s <i class="fa fa-arrow-right"></i>', '<a>没有下一篇文章了！</a> <i class="fa fa-arrow-right"></i>'); ?></div>
                        </div>
                        <?php endif;?>
                      <div class="tags"><?php $this->tags(' ', true); ?></div>
                      <?php if (!empty($this->options->OtherTool) && in_array('share', $this->options->OtherTool)): ?>
                        <div class="share">
                        <a tooltip="分享给QQ好友" style="background: #72afeb;" href="http://connect.qq.com/widget/shareqq/index.html?url=<?php $this->permalink() ?>&amp;desc=<?php $this->title(); ?>&amp;pics=<?php echo img_postthumb($this->cid); ?>&amp;site=qqcom" target="_blank"><i class="fa fa-qq"></i></a>
                        <a tooltip="分享到新浪微博" style="background: #ff6e71;" href="http://service.weibo.com/share/share.php?title=<?php $this->title(); ?>&amp;url=<?php $this->permalink() ?>&amp;pic=<?php echo img_postthumb($this->cid); ?>" target="_blank"><i class="fa fa-weibo"></i></a>
                        <a tooltip="分享到QQ空间" style="background: #FED466;" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php $this->permalink() ?>&amp;title=<?php $this->title(); ?>&amp;pics=<?php echo img_postthumb($this->cid); ?>" target="_blank"><i class="fa fa-star"></i></a>
                      </div>
                      <?php endif;?>
                    </div>
                    <?php $this->need('comments.php'); ?>
            </article>
            <?php $this->need('copyright.php'); ?>
        </div>
    </div>
    <?php $this->need('footer.php'); ?></body>