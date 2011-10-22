<div class="establishments index">
    <table cellpadding="0" cellspacing="0">
    <tr>
            <th><?php echo $this->Paginator->sort(__('Nom',true),'name');?></th>
            <th><?php echo $this->Paginator->sort(__('Adresse',true),'address');?></th>
            <th><?php echo $this->Paginator->sort(__('Code postal',true),'postcode');?></th>
            <th><?php echo $this->Paginator->sort(__('Ville',true),'town');?></th>
            <th><?php echo $this->Paginator->sort(__('Académie',true),'academy_id');?></th>
            <th class="actions"><?php __('Actions');?></th>
    </tr>
    <?php
    $i = 0;
    foreach ($establishments as $e):
        $class = null;
        if ($i++ % 2 == 0) {
            $class = ' class="altrow"';
        }
    ?>
    <tr<?php echo $class;?>>
        <td><?php echo $e['Establishment']['name']; ?>&nbsp;</td>
        <td><?php echo $e['Establishment']['address']; ?>&nbsp;</td>
        <td><?php echo $e['Establishment']['postcode']; ?>&nbsp;</td>
        <td><?php echo $e['Establishment']['town']; ?>&nbsp;</td>
        <td><?php echo $e['Academy']['name']; ?>&nbsp;</td>
        <td class="actions">
            <?php echo $this->Html->link(__('Editer', true), array('action' => 'edit', $e['Establishment']['id'])); ?>
            <?php echo $this->Html->link(__('Supprimer', true), array('action' => 'delete', $e['Establishment']['id']), null, sprintf(__('Êtes vous sûr(e) de vouloir supprimer l\'établissement %s ?\nCette opération ne peut pas être annulée.', true), $e['Establishment']['name'])); ?>
        </td>
    </tr>
<?php endforeach; ?>
    </table>
    <p>
    <?php
    echo $this->Paginator->counter(array(
    'format' => __('Page %page% sur %pages%, affichage de %current% enregistrements sur %count% au total, démarrage à l\'enregistrement %start%, fin à l\'enregistrement %end%', true)
    ));
    ?>  </p>

    <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('précédent', true), array(), null, array('class'=>'disabled'));?>
     |  <?php echo $this->Paginator->numbers();?>
 |
        <?php echo $this->Paginator->next(__('suivant', true) . ' >>', array(), null, array('class' => 'disabled'));?>
    </div>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Nouvel établissement', true), array('action' => 'add')); ?></li>
    </ul>
</div>
