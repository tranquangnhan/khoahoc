

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-4">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">ID video youtube(mỗi id cách nhau bởi dấy phẩy)</label>
                    <input type="text" name="idkhoayt"  class="form-control" placeholder="" >
                </div>
                <div class="form-group">
                    <div class="form-group">
                    <label for="">ID Lớp Học</label>
                      <select class="form-control" name="idclass" id="">
                        <?php
                            foreach ($getAllClass as $row) {
                                echo ' <option value="'.$row['id'].'">'.$row['name'].'</option>';
                            }
                        ?>

                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">ID Môn Học</label>
                    <select class="form-control" name="idmon" id="">
                        <?php
                            foreach ($getAllSubject as $row) {
                                echo ' <option value="'.$row['id'].'">'.$row['name'].'</option>';
                            }
                        ?>
                      </select>    
                </div>
                <div class="form-group">
                    <label for="">Ảnh Đại Diện</label>
                    <input type="file" name="img[]" multiple class="form-control" placeholder="" >
                </div>
                <input type="submit" name="add" class="btn btn-primary" placeholder="" >
            </form>
        </div>
    </div>
</div>