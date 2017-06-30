<?php

class newPDO
{
    private  $dsn;
    private  $name;
    private  $password;
    private  $opts=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
    private  $dbn;
    function __construct(){
        $this->dsn="mysql:host=localhost;dbname=user";
        $this->name="root";
        $this->password='';
    }
    private   function create(){
        $this->dbn=new PDO($this->dsn,$this->name,$this->password,$this->opts);
    }
    function clear($dbn,$res){
        $dbn=null;
        $res=null;
    }
    //增删改通用方法
    function add($sql,array $partm,&$con) {
        try{
            $res=0;
            if($this->dbn==null){
                $this->create();
             
            }
            $pre=$this->dbn->prepare($sql);
            $res=$pre->execute($partm);
            $con=$pre->rowCount();
            $this->clear($this->dbn, $pre);
        }catch (PDOException $e){
            echo '操作失败'.$e->getMessage();
        }
        return $res;
    }
    
    function sel($sql,array $partm,&$con){
        $res1=array();
        try{
            if($this->dbn==null){
                $this->create();
             
            }
            $pre=$this->dbn->prepare($sql);
            $res=$pre->execute($partm);
            $con=$pre->rowCount();
//             foreach($pre as $aa){
// //                 print_r($aa);

//                 array_push($res1,$aa);
//             }
//             var_dump($res);
            while (!!$aa=$pre->fetch(PDO::FETCH_ASSOC)){
               array_push($res1, $aa);
            }
        }catch (PDOException $e){
            $this->dbn->rollBack();
            echo '失败';
        }
        return $res1;
    }
    
    
    
    public function tongfen($sql,$ye,$tiao){
        if($this->dbn==null){
            $this->create();
        }
        try {
            $sql=$sql.' limit '.($ye-1)*$tiao.','.$tiao;
            $arr=$this->sel($sql,array(),$con);
            print_r($arr);
        }catch (PDOException $e){
            die('操作失败'.$e->getMessage());
        }
    }
    
    
    
    
    
}




















?>