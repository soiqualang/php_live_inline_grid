<?php
include('func/config.php');
include('func/function.php');

$method = $_SERVER['REQUEST_METHOD'];

if(isset($_GET['tbl'])){
	$tbl=$_GET['tbl'];
	//$cols=array_keys($_REQUEST);	
	
	//Select
	if($method == 'GET'){
		$cols=array_keys($_GET);
		$where='1=1';
		for($j=0;$j<count($cols);$j++){			
			$col=$cols[$j];
			if($col=='id'){
				continue;
			}elseif($col=='tbl'){
				continue;
			}else{
				$val=$_GET[$col];
				if($val!=''){
					$where.=' AND '.$col.' ILIKE \'%'.$val.'%\'';
				}
			}			
		}
		
		$table=$_GET['tbl'];
		$col_order='id';
		$order='DESC';
		
		$result=table_to_arraydkcustom($table,$where,$col_order,$order);
		
		$res='[';
		
		foreach($result as $row){			
			/* $output[]=array();
			$output=array_push_assoc($output,'id',$row['id']);
			$output=array_push_assoc($output,'first_name',$row['first_name']);
			$output=array_push_assoc($output,'last_name',$row['last_name']);
			$output=array_push_assoc($output,'age',$row['age']);
			$output=array_push_assoc($output,'gender',$row['gender']); */
			
			/* $output[] = array(
				'id'    => $row['id'],
				'first_name'  => $row['first_name'],
				'last_name'   => $row['last_name'],
				'age'    => $row['age'],
				'gender'   => $row['gender']
			); */
			
			//$res.=json_encode($row).',';
		}
		for($k=0;$k<count($result)-1;$k++){
			$res.=json_encode($result[$k]).',';
		}
		$res.=json_encode($result[$k]);
		
		$res.=']';
		header("Content-Type: application/json");
		//echo json_encode($output);
		echo $res;
	}
	
	//Insert
	if($method == "POST"){
		$cols=array_keys($_POST);
		$field=array();
		$value=array();
		for($j=0;$j<count($cols);$j++){			
			$col=$cols[$j];
			if($col=='id'){
				continue;
			}elseif($col=='tbl'){
				continue;
			}else{				
				$val=$_POST[$col];
				array_push($field,$col);
				array_push($value,$val);
			}			
		}		
		$table=$_GET['tbl'];
		insert_table($table,$field,$value);
	}
	
	//Update
	if($method == 'PUT'){
		parse_str(file_get_contents("php://input"), $_PUT);
		$cols=array_keys($_PUT);
		$field=array();
		$value=array();
		for($j=0;$j<count($cols);$j++){
			$col=$cols[$j];
			if($col=='id'){
				continue;
			}elseif($col=='tbl'){
				continue;
			}else{
				$val=$_PUT[$col];				
				array_push($field,$col);
				array_push($value,$val);
			}			
		}
		$table=$_GET['tbl'];		
		$id=$_PUT['id'];
		update_table($table,$field,$value,'id',$id);
	}
	
	//Delete
	if($method == "DELETE"){
		parse_str(file_get_contents("php://input"), $_DELETE);
		$table='sample_data';
		$id=$_DELETE['id'];
		Delete($table,'id',$id);
	}
}
?>
