<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
$textarea = Helper::options()->commentsHTMLTagAllowed;
function threadedComments($comments, $options) {
    $commentClass = '站外';
    if ($comments->authorId) {
        if($comments->authorId == $comments->ownerId) {
            $commentClass = '作者';
        }elseif($comments->authorId == 1){
            $commentClass = '站长';
        }else{
            $commentClass = '站内';
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
    $depth = $comments->levels +1;
    if ($comments->url) {
        $author = '<a href="'.$comments->url.'"target="_blank" rel="external nofollow" tooltip="'.$comments->author.'">'.$comments->author.'</a>';
    } else {
        $author = $comments->author;
    }
?>
<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
if ($depth > 1 && $depth < 3) {
    echo ' comment-child ';
    $comments->levelsAlt('comment-level-odd', ' comment-level-even');
}
else if( $depth > 2){
    echo ' comment-child2';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
}
else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
?>">
    <div id="<?php $comments->theId(); ?>">
         <?php
            $host = '//cdn.v2ex.com';
            $url = '/gravatar/';
            $size = '100';
            $rating = Helper::options()->commentsAvatarRating;
            $hash = md5(strtolower($comments->mail));
            $email = strtolower($comments->mail);
            $sjtx = Typecho_Widget::widget('Widget_Options')->motx;
            $qq = str_replace('@qq.com','',$email);
            if(strstr($email,"qq.com") && is_numeric($qq)){
              $avatar = '//q.qlogo.cn/g?b=qq&nk='.$qq.'&s=100';
            }else{
              $avatar = $host.$url.$hash.'?s='.$size.'&r='.$rating.'&d='.$sjtx;
            }
        ?>
        <div class="comment-view" onclick="">
            <div class="comment-header">
                <a href="<?php echo $comments->url; ?>"target="_blank" rel="external nofollow"><img class="avatar" src="<?php echo $avatar ?>"></a>
            </div>
            <div class="comment-content">
                <div class="comment-meta">
                    <span class="comment-author"><i class="fa fa-user"></i> <?php echo $author; ?></span>
                    <span class="comment-time" tooltip="<?php $comments->date('Y-m-d H:i:s A'); ?>"><i class="fa fa-clock-o"></i> <?php $comments->date('n月j日'); ?></span>
                    <span class="comment-reply" tooltip="回复"><?php $comments->reply('<i class="fa fa-reply"></i> 回复'); ?></span>
                </div>
                <p>
                <?php 
                getCommentAt($comments->coid);
                $cos = preg_replace('#\@\((.*?)\)#','<img src="/usr/themes/catui/newpaopao/$1.png" class="biaoqing">',$comments->content);
                $cos1 = preg_replace('#<p>#','',$cos);
                $cos2 = preg_replace('#</p>#','',$cos1);
                echo $cos2;
                ?>
                </p>
            </div>
        </div>
    </div>
    <?php if ($comments->children) { ?>
        <div class="comment-children">
            <?php $comments->threadedComments($options); ?>
        </div>
    <?php } ?>
</li>
<?php } ?>
<div class="container">
    <?php $this->comments()->to($comments); ?>
    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>
    	<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            <div id="response">
                <textarea name="text" id="textarea" placeholder='允许使用的HTML标签：<?php echo $textarea; ?>' required><?php $this->remember('text'); ?></textarea>
                <div class="comment-form-toolbar"><i class="fa fa-smile-o" onclick="Smilies.showBox;"></i></div>
                <button type="submit" class="fa fa-send btn btn-raised"></button>
            </div>
            <div class="OwO-body" id="OwO">
            <?php
            $OwOArray=array ("@(二哈)"=>"newpaopao/二哈","@(柴犬)"=>"newpaopao/柴犬","@(柴犬不高兴)"=>"newpaopao/柴犬不高兴","@(柴犬再见)"=>"newpaopao/柴犬再见","@(柴犬哭)"=>"newpaopao/柴犬哭","@(柴犬舔舌头)"=>"newpaopao/柴犬舔舌头","@(柴犬耍帅)"=>"newpaopao/柴犬耍帅","@(柴犬大嘴)"=>"newpaopao/柴犬大嘴","@(呵呵)"=>"newpaopao/呵呵","@(哈哈)"=>"newpaopao/哈哈","@(吐舌)"=>"newpaopao/吐舌","@(太开心)"=>"newpaopao/太开心","@(笑眼)"=>"newpaopao/笑眼","@(花心)"=>"newpaopao/花心","@(小乖)"=>"newpaopao/小乖","@(乖)"=>"newpaopao/乖","@(捂嘴笑)"=>"newpaopao/捂嘴笑","@(滑稽)"=>"newpaopao/滑稽","@(你懂的)"=>"newpaopao/你懂的","@(不高兴)"=>"newpaopao/不高兴","@(怒)"=>"newpaopao/怒","@(汗)"=>"newpaopao/汗","@(黑线)"=>"newpaopao/黑线","@(泪)"=>"newpaopao/泪","@(真棒)"=>"newpaopao/真棒","@(喷)"=>"newpaopao/喷","@(惊哭)"=>"newpaopao/惊哭","@(阴险)"=>"newpaopao/阴险","@(鄙视)"=>"newpaopao/鄙视","@(酷)"=>"newpaopao/酷","@(啊)"=>"newpaopao/啊","@(狂汗)"=>"newpaopao/狂汗","@(what)"=>"newpaopao/what","@(疑问)"=>"newpaopao/疑问","@(酸爽)"=>"newpaopao/酸爽","@(呀咩爹)"=>"newpaopao/呀咩爹","@(委屈)"=>"newpaopao/委屈","@(惊讶)"=>"newpaopao/惊讶","@(睡觉)"=>"newpaopao/睡觉","@(笑尿)"=>"newpaopao/笑尿","@(挖鼻)"=>"newpaopao/挖鼻","@(吐)"=>"newpaopao/吐","@(犀利)"=>"newpaopao/犀利","@(小红脸)"=>"newpaopao/小红脸","@(懒得理)"=>"newpaopao/懒得理","@(勉强)"=>"newpaopao/勉强","@(爱心)"=>"newpaopao/爱心","@(心碎)"=>"newpaopao/心碎","@(玫瑰)"=>"newpaopao/玫瑰","@(礼物)"=>"newpaopao/礼物","@(彩虹)"=>"newpaopao/彩虹","@(太阳)"=>"newpaopao/太阳","@(星星月亮)"=>"newpaopao/星星月亮","@(钱币)"=>"newpaopao/钱币","@(茶杯)"=>"newpaopao/茶杯","@(蛋糕)"=>"newpaopao/蛋糕","@(大拇指)"=>"newpaopao/大拇指","@(胜利)"=>"newpaopao/胜利","@(haha)"=>"newpaopao/haha","@(OK)"=>"newpaopao/OK","@(沙发)"=>"newpaopao/沙发","@(手纸)"=>"newpaopao/手纸","@(香蕉)"=>"newpaopao/香蕉","@(便便)"=>"newpaopao/便便","@(药丸)"=>"newpaopao/药丸","@(红领巾)"=>"newpaopao/红领巾","@(蜡烛)"=>"newpaopao/蜡烛","@(音乐)"=>"newpaopao/音乐","@(灯泡)"=>"newpaopao/灯泡",);
            foreach($OwOArray as $x=>$x_value){
            $x = "'".$x."'";
            echo '<a onclick="Smilies.grin('.$x.');"><img src="'.$this->options->themeUrl($x_value).'.png"></a>';
            }
            ?>
            </div>
            <?php if($this->user->hasLogin()): ?>
            <?php else: ?>
            <div class="comment-form-author">
    		    <input type="text" name="author" id="author" class="text" placeholder="称呼" value="<?php $this->remember('author'); ?>" required />
    		    <input type="email" name="mail" id="mail" class="text" placeholder="Email" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
    		    <input type="url" name="url" id="url" class="text" placeholder="http://" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
    		</div>
            <?php endif; ?>
    	</form>
    </div>
    
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
    
    <?php $comments->listComments(); ?>

    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    
    <?php endif; ?>
</div>
