<?php $this->footer(); ?>
<div id="footer">
    <div class="btn-top fa fa-angle-up float-button-light waves-effect waves-float waves-light"></div>
    <script src="//cdn.bootcss.com/highlight.js/9.9.0/highlight.min.js"></script>
    <script>
    hljs.initHighlightingOnLoad();
    </script>
    <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <?php if (!empty($this->options->OtherTool) && in_array('smoothscroll', $this->options->OtherTool)): ?>
    <script src="//cdn.bootcss.com/smoothscroll/1.4.6/SmoothScroll.js"></script>
    <?php endif;?>
    <script src="<?php $this->options->themeUrl('js/main.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('src/js/waves.min.js'); ?>"></script>
    <script>
    Waves.init();
    </script>
    <script>
    $('.btn-top').toTop({
        position: false,
        offset: 700,
        speed: 500,
    });
    </script>
    <script type="text/javascript">
    var duoshuoQuery = {
        short_name: "<?php $this->options->duoshuo();?>"
    };
    (function () {
        var ds = document.createElement('script');
        ds.type = 'text/javascript';
        ds.async = true;
        ds.src = '<?php $this->options->themeUrl("js/147953076295031_embed.js"); ?>';
        ds.charset = 'UTF-8';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ds);
    })();
    </script>
    <?php $this->options->tongji(); ?></div>