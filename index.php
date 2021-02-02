<?php
    require_once "models/database.php";
    require_once "models/class.php";
    if(isset($_GET['act'])){
        switch ($_GET['act']) {
            case 'lopadd':
                $viewFile = "views/classadd.php";    
                if(isset($_POST['add']) && ($_POST['add'])) {
                    $class = $_POST['class'];
                    if(insertClass($class)){
                        header("location: ?act=lopindex");
                    }
                }
                require_once "views/layout.php";
                break;
            case 'lopindex':
                $viewFile = "views/classindex.php";     
                $getAllClass =  getAllClass();
                require_once "views/layout.php";
                break;
            case 'lopdel':
                $viewFile = "views/classindex.php";     
                if(isset($_GET['id'])){
                    if( delClass($_GET['id'])){
                        header("location: ?act=lopindex");
                    }
                }
                require_once "views/layout.php";
                break;

            case 'lessonadd':
                $viewFile = "views/lessonadd.php";    
                if(isset($_POST['add']) && ($_POST['add'])) {
                    $idkhoayt = $_POST['idkhoayt'];
                    $idclass = $_POST['idclass'];
                    $idmon = $_POST['idmon'];
                    $allFile = $_FILES['img'];   
                    // //upload nhiều ảnh
                    $img = checkUpLoadMany($allFile);
                    if( insertLesson($idkhoayt,$img,$idclass,$idmon)){
                        header("location: ?act=lessonindex");
                    }
                }
                require_once "views/layout.php";
                break;
            case 'lesonindex':
                $viewFile = "views/lessonindex.php";     
                $getAllLesson =  getAllLesson();
                require_once "views/layout.php";
                break;
            case 'lessondel':
                $viewFile = "views/lessonindex.php";     
                if(isset($_GET['id'])){
                    if( delLesson($_GET['id'])){
                        header("location: ?act=lesonindex");
                    }
                }
                require_once "views/layout.php";
                break;
            default:
                # code...
                break;
        }
    }



?>