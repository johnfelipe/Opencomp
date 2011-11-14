<?php echo $this->element('listes_nav'); ?>

<div class="periods index">

	<?php
	echo $this->Html->link(
	    '<span class="plus icon"></span>'.__('Ajouter une période scolaire',true),
	    array('controller'=>'periods', 'action'=>'add'),
	    array('class'=>'primary button positive', 'escape' => false)
	);
	?>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('begin', __('Période'));?></th>
			<th><?php echo __('Année scolaire', true) ?></th>
			<th><?php echo __('Établissement', true) ?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($periods as $period):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $this->Time->format("d/m/Y",$period['Period']['begin']).' à '.$this->Time->format("d/m/Y",$period['Period']['end']);?>&nbsp;</td>
		<td><?php echo $period['Year']['title'] ?></td>
		<td><?php echo $period['Establishment']['name'] ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('Éditer', true), array('action' => 'edit', $period['Period']['id'])); ?>
			<?php echo $this->Html->link(__('Supprimer', true), array('action' => 'delete', $period['Period']['id']), null, sprintf(__('Êtes vous sûr(e) de vouloir supprimer la période scolaire %s ?\nCette opération ne peut pas être annulée.', true), $this->Time->format("d/m/Y",$period['Period']['begin']).' à '.$this->Time->format("d/m/Y",$period['Period']['end']))); ?> 

			<!-- $period['Period']['begin'].' à '.$period['Period']['end'])); ?> -->
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% sur %pages%, affichage de %current% enregistrements sur %count% au total, démarrage à l\'enregistrement %start%, fin à l\'enregistrement %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('précédent', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('suivant', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
