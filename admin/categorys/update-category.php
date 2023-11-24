
<main class="my-5">
    <div class="container">
        <a href="index.php?page=category">Quay Lại</a>
        <h3 class="text-center">Chỉnh Sửa Danh Mục</h3>
        <form action="index.php?page=update-category" method="post">
            <div class="form-group mb-3">
                <label for="name">Tên Danh Mục</label>
                <input type="text" name="name" id="name" class="form-control" value="<?=$one[0]['name'] ?>"
                    placeholder="Tên Danh Mục....">
            </div>

            <div class="form-group mb-3">
                <label for="home">Home</label>
                <input type="number" name="home" id="password" placeholder="home..." value="<?=$one[0]['home'] ?>"
                    class="form-control">
            </div>

            <input class="btn btn-primary" type="hidden" name="id" value="<?=$one[0]['id'] ?>">
            <button type="submit" class="btn btn-primary" name="capnhat" value=" Thêm Mới ">Cập Nhật Danh Mục</button>
        </form>
    </div>
</main>