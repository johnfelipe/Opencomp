<ul id="tabnav">

<?php
    if($this->params['controller'] == 'years')
        echo '<li class="active">';
    else
        echo '<li class="tab2">';
    ?>
        <?php echo $this->Html->link(__('Années scolaires',true),array(
            'controller'=>'years',
            'action'=>'index')); ?>
    </li>
<?php
    if($this->params['controller'] == 'periods')
        echo '<li class="active">';
    else
        echo '<li class="tab2">';
    ?>
        <?php echo $this->Html->link(__('Périodes scolaires',true),array(
            'controller'=>'periods',
            'action'=>'index')); ?>
    </li>
    <?php
    if($this->params['controller'] == 'cycles')
        echo '<li class="active">';
    else
        echo '<li class="tab2">';
    ?>
        <?php echo $this->Html->link(__('Cycles d\'apprentissage',true),array(
            'controller'=>'cycles',
            'action'=>'index')); ?>
    </li>
    <?php
    if($this->params['controller'] == 'levels')
        echo '<li class="active">';
    else
        echo '<li class="tab3">';

    echo $this->Html->link(__('Niveaux scolaires',true),array(
            'controller'=>'levels',
            'action'=>'index')); ?>
    </li>
</ul>