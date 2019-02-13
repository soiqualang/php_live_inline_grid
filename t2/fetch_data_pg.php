<?php
include('login/config.php');
include('login/function.php');

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET'){
 $first_name=$_GET['first_name'];
 $last_name=$_GET['last_name'];
 $age=$_GET['age'];
 $gender=$_GET['gender'];
 
 $where='1=1';
 if($first_name!=''){
	$where.=' AND first_name ILIKE \'%'.$first_name.'%\'';
 }
 if($last_name!=''){
	$where.=' AND last_name ILIKE \'%'.$last_name.'%\'';
 }
 if($age!=''){
	$where.=' AND age ILIKE \'%'.$age.'%\'';
 }
 if($gender!=''){
	$where.=' AND gender ILIKE \'%'.$gender.'%\'';
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

if($method == 'PUT')
{
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

if($method == "DELETE")
{
 parse_str(file_get_contents("php://input"), $_DELETE);
 
 $table='sample_data';
 $id=$_DELETE['id'];
 
 Delete($table,'id',$id); 
}

?>
