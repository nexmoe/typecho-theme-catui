<?php $this->footer(); ?>
<div id="footer">
    <div class="btn-top fa fa-angle-up float-button-light waves-effect waves-float waves-light"></div>
    <script src="//cdn.bootcss.com/highlight.js/9.9.0/highlight.min.js"></script>
    <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="<?php $this->options->themeUrl('src/js/waves.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/main.js'); ?>"></script>
    <?php if (!empty($this->options->OtherTool) && in_array('smoothscroll', $this->options->OtherTool)): ?>
    <script src="<?php $this->options->themeUrl('src/js/SmoothScroll.js'); ?>"></script>
    <?php endif;?>
    <?php $this->options->tongji(); ?>
</div>