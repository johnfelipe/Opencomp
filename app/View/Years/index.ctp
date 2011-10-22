<?php echo $this->element('listes_nav'); ?>

<?php
echo $this->Html->link(
    '<span class="plus icon"></span>'.__('Ajouter une année scolaire'),
    array('controller'=>'years', 'action'=>'add'),
    array('class'=>'button positive primary', 'escape' => false)
);
?>

<br /><br />

<div class="years index">
<table cellpadding="0" cellspacing="0">
    <tr>
            <th><?php echo $this->Paginator->sort(__('Nom',true),'title');?></th>
            <th class="actions"><?php __('Modifier');?></th>
            <th class="actions"><?php __('Supprimer');?></th>
    </tr>
    <?php
    $i = 0;
    foreach ($years as $y):
        $class = null;
        if ($i++ % 2 == 0) {
            $class = ' class="altrow"';
        }
    ?>
    <tr<?php echo $class;?>>
        <td><?php echo $y['Year']['title']; ?>&nbsp;</td>
        <td>
            <?php echo $this->Html->link(__('Editer', true), array('action' => 'edit', $y['Year']['id'])); ?>
        </td>
        <td>
<?php echo $this->Html->link(__('Supprimer', true), array('action' => 'delete', $y['Year']['id']), null, sprintf(__('Êtes vous sûr(e) de vouloir supprimer l\'année scolaire %s ?\nCette opération ne peut pas être annulée.', true), $y['Year']['title'].' '.$y['Year']['id'])); ?>
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
        <?php echo $this->Paginator->prev('<span class="leftarrow icon"></span>' . __('précédent', true), array('escape'=>false, 'tag'=>'button class="button left" style="padding-bottom:8px;"', 'separator'=>''), null, array('escape'=>false, 'tag'=>'button class="button left" style="padding-bottom:8px;"'));
        echo $this->Paginator->numbers(array('tag'=>'button class="button middle" style="padding-bottom:8px;"', 'escape' => false, 'separator'=>''));
        echo $this->Paginator->next(__('suivant', true) . '       <span class="rightarrow icon"></span>', array('escape'=>false, 'tag'=>'button class="button right" style="padding-bottom:8px;"'), null, array('escape'=>false, 'tag'=>'button class="button right" style="padding-bottom:8px;"'));?>
    </div>
</div>
