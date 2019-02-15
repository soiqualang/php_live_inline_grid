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
}
?>
<html>  
<head>  
<title>Inline Table Insert Update Delete in PHP using jsGrid</title>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
<style>
.hide
{
 display:none;
}
</style>
</head>  
<body>  
	<div class="container">  
<br />
<div class="table-responsive">  
<h3 align="center">Inline Table Insert Update Delete in PHP using jsGrid</h3><br />
<div id="grid_table"></div>
</div>  
</div>
</body>  
</html>  
<script>
 
    $('#grid_table').jsGrid({

     width: "100%",
     height: "600px",
     filtering: true,
     inserting:true,
     editing: true,
     sorting: true,
     paging: true,
     autoload: true,
     pageSize: 13,
     pageButtonCount: 5,
     deleteConfirm: "Do you really want to delete data?",

     controller: {
      loadData: function(filter){
       return $.ajax({
        type: "GET",
        url: "<?php echo $urlajax;?>",
        data: filter
       });
      },
      insertItem: function(item){
       return $.ajax({
        type: "POST",
        url: "<?php echo $urlajax;?>",
        data:item
       });
      },
      updateItem: function(item){
       return $.ajax({
        type: "PUT",
        url: "<?php echo $urlajax;?>",
        data: item
       });
      },
      deleteItem: function(item){
       return $.ajax({
        type: "DELETE",
        url: "<?php echo $urlajax;?>",
        data: item
       });
      },
     },
	
	<?php
	$a=table_to_listcols($tbl);
	//$b=table_to_ftable($tbl);
	$fields='fields: [
		  {
		   name: "id",
		type: "hidden",
		css: "hide"
		  }';
	
	
	for($i=0;$i<count($a);$i++){
		$colname=$a[$i]['column_name'];
		if(($colname!='id') and ($colname!='geom')){			
			$list_col_ignore=array();
			$m=0;
			for($j=0;$j<count($ftablearr);$j++){
				$rcolname=$ftablearr[$j]['column_name'];
				if($colname==$rcolname){
					$rtable=$ftablearr[$j]['foreign_table_name'];
					$primcol=$ftablearr[$j]['foreign_column_name'];
					$fields.=tbl_to_option($rtable,'fullname',$primcol,$rcolname);
					
					$list_col_ignore[$m++]=$colname;
				}
			}
			if(!in_array($colname,$list_col_ignore)){
				$fields.=',
				{
					name: "'.$colname.'", 
					type: "text", 
					width: 150, 
					validate: "required"
				}';
			}
		}
	}
	
	//$fields.=tbl_to_option('tt_loaicay','tenloai','id','idloaicay');
	
	
	$fields.=',
		  {
		   type: "control"
		  }
		 ]';
	echo $fields;
	?>	
	
	});
</script>
