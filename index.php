<?php 
/** 
  * Cat UI 情托于物。人情冷暖，世态炎凉。
  * @package Cat UI 
  * @author 折影轻梦 
  * @version 2.0
  * @link http://i.chainwon.com/ 
*/ 
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('head.php'); 
?>
<body>
    <div id="header">
        <?php $this->need('header.php'); ?>
    </div>
    <div id="content">
        <div class="item-list">
            <div class="container">
            <?php while($this->next()): ?>
                <div class="item">
                    <a href="<?php $this->permalink() ?>"><?php Cover($this->cid,$this->fields->Cover); ?></a>
                    <article>
                        <?php $this->content('更多'); ?>
                    </article>
                </div>
            <?php endwhile; ?>
            <?php $this->pageNav(); ?>
            </div>
        </div>
    </div>
    <div id="footer">
        <?php $this->need('footer.php'); ?>
    </div>
</body>
</html>