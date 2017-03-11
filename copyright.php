<?php if (!empty($this->options->OtherTool) && in_array('footercopyright', $this->options->OtherTool)): ?>
<div class="t-copyright">
    <div class="info flat-icon waves-effect waves-circle">&copy; <?php echo date( "Y");?> <?php $this->options->title() ?></div>
    <div class="cattail flat-icon waves-effect waves-circle"></div>
</div>
<?php endif;?>