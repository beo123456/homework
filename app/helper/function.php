<?php 
function ShowErrors($errors, $name){
    if($errors->has($name)){
        $html = '<span class="text-danger">';
        // first: lấy lỗi đầu tiên. dể bên view hiện thông báo message + html ở đây với nhau. thì phải có first, first lấy lỗi đầu tiên
        //  bên LoginRequest.php LoginRequest@messages, rules
        $html .= $errors->first($name);
        $html .= '</span>';
        return $html;
    }
}

function GetCategory($mang,$parent,$shift,$id_select)
{
	foreach($mang as $value)
	{
	  if($value['parent']==$parent) //    nếu $value['parent'] = $value['id'] 
	  {
		  if($value['id']==$id_select) // nếu id = id_select(0,1,2..)
		  {
		   echo "<option value=".$value['id']." selected>".$shift.$value['name']."</option>"; /// thì show name. nghiaã là chọn, value['id'] để hiển thị name
		  }
		  else
		  {
		   echo "<option value=".$value['id']." >".$shift.$value['name']."</option>";
		  }
		
		 GetCategory($mang,$value['id'],$shift."---|",$id_select); /// chạy lại function. nếu $value['parent'] = $value['id'] thì show name các bản ghi có parent = id của nhau. chạy lại line 17
	  }
	}
}

function ShowCategory($mang,$parent,$shift)
{
	foreach($mang as $value)
	{
	  if($value['parent']==$parent)
	  {
		  
		   echo '<div class="item-menu"><span>'.$shift.$value['name'].'</span>
           <div class="category-fix">
               <a class="btn-category btn-primary" href="'.route('EditCategory',['id_cate'=>$value['id']]).'"><i class="fa fa-edit"></i></a>
               <a onclick="Del_cat()" class="btn-category btn-danger" href="'.route('DeleteCategory',['id_cate'=>$value['id']]).'"><i class="fas fa-times"></i></i></a>
           </div>
       </div>';
		
       ShowCategory($mang,$value['id'],$shift."---|");
	  }
	}
}