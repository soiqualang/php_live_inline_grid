<?php
include('login/config.php');
include('login/function.php');

$method = $_SERVER['REQUEST_METHOD'];

if(isset($_GET['tbl'])){
	$tbl=$_GET['tbl'];
	$cols=array_keys($_REQUEST);	
	
	if($method == 'GET'){
		$where='1=1';
		for($j=0;$j<count($cols);$j++){			
			$col=$cols[$j];
			$val=$_GET[$col];
			if($col=='id'){
				continue;
			}elseif($col=='tbl'){
				continue;
			}else{
				if($val!=''){
					$where.=' AND '.$col.' ILIKE \'%'.$val.'%\'';
				}
			}			
		}
		
		//echo $where;
		
		$table='sample_data';
		$col_order='id';
		$order='DESC';

		$result=table_to_arraydkcustom($table,$where,$col_order,$order);

		foreach($result as $row){
		$output[] = array(
		'id'    => $row['id'],   
		'first_name'  => $row['first_name'],
		'last_name'   => $row['last_name'],
		'age'    => $row['age'],
		'gender'   => $row['gender']
		);
		}
		header("Content-Type: application/json");
		echo json_encode($output);
	}
	
	if($method == "POST"){
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$age=$_POST['age'];
		$gender=$_POST['gender'];

		$field=array('first_name','last_name','age','gender');
		$value=array($first_name,$last_name,$age,$gender);
		$table='sample_data';

		insert_table($table,$field,$value);
	}

	if($method == 'PUT'){
		parse_str(file_get_contents("php://input"), $_PUT);

		$id=$_PUT['id'];
		$first_name=$_PUT['first_name'];
		$last_name=$_PUT['last_name'];
		$age=$_PUT['age'];
		$gender=$_PUT['gender'];

		$field=array('first_name','last_name','age','gender');
		$value=array($first_name,$last_name,$age,$gender);

		$table='sample_data';

		update_table($table,$field,$value,'id',$id);
	}

	if($method == "DELETE"){
		parse_str(file_get_contents("php://input"), $_DELETE);

		$table='sample_data';
		$id=$_DELETE['id'];

		Delete($table,'id',$id);
	}
}
?>
