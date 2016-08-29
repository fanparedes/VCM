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
<script>var siteurl= "<?php echo $abs_base ?>";</script>

</head>
<body>
    <div>
       
        <!--TOP-->
        <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
        <!--TOP-->
               <!--TOPBAR-->
        <div id="header-topbar-option-demo" class="page-header-topbar">
            <nav id="topbar" role="navigation" style="margin-bottom: 0; background:#00253d;" class="navbar navbar-default navbar-static-top">
            <div class="navbar-header" style="background:#00253d;">
                <?php $rol = $this->Session->read('Auth.User.role');
				$rol = strtolower($rol); ?>
                <a id="logo" href="<?php echo $this->webroot.'home/'.$rol;?>" class="navbar-brand" style="overflow: hidden;"><span class="fa fa-rocket"></span><img src="<?php echo $abs_base;?>images/logo_int.png" style="margin-top:-10px;"/><span style="display: none" class="logo-text-icon">µ</span></a></div>
            <div class="topbar-main" style="background:#00253d;">
                
                <ul class="nav navbar navbar-top-links navbar-right mbn" style=" background:#00253d;">
                    <li class="dropdown topbar-user" style=" margin-top: 6px;">
                        <a data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="false" href="#" class="dropdown-toggle">&nbsp;<span class="hidden-xs">

                        <?php
                        $nombre_usuario = $this->Session->read('Auth.User.nombre');
                        $apellidos_usuario = $this->Session->read('Auth.User.apellidos');
                        $nombre = $nombre_usuario.' '.$apellidos_usuario;
                        echo $nombre;
                        ?>

                        </span>&nbsp;</a> 

                        <ul class="dropdown-menu" style="width: 70px; color: white; background-color: #bf4346;">
                            <li><a style="color: white;" tabindex="-1" href="<?php echo $abs_base;?>usuarios/logout"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</a></li>

                        </ul>                        
                    </li>

                </ul>

            </div>
            </nav>
        </div>
           <?php

           $perfil = $this->Session->read('Auth.User.role');
           ?>
        <div id="wrapper">
           
<nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
                data-position="right" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">
                    
                     <div class="clearfix"></div>
<?php
    
    $controlador = $this->params['controller'];
    $accion = $this->params['action'];
?>
                   <?php 
                   if ($perfil == 'Usuario') { ?>
                        <li
                        <?php 
                        if($accion == 'usuario') { ?>
                        class="active"
                        <?php } ?>
                        >
                            <a href="<?php echo $abs_base;?>home/usuario">
                            <i class="fa fa-file-o fa-fw">
                                <div class="icon-bg bg-yellow"></div>
                            </i>
                            <span class="menu-title">Home</span>
                            </a>
                            <div >
                                <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;"></div>
                            </div>
                        </li>

                        <li
                        <?php 
                        if(($accion == 'add') and ($controlador == 'activities')) { ?>
                        class="active"
                        <?php } ?>
                        ><a href="<?php echo $abs_base;?>activities/add"><i class="fa fa-file-o fa-fw">
                            <div class="icon-bg bg-yellow"></div>
                            </i><span class="menu-title">Registra una nueva actividad</span></a>
                        </li>
                        <li
                        <?php 
                        if(($accion == 'evaluate_sel') or ($accion == 'evaluate')) { ?>
                        class="active"
                        <?php } ?>

                        >
                            <a href="<?php echo $abs_base;?>activities/evaluate_sel"><i class="fa fa-tachometer fa-fw">
                            <div class="icon-bg bg-orange"></div>
                            </i><span class="menu-title">Registro de Resultados</span></a>
                        </li>
                    
                    <?php } ?>          

                 <?php 
                   if ($perfil == 'Administrativo') { ?>
                     <li
                        <?php 
                        if($accion == 'administrativo') { ?>
                        class="active"
                        <?php } ?>
                        >
                        <a href="<?php echo $abs_base;?>home/administrativo">
                            <i class="fa fa-home"></i>
                            <span class="menu-title"> Home</span>
                        </a>
                            <div >
                                <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;"></div>
                            </div>
                    </li>
                        <li
                        <?php 
                        if($accion == 'listado') { ?>
                        class="active"
                        <?php } ?>
                        >
                            <a href="<?php echo $abs_base;?>activities/listado">
                            <i class="fa fa-file-o fa-fw">
                                <div class="icon-bg bg-yellow"></div>
                            </i>
                            <span class="menu-title">Actividades Duoc UC</span>
                            </a>
                        </li>
                    <?php } ?>  

                 <?php 
                   if ($perfil == 'Admin') { ?>
                     <li
                        <?php 
                        if($accion == 'admin') { ?>
                        class="active"
                        <?php } ?>
                     >
                        <a href="<?php echo $abs_base;?>home/admin">
                            <i class="fa fa-home"></i>
                            <span class="menu-title"> Home</span>
                        </a>
                            <div >
                                <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;"></div>
                            </div>
                    </li>

                        <li
                        <?php 
                        if($controlador == 'usuarios') { ?>
                        class="active"
                        <?php } ?>
                        >
                            <a href="<?php echo $abs_base;?>usuarios/gestion">
                            <i class="fa fa-user fa-fw">
                                <div class="icon-bg bg-yellow"></div>
                            </i>
                            <span class="menu-title">Gestionar Perfiles</span>
                            </a>
                        </li>

                        <li
                        <?php 
                        if($controlador == 'beginnings') { ?>
                        class="active"
                        <?php } ?>
                        >
                            <a href="<?php echo $abs_base;?>beginnings/index">
                            <i class="fa fa-bullseye fa-fw">
                                <div class="icon-bg bg-yellow"></div>
                            </i>
                            <span class="menu-title">Gestionar Principios</span>
                            </a>
                        </li>

                        <li
                        <?php 
                        if($controlador == 'entities') { ?>
                        class="active"
                        <?php } ?>
                        >
                            <a href="<?php echo $abs_base;?>entities/index">
                            <i class="fa fa-building fa-fw">
                                <div class="icon-bg bg-yellow"></div>
                            </i>
                            <span class="menu-title">Gestionar Entidades</span>
                            </a>
                        </li>

                        <li
                        <?php 
                        if($controlador == 'internals') { ?>
                        class="active"
                        <?php } ?>
                        >
                            <a href="<?php echo $abs_base;?>internals/index">
                            <i class="fa fa-angle-double-down fa-fw">
                                <div class="icon-bg bg-yellow"></div>
                            </i>
                            <span class="menu-title">Gestionar P. Interno</span>
                            </a>
                        </li>

                        <li
                        <?php 
                        if($controlador == 'externals') { ?>
                        class="active"
                        <?php } ?>
                        >
                            <a href="<?php echo $abs_base;?>externals/index">
                            <i class="fa fa-angle-double-up fa-fw">
                                <div class="icon-bg bg-yellow"></div>
                            </i>
                            <span class="menu-title">Gestionar P. Externo</span>
                            </a>
                        </li>

                        <li
                        <?php 
                        if($controlador == 'areas') { ?>
                        class="active"
                        <?php } ?>
                        >
                            <a href="<?php echo $abs_base;?>areas/index">
                            <i class="fa fa-cube fa-fw">
                                <div class="icon-bg bg-yellow"></div>
                            </i>
                            <span class="menu-title">Gestionar Areas</span>
                            </a>
                        </li>

                        <li
                        <?php 
                        if($controlador == 'scopes') { ?>
                        class="active"
                        <?php } ?>
                        >
                            <a href="<?php echo $abs_base;?>scopes/index">
                            <i class="fa fa-flash fa-fw">
                                <div class="icon-bg bg-yellow"></div>
                            </i>
                            <span class="menu-title">Gestionar Ambitos</span>
                            </a>
                        </li>

                        <li
                        <?php 
                        if($controlador == 'centrals') { ?>
                        class="active"
                        <?php } ?>
                        >
                            <a href="<?php echo $abs_base;?>centrals/index">
                            <i class="fa fa-circle fa-fw">
                                <div class="icon-bg bg-yellow"></div>
                            </i>
                            <span class="menu-title">Gestionar Areas Centrales</span>
                            </a>
                        </li>







                    <?php } ?>  
                    
                     <li><a target="_blank" href="http://www.duoc.cl/info/POLITICA-DE-VINCULACION-CON-EL-MEDIO.pdf"><i class="fa fa-gear fa-fw">
                        
                       <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Política de vinculación con el medio</span></a>
                      <div class="col-md-12">
                        <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;"></div>
                      </div>
                      
                    </li>
                    
                </ul>
            </div>
        </nav>
          
          
          
          <div id="page-wrapper">



            <?php echo $this->Flash->render(); ?>

            <?php echo $this->fetch('content'); ?>
                
            </div>
            <!--END PAGE WRAPPER-->
      </div>
    </div>


<script type="text/javascript">
 $(document).ready(function() {
  $('#example-getting-started').multiselect();
   });
 </script>
</body>


</html>

