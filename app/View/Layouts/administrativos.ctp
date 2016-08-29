<!DOCTYPE html>
<html>
	<head>
		<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">-->
		<title>DUOC - Portal de Rankeo de Experiencias - BACKEND</title>
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=9">
		<?php						
			echo $this->Html->meta('icon');					
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');	
			echo $this->Html->script('jquery-1.12.1.min.js');	
			echo $this->Html->script('semantic/semantic.js');
			echo $this->Html->script('alerta.js');
			echo $this->Html->css('semantic.css');
			echo $this->Html->css('style-admin-2016.css');
			echo $this->Html->css('alerta.css');
		?>				
		<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,600,700,300' rel='stylesheet' type='text/css'>
		<!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
	</head>
	<body>
		<div class="page-wrap">
			<header id="header" class="ui center aligned grid">			
					<?php echo $this->Html->image('logo.png');?>
			</header>		
			<div class="ui aligned container grid">
				<div class="ui column">		
					<?php 
						$usuario = $this->Session->read('Auth');
						if (!empty($usuario['User'])){
							echo $this->element('menu'); 
						}
					?>
				</div>
			</div>
			<div class="ui aligned container grid body-content">
					<div class="ui gruid column">
						<div class="ui row">
							<?php echo $this->Session->flash(); ?>
							<?php echo $this->fetch('content'); ?>
						</div>
					</div>
			</div>			
			</div>
		</div>
		<footer class="site-footer ui grid center aligned">
			<?php echo $this->Html->image('acreditado.png');?>		
		</footer>
		<div class="ui grid">
			<?php //echo $this->element('sql_dump'); ?>
		</div>
	</body>
	<script>
		$('.ui.dropdown')
		  .dropdown()
		;
		$('.ui.rating')
		  .rating()	  
		;
		$('#flashMessage').transition('pulse')
		;
	</script>
</html>