<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CLASS</th>
                        <th>XOÁ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($getAllClass as $row) {
                            echo '<tr>
                                    <td>'.$row['id'].'</td>
                                    <td>'.$row['name'].'</td>
                                    <td><a href="?act=lopdel&id='.$row['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>';
                        }
                    ?>
               
                </tbody>
            </table>
        </div>
    </div>
</div>
