<div class="nav">
        <a<?php if($this->is('index')): ?> class="a"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e( '首页'); ?></a>
    <?php $this->widget('Widget_Metas_Category_List')->to($mates); ?>
    <?php while($mates->next()): ?>
        <a<?php if($this->is('category', $mates->name)): ?> class="a"<?php endif; ?> href="<?php $mates->permalink(); ?>" title="<?php $mates->name(); ?>"><?php $mates->name(); ?></a>
    <?php endwhile; ?>
    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
    <?php while($pages->next()): ?>
        <a<?php if($this->is('page', $pages->slug)): ?> class="a"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
    <?php endwhile; ?>
    <?php if($this->user->hasLogin()):?>
    <a href="<?php $this->options->siteUrl(); ?>admin" title="后台" target="_blank">后台</a>
    <?php endif;?>
    <form class="search" method="post" action="./" role="search">
        <input type="search" placeholder="搜索╮(￣▽￣)╭" name="s" class="search-input" value="">
        <button type="submit" class="search-button flat-icon-light waves-effect waves-circle waves-light" data-ripple=""><i class="fa fa-search"></i>
        </button>
    </form>
</div>
<header>
    <div class="bg"></div>
    <?php if (!empty($this->options->logoUrl2)): ?> 
    <a href="<?php $this->options->siteUrl(); ?>author/1/" tooltip="<?php $this->options->title(); ?>" flow="left">
            <img src="<?php $this->options->logoUrl();?>">
    </a>
    <a href="<?php $this->options->siteUrl(); ?>" class="hlove">
        <div class="love flat-icon waves-effect waves-circle"><i class="fa fa-heart"></i>
        </div>
    </a> 
    <a href="<?php $this->options->siteUrl(); ?>author/<?php $this->options->girlid();?>/" tooltip="<?php girlname(); ?>" flow="right">
            <img src="<?php $this->options->logoUrl2();?>">
    </a>
    <?php else: ?> 
    <a href="<?php $this->options->siteUrl(); ?>" tooltip="<?php $this->options->title(); ?>" flow="left"><img src="<?php $this->options->logoUrl();?>"></a>
    <div class="user">
         <h1><?php $this->options->title() ?></h1>
         <p><?php $this->options->description() ?></p>
    </div>
    <?php endif;?>
    <div class="ear ear-l flat-icon waves-effect waves-circle"></div>
    <div class="ear ear-r flat-icon waves-effect waves-circle"></div>
</header>