<main class="my-5">
    <div class="container">
        <h3 class="text-center">Quản Lý Sản Phẩm</h3>
        <form action="index.php?page=add-product" method="post" style="width:500px; margin:0 auto;" class="mt-3 mb-5"
            enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="id_category">Tên Danh Mục</label>

                <select class="form-control" name="id_category" id="id_category">
                    <option value="0">Chọn Danh Mục</option>
                    <?php
            if(isset( $list_category )){
                foreach($list_category  as $dm){
                    echo '<option value="'.$dm['id'].'">'.$dm['name'].'</option>';
                }
            } 
        ?>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="name">Tên Sản Phẩm</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="img">Hình Ảnh</label>
                <input type="file" name="image" id="image" class="form-control d-block">
            </div>

            <div class="form-group mb-3">
                <label for="gallery">Bộ sưu tập</label>
                <input type="file" name="gallery[]" id="gallery" class="form-control d-block" multiple>
            </div>

            <div class="form-group mb-3">
                <label for="price">Giá</label>
                <input type="text" name="price" id="price" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="sale">Sale</label>
                <input type="text" name="sale" id="sale" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="info"> Mô Tả</label>
                <input type="text" name="info" id="info" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="view">Lượt Xem</label>
                <input type="text" name="view" id="view" class="form-control">
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
                <input type="text" name="quantity" id="quantity" class="form-control">
            </div>

            <div class="form-group mb-3">
                <input type="submit" name="themmoi" value="Thêm Sản Phẩm Mới" class="btn btn-dark px-5">
            </div>
        </form>
    </div>
</main>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector('form');
    var submitted = false;

    form.addEventListener('submit', function(event) {
        if (!submitted) {
            var errors = [];

            var idCategory = document.getElementById('id_category').value;
            var name = document.getElementById('name').value;
            var image = document.getElementById('image').value;
            var price = document.getElementById('price').value;
            var sale = document.getElementById('sale').value;

            // Check if fields are empty
            if (idCategory === '0' || name === '' || image === '' || price === '' || sale === '') {
                errors.push('Vui lòng điền đầy đủ thông tin.');
            }

            // Check if price is a number and has at most 9 digits
            if (isNaN(price) || price.length > 9) {
                errors.push('Giá chỉ được nhập số và dưới 9 ký tự.');
            }

            // Check if sale is a number and has at most 3 digits
            if (isNaN(sale) || sale.length > 3) {
                errors.push('Sale chỉ được nhập số và dưới 3 ký tự.');
            }

            // Display errors or submit the form
            if (errors.length > 0) {
                event.preventDefault(); // Prevent form submission
                alert(errors.join('\n')); // Display all errors
            } else {
                submitted = true; // Prevent multiple submissions
            }
        }
    });
});
</script>