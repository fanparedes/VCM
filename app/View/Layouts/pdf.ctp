<?php
	header('Content-Disposition: attachment; filename="ficha_'.date("d-m-Y").'.pdf"');
	//header("Content-type: application/pdf"); 
    echo $content_for_layout;
?>