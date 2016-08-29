<?php

$user = 'rramirezr';
$pass = 'Febrero.2016';
echo 'hola';



 	$name = 'LdapAdministrativo';
	$direccion = LDAP_ADMINISTRATIVO;
	$puerto = 389;
	$ds = null;

	echo 'hola2';
		echo '<br>';
		echo var_dump($user);
		echo var_dump($pass);
		
		$ldap_response = array(
			'username' => null, #null o rut sin digito verificador
			'status' => '', #success o error
			'mensaje' => '' #ok o mensaje de error
		);
		
		echo var_dump($ldap_response);
		
		try{
			
			$ds = ldap_connect($direccion,$puerto);
			echo var_dump($ds);
	
			ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
			ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);
			
				
			if($r=@ldap_bind($ds,$user."@duoc.cl",$pass)){
				
		       	$sradm=ldap_search($ds,"DC=duoc,DC=cl", "(sAMAccountName=".$user.")");
		       	$info = ldap_get_entries($ds, $sradm);
		       	if(!$r || empty($info)){
					$ldap_response = array(
						'username' => $user,
						'status' => 'error', #success o error
						'mensaje' => 'Usuario o contraseña incorrectos.' #ok o mensaje de error
					);
		       	}else{
		       		$ldap_response = array(
						'username' => $user,
						'status' => 'success', #success o error
					);
		       	}
			}else{
				#error final
				$ldap_response = array(
					'username' => $user,
					'status' => 'error', #success o error
					'mensaje' => 'Problema de conexión' #ok o mensaje de error
				);
			}
		}catch(Exception $e){
			$ldap_response = array(
				'username' => $user,
				'status' => 'error', #success o error
				'mensaje' => 'Hubo un error en la conexión, favor intente más tarde' #ok o mensaje de error
			);
		}

	 echo '<br><br>';
echo var_dump($ldap_response);

?>