<!DOCTYPE html>
<html lang="es">
<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.png">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">






        <?php
            echo $this->Html->meta('icon');
            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');


            echo $this->Html->css('font-awesome.min.css');
            echo $this->Html->css('bootstrap.min.css');


            echo $this->Html->script('main.js');
						echo $this->Html->css('jquery-ui-1.10.4.custom.min.css');



        ?>

        <style>
        body{
          font-family: "Open Sans",sans-serif;
          font-size: 14px;
          line-height: 16px;
          margin: 30px;
        }

        .row {
          width: 80%;
          float: left;
        }
        p {
            margin: 0 0 10px;
        }
        </style>

</head>
<body>
    <div>
        <div id="wrapper">
            <?php echo $this->Flash->render(); ?>

            <?php echo $this->fetch('content'); ?>
      </div>
  </div>
</body>


</html>
