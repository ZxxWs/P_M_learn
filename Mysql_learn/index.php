
<meta charset="utf-8"/>
<?php

//MySQL在PHP中的方法：mysqli_function(value,value1....)

//************************************************************
//连接MySQL：
$host='localhost:3306';                    //可选，主机名|IP
$username='root';          //可选，MySQL用户名
$password;          //可选，MySQL密码
$dbname;            //可选，默认数据库
$port;                  //端口号
$socket;            //规定socket
$conn=mysqli_connect($host,$username);
//mysqli_close($link);//关闭与于数据库的连接
if($conn)
    echo "数据库连接成功";
echo "<br />";

//************************************************************
//创建数据库
$create="create database phpcreat";
$createdatabase=mysqli_query($conn, $create);
if($createdatabase)
    echo "数据库创建成功";
echo "<br />";
    
//删除数据库
$drop="drop database phpcreat";
$drop=mysqli_query($conn, $drop);
if($drop)
    echo "数据库删除成功";
else{
    die('连接失败: ' . mysqli_error($conn));
}
echo "<br />";
    
    
//************************************************************
//选择数据库
$dbname="test";
$select=mysqli_select_db($conn, $dbname);
if($select)
    echo "数据库选择成功";
    else{
        die('连接失败: ' . mysqli_error($conn));
    }
echo "<br />";
    
    
//************************************************************
//创建表
$table="create table phptable(id int)";
$createtable=mysqli_query($conn, $table);
if($createtable)
    echo "创建表：“id”成功";
else{
    die('连接失败: ' . mysqli_error($conn));
}
echo "<br />";

//删除表
$droptable="drop table phptable";
$droptablea=mysqli_query($conn, $droptable);
if($droptablea)
    echo "删除表“id”成功";
echo "<br/>";
    

//***********************
mysqli_query($conn , "set names utf8");// 设置编码，防止中文乱码
//***********************
//向表中插入数据————>students:name,num,class  
$stuname="吴霜";
$stunum=1707004101;
$stuclass=17070144;
for($i=1;$i<5;$i++){
    $stunum++;
$sqldata="insert into students".
         "(name,num,class)".
         "values".
         "('$stuname','$stunum','$stuclass')";

$into=mysqli_query($conn, $sqldata);
if($into)
    echo "插入相关学生数据成功";
    echo "<br/>";
}
//***********************
//在表中删除数据
$deletedata="delete from students where num=2";
$deleteend=mysqli_query($conn,$deletedata);
if($deleteend)
    echo "删除数据成功<br/>";
    

    
//***********************************************************
//读取数据库
//读取数据库的方式多种多样
$readdata='select name,num,class from students';
$selecttable=mysqli_select_db($conn, 'test');//选择表
if($selecttable)
    echo "选择学生表单成功";
    echo "  ---  \0";
$readendl=mysqli_query($conn, $readdata);
if($readendl)
    echo "读取学生数据成功";
    echo "<br/>";
    
echo '<table border="1"><td>姓   名</td><td>学号</td><td>班级</td></tr>';
while($whilee=mysqli_fetch_array($readendl,MYSQLI_ASSOC)){//每次读取的数据会复制给$whilee
    echo "<tr><td>{$whilee['name']}</td>".                //参数MYSQLI_ASSOC查询结果返回关联数据
        "<td>{$whilee['num']}</td>".
        "<td>{$whilee['class']}</td>".
        "</tr>";
}
echo '</table>'."<br/>";
    
    
 //释放内存
mysqli_free_result($readendl);
$close=mysqli_close($conn);
if($close)
    echo "断开连接成功";
    
    
    
    
    
    
    
    
    
    
    
