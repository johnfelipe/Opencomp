<div class="page-title">
        <h2><?php echo __('Compétences'); ?></h2>
    </div>

<div id="demo1" class="jstree-default">
<?php echo $this->Tree->generate($stuff, array('element' => 'competences_index'));  ?>
</div>