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

            //echo $this->Html->css('bootstrap.min.css');
            echo $this->Html->css('animate.css');
            echo $this->Html->css('all.css');
            echo $this->Html->css('style-responsive.css');
            echo $this->Html->css('zabuto_calendar.min.css');
            echo $this->Html->css('jquery.news-ticker.css');
            echo $this->Html->css('jquery.dataTables.css');
            echo $this->Html->css('alerta.css');


            echo $this->Html->css('stars/star-rating.css');
            echo $this->Html->css('stars/theme-krajee-fa.css');
            echo $this->Html->css('stars/theme-krajee-svg.css');
            echo $this->Html->css('stars/theme-krajee-uni.css');

            echo $this->Html->css('style_paginate.css');
            echo $this->Html->css('jplist-custom.css');
            echo $this->Html->css('main.css');

            echo $this->Html->script('jquery-1.10.2.min.js');
            echo $this->Html->script('jquery-migrate-1.2.1.min.js');
            echo $this->Html->script('jquery-ui.js');
            echo $this->Html->script('bootstrap.min.js');
            echo $this->Html->script('bootstrap-hover-dropdown.js');
            echo $this->Html->script('html5shiv.js');
            echo $this->Html->script('respond.min.js');
            echo $this->Html->script('jquery.metisMenu.js');
            echo $this->Html->script('jquery.slimscroll.js');
            echo $this->Html->script('jquery.cookie.js');
            echo $this->Html->script('icheck.min.js');
            echo $this->Html->script('custom.min.js');
            echo $this->Html->script('jquery.news-ticker.js');
            echo $this->Html->script('jquery.menu.js');
            echo $this->Html->script('pace.min.js');
            echo $this->Html->script('holder.js');
            echo $this->Html->script('responsive-tabs.js');
            echo $this->Html->script('jquery.flot.js');
            echo $this->Html->script('jquery.flot.categories.js');
            echo $this->Html->script('jquery.flot.pie.js');

            echo $this->Html->script('alerta.js');


			echo $this->Html->script('jquery.paginate.js');
			echo $this->Html->script('stars/star-rating.js');


            echo $this->Html->script('jquery.flot.tooltip.js');
            echo $this->Html->script('jquery.flot.fillbetween.js');
            echo $this->Html->script('jquery.flot.stack.js');
            echo $this->Html->script('jquery.flot.spline.js');



            echo $this->Html->script('zabuto_calendar.min.js');
            echo $this->Html->script('index.js');
            echo $this->Html->script('highcharts.js');
            echo $this->Html->script('data.js');
            echo $this->Html->script('drilldown.js');
            echo $this->Html->script('exporting.js');
            echo $this->Html->script('highcharts-more.js');
            echo $this->Html->script('charts-highchart-pie.js');
            echo $this->Html->script('charts-highchart-more.js');
            echo $this->Html->script('modernizr.min.js');
            echo $this->Html->script('jplist.min.js');
            echo $this->Html->script('jplist.js');
            echo $this->Html->script('bootstrap-multiselect.js');
            echo $this->Html->script('jquery.dataTables.js');


            echo $this->Html->script('main.js');

echo $this->Html->css('jquery-ui-1.10.4.custom.min.css');



        ?>

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
