<?php if (!empty($this->options->OtherTool) && in_array('footercopyright', $this->options->OtherTool)): ?>
<div class="t-copyright">
    <div class="info">&copy; <?php echo date( "Y");?> <?php $this->options->title() ?></div>
    <div class="cattail"></div>
</div>
<?php endif;?>