<?php
require('Connection.php');

session_start();
$Username=$_POST['Username'];

if(isset($Username)){
    $req=$Bd->prepare('select * from utilisateur where username=?');
    $req->execute(array($Username));
    $rows=$req->fetch();
    if($rows){
        if($rows[3]=='ADMIN'){$_SESSION['admin']=true;}
        else{$_SESSION['admin']=false;}
        header("Location: student.php");
        exit;
    }else{
        echo '<script>
    alert("WRONG USERNAME !!!!!");
    window.location.href = "index.html";
    </script>';

    };
    

}
    
    
    
    
    
    ?>