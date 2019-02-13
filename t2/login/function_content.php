<?php
function page_danhmuc($frmlabel,$tbl,$tencot,$tencotdb){
	$tencotarr=explode (',',$tencot);
	$tencotdbarr=explode (',',$tencotdb);
	$tmp='<div class="right_col" role="main">
  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2>'.$frmlabel.'</h2>
			<ul class="nav navbar-right panel_toolbox">
			  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			  </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
				<ul class="dropdown-menu" role="menu">
				  <li><a href="#">Settings 1</a>
				  </li>
				  <li><a href="#">Settings 2</a>
				  </li>
				</ul>
			  </li>
			  <li><a class="close-link"><i class="fa fa-close"></i></a>
			  </li>
			</ul>
			<div class="clearfix"></div>
		  </div>
		  <div class="x_content">
			<table id="datatable_listuser" class="table table-striped jambo_table bulk_action">
			  <thead>
				<tr class="headings">';
				  for($i=0;$i<count($tencotarr);$i++){
					$tmp.='<th class="column-title">'.$tencotarr[$i].'</th>';
				  }
				  $tmp.='<th class="column-title">Hành động</th>
				</tr>
			  </thead>
			  <tbody>';
			  if(in_array('quantrisidebar',ARRMENU_USER)==true){
				  $a=table_to_array1($tbl);
			  }else{
				  $a=table_to_arraywhere($tbl,'nguoicn',USERS_ID);
			  }
				//$a=table_to_array1($tbl);
				for($i=0;$i<count($a);$i++){
					$tmp.='<tr>';
					for($j=0;$j<count($tencotdbarr);$j++){
						$tmp.='<td width="23%"><b>'.$a[$i][$tencotdbarr[$j]].'</b></td>';
					}
					 $tmp.='<td class="tdw">
					  <button type="button" class="btn btn-success btn-sm" onclick="name2loc(\''.$tbl.'_edit&id='.$a[$i]['id'].'\');">Update</button>
					  <button type="button" class="btn btn-danger btn-sm" onclick="del('.$a[$i]['id'].',\''.$tbl.'\');">Delete</button>
					  </td>
					</tr>';
				}
			  $tmp.='</tbody>
			</table>
		  </div>
		  <button type="button" class="btn btn-primary" onclick="name2loc(\''.$tbl.'_add\');">Thêm</button>
		</div>
	  </div>
<div class="row">
</div>
</div>';
return $tmp;
}

function page_danhmuc_listall($frmlabel,$tbl,$tencot,$tencotdb){
	$tencotarr=explode (',',$tencot);
	$tencotdbarr=explode (',',$tencotdb);
	$tmp='<div class="right_col" role="main">
  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2>'.$frmlabel.'</h2>
			<ul class="nav navbar-right panel_toolbox">
			  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			  </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
				<ul class="dropdown-menu" role="menu">
				  <li><a href="#">Settings 1</a>
				  </li>
				  <li><a href="#">Settings 2</a>
				  </li>
				</ul>
			  </li>
			  <li><a class="close-link"><i class="fa fa-close"></i></a>
			  </li>
			</ul>
			<div class="clearfix"></div>
		  </div>
		  <div class="x_content">
			<table id="datatable_listuser" class="table table-striped jambo_table bulk_action">
			  <thead>
				<tr class="headings">';
				  for($i=0;$i<count($tencotarr);$i++){
					$tmp.='<th class="column-title">'.$tencotarr[$i].'</th>';
				  }
				  $tmp.='<th class="column-title">Hành động</th>
				</tr>
			  </thead>
			  <tbody>';
			 /*  if(in_array('quantrisidebar',ARRMENU_USER)==true){
				  $a=table_to_array1($tbl);
			  }else{
				  $a=table_to_arraywhere($tbl,'nguoicn',USERS_ID);
			  } */
				$a=table_to_array1($tbl);
				for($i=0;$i<count($a);$i++){
					$tmp.='<tr>';
					for($j=0;$j<count($tencotdbarr);$j++){
						$tmp.='<td width="23%"><b>'.$a[$i][$tencotdbarr[$j]].'</b></td>';
					}
					 $tmp.='<td class="tdw">
					  <button type="button" class="btn btn-success btn-sm" onclick="name2loc(\''.$tbl.'_edit&id='.$a[$i]['id'].'\');">Update</button>
					  <button type="button" class="btn btn-danger btn-sm" onclick="del('.$a[$i]['id'].',\''.$tbl.'\');">Delete</button>
					  </td>
					</tr>';
				}
			  $tmp.='</tbody>
			</table>
		  </div>
		  <button type="button" class="btn btn-primary" onclick="name2loc(\''.$tbl.'_add\');">Thêm</button>
		</div>
	  </div>
<div class="row">
</div>
</div>';
return $tmp;
}

function inc_file($name,$label,$value){
	$src='../img/user/'.$value;
	$tmp='<div class="form-group">';			
			  include('spatial/angiang_dktn_thonhuong2.html');
			  //$tmp.='<iframe src="spatial/angiang_dktn_thonhuong2.html" width="500px" height="400px" border=0>';
			$tmp.='</div>';	
	return $tmp;
}

function frm_img($name,$label,$value){
	$src='../img/user/'.$value;
	$tmp='<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="'.$name.'">'.$label.'
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
			  <img name="'.$name.'" class="col-md-7 col-xs-12" src="'.$src.'" style="height: 200px;">
			</div>
		  </div>';
	return $tmp;
}

function frm_downbtn($name,$label,$dir,$value){
	$src=$dir.$value;
	$tmp='<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="'.$name.'">'.$label.'
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">			  
			  <button type="button" class="btn btn-primary" onclick="window.location =\''.$src.'\';">Tải về</button>
			</div>
		  </div>';
	return $tmp;
}

function frm_textbox($name,$label,$required,$type,$value){
	if($required==true){
		$requiredlabel='<span class="required">*</span>';
		$requiredtextbox='required="required"';
	}else{
		$requiredlabel='';
		$requiredtextbox='';
	}
	$tmp='<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="'.$name.'">'.$label.' '.$requiredlabel.'
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
			  <input type="'.$type.'" id="'.$name.'" name="'.$name.'" '.$requiredtextbox.' class="form-control col-md-7 col-xs-12" value="'.$value.'">
			</div>
		  </div>';
	return $tmp;
}

function frm_datetxt($name,$label,$required,$type,$value){
	if($required==true){
		$requiredlabel='<span class="required">*</span>';
		$requiredtextbox='required="required"';
	}else{
		$requiredlabel='';
		$requiredtextbox='';
	}
	$tmp='<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="'.$name.'">'.$label.' '.$requiredlabel.'
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
			  			  
			  <input type="'.$type.'" id="'.$name.'" name="'.$name.'" '.$requiredtextbox.' class="form-control" data-inputmask="\'mask\': \'99/99/9999\'" placeholder="tháng/ngày/năm" value="'.$value.'">
			  
			</div>
		  </div>';
	return $tmp;
}

function frm_checkbox($name,$label,$value){
	if($value==1){
		$checked='checked';
	}else{
		$checked='';
	}
	$tmp='<script>
	
	</script>';
	$tmp.='<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">'.$label.'</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
			  <input id="'.$name.'" name="'.$name.'" type="checkbox" class="js-switch" col-md-7 col-xs-12" '.$checked.'/>
			</div>
		  </div>';
	return $tmp;
}

function frm_texarea($name,$label,$value){
	$tmp='<script>
	jk(function() {
    jk("textarea#'.$name.'").froalaEditor({
			heightMin: 100,
			heightMax: 200,
			toolbarButtons: ["bold", "italic", "underline","paragraphFormat","formatOL","formatUL","insertLink","quote","undo", "redo", "html","fullscreen"]
		});
	  });
	</script>';
	$tmp.='<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">'.$label.'</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
			  <textarea id="'.$name.'" name="'.$name.'">'.$value.'</textarea>
			</div>
		  </div>';
	return $tmp;
}

function frm_tag($name,$label,$value){
	$tmp='<script>
	
	</script>';
	$tmp.='<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">'.$label.'</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
			  <input id="'.$name.'" name="'.$name.'" type="text" class="tags form-control" value="'.$value.'" />
			  <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
			</div>
		  </div>';
	return $tmp;
}

function frm_datebox($name,$label,$required,$type,$value){
	if($required==true){
		$requiredlabel='<span class="required">*</span>';
		$requiredtextbox='required="required"';
	}else{
		$requiredlabel='';
		$requiredtextbox='';
	}
	$tmp='<script>
	jk(function() {
	jk("#'.$name.'").daterangepicker({
	  singleDatePicker: true,
	  singleClasses: "picker_3"
	}, function(start, end, label) {
	  console.log(start.toISOString(), end.toISOString(), label);
	});
	});
	</script>';
	$tmp.='<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="'.$name.'">'.$label.' '.$requiredlabel.'
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
			  <input type="'.$type.'" id="'.$name.'" name="'.$name.'" '.$requiredtextbox.' class="form-control has-feedback-left" value="'.$value.'" placeholder="'.$label.'">
			  <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
			</div>
		  </div>';
	return $tmp;
}

function frm_selectbox($name,$label,$tbl,$tencot,$value){
	//frm_textbox($name,$label,$required,$type,$value)
	//frm_selectbox('nguoicn','Người cập nhật','users','fullname',''));
	//array_push($inputarr,frm_textbox('triso','Trị số',false,'text',''));
	if($name=='nguoicn'){
		return frm_textbox($name,'',false,'hidden',USERS_ID);
	}else{
		$tmp='<script>
		jq(function() {
			jq( "#'.$name.'" ).combobox();
			jq( "#toggle" ).on( "click", function() {
			  jq( "#'.$name.'" ).toggle();
			});
		});
		</script>';
		$tmp.='<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">'.$label.'
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <select id="'.$name.'" name="'.$name.'" class="form-control col-md-7 col-xs-12">
					<option value="">Select one...</option>';
					$a=table_to_array1($tbl);
					for($i=0;$i<count($a);$i++){
						if($a[$i]['id']==$value){
							$tmp.='<option value="'.$a[$i]['id'].'" selected>'.$a[$i][$tencot].'</option>';
						}else{
							$tmp.='<option value="'.$a[$i]['id'].'">'.$a[$i][$tencot].'</option>';
						}
					}
				  $tmp.='</select>
				</div>
			  </div>';
		return $tmp;
	}	
}

function frm_selectbox_fkey($name,$label,$tbl,$tencot,$value,$fkey){
	if($name=='nguoicn'){
		return frm_textbox($name,'',false,'hidden',USERS_ID);
	}else{
		$tmp='<script>
		jq(function() {
			jq( "#'.$name.'" ).combobox();
			jq( "#toggle" ).on( "click", function() {
			  jq( "#'.$name.'" ).toggle();
			});
		});
		</script>';
		$tmp.='<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">'.$label.'
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <select id="'.$name.'" name="'.$name.'" class="form-control col-md-7 col-xs-12">
					<option value="">Select one...</option>';
					$a=table_to_array1($tbl);
					for($i=0;$i<count($a);$i++){
						if($a[$i][$fkey]==$value){
							$tmp.='<option value="'.$a[$i][$fkey].'" selected>'.$a[$i][$tencot].'</option>';
						}else{
							$tmp.='<option value="'.$a[$i][$fkey].'">'.$a[$i][$tencot].'</option>';
						}
					}
				  $tmp.='</select>
				</div>
			  </div>';
		return $tmp;
	}
}

function page_adddanhmuc($frmname,$frmlabel,$process,$method,$submitname,$inputarr){
	$tmp='<div class="right_col" role="main">
  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2>'.$frmlabel.'</h2>
			<ul class="nav navbar-right panel_toolbox">
			  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			  </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
				<ul class="dropdown-menu" role="menu">
				  <li><a href="#">Settings 1</a>
				  </li>
				  <li><a href="#">Settings 2</a>
				  </li>
				</ul>
			  </li>
			  <li><a class="close-link"><i class="fa fa-close"></i></a>
			  </li>
			</ul>
			<div class="clearfix"></div>
		  </div>
		  <div class="x_content">
			
			<form action="'.$process.'" method="'.$method.'" enctype="multipart/form-data" name="'.$frmname.'" id="'.$frmname.'" data-parsley-validate class="form-horizontal form-label-left">	';
			for($i=0;$i<count($inputarr);$i++){
				$tmp.=$inputarr[$i];
			}
			  
			  $tmp.='<div class="ln_solid"></div>
			  <div class="form-group">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				  <button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascript:history.go(-1)">Go Back</button>
				  <button class="btn btn-primary" type="reset">Reset</button>
				  <button type="submit" class="btn btn-success" name="'.$submitname.'">Submit</button>
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</div>
			  </div>
			</form>
			
		  </div>
		</div>
	  </div>

<div class="row">
</div>
</div>';
return $tmp;
}

function page_editdanhmuc($frmname,$frmlabel,$process,$method,$submitname,$inputarr,$id){
	$tmp='<div class="right_col" role="main">
  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2>'.$frmlabel.'</h2>
			<ul class="nav navbar-right panel_toolbox">
			  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			  </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
				<ul class="dropdown-menu" role="menu">
				  <li><a href="#">Settings 1</a>
				  </li>
				  <li><a href="#">Settings 2</a>
				  </li>
				</ul>
			  </li>
			  <li><a class="close-link"><i class="fa fa-close"></i></a>
			  </li>
			</ul>
			<div class="clearfix"></div>
		  </div>
		  <div class="x_content">
			
			<form action="'.$process.'" method="'.$method.'" enctype="multipart/form-data" name="'.$frmname.'" id="'.$frmname.'" data-parsley-validate class="form-horizontal form-label-left">	';
			for($i=0;$i<count($inputarr);$i++){
				$tmp.=$inputarr[$i];
			}
			  
			  $tmp.='<input type="hidden" id="id" name="id" value="'.$id.'">
			  <div class="ln_solid"></div>
			  <div class="form-group">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				  <button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascript:history.go(-1)">Go Back</button>
				  <button class="btn btn-primary" type="reset">Reset</button>
				  <button type="submit" class="btn btn-success" name="'.$submitname.'">Submit</button>
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</div>
			  </div>
			</form>
			
		  </div>
		</div>
	  </div>

<div class="row">
</div>
</div>';
return $tmp;
}

function page_adddanhmuc11111($frmname,$frmlabel,$process,$method,$submitname,$inputarr){
	$tmp='<form action="'.$process.'" method="'.$method.'" enctype="multipart/form-data" name="'.$frmname.'" id="'.$frmname.'" data-parsley-validate class="form-horizontal form-label-left">	';
			for($i=0;$i<count($inputarr);$i++){
				$tmp.=$inputarr[$i];
			}
			//Dang sua cho nay
			/* if(($submitname!='addgis') or ($submitname!='vientham_add_step2_add')){
				$tmp.='<div class="ln_solid"></div>
			  <div class="form-group">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				  <button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascript:history.go(-1)">Go Back</button>
				  <button class="btn btn-primary" type="reset">Reset</button>
				  <button type="submit" class="btn btn-success" name="'.$submitname.'">Submit</button>
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</div>
			  </div>';
			} */
			$tmp.='</form>';
return $tmp;
}

function page_adddanhmuc_onlyfrm($frmname,$frmlabel,$process,$method,$submitname,$inputarr,$id){
	$tmp='<form action="'.$process.'" method="'.$method.'" enctype="multipart/form-data" name="'.$frmname.'" id="'.$frmname.'" data-parsley-validate class="form-horizontal form-label-left">	';
			for($i=0;$i<count($inputarr);$i++){
				$tmp.=$inputarr[$i];
			}
			  
			  $tmp.='<input type="hidden" id="id" name="id" value="'.$id.'">
			  <div class="ln_solid"></div>
			  <div class="form-group">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				  <button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascript:history.go(-1)">Go Back</button>
				  <button class="btn btn-primary" type="reset">Reset</button>
				  <button type="submit" class="btn btn-success" name="'.$submitname.'">Submit</button>
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</div>
			  </div>
			</form>';
return $tmp;
}

function frm_htmlinput($label,$html){
	$tmp='<script>
	
	</script>';
	$tmp.='<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">'.$label.'</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
			  '.$html.'
			</div>
		  </div>';
	return $tmp;
}
function frm_htmlinput_clear($html){
	$tmp='<script>
	
	</script>';
	$tmp.=$html;
	return $tmp;
}
?>