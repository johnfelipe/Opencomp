<div class="levels index">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort(__('Nom',true),'title');?></th>
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
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nouveau niveau', true), array('action' => 'add')); ?></li>
	</ul>
</div>
