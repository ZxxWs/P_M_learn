<meta charset="utf-8">
<?php 
//接受文件
if($_FILES["file"]["error"]>0){
    echo "上传文件有误<br/>";
}
else {
    message();
    save();
    
}

//文件上传信息
function message(){
    
    echo "上传的文件名 : ".$_FILES["file"]["name"]."<br/>";
    echo "上传的文件类型 : ".$_FILES["file"]["type"]."<br/>";
    echo "上传的文件大小 : ".($_FILES["file"]["size"]/1024)."KB<br/>";
    echo "文件临时位置 : ".$_FILES["file"]["tmp_name"]."<br/>";
}


//上传文件的保存
function save(){
    
    if(file_exists("upload/".$_FILES["file"]["name"])){
        echo "文件已上传<br/>";
    }
    else{
        move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$_FILES["file"]["name"]);
        echo "文件保存".$_FILES["file"]["name"];
    }
    
    
}




?>