<?php foreach ($pruebas as $prueba){ 
echo $prueba['Prueba']['nombre'];
}
?>
<?php echo $this->Form->create(); ?>
	<input type="text"></input>
	<button>Enviar</button>
<?php echo $this->Form->end(); ?>