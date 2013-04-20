<div class="page-title">
    <h2><?php echo __('Visualiser une classe'); ?></h2>
    <?php echo $this->Html->link('<i class="icon-pencil"></i> '.__('modifier'), 'edit/'.$classroom['Classroom']['id'], array('class' => 'ontitle btn btn-primary', 'escape' => false)); ?>
    <?php echo $this->Html->link('<i class="icon-arrow-left"></i> '.__('établissement de la classe'), '/establishments/view/'.$classroom['Establishment']['id'], array('class' => 'ontitle btn', 'escape' => false)); ?>
</div>

<div class="row">
    <div class="span6">
        <div class="well">
        	<dl class="dl-horizontal">
        		<dt><?php echo __('Nom de la classe'); ?></dt>
        		<dd>
        			<?php echo h($classroom['Classroom']['title']); ?>
        			&nbsp;
        		</dd>
        		<dt><?php echo __('Enseignant titulaire'); ?></dt>
        		<dd>
        			<?php echo $this->Html->link('<i class="icon-user"></i> '.$classroom['User']['first_name'].' '.$classroom['User']['name'], array('controller' => 'users', 'action' => 'view', $classroom['User']['id']), array('escape' => false)); ?>
        			&nbsp;
        		</dd>
        		<dt><?php echo __('Établissement'); ?></dt>
        		<dd>
        			<?php echo $this->Html->link('<i class="icon-home"></i> '.$classroom['Establishment']['name'], array('controller' => 'establishments', 'action' => 'view', $classroom['Establishment']['id']), array('escape' => false)); ?>
        			&nbsp;
        		</dd>
        		<dt><?php echo __('Année scolaire'); ?></dt>
        		<dd>
        			<?php echo h($classroom['Year']['title']); ?>
        			&nbsp;
        		</dd>
           	</dl>
        </div>
    </div>
    <div class="span6">
        <div class="page-title">
            <h3><?php echo __('Intervenants de cette classe'); ?></h3>
        </div>
        
        <?php if (!empty($classroom['User'][1])): ?>
		<table class="table table-striped table-condensed">
		<tr>
			<th><?php echo __('Identifiant'); ?></th>
			<th><?php echo __('Prénom'); ?></th>
			<th><?php echo __('Nom'); ?></th>
			<th><?php echo __('Rôle'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($classroom['User'] as $user): 
			if(is_array($user)): ?>		
				<tr>
					<td><?php echo $user['username']; ?></td>
					<td><?php echo $user['first_name']; ?></td>
					<td><?php echo $user['name']; ?></td>
					<td><?php echo $user['role']; ?></td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
						<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
					</td>
				</tr>
			<?php endif; ?>
		<?php endforeach; ?>
		</table>
		<?php else: ?>
		<div class="alert alert-info">
	    	<i class="icon-info-sign"></i> Vous pouvez associer un utilisateur existant à cette classe en la <a href="/Opencomp/classrooms/edit/<?php echo $classroom['Classroom']['id']; ?>">modifiant</a>.
	    </div>
		<?php endif; ?>
        
    </div>  
</div>

<ul class="nav nav-pills">
  <li><?php echo $this->Html->link(__('Élèves'), array('controller' => 'classrooms', 'action' => 'view', $classroom['Classroom']['id'])); ?></li>
  <li><?php echo $this->Html->link(__('Évaluations'), array('controller' => 'classrooms', 'action' => 'viewtests', $classroom['Classroom']['id'])); ?></li>
  <li><?php echo $this->Html->link(__('Items non évalués'), array('controller' => 'classrooms', 'action' => 'viewunrateditems', $classroom['Classroom']['id'])); ?></li>
  <li class="active"><?php echo $this->Html->link(__('Bulletins'), array('controller' => 'classrooms', 'action' => 'viewreports', $classroom['Classroom']['id'])); ?></li>
</ul>

<div class="page-title">
    <h3><?php echo __('Génération de').' "'.$report['Report']['title'].'" '.__('en cours ...'); ?></h3>
	    <?php //echo $this->Html->link('<i class="icon-magic"></i> '.__('Tout générer'), '#', array('class' => 'ontitle btn btn-primary', 'escape' => false, 'onclick' => 'ajaxcall(0)')); ?>
</div>

<script type="text/javascript">
	var tab = $.parseJSON(<?php echo $pupils; ?>);
	
	function ajaxcall(i){
		$("#progress").removeClass('bar-success bar-danger');
    	if (i < tab.pupils.length) {
    		$("#progress").css({"width":tab.pourcent[i]+"%"});
    		$("#progress").html(tab.pourcent[i]+"%");
    		$.ajax({ 
			    type: "GET",
			    url: "/Opencomp/results/bul/output_type:pdf/output_engine:dompdf/pupil_id:"+tab.pupils[i]+"/report_id:"+tab.report_id, 
			    error: function() { 
			      $("#progress").addClass('bar-danger');
			      $("#progress").css('width','100%');
			      $("#progress").html("<p style='color:white;'>Ooops ! Une erreur est survenue lors de la génération :'(</p>");
			    }, 
			    success: function() { 
			      ajaxcall(i + 1);	
			    } 
			}); 
		}else{
			$("#bar").addClass('progress-striped active');
			$.ajax({ 
			    type: "POST",
			    url: "/Opencomp/results/concat_bul",
			    data: tab,
			    complete: function(){
			    	$("#bar").removeClass('progress-striped active');
			    	$("#progress").addClass('bar-success');
			    	$("#progress").html("<a style='color:white;' href='../download/filename:"+tab.classroom_id+"_"+tab.period_id.replace(",","")+".pdf'>Si le téléchargement n'a pas démarré automatiquement, cliquez ici pour télécharger le fichier généré.</a>");
			    	window.location.href = "../download/filename:"+tab.classroom_id+"_"+tab.period_id.replace(",","")+".pdf";
			    } 
			});
		}    	
	}
	
	$(document).ready(function(){
	   ajaxcall(0);
	});
	    	
</script>

<div class="row">
	<div class="span12">
		<div id="bar" class="progress">
		  <div id="progress" class="bar" style="width: 0%;"></div>
		</div>
	</div>
</div>