<?php




class Student{

    public static function addStudent($id,$name,$date,$section_id){
        $Bd = Connection::GetInstance();
        $req=$Bd->prepare('insert into student(id,name,date_de_naissance,section_id)values(?,?,?,?)');
        $req->execute(array($id,$name,$date,$section_id));
    }
    public static function selectStudent($id){
        $Bd = Connection::GetInstance();
        $req=$Bd->prepare('select * from student where id=?');
        $req->execute(params: array($id));
        $row=$req->fetch();
        return $row;
    }
    public static function modifyStudent($id,$name,$date,$section_id){
        $Bd = Connection::GetInstance();
        $req=$Bd->prepare('update student set id=? , name=?,date_de_naissance=?,section_id=? where id=?');
        $req->execute(array($id,$name,$date,$section_id,$id));

    }
    public static function removeStudent($id){
        $Bd = Connection::GetInstance();
        $req=$Bd->prepare('delete  from student where id=?');
        $req->execute(array($id));
    }

}



class Section{

    public static function addSection($id,$Designation,$description){
        $Bd = Connection::GetInstance();
        $req=$Bd->prepare('insert into section(id,Designation,description)values(?,?,?)');
        $req->execute(array($id,$Designation,$description));
    }
    public static function selectSection($id){
        $Bd = Connection::GetInstance();
        $req=$Bd->prepare('select * from section where id=?');
        $req->execute(params: array($id));
        $row=$req->fetch();
        return $row;
    }
    public static function modifySection($id,$Designation,$description){
        $Bd = Connection::GetInstance();
        $req=$Bd->prepare('update section set id=? ,Designation=?,description=? where id=?');
        $req->execute(array($id,$Designation,$description,$id));

    }
    public static function removeSection($id){
        $Bd = Connection::GetInstance();
        $req=$Bd->prepare('delete  from section where id=?');
        $req->execute(array($id));
    }


}


?>