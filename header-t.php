<ul id="nav">
            <li>
                <a<?php if($this->is('index')): ?> class="a"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e( '首页'); ?></a>
            </li>
            
            <?php $this->widget('Widget_Metas_Category_List')->to($mates); ?>
            <?php while($mates->next()): ?>
            <li><a<?php if($this->is('category', $mates->name)): ?> class="a"<?php endif; ?> href="<?php $mates->permalink(); ?>" title="<?php $mates->name(); ?>"><?php $mates->name(); ?></a>
            </li>
            <?php endwhile; ?>
            
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
            <li><a<?php if($this->is('page', $pages->slug)): ?> class="a"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
            </li>
            <?php endwhile; ?>
            <?php if($this->user->hasLogin()):?>
            <li><a href="<?php $this->options->siteUrl(); ?>admin" title="后台" target="_blank">后台</a></li>
            <?php endif;?>
            <form class="search" method="post" action="./" role="search">
                <input type="search" placeholder="搜索╮(￣▽￣)╭" name="s" class="search-input" value="">
                <button type="submit" class="search-button flat-icon-light waves-effect waves-circle waves-light" data-ripple=""><i class="fa fa-search"></i></button>
            </form>
        </ul>
    <header>
        <div class="bg"></div>
        <a href="<?php $this->options->siteUrl(); ?>"><img src="<?php $this->options->logoUrl();?>"></a>
        <div class="user">
            <h1><?php $this->options->title() ?></h1>
            <p><?php $this->options->description() ?></p>
        </div>
        <div class="ear ear-l flat-icon waves-effect waves-circle"></div>
        <div class="ear ear-r flat-icon waves-effect waves-circle"></div>
    </header>