<?php
App::uses('AppModel', 'Model');
/**
 * School Model
 *
 */
class Permiso extends AppModel {

/**
 * Display field
 *
 * @var string
 */

	var $useTable = 'ACL';	

	public function acl_check($controller, $action, $role) {
		$verifica = false;
		
		//sleep(2);
		
		/*$permitido[0] = array('controller' => 'activities', 'action' => 'agrega_comentario', 'usuario' => 'Administrativo');
		$permitido[1] = array('controller' => 'activities', 'action' => 'revisar', 'usuario' => 'Administrativo');
		$permitido[2] = array('controller' => 'activities', 'action' => 'exporta_pdf_ficha', 'usuario' => 'Administrativo');
		$permitido[3] = array('controller' => 'activities', 'action' => 'add', 'usuario' => 'Usuario');
		$permitido[4] = array('controller' => 'activities', 'action' => 'edit', 'usuario' => 'Usuario');
		$permitido[5] = array('controller' => 'activities', 'action' => 'agrega_entidad', 'usuario' => 'Usuario');
		$permitido[6] = array('controller' => 'activities', 'action' => 'agrega_hito', 'usuario' => 'Usuario');
		$permitido[7] = array('controller' => 'activities', 'action' => 'agrega_obj_esp', 'usuario' => 'Usuario');
		$permitido[8] = array('controller' => 'activities', 'action' => 'delete_ajax', 'usuario' => 'Usuario');
		$permitido[9] = array('controller' => 'activities', 'action' => 'delete_ent_ajax', 'usuario' => 'Usuario');
		$permitido[10] = array('controller' => 'activities', 'action' => 'evaluate', 'usuario' => 'Usuario');
		$permitido[11] = array('controller' => 'activities', 'action' => 'evaluate_sel', 'usuario' => 'Usuario');
		$permitido[12] = array('controller' => 'activities', 'action' => 'ficha', 'usuario' => 'Usuario');
		$permitido[13] = array('controller' => 'activities', 'action' => 'listado', 'usuario' => 'Usuario');
		$permitido[14] = array('controller' => 'activities', 'action' => 'listado_ajax', 'usuario' => 'Usuario');
		$permitido[15] = array('controller' => 'home', 'action' => 'usuario', 'usuario' => 'Usuario');
		$permitido[16] = array('controller' => 'home', 'action' => 'buscar', 'usuario' => 'Usuario');
		$permitido[17] = array('controller' => 'home', 'action' => 'paginate_normal', 'usuario' => 'Usuario');
		$permitido[18] = array('controller' => 'home', 'action' => 'paginate_sin_enviar', 'usuario' => 'Usuario');
		$permitido[19] = array('controller' => 'home', 'action' => 'paginate_sin_ev', 'usuario' => 'Usuario');
		$permitido[20] = array('controller' => 'milestones', 'action' => 'delete_ajax', 'usuario' => 'Usuario');
		$permitido[21] = array('controller' => 'objetives', 'action' => 'delete_ajax', 'usuario' => 'Usuario');
		$permitido[22] = array('controller' => 'reviews', 'action' => 'add', 'usuario' => 'Usuario');
		$permitido[23] = array('controller' => 'usuarios', 'action' => 'logout', 'usuario' => 'Usuario');
		$permitido[24] = array('controller' => 'usuarios', 'action' => 'logout', 'usuario' => 'Administrativo');
		$permitido[25] = array('controller' => 'home', 'action' => 'administrativo', 'usuario' => 'Administrativo');
		$permitido[26] = array('controller' => 'activities', 'action' => 'listado', 'usuario' => 'Administrativo');
		$permitido[27] = array('controller' => 'activities', 'action' => 'listado_ajax', 'usuario' => 'Administrativo');
		$permitido[28] = array('controller' => 'activities', 'action' => 'ficha', 'usuario' => 'Administrativo');
		$permitido[29] = array('controller' => 'home', 'action' => 'admin', 'usuario' => 'Admin');
		$permitido[30] = array('controller' => 'usuarios', 'action' => 'logout', 'usuario' => 'Admin');
		$permitido[31] = array('controller' => 'usuarios', 'action' => 'gestion', 'usuario' => 'Admin');
		$permitido[32] = array('controller' => 'usuarios', 'action' => 'importar_usuario', 'usuario' => 'Admin');
		$permitido[33] = array('controller' => 'usuarios', 'action' => 'perfilar', 'usuario' => 'Admin');
		$permitido[34] = array('controller' => 'beginnings', 'action' => 'add', 'usuario' => 'Admin');
		$permitido[35] = array('controller' => 'beginnings', 'action' => 'edit', 'usuario' => 'Admin');
		$permitido[36] = array('controller' => 'beginnings', 'action' => 'index', 'usuario' => 'Admin');
		$permitido[37] = array('controller' => 'entities', 'action' => 'add', 'usuario' => 'Admin');
		$permitido[38] = array('controller' => 'entities', 'action' => 'edit', 'usuario' => 'Admin');
		$permitido[39] = array('controller' => 'entities', 'action' => 'index', 'usuario' => 'Admin');
		$permitido[40] = array('controller' => 'internals', 'action' => 'add', 'usuario' => 'Admin');
		$permitido[41] = array('controller' => 'internals', 'action' => 'edit', 'usuario' => 'Admin');
		$permitido[42] = array('controller' => 'internals', 'action' => 'index', 'usuario' => 'Admin');
		$permitido[43] = array('controller' => 'externals', 'action' => 'add', 'usuario' => 'Admin');
		$permitido[44] = array('controller' => 'externals', 'action' => 'edit', 'usuario' => 'Admin');
		$permitido[45] = array('controller' => 'externals', 'action' => 'index', 'usuario' => 'Admin');
		$permitido[46] = array('controller' => 'areas', 'action' => 'add', 'usuario' => 'Admin');
		$permitido[47] = array('controller' => 'areas', 'action' => 'edit', 'usuario' => 'Admin');
		$permitido[48] = array('controller' => 'areas', 'action' => 'index', 'usuario' => 'Admin');
		$permitido[49] = array('controller' => 'scopes', 'action' => 'add', 'usuario' => 'Admin');
		$permitido[50] = array('controller' => 'scopes', 'action' => 'edit', 'usuario' => 'Admin');
		$permitido[51] = array('controller' => 'scopes', 'action' => 'index', 'usuario' => 'Admin');
		$permitido[52] = array('controller' => 'centrals', 'action' => 'add', 'usuario' => 'Admin');
		$permitido[53] = array('controller' => 'centrals', 'action' => 'edit', 'usuario' => 'Admin');
		$permitido[54] = array('controller' => 'centrals', 'action' => 'index', 'usuario' => 'Admin');
		$permitido[55] = array('controller' => 'activities', 'action' => 'exportar_excel', 'usuario' => 'Administrativo');
		$permitido[56] = array('controller' => 'activities', 'action' => 'exportar_pdf', 'usuario' => 'Administrativo');
		$permitido[57] = array('controller' => 'activities', 'action' => 'delete', 'usuario' => 'Usuario');
		$permitido[58] = array('controller' => 'activities', 'action' => 'exportar_excel_ficha', 'usuario' => 'Administrativo');
		$permitido[59] = array('controller' => 'activities', 'action' => 'exportar_pdf', 'usuario' => 'Usuario');
		$permitido[60] = array('controller' => 'activities', 'action' => 'exportar_excel', 'usuario' => 'Usuario');
		$permitido[61] = array('controller' => 'activities', 'action' => 'exporta_pdf_ficha', 'usuario' => 'Usuario');
		$permitido[62] = array('controller' => 'activities', 'action' => 'exportar_excel_ficha', 'usuario' => 'Usuario');
		$permitido[63] = array('controller' => 'activities', 'action' => 'exportar_pdf_ficha', 'usuario' => 'Administrativo');
		$permitido[64] = array('controller' => 'activities', 'action' => 'viewpdf', 'usuario' => 'Administrativo');
		$permitido[65] = array('controller' => 'activities', 'action' => 'viewpdf', 'usuario' => 'Usuario');
		$permitido[66] = array('controller' => 'home', 'action' => 'exportar_estadistica', 'usuario' => 'Administrativo');*/

		
		$permiso = $this->find('first', array(
				'conditions' => array(
					'Permiso.controller' => $controller,
					'Permiso.action' => $action,
					'Permiso.action <>' => 'sso',
					'Permiso.role' => $role,
					'Permiso.allow' => 1
					)
			));

		if(is_array($permiso) && count($permiso)>0){
			$verifica = true;
		}else{
			
			//var_dump($permiso);
		}

		/*$file = fopen($this->webroot."log_session.txt", "a");
		fwrite($file, "=====================LOG SESSION ".date("d/m/Y H:i:s")."================================" . PHP_EOL);
		fwrite($file, "Controller: ".$controller . PHP_EOL);
		fwrite($file, "Action: ".$action . PHP_EOL);
		fwrite($file, "Role: ".$role . PHP_EOL);
		fwrite($file, "Retorna: ".$verifica . PHP_EOL);
		fwrite($file, "Arreglo: ".($permiso) . PHP_EOL);
		fwrite($file, "========================================================================================" . PHP_EOL);
		fclose($file);*/
		
		return $verifica;

	}
}
