<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

$sql = "SELECT * from posts";
$posts = $db_handle->runSelectQuery($sql);
?>
<table class="tbl-qa">
  <thead>
	<tr>
	  <th class="table-header">Title</th>
	  <th class="table-header">Description</th>
	  <th class="table-header">Actions</th>
	</tr>
  </thead>
  <tbody id="table-body">
	<?php
	if(!empty($posts)) { 
	foreach($posts as $k=>$v) {
	  ?>
	  <tr class="table-row" id="table-row-<?php echo $posts[$k]["id"]; ?>">
		<td contenteditable="true" onBlur="saveToDatabase(this,'post_title','<?php echo $posts[$k]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["post_title"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'description','<?php echo $posts[$k]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["description"]; ?></td>
		<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $posts[$k]["id"]; ?>);">Delete</a></td>
	  </tr>
	  <?php
	}
	}
	?>
  </tbody>
</table>

<script>
	function createNew() {
		$("#add-more").hide();
		var data = '<tr class="table-row" id="new_row_ajax">' +
		'<td contenteditable="true" id="txt_title" onBlur="addToHiddenField(this,\'title\')" onClick="editRow(this);"></td>' +
		'<td contenteditable="true" id="txt_description" onBlur="addToHiddenField(this,\'description\')" onClick="editRow(this);"></td>' +
		'<td><input type="hidden" id="title" /><input type="hidden" id="description" /><span id="confirmAdd"><a onClick="addToDatabase()" class="ajax-action-links">Save</a> / <a onclick="cancelAdd();" class="ajax-action-links">Cancel</a></span></td>' +	
		'</tr>';
	  $("#table-body").append(data);
	}
	function cancelAdd() {
		$("#add-more").show();
		$("#new_row_ajax").remove();
	}
	function addToDatabase() {
	  var title = $("#title").val();
	  var description = $("#description").val();
	  
		  $("#confirmAdd").html('<img src="loaderIcon.gif" />');
		  $.ajax({
			url: "add.php",
			type: "POST",
			data:'title='+title+'&description='+description,
			success: function(data){
			  $("#new_row_ajax").remove();
			  $("#add-more").show();		  
			  $("#table-body").append(data);
			}
		  });
	}
	function addToHiddenField(addColumn,hiddenField) {
		var columnValue = $(addColumn).text();
		$("#"+hiddenField).val(columnValue);
	}
</script>

<script>
	function saveToDatabase(editableObj,column,id) {
	  $(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
	  $.ajax({
		url: "edit.php",
		type: "POST",
		data:'column='+column+'&editval='+$(editableObj).text()+'&id='+id,
		success: function(data){
		  $(editableObj).css("background","#FDFDFD");
		}
	  });
	}
	function deleteRecord(id) {
		if(confirm("Are you sure you want to delete this row?")) {
			$.ajax({
				url: "delete.php",
				type: "POST",
				data:'id='+id,
				success: function(data){
				  $("#table-row-"+id).remove();
				}
			});
		}
	}
</script>