<?php
    header('Content-Type: application/force-download');
    header('Content-Disposition: attachment; filename=ficha.xls');
    header('Content-Transfer-Encoding: binary');
?>
<?php echo $this->fetch('content'); ?>
