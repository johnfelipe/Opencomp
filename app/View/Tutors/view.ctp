<div class="tutors view">
<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $a['Tutor']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nom'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $a['Tutor']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Prénom'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $a['Tutor']['first_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Adresse'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $a['Tutor']['address']; ?>
			&nbsp;
		
                </dl>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Code Postal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $a['Tutor']['postcode']; ?>
			&nbsp;
                </dl>
                
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ville'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $a['Tutor']['town']; ?>
			&nbsp;
                 </dl>
                 
                 <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tél'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $a['Tutor']['tel']; ?>
			&nbsp;
                 </dl>
                 
                 <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tél2'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $a['Tutor']['tel2']; ?>
			&nbsp;
                 </dl>
                 
                 <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('E-mail'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $a['Tutor']['email']; ?>
			&nbsp;
                 </dl>
                 
                 <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $a['Tutor']['notes']; ?>
			&nbsp;
                 </dl>
                 
                 
                 
                 
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editer ce responsable légal', true), array('action' => 'edit', $a['Academie']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Supprimer ce resonsable légal', true), array('action' => 'delete', $a['Academie']['id']), null, sprintf(__('Voulez-vous vraiment supprimé cette academie # %s?', true), $a['Academie']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Lister les responsables légaux', true), array('action' => 'index'));?></li>	
                <li><?php echo $this->Html->link(__('Nouveau responsable légaux', true), array('controller' => 'academies', 'action' => 'add')); ?> </li>
                
	</ul>






</div>
