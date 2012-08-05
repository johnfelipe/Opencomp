<div class="page-title">
    <h2><?php echo __('Générer bulletin'); ?></h2>
</div>

<?php echo $this->Tree->generate($stuff, array('element' => 'competences_bul'));  ?>