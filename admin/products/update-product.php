<main class="my-5">
    <div class="container">
        <h3 class="text-center"> Chỉnh Sửa Sản Phẩm</h3>

        <form action="index.php?page=update-product&id=<?= $one[0]['id'] ?>" method="post"
            style="width:500px; margin:0 auto;" class="mt-3 mb-5" enctype="multipart/form-data">


            <div class="form-group mb-3">
                <label for="id_category">Tên Danh Mục</label>

                <select class="form-control" name="id_category" id="id_category">
                    <option value="0"><?= $list_category[0]['name'] ?></option>
                    <?php
                    if (isset($list_category)) {
                        foreach ($list_category  as $dm) {
                            echo '<option value="' . $dm['id'] . '">' . $dm['name'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="name">Tên Sản Phẩm</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= $one[0]['name'] ?>">
            </div>

            <div class="form-group mb-3">
                <label for="image">Hình Ảnh</label>
                <input type="file" name="image" id="image" class="form-control d-block" value="<?= $one[0]['image'] ?>">
            </div>

            <div class="form-group mb-3">
                <label for="gallery">Hình Ảnh Chi Tiết</label>
                <?php foreach (json_decode($one[0]['gallery']) as $key => $gallery) { ?>
                <input type="file" name="<?php echo ($key) ?>" value="<?php echo $gallery  ?>" id="<?php echo $key ?>"
                    class="form-control d-block">
                <?php } ?>
            </div>



            <div class="form-group mb-3">
                <label for="price">Giá</label>
                <input type="text" name="price" id="price" class="form-control" value="<?= $one[0]['price'] ?>">
            </div>

            <div class="form-group mb-3">
                <label for="sale">Sale</label>
                <input type="text" name="sale" id="sale" class="form-control" value="<?= $one[0]['sale'] ?>">
            </div>

            <div class="form-group mb-3">
                <label for="info"> Mô Tả</label>
                <input type="text" name="info" id="info" class="form-control" value="<?= $one[0]['info'] ?>">
            </div>

            <div class="form-group mb-3">
                <label for="view">Lượt Xem</label>
                <input type="text" name="view" id="view" class="form-control" value="<?= $one[0]['view'] ?>">
            </div>

            <div class="form-group mb-3">
                <label for="hot">Hot</label>
                <select class="form-control" name="hot" id="hot">
                    <option value="0">Bình Thường</option>
                    <option value="1">Sản Phẩm Hot</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="quantity">Số Lượng</label>
                <input type="text" name="quantity" id="quantity" class="form-control"
                    value="<?= $one[0]['quantity'] ?>">
            </div>



            <div class="form-group mb-3">

                <input type="submit" name="capnhat" value="Chỉnh Sửa Sản Phẩm" class="btn btn-dark px-5">
            </div>
        </form>
    </div>
</main>