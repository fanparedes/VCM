<!DOCTYPE html>
<html lang="es">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <?php
            echo $this->Html->script('jquery-1.10.2.min.js');   
            echo $this->Html->script('jquery-migrate-1.2.1.min.js');   
            echo $this->Html->script('jquery-ui.js');   
            echo $this->Html->script('bootstrap.min.js');   
            echo $this->Html->script('bootstrap-hover-dropdown.js');      
            echo $this->Html->script('alerta.js');      
    echo $this->Html->css('font-awesome.min.css'); 
    echo $this->Html->css('bootstrap.min.css'); 
    echo $this->Html->css('animate.css'); 
    echo $this->Html->css('all.css'); 
    echo $this->Html->css('main.css'); 
    echo $this->Html->css('style-responsive.css'); 
    echo $this->Html->css('alerta.css'); 
    ?>
</head>
<body style="background:# CCC;">

            <?php echo $this->Flash->render(); ?>

            <?php echo $this->fetch('content'); ?>
</body>
</html>