<div class="academies index">
<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort(__('Nom',true),'name');?></th>
			<th><?php echo $this->Paginator->sort(__('Type',true),'name');?></th>
			<th class="actions"><?php __('Modifier');?></th>
			<th class="actions"><?php __('Supprimer');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($academies as $a):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $a['Academy']['name']; ?>&nbsp;</td>
		<td><?php if ($a['Academy']['type'] == 0) {echo 'Académie';} else {echo 'Sous rectorat';} ?>&nbsp;</td>                
           
		<td>
			<?php // echo $this->Html->link(__('Voir', true), array('action' => 'view', $a['Academy']['id'])); ?>
			<?php echo $this->Html->link(__('Editer', true), array('action' => 'edit', $a['Academy']['id'])); ?>
		</td>
		<td>
<?php echo $this->Html->link(__('Supprimer', true), array('action' => 'delete', $a['Academy']['id']), null, sprintf(__('Êtes vous sûr(e) de vouloir supprimer l\'academie %s ?\nCette opération ne peut pas être annulée.', true), $a['Academy']['name'].' '.$a['Academy']['id'])); ?>
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
		<?php echo $this->Paginator->prev('<span class="leftarrow icon"></span>' . __('précédent', true), array('escape'=>false, 'tag'=>'button class="button left" style="padding-bottom:8px;"', 'separator'=>''), null, array('escape'=>false, 'tag'=>'button class="button left" style="padding-bottom:8px;"'));
		echo $this->Paginator->numbers(array('tag'=>'button class="button middle" style="padding-bottom:8px;"', 'escape' => false, 'separator'=>'')); 
		echo $this->Paginator->next(__('suivant', true) . '       <span class="rightarrow icon"></span>', array('escape'=>false, 'tag'=>'button class="button right" style="padding-bottom:8px;"'), null, array('escape'=>false, 'tag'=>'button class="button right" style="padding-bottom:8px;"'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Lister les academies', true), array('action' => 'index'));?></li>	
                <li><?php echo $this->Html->link(__('Nouvelle academie', true), array('controller' => 'academies', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Supprimer une academie', true), array('action' => 'delete', $this->Form->value('establishment.id')), null, sprintf(__('Etes-vous sure de vouloir supprimer cette academie # %s?', true), $this->Form->value('establishment.id'))); ?></li>
	</ul>
</div>
