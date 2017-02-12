<?php $this->footer(); ?>
<div id="footer">
    <div class="btn-top fa fa-angle-up float-button-light waves-effect waves-float waves-light"></div>
    <script src="//cdn.bootcss.com/highlight.js/9.9.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="<?php $this->options->themeUrl('js/main.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('src/js/waves.min.js'); ?>"></script>
    <script>
    Waves.attach('.next', ['waves-circle']);
    Waves.init();
    </script>
    <script>
        $('.btn-top').toTop({
            position: false,
            offset: 700,
            speed: 500,
        });
    </script>
    <?php $this->options->tongji(); ?>
</div>