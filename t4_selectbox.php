<?php
include('func/config.php');
include('func/function.php');

function tbl_to_option($tbl,$label_col,$id_col,$fid_col){
	$fields=',
      {
       name: "'.$fid_col.'", 
    type: "select", 
    items: [';
	
	$fields.='{ Name: "", Id: \'\' },';
	
	$tbl2arr=table_to_array1($tbl);
	for($k=0;$k<count($tbl2arr)-1;$k++){
		$fields.='{ Name: "'.$tbl2arr[$k][$label_col].'", Id: \''.$tbl2arr[$k][$id_col].'\' },';
	}
	$fields.='{ Name: "'.$tbl2arr[$k][$label_col].'", Id: \''.$tbl2arr[$k][$id_col].'\' },';
	
	$fields.='
    ], 
    valueField: "Id", 
    textField: "Name", 
    validate: "required"
      }';
	return $fields;
}

//http://localhost/php_grid/t2/t4_selectbox.php?tbl=tt_tralua_v2
if(isset($_GET['tbl'])){
	$tbl=$_GET['tbl'];
	$urlajax='fetch_data_pg_autogen_selectbox.php?tbl='.$tbl;
	
	$ftablearr=array();	
	$b=table_to_ftable($tbl);
	for($i=0;$i<count($b);$i++){
		echo $foreign_table_name=$b[$i]['foreign_table_name'];
		echo ' | ';
		echo $column_name=$b[$i]['column_name'];
		echo ' | ';
		echo $foreign_column_name=$b[$i]['foreign_column_name'];
		echo '<br>';
		
		$ftablearr[$i]['foreign_table_name']=$foreign_table_name;
		$ftablearr[$i]['column_name']=$column_name;
		$ftablearr[$i]['foreign_column_name']=$foreign_column_name;		
		//$ftablearr=array_push_assoc($ftablearr,'duration',$duration);
	}
	//echo $ftablearr[1]['foreign_table_name'];
	
	include('inc1.php');
	include('inc2.php');
}
?>