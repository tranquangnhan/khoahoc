<?php 
    function insertClass($class){
        $sql = "INSERT INTO class(name) VALUES (?)";
        return exec1($sql,$class);
    }
    function getAllClass(){
        $sql = "SELECT * FROM class";
        return result1(0,$sql);
    }
    function delClass($id){
        $sql = "DELETE FROM class WHERE id = ?";
        return exec1($sql,$id);
    }
    function  insertLesson($idkhoayt,$img,$idclass,$idmon){
        $sql = "INSERT INTO lesson(idkhoayt,img,idclass,idmon) VALUES (?,?,?,?)";
        return exec1($sql,$idkhoayt,$img,$idclass,$idmon);
    }
    function getAllLesson(){
        $sql = "SELECT * FROM lesson";
        return result1(0,$sql);
    }
    function showClass($id){
        $sql = "SELECT * FROM class WHERE id = ?";
        return result1(1,$sql,$id);
    }
    function showSubject($id){
        $sql = "SELECT * FROM subject WHERE id = ?";
        return result1(1,$sql,$id);
    }
    function delLesson($id){
        $sql = "DELETE FROM lesson WHERE id = ?";
        return exec1($sql,$id);
    }
?>