<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout.' | Opencomp'; ?>
	</title>
    
    <?php
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('bootstrap-responsive');
		echo $this->Html->css('datepicker');
		echo $this->Html->css('font-awesome');
		echo $this->Html->css('../js/chosen/chosen.css');
		echo $this->Html->css('jstree');
		echo $this->Html->css('custom');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	   <script type="text/javascript" charset="utf-8" src="http://cdn.sencha.io/ext-4.1.0-gpl/ext-all.js"></script>
    
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav icon -->
    <?php echo $this->Html->meta('icon'); ?>
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Opencomp <sub>αlpha</sub></a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><?php echo $this->Html->link('<i class="icon-dashboard"></i> '.__('Synthèse'), '/dashboard', array('escape' => false)); ?></li>
              <li><?php echo $this->Html->link('<i class="icon-list"></i> '.__('Académies'), '/academies', array('escape' => false)); ?></li>
              <li><?php echo $this->Html->link('<i class="icon-user"></i> '.__('Utilisateurs'), '/users', array('escape' => false)); ?></li>
              <li><?php echo $this->Html->link('<i class="icon-cogs"></i> '.__('Paramètres'), '/settings', array('escape' => false)); ?></li>
            </ul>
            <ul class="nav pull-right">
	            <li class="dropdown">
	              <?php $first_name = $this->Session->read('Auth.User.first_name'); 
	              		$name = $this->Session->read('Auth.User.name'); ?>
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> <?php echo($first_name.' '.$name); ?> <b class="caret"></b></a>
	              <ul class="dropdown-menu">
	                <li><?php echo $this->Html->link('<i class="icon-edit"></i> '.__('Mon compte'), '/users/account', array('escape' => false)); ?></li>
	                <li><?php echo $this->Html->link('<i class="icon-signout"></i> '.__('Se déconnecter'), '/users/logout', array('escape' => false)); ?></li>
	              </ul>
	            </li>
	        </ul>
          </div><!--/.nav-collapse -->           
        </div>
      </div>
    </div>

    <div class="container">
    
        <?php echo $this->Session->flash(); ?>   
        <?php echo $this->fetch('content'); ?>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <?php echo $this->Html->script(array('jquery.js', 'chosen/chosen.jquery.min.js', 'bootstrap-dropdown.js', 'bootstrap-alert.js', 'bootstrap-modal.js', 'bootstrap-datepicker.js', 'bootstrap-tab.js', 'bootstrap-transition.js', 'less-1.3.0.min.js', 'jquery.jstree', 'custom.js')); ?>
    
    <!--
    <script src="../js/bootstrap-transition.js"></script>
    <script src="../js/bootstrap-alert.js"></script>
    <script src="../js/bootstrap-modal.js"></script>
    <script src="../js/bootstrap-scrollspy.js"></script>
    <script src="../js/bootstrap-tab.js"></script>
    <script src="../js/bootstrap-tooltip.js"></script>
    <script src="../js/bootstrap-popover.js"></script>
    <script src="../js/bootstrap-button.js"></script>
    <script src="../js/bootstrap-collapse.js"></script>
    <script src="../js/bootstrap-carousel.js"></script>
    <script src="../js/bootstrap-typeahead.js"></script>
    -->

  </body>
</html>
