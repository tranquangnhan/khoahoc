<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ảnh</th>
                        <th>ID khoá youtube</th>
                        <th>ID Lớp</th>
                        <th>ID Môn</th>
                        <th>XOÁ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($getAllLesson as $row) {
                            echo '<tr>
                                    <td>'.$row['id'].'</td>
                                    <td><img width="50" height="50" src="../uploads/'.$row['img'].'"></td>
                                    <th>'.$row['idkhoayt'].'</th>
                                    <th>'.showClass($row['idclass'])['name'].'</th>
                                    <th>'.showSubject($row['idmon'])['name'].'</th>
                                    <td><a href="?act=lessondel&id='.$row['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>';
                        }
                    ?>
               
                </tbody>
            </table>
        </div>
    </div>
</div>
