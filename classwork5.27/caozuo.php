<?php
header("Content-Type:text/html;charset=utf-8");
require_once 'PDO.class.php';
$dpn=new newPDO();

if(isset($_POST['user1'])&&isset($_POST['password1'])){
    if($_POST['user1']!='admin'){
        $newUser=$_POST['user1'];
        $newPassword=$_POST['password1'];
        if($_POST['user1']!='admin'){
        $dpn->add("insert into user(name,password,dengji) values('${newUser}','${newPassword}',1)",array(),$aa);
        echo '注册成功';
        }
    }else{
        $admin=$dpn->sel("select name from user where name='admin'", array(), $con);
        $bb=$admin[0]['name'];
        if($bb=='admin'){
           echo '管理员s';
        }else{
            $newPassword2=$_POST['password1'];
            $dpn->add("insert into user(name,password,dengji) values('admin','${newPassword2}',0)", array(), $con);
        }
        
       
       }
}

if(isset($_POST['user'])&&isset($_POST['password'])){
    $user=$_POST['user'];
    $password=$_POST['password'];
    $name=$dpn->sel("select name from user where name='${user}'", array(), $con);
    $aa1=$name[0]['name'];
    if($aa1!=null&&$aa1!='admin'){
        $a= $dpn->sel("select password from user where name='${user}'", array(), $con);
        $b=$a[0]['password'];
        $c=$dpn->sel("select dengji from user where name='${user}'", array(), $con);
        $d=$c[0]['dengji'];
        if($password==$b){
            header("location:user.php");
        }else {
            echo '密码错误';
        }
    }
    if($aa1==null){
        echo '此用户不存在，去注册';
    }
    $aa=$dpn->sel("select dengji from user where name='${user}'", array(), $con);
    $bb=$aa[0]['dengji'];
    if($_POST['user']=='admin'&&$bb==0){
        $a1= $dpn->sel("select password from user where name='${user}'", array(), $con);
        $b1=$a1[0]['password'];
        if($password==$b1){
            header("location:admin.php");
        }else {
            echo '密码错误';
        }
        
    }
}








