<meta charset="utf-8"/>
<?php
//对字段的操作

$host="127.0.0.1";
$conn=mysqli_connect($host);

$con=mysqli_select_db($conn, "test");
if($con)
    echo "连接正常<br/>";
mysqli_query($conn , "set names utf8");


//add();            //数据添加函数
function add(){
global $conn;
$addid=00010;
$addname=array("a","b","c","d","e","f","g","h","i","j");
for($i=0;$i<10;$i++){
    $addid+=$i;
$add="insert into ppp".
    "(id,name)". 
    "values".
    "('$addid','$addname[$i]')";
$addend=mysqli_query($conn,$add);
if($addend)echo"添加成功<br/>";
else{
    die('连接失败: ' . mysqli_error($conn));
}
echo "<br />";
}}

$Id=isset($_POST['ID'])?$_POST['ID']:'';//如果不经过表达也可以直接运行
//$Id=$_POST["ID"];
if($Id!="-1 or 1=1")
    drop($Id);
    else echo "参数有误";
if(!empty($Id)){
    drop($Id);
    echo "删除的ID为".$Id."<br/>";
}

function drop($Idd){
    global $conn;
    $dropID="delete from ppp where id=".$Idd;
    $dropadd=mysqli_query($conn,$dropID);
    if($dropadd)
        echo "删除成功<br/>";
    show();
}


$serch=isset($_GET['ID'])?$_GET['ID']:'';
if(!empty($serch)){
    find($Id);
    
}
//
function find($Id){
    $finddata="select *from ppp where id=".$Id;
    global $conn;
    $data=mysqli_query($conn, $finddata);
 
    while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)){//每次读取的数据会复制给$whilee
        echo "{$row['id']}";
    } 

}



function show(){
$readdata='select id,name from ppp';
global $conn;
$selecttable=mysqli_select_db($conn, 'test');//选择表
if($selecttable)
    echo "选择学生表单成功";
    echo "  ---  \0";
    $readendl=mysqli_query($conn, $readdata);
    if($readendl)
        echo "读取学生数据成功";
        echo "<br/>";
        
        echo '<table border="1"><td>ID</td><td>姓名</td></tr>';
        while($whilee=mysqli_fetch_array($readendl,MYSQLI_ASSOC)){//每次读取的数据会复制给$whilee
            echo "<tr><td>{$whilee['id']}</td>".                //参数MYSQLI_ASSOC查询结果返回关联数据
                "<td>{$whilee['name']}</td>".
                "</tr>";
        }
        echo '</table>'."<br/>";
}