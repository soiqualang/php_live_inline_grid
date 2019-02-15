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
			$m=-1;
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