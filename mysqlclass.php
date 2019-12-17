<?php

/*
define ("R",""); //Clave
define ("M",""); //Usuario
define ("E",""); //Bd
define ("N",""); //Servidor

define ("R",""); //Clave
define ("M",""); //Usuario
define ("E",""); //Bd
define ("N",""); //Servidor

*/

define ("R",""); //Clave
define ("M",""); //Usuario
define ("E",""); //Bd
define ("N",""); //Servidor


// Clase para realizar la conexion con la BD MySql
class ConexionBd {

	function open(){  
		if(!isset($this->conexion)){  
			$this->conexion = (mysqli_connect(N,M,R,E));  
			if (!$conexion) {
				echo mysqli_connect_error();
			}
		}  
	}   
	
	// Realiza las consultas a la Base de Datos
	function doSelect($strSelect,$strFrom,$strWhere=null,$strGroupBy=null,$strOrderBy=null) {
		$db = new ConexionBd();  
		$db->open();
		$consulta = isset($strSelect) ? "SELECT $strSelect" : "";
		$consulta .= isset($strFrom) ? " FROM $strFrom" : "";
		$consulta .= (isset($strWhere) and (strcmp($strWhere,"") != 0)) ? " WHERE $strWhere" : "";
		$consulta .= isset($strGroupBy) ? " GROUP BY $strGroupBy" : "";
		$consulta .= isset($strOrderBy) ? " ORDER BY $strOrderBy" : "";
		$consulta .= ";";	

		$resultado = $db->consulta($consulta);	
		$row =array();

		while ($rowq = mysqli_fetch_assoc($resultado)) {
	        $row[] = $rowq;	
	    }

		return $row;
	}
	

	function doInsert($strInsertInto,$strValues) {
		$db = new ConexionBd();  
		$db->open();
		$consulta = isset($strInsertInto) ? "INSERT INTO ".$strInsertInto : "";
		$consulta .= isset($strValues) ? " VALUES ($strValues);" : ";";
		$resultado = $db->consulta($consulta);	
		
		return $resultado;
	}
	
	function doUpdate($strUpdate,$strSet,$strWhere=null) {
		$db = new ConexionBd();  
		$db->open();
		
		$consulta = isset($strUpdate) ? "UPDATE $strUpdate" : "";
		$consulta .= isset($strSet) ? " SET $strSet" : "";
		$consulta .= isset($strWhere) ? " WHERE $strWhere" : "";
		$consulta .= ";";
		$resultado = $db->consulta($consulta);	
		
		return $resultado;
	}
	
	function doDelete($strDeleteFrom,$strWhere=null) {
		$db = new ConexionBd();  
		$db->open();
		
		$consulta = isset($strDeleteFrom) ? "DELETE FROM $strDeleteFrom" : "";
		$consulta .= isset($strWhere) ? " WHERE $strWhere" : "";
		$consulta .= ";";
		$resultado = $db->consulta($consulta);	
		
		return $resultado;
	}

	public function consulta($consulta){

		$resultado = mysqli_query($this->conexion, $consulta);

		if(!$resultado){  		
			echo 'MySQL Error: ' . mysqli_error($this->conexion).' favor reportar al administrador del sistema<br>'.$consulta;  
			exit;  
		}  
		return $resultado;   
	}  

	public function fetch_array($consulta){   
		return mysql_fetch_array($consulta);  
	}  
	
	public function num_rows($consulta){   
		return mysql_num_rows($consulta);  
	}  

	public function getTotalConsultas(){  
		return $this->total_consultas;  
	}

	public function close(){ 
		if ($this->conexion){ 
			return mysqli_close($this->conexion); 
		} 
	}  

}

?>
