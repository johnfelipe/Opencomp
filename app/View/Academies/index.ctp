<div class="academies index">
    <div class="page-title">
        <h2><?php echo __('Académies'); ?></h2>
        <?php echo $this->Html->link('<i class="icon-plus"></i> '.__('Ajouter une académie'), 'add', array('class' => 'ontitle btn btn-success', 'escape' => false)); ?>
    </div>
	<table class="table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('id', $this->Utils->sorting_sign('id', $this->Paginator->sortKey(), $this->Paginator->sortDir()).'#', array('escape' => false)); ?></th>
			<th><?php echo $this->Paginator->sort('name', $this->Utils->sorting_sign('name', $this->Paginator->sortKey(), $this->Paginator->sortDir()).__('Nom de l\'académie'), array('escape' => false)); ?></th>
			<th><?php echo $this->Paginator->sort('type', $this->Utils->sorting_sign('type', $this->Paginator->sortKey(), $this->Paginator->sortDir()).__('Type d\'académie'), array('escape' => false)); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($academies as $academy): ?>
	<tr>
		<td><?php echo h($academy['Academy']['id']); ?></td>
		<td><?php echo h($academy['Academy']['name']); ?></td>
		<td><?php if ($academy['Academy']['type'] == 0) {echo 'Académie';} else {echo 'Sous rectorat';} ?></td>
		<td class="actions">
		    <?php echo $this->Html->link('<button class="btn btn-mini"><i class="icon-eye-open"></i> '.__('Voir').'</button>', array('action' => 'view', $academy['Academy']['id']), array('escape' => false)); ?>
			<?php echo $this->Html->link('<button class="btn btn-mini"><i class="icon-pencil"></i> '.__('Modifier').'</button>', array('action' => 'edit', $academy['Academy']['id']), array('escape' => false)); ?>
			<?php echo $this->Form->postLink('<button class="btn btn-danger btn-mini"><i class="icon-trash"></i> '.__('Supprimer').'</button>', array('action' => 'delete', $academy['Academy']['id']), array('escape' => false), __('Êtes vous sûr de vouloir supprimer # %s?', $academy['Academy']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php echo $this->element('pagination'); ?>
</div>
