<?php

//MySQL��PHP�еķ�����mysqli_function(value,value1....)

//************************************************************
//����MySQL��
$host='localhost:3306';                    //��ѡ��������|IP
$username='root';          //��ѡ��MySQL�û���
$password;          //��ѡ��MySQL����
$dbname;            //��ѡ��Ĭ�����ݿ�
$port;                  //�˿ں�
$socket;            //�涨socket
$conn=mysqli_connect($host,$username);
//mysqli_close($link);//�ر��������ݿ������
if($conn)
    echo "���ݿ����ӳɹ�";
echo "<br />";

//************************************************************
//�������ݿ�
$create="create database phpcreat";
$createdatabase=mysqli_query($conn, $create);
if($createdatabase)
    echo "���ݿⴴ���ɹ�";
else{
    die('����ʧ��: ' . mysqli_error($conn));
}
echo "<br />";
    
//ɾ�����ݿ�
$drop="drop database phpcreat";
$drop=mysqli_query($conn, $drop);
if($drop)
    echo "���ݿ�ɾ���ɹ�";
else{
    die('����ʧ��: ' . mysqli_error($conn));
}
echo "<br />";
    
    
//************************************************************
//ѡ�����ݿ�
$dbname="test";
$select=mysqli_select_db($conn, $dbname);
if($select)
    echo "���ݿ�ѡ��ɹ�";
    else{
        die('����ʧ��: ' . mysqli_error($conn));
    }
echo "<br />";
    
    
//************************************************************
//������
$table="create table phptable(id int)";
$createtable=mysqli_query($conn, $table);
if($createtable)
    echo "����������id���ɹ�";
else{
    die('����ʧ��: ' . mysqli_error($conn));
}
echo "<br />";

//ɾ����
$droptable="drop table phptable";
$droptablea=mysqli_query($conn, $droptable);
if($droptablea)
    echo "ɾ������id���ɹ�";
echo "<br/>";
    

//***********************
// ���ñ��룬��ֹ��������
mysqli_query($conn , "set names utf8");
//***********************
//����в������ݡ�������>students:name,num,class  
$stuname="��˪";
$stunum=1707004101;
$stuclass=17070144;
$sqldata="insert into students".
         "(name,num,class)".
         "values".
         "('$stuname','$stunum','$stuclass')";
$into=mysqli_query($conn, $sqldata);
if($into)
    echo "�������ѧ�����ݳɹ�";
    echo "<br/>";

    
//***********************************************************
//��ȡ���ݿ�
//��ȡ���ݿ�ķ�ʽ���ֶ���
$readdata='select name,num,class from students';
$selecttable=mysqli_select_db($conn, 'test');//ѡ���
if($selecttable)
    echo "ѡ��ѧ�������ɹ�";
    echo "  ---  \0";
$readendl=mysqli_query($conn, $readdata);
if($readendl)
    echo "��ȡѧ�����ݳɹ�";
    echo "<br/>";
    
echo '<table border="1"><td>����</td><td>ѧ��</td><td>�༶</td></tr>';
while($whilee=mysqli_fetch_array($readendl,MYSQLI_ASSOC)){//ÿ�ζ�ȡ�����ݻḴ�Ƹ�$whilee
    echo "<tr><td>{$whilee['name']}</td>".                //����MYSQLI_ASSOC��ѯ������ع�������
        "<td>{$whilee['num']}</td>".
        "<td>{$whilee['class']}</td>".
        "</tr>";
}
echo '</table>'."<br/>";
    
    
 //�ͷ��ڴ�
mysqli_free_result($readendl);
$close=mysqli_close($conn);
if($close)
    echo "�Ͽ����ӳɹ�";
    
    
    
    
    
    
    
    
    
    
    