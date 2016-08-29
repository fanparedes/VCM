<?php
App::uses('AppModel', 'Model');

class Blog extends AppModel {

    private function inicia_conexion (){

        $user = "bb_select_desa";
        $pss = "BBS3L3CTD34SA";
        $db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = desarrollocursos.duoc.cl)(PORT=1521)))(CONNECT_DATA=(SID=BBDEV)))";

        $conn = oci_connect($user, $pss, $db, 'AL32UTF8');
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
            echo "Error conexión";
        }else {
            return $conn;
        }
    }

    public function traeDatos (){

        $sql = "select SYSTEM_ROLE, USER_ID, FIRSTNAME, LASTNAME, EMAIL, LAST_LOGIN_DATE from BB_BB60.USERS
where USER_ID = (select USER_ID from BB_BB60.SESSIONS
where MD5 = 'B0B7954B843598B53B9743BE1083BC32')";
        $conn = $this->inicia_conexion();
        $consulta = oci_parse($conn, $sql);
        //echo $consulta;

        oci_execute($consulta);
        $fila = oci_fetch_assoc($consulta);
        $total = oci_num_rows($consulta);

        //var_dump($fila);

        return $fila;

          /*if ($total>0) {
            do {
              echo $fila['USER_ID']."<br />";
            } while ($fila=oci_fetch_assoc($consulta));
          }*/
    }


}