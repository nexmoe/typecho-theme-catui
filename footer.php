<?php 
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->footer(); 
?>
<div class="btn-top btn fa fa-angle-up btn-raised"></div>
<div class="footer">
    <div class="copyright container">&copy; <?php echo date("Y");?> <?php $this->options->title(); ?></div>
</div>
<script src="//cdn.bootcss.com/highlight.js/9.9.0/highlight.min.js"></script>
<script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="<?php $this->options->themeUrl('js/material.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/ripples.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/main.js'); ?>"></script>
<?php if (!empty($this->options->OtherTool) && in_array('smoothscroll', $this->options->OtherTool)): ?>
<script src="<?php $this->options->themeUrl('js/SmoothScroll.js'); ?>"></script>
<?php endif;?>
<?php $this->options->tongji(); ?>
