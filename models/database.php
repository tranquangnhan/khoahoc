<?php
define('HOST_DB','localhost');
define('NAME_DB','khoahoc');
define('USER_DB','root');
define('PASS_DB','');
define('ROOT_URL','/khoahoc');

date_default_timezone_set("Asia/Bangkok");



function connect(){
    try {
        $ConnectionOption = array
            (
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            );

        $conn = new PDO ('mysql:host='.HOST_DB.';dbname='.NAME_DB.';charset=utf8', USER_DB, PASS_DB, $ConnectionOption);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
      echo "Lỗi Kết Nối database: " . $e->getMessage();
    }
}
// Long
// function query($sql)   {
//     $conn = connect();
//     $conn->execute($sql);
//     return $conn->fetchAll();
// }


// hàm này có chức năng truy vấn dữ liệu
// truyền vào 2 hoặc nhiều hơn các giá trị
// tham số đầu tiên: 0 là trả về tất cả sản phẩm, 1 là chỉ trả về 1 sản phẩm
// tham số thứ 2 là câu sql
function result1($fe,$sql){ 
    $sqlValue = array_slice(func_get_args(),2);
    try {
        $conn = connect(); //connect database
        $stmt = $conn->prepare($sql); // select * from sanpham where id = ?
        $stmt->execute($sqlValue);// thực thi
        if($fe===0)return $stmt->fetchAll();elseif($fe===1)return $stmt->fetch(PDO::FETCH_ASSOC);// nếu tham số đầu tiên ===0 trả về tất cả sản phẩm, === 1 trả về 1 sản phẩm
        
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
    finally{
        unset($conn);
    }
}
function exec1($sql){//thêm, xoá ....
    $sqlValue = array_slice(func_get_args(),1); 

    try {
        $conn = connect(); //connect database
        
        $stmt = $conn->prepare($sql); // select * from sanpham where id = ?

        $stmt->execute($sqlValue);// thực thi
        return true;
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
function getLastId($sql){//get LastId
    $sqlValue = array_slice(func_get_args(),1);
    try {
        $conn = connect(); //connect database

        $stmt = $conn->prepare($sql); // select * from sanpham where id = ?

        $stmt->execute($sqlValue);// thực thi

        $last_id = $conn->lastInsertId();
        return $last_id;
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
function checkUpLoadMany($allFile){
    $pathimg = 'uploads/';
    foreach ($allFile['name'] as $file) {
        $nameimg[] = $file;
    }
    foreach($allFile['tmp_name'] as $file){
        $tmp_name[] = $file;
    }
    $imgupload = '';
    for ($i=0; $i <count($nameimg) ; $i++) { 
        $temp = preg_split('/[\/\\\\]+/',$nameimg[$i]);
        $img = $temp[count($temp)-1];
        $target_file = $pathimg . basename($img);
        if (move_uploaded_file($tmp_name[$i], $target_file)) {
            $uploadfile = 'Upload file thành công';
        }
        else{
            $uploadfile = 'upload file không thành công';
        }
        if($i <(count($nameimg) -1)){
            $imgupload .= $nameimg[$i].',';
        }else{
            $imgupload .= $nameimg[$i];
        }  
    }
return $imgupload;
}

?>