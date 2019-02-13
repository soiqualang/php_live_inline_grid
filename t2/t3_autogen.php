<?php
include('login/config.php');
include('login/function.php');
//http://localhost/php_grid/t2/t3_autogen.php?tbl=sample_data
if(isset($_GET['tbl'])){
	$tbl=$_GET['tbl'];
	$urlajax='fetch_data_pg_autogen.php?tbl='.$tbl;
	/* $a=table_to_listcols($tbl);
	for($i=0;$i<count($a);$i++){
		echo $a[$i]['column_name'];
		echo '<br>';
	} */	
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
	$fields='fields: [
		  {
		   name: "id",
		type: "hidden",
		css: "hide"
		  }';
	
	
	for($i=0;$i<count($a);$i++){
		if(($a[$i]['column_name']!='id') or ($a[$i]['column_name']!='geom')){
			$fields.=',
			  {
			   name: "'.$a[$i]['column_name'].'", 
			type: "text", 
			width: 150, 
			validate: "required"
			  }';
		}
	}
	$fields.=',
		  {
		   type: "control"
		  }
		 ]';
	echo $fields;
	?>	
	
	});
</script>
