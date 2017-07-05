<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="cat">
    <div class="fa fa-navicon nav-button btn btn-raised" id="menu-btn"></div>
    <div class="nav nav-hid" id="menu">
        <a class="logo btn" style="background-image:url(<?php $this->options->background(); ?>);" href="<?php $this->options->siteUrl(); ?>admin" title="<?php $this->options->title(); ?>" target="_blank"><img src="<?php $this->options->logoUrl();?>"></a>
        <form class="search" method="post" action="./" role="search">
            <input type="search" placeholder="搜索╮(￣▽￣)╭" name="s" value="">
            <button type="submit" class="btn" data-ripple=""><i class="fa fa-search"></i>
            </button>
        </form>
        <a class="btn" href="<?php $this->options->siteUrl(); ?>" title="首页">首页</a>
        <?php $this->widget('Widget_Metas_Category_List')->to($mates); ?>
        <?php while($mates->next()): ?>
        <a class="btn" href="<?php $mates->permalink(); ?>" title="<?php $mates->name(); ?>"><?php $mates->name(); ?></a>
        <?php endwhile; ?>
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while($pages->next()): ?>
        <a class="btn" href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
        <?php endwhile; ?>
        <?php if($this->user->hasLogin()):?>
        <?php if ($this->is('post')) : ?>
        <a class="btn" href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>" target="_blank" title="编辑">编辑</a>
        <?php endif;?>
        <?php if ($this->is('page')) : ?>
        <a class="btn" href="<?php $this->options->adminUrl(); ?>write-page.php?cid=<?php echo $this->cid;?>" target="_blank" title="编辑">编辑</a>
        <?php endif;?>
        <?php endif;?>
    </div>
</div>
<div class="header">
    <img src="<?php
    if ($this->is('post') || $this->is('page')) :
        img_postthumb($this->cid,$this->fields->Cover);
    else:
        $this->options->background();
    endif;
    ?>">
    <div class="black"></div>
</div>
<div class="post">
    <div class="container">
        <?php if ($this->is('post') || $this->is('page')) : ?>
        <h1><?php $this->title();?></h1>
        <ul class="meta">
            <li tooltip="该文章于<?php $this->date('Y'); ?>年<?php $this->date('n'); ?>月<?php $this->date('d'); ?>日最后发布"><i class="fa fa-clock-o"></i> <?php $this->date('Y'); ?>年<?php $this->date('n'); ?>月<?php $this->date('d'); ?>日</li>
            <li><i class="fa fa-comments"></i> <?php $this->commentsNum('%d'); ?> 评论</li>
            <li tooltip="该文章共有<?php art_count($this->cid); ?>个汉字"><i class="fa fa-bar-chart"></i> <?php art_count($this->cid); ?> 汉字</li>
            <li tooltip="该文章已经有<?php get_post_view($this) ?>次围观了"><i class="fa fa-eye"></i> <?php get_post_view($this) ?> 围观</li>
        </ul>
        <?php elseif($this->is('category')) : ?>
        <h1><?php echo preg_replace('#<a (.*?)>(.*?)</a>#','$2',$this->category); ?></h1>
        <p><?php echo $this->getDescription(); ?></p>
        <?php else: ?>
        <h1><?php echo $this->options->title(); ?></h1>
        <p><?php echo $this->getDescription(); ?></p>
        <?php endif; ?>
    </div>
</div>