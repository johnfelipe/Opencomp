<div class="tutors index">
<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort(__('Nom',true),'name');?></th>
			<th><?php echo $this->Paginator->sort(__('Prénom',true),'first_name');?></th>
			<th><?php echo $this->Paginator->sort(__('Adresse',true),'address');?></th>
			<th><?php echo $this->Paginator->sort(__('Code Postale',true),'postcode');?></th>
			<th><?php echo $this->Paginator->sort(__('Ville',true),'town');?></th>
                        <th><?php echo $this->Paginator->sort(__('Tél',true),'tel');?></th>
			<th><?php echo $this->Paginator->sort(__('Tél2',true),'tel2');?></th>
			<th><?php echo $this->Paginator->sort(__('E-mail',true),'email');?></th>
			<th><?php echo $this->Paginator->sort(__('Notes',true),'notes');?></th>
			
			
                        <th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($tutors as $a):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $a['Tutor']['name']; ?>&nbsp;</td>
		<td><?php echo $a['Tutor']['first_name']; ?>&nbsp;</td>
                <td><?php echo $a['Tutor']['address']; ?>&nbsp;</td>
		<td><?php echo $a['Tutor']['postcode']; ?>&nbsp;</td>
                <td><?php echo $a['Tutor']['town']; ?>&nbsp;</td>
                <td><?php echo $a['Tutor']['tel']; ?>&nbsp;</td>
                <td><?php echo $a['Tutor']['tel2']; ?>&nbsp;</td>
                <td><?php echo $a['Tutor']['email']; ?>&nbsp;</td>
                <td><?php echo $a['Tutor']['notes']; ?>&nbsp;</td>
                
                <td>
			<?php echo $this->Html->link($a['Tutor']['first_name'], array('controller' => 'tutors', 'action' => 'view', $a['Tutor']['id'])); ?>
                </td>
		<td class="actions">
			<?php echo $this->Html->link(__('Voir', true), array('action' => 'view', $a['Tutor']['id'])); ?>
			<?php echo $this->Html->link(__('Editer', true), array('action' => 'edit', $a['Tutor']['id'])); ?>
			<?php echo $this->Html->link(__('Supprimer', true), array('action' => 'delete', $a['Tutor']['id']), null, sprintf(__('Êtes vous sûr(e) de vouloir supprimer le responsable légal %s ?\nCette opération ne peut pas être annulée.', true), $a['Tutor']['name'].' '.$a['Tutor']['first_name'])); ?>
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
		<li><?php echo $this->Html->link(__('Lister les reponsables légaux', true), array('action' => 'index'));?></li>	
                <li><?php echo $this->Html->link(__('Ajouter un reponsable légal', true), array('controller' => 'tutors', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Supprimer un reponsable légal', true), array('action' => 'delete', $this->Form->value('establishment.id')), null, sprintf(__('Etes-vous sure de vouloir supprimer cette academie # %s?', true), $this->Form->value('establishment.id'))); ?></li>
	</ul>
</div>

    
    
    
    
    
