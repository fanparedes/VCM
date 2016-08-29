<?php
class _Database
{
    private static $instancia;
    private static $link;
    private static $linktmp;
    private static $host = '';
    private static $database = '';
    private static $username = '';
    private static $password = '';

    private static $connected = false;
    private static $lasterror = 100;
    const SECURITYKEY = '5ecur1tyPa$$w0rdx_';

    private static $sp;

    const DB_CONN_NOK = 100;
    const DB_CONN_NOK_DESCRIPTION = 'No conectado';
    const DB_CONN_OK = 101;
    const DB_CONN_OK_DESCRIPTION = 'Conexión correcta';
    const DB_CONN_ERROR_LOGIN = 102;
    const DB_CONN_ERROR_LOGIN_DESCRIPTION = 'Error de inicio de sesión (Usuario y/o contraseña incorrecta)';
    const DB_CONN_ERROR_DB = 103;
    const DB_CONN_ERROR_DB_DESCRIPTION = 'Error de seleccion de base de datos (Base de datos inexistente)';
    const MYDB = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = noedesa.duoc.cl)(PORT=1521)))(CONNECT_DATA=(SID=DBDESA)))";


    /**
     * Database::__construct()
     * 
     * @param mixed $host: Servidor Host de Ms SQL Server
     * @param mixed $database: Nombre de la base de datos a conectarse
     * @param mixed $username: Nombre de usuario utilizado para conectarse
     * @param mixed $password: Contraseña del usuario de conección
     * @return void
     */
    public function __construct()
    {
        self::$host = 'noedesa.duoc.cl';
        self::$database = 'COMISIONES';
        self::$username = 'ACTIVIDADES_VCM';
        self::$password = 'd3v.ac71v14@es';
				
        if (!self::isConnected())
        {
            self::$connected = (self::doConnect() == self::DB_CONN_OK) ? true : false;
        }
    }
    /**
     * Database::doConnect() Función encargada de realizar la conexión al motor de base de datos
     * 
     * @return Ultimo error producido o constante DB_CONN_OK si se realizo correctamente
     */
    protected function doConnect()
    {
        putenv('TDSVER=8.0');
        if (self::$host != '' && self::$database != '' && self::$username != '' && self::$password != '')
        {	
        	self::$link = oci_connect(self::$username, self::$password, self::MYDB);
            if (self::$link)
            {
                self::$lasterror = self::DB_CONN_OK;
                self::$connected=true;
            } else
            {
                self::$lasterror = self::DB_CONN_ERROR_LOGIN;
                self::$connected=false;
            }
        } else
        {
            self::$lasterror = self::DB_CONN_NOK;
            self::$connected=false;
        }

        return self::$lasterror;
    }
    static function doCheckConnection($username, $password){
    	if($username == "" || $password =="") return false;
    	
    	try{
			self::$linktmp = ooci_connect(self::$username, self::$password, self::MYDB);
			if(self::$linktmp)
			{
				oci_close(self::$linktmp);
				return true;
			}
			oci_close(self::$linktmp);
			return false;
		}catch(Exception $e){
			return false;
		}
		
    } 
    /**
     * Database::doDisconnect()
     * 
     * @return
     */
    protected function doDisconnect()
    {
        oci_close(self::$link);
    }
    /**
     * Database::isConnected()
     * 
     * @return
     */
    protected function isConnected()
    {
        return self::$connected;
    }
    /**
     * Database::getLastError()
     * 
     * @return
     */
    protected function getLastError()
    {
        return self::$lasterror;
    }
    /**
     * Database::getLastErrorDescription()
     * 
     * @return
     */
    public function getLastErrorDescription()
    {
        $err = '';
        switch (self::$lasterror)
        {
            case self::DB_CONN_NOK:
                $err = self::DB_CONN_NOK_DESCRIPTION;
                break;
            case self::DB_CONN_OK:
                $err = self::DB_CONN_OK_DESCRIPTION;
                break;
            case self::DB_CONN_ERROR_LOGIN:
                $err = self::DB_CONN_ERROR_LOGIN_DESCRIPTION;
                break;
            case self::DB_CONN_ERROR_DB:
                $err = self::DB_CONN_ERROR_DB_DESCRIPTION;
                break;
            default:
                $err = self::DB_CONN_NOK_DESCRIPTION;
                break;
        }
        return $err;
    }
    public function doQuery($sql, $params = array())
    {
        $data = array();
        if (!self::isConnected())
        {
            self::$connected = (self::doConnect() == self::DB_CONN_OK) ? true : false;
        }
        if(self::isConnected()){
            
	        $rs = oci_parse(self::$link, $sql);
	        oci_execute($rs);
            while ($row = oci_fetch_array($rs))
            {
                array_push($data, $row);
            }
                return $data;
        }else{
        	return false;
        }
    }
    public function doExecute($sql, $params = array()) {
    	if (!self::isConnected()) {
            self::$connected = (self::doConnect() == self::DB_CONN_OK) ? true : false;
        }
        
		if(self::$link){
	        oci_parse(self::$link, $sql);
   		}
    }
    
    public static function getInstance()
    {
        if (!self::$instancia instanceof self)
        {
            self::$instancia = new self;
        }
        return self::$instancia;
    }
}

?>