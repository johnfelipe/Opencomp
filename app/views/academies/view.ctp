<div class="academies view">

  
    
<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $academy['Academy']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nom de l\'academie'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $academy['Academy']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $academy['Academy']['type']; ?>
			&nbsp;
		
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editer cette academie', true), array('action' => 'edit', $academy['Academy']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Supprimer cette academie', true), array('action' => 'delete', $academy['Academy']['id']), null, sprintf(__('Voulez-vous vraiment supprimé cette academie # %s?', true), $academy['Academy']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Lister les academies', true), array('action' => 'index'));?></li>	
                <li><?php echo $this->Html->link(__('Nouvelle academie', true), array('controller' => 'academies', 'action' => 'add')); ?> </li>
                
	</ul>






</div>
