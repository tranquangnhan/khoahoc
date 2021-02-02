<?php
    /** Config Return Header */
    header("Access-Control-Allow-Origin: *");
    header('Content-type:application/json;charset=utf-8');
    
    require_once "models/database.php";
    require_once "models/class.php";

    if(isset($_GET['act'])){
        switch ($_GET['act']) {
            case 'lopadd':
                   
                if(isset($_POST['add']) && ($_POST['add'])) {
                    $class = $_POST['class'];
                    if(insertClass($class)){
                        header("location: ?act=lopindex");
                    }
                }

                $viewFile = "views/classadd.php";
                require_once "views/layout.php";
                break;
            case 'lopindex':
               
                $getAllClass =  getAllClass();

                $viewFile = "views/classindex.php";     
                require_once "views/layout.php";
                break;
            case 'lopdel':
                
                if(isset($_GET['id'])){
                    if( delClass($_GET['id'])){
                        header("location: ?act=lopindex");
                    }
                }

                $viewFile = "views/classindex.php";   
                require_once "views/layout.php";
                break;

            case 'lessonadd':
                
                    
                if(isset($_POST['add']) && ($_POST['add'])) {
                    $idkhoayt = $_POST['idkhoayt'];
                    $idclass = $_POST['idclass'];
                    $idmon = $_POST['idmon'];
                    $allFile = $_FILES['img'];   
                    $img = checkUpLoadMany($allFile);

                    if( insertLesson($idkhoayt,$img,$idclass,$idmon)){
                        header("location: ?act=lessonindex");
                    }
                }

                $viewFile = "views/lessonadd.php";
                require_once "views/layout.php";
                break;
            case 'lessonindex':
    
                $getAllLesson =  getAllLesson();
                
                $viewFile = "views/lessonindex.php"; 
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
            case 'listclasses':
                
                $array = array();
               
                $array['data'] =  getAllClass();
                
                echo json_encode($array);
                break;
            case 'listsubjects':
                $array = array();
                
                $array['data'] =  getAllSubject();
                
                echo json_encode($array);
                break;
            case 'listcourses':
                $array = array();
                
                if(isset($_GET['class'])&&($_GET['class'])){
                    if(isset($_GET['subject'])&&($_GET['subject'])){
                        $array['data'] =  getAllCourses($_GET['class'],$_GET['subject']);
                    }
                }
                echo json_encode($array);
                break;
            default:
                # code...
                break;
        }
    }



?>