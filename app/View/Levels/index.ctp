<?php echo $this->element('listes_nav'); ?>

<div class="levels index">

	<div id="message_information" class="message information">
	    <strong class="title_information"><?php echo __('Information',true); ?></strong>
	  <div class="message_texte">
	  	<?php echo __('Dans Opencomp, les niveaux scolaires et les classes ne correspondent pas à la même chose.', true); ?>
	  	<br /><br />
	  	<?php echo __('Un niveau scolaire appartient à un cycle d\'apprentissage et définit une année bien précise de la scolarité d\'un élève.', true); ?>
	  	<br />
	  	<?php echo __('À la différence, une classe est un groupe d\'élèves pouvant posséder plusieurs niveaux scolaires différents (exemple des classes à double niveaux).', true); ?>
	  </div>
	</div>

	<?php
	echo $this->Html->link(
	    '<span class="plus icon"></span>'.__('Ajouter un niveau scolaire',true),
	    array('controller'=>'levels', 'action'=>'add'),
	    array('class'=>'primary button positive', 'escape' => false)
	);
	?>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort(__('Nom',true),'title');?></th>
			<th><?php echo $this->Paginator->sort(__('Cycle',true),'cycle_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($levels as $level):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $level['Level']['title']; ?>&nbsp;</td>
		<td><?php echo $level['Cycle']['title']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editer', true), array('action' => 'edit', $level['Level']['id'])); ?>
			<?php echo $this->Html->link(__('Supprimer', true), array('action' => 'delete', $level['Level']['id']), null, sprintf(__('Êtes vous sûr(e) de vouloir supprimer le niveau %s ?\nCette opération ne peut pas être annulée.', true), $level['Level']['title'])); ?>
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
