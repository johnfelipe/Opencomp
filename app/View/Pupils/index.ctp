<div class="pupils index">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort(__('Nom',true),'name');?></th>
			<th><?php echo $this->Paginator->sort(__('Prénom',true),'first_name');?></th>
			<th><?php echo $this->Paginator->sort(__('Sexe',true),'sexe');?></th>
			<th><?php echo $this->Paginator->sort(__('Date de naissance',true),'birthday');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pupils as $pupil):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $pupil['Pupil']['name']; ?>&nbsp;</td>
		<td><?php echo $pupil['Pupil']['first_name']; ?>&nbsp;</td>
		<td><?php echo $pupil['Pupil']['sex']; ?>&nbsp;</td>
		<td><?php echo $pupil['Pupil']['birthday']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Voir', true), array('action' => 'view', $pupil['Pupil']['id'])); ?>
			<?php echo $this->Html->link(__('Editer', true), array('action' => 'edit', $pupil['Pupil']['id'])); ?>
			<?php echo $this->Html->link(__('Supprimer', true), array('action' => 'delete', $pupil['Pupil']['id']), null, sprintf(__('Êtes vous sûr(e) de vouloir supprimer l\'élève %s ?\nCette opération ne peut pas être annulée.', true), $pupil['Pupil']['first_name'].' '.$pupil['Pupil']['name'])); ?>
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
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nouvel élève', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Lister les classes', true), array('controller' => 'classrooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvelle classe', true), array('controller' => 'classrooms', 'action' => 'add')); ?> </li>
	</ul>
</div>