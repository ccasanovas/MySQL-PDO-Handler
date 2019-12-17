<?php
$conexion = new ConexionBd();

// Insert

$resultado = $conexion->doInsert("
			table_name
				(table_column1, table_column2, table_column3, table_column4, table_column5, table_column6, table_column7, 
				table_column8) 
			",
			"'$table_column1', '$table_column2', '$table_column3','$table_column4','$table_column5',
			'$table_column6','$table_column7','$table_column8'");



// Select

$resultado = $conexionn->doSelect("
	table_column1, table_column2, table_column3, table_column4, table_column5, 
	table_column6, table_column7, table_column8
	","table_name
	",
	"table_column1 = '0' and table_column2 = '1' ", null, "table_id desc");


// Update


$resultado = $conexion->doUpdate("table_name", 
			"						
			table_column1 = '$table_column1',
			table_column2 = '$table_column2',
			table_column3 = '$table_column3',
			table_column4 = '$table_column4',
			table_column5 = '$table_column5',
			table_column6 = '$table_column6',
			table_column7 = '$table_column7',
			table_column8 = '$table_column8'
			","table_id='$table_id'");
      
      
?>
