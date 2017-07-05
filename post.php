<?php 
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('head.php'); 
?>
<body>
    <div id="header">
        <?php $this->need('header.php'); ?>
    </div>
    <div id="content">
        
        <article class="container">
            <?php
            $str = preg_replace('#<a href="(.*?)">(.*?)</a>#','<a href="$1" target="_blank" >$2</a>',$this->content);
            $str = preg_replace('#\@\((.*?)\)#','<img src="/usr/themes/catui/newpaopao/$1.png" class="biaoqing">',$str);
            echo $str;
            ?>
        </article>
        
        <div class="others container">
            <!--  文章标签  -->
            <div class="tags"><?php $this->tags(' ', true); ?></div>
            <!--  文章功能按钮  -->
            <?php if (!empty($this->options->OtherTool) && in_array('share', $this->options->OtherTool)): ?>
            <div class="share"> <a tooltip="给博主打赏" id="support-b" style="background: rgb(254, 212, 102);width: inherit;padding: 0 8px;"><i class="fa fa-usd"></i> 打赏</a>
                <a tooltip="显示该文章的二维码" id="qrcode-b" style="background: rgb(117, 117, 117);width: inherit;padding: 0 8px;"><i class="fa fa-qrcode"></i> 二维码</a>
                <a tooltip="分享给QQ好友" style="background: #72afeb;" href="http://connect.qq.com/widget/shareqq/index.html?url=<?php $this->permalink() ?>&amp;desc=<?php $this->title(); ?>&amp;pics=<?php echo img_postthumb($this->cid,$this->fields->Cover); ?>&amp;site=qqcom" target="_blank"><i class="fa fa-qq"></i></a>
                <a tooltip="分享到新浪微博" style="background: #ff6e71;" href="http://service.weibo.com/share/share.php?title=<?php $this->title(); ?>&amp;url=<?php $this->permalink() ?>&amp;pic=<?php echo img_postthumb($this->cid,$this->fields->Cover); ?>" target="_blank"><i class="fa fa-weibo"></i></a>
                <a tooltip="分享到QQ空间" style="background: #ffcd00;" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php $this->permalink() ?>&amp;title=<?php $this->title(); ?>&amp;pics=<?php echo img_postthumb($this->cid,$this->fields->Cover); ?>" target="_blank"><i class="fa fa-star"></i></a>
            </div>
            <?php endif;?>
        </div>

        <!--  原创文章保护  -->
        <?php if (!empty($this->options->OtherTool) && in_array('copyright', $this->options->OtherTool)): ?>
        <div class="cc">原创文章采用<a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.zh" tooltip="CC BY-NC-SA 4.0协议" target="_new"> CC BY-NC-SA 4.0协议 </a>进行许可，转载请著名转自：
            <a href="<?php $this->permalink() ?>" target="_new" tooltip="<?php $this->title() ?>"><?php $this->title() ?></a>
        </div>
        <?php endif;?>

    </div>
    <div id="comments">
        <?php $this->need('comments.php'); ?>
    </div>
    <div id="footer">
        <?php $this->need('footer.php'); ?>
    </div>
</body>
</html>