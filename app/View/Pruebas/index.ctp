<?php foreach ($pruebas as $prueba){ 
echo $prueba['Prueba']['nombre'];
}
?>
<form action="/ranking/pruebas" id="PruebaIndexForm" method="post">
	<?php echo $this->Form->input('nombre', array('value'=>$prueba['Prueba']['nombre'])); ?>
	<button>Enviar</button>
<?php echo $this->Form->end(); ?>