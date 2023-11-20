<main class="my-5">
    <div class="container">
        <a href="index.php?page=category">Quay Lại</a>
        <h3 class="text-center">Thêm Danh Mục Mới</h3>
        <form action="index.php?page=add-category" method="post">
            <div class="form-group mb-3">
                <label for="name">Tên Danh Mục</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Tên Danh Mục....">
            </div>

            <div class="form-group mb-3">
                <label for="home">Home</label>
                <input type="number" name="home" id="password" placeholder="home..." class="form-control">
            </div>


            <button type="submit" class="btn btn-primary" name="themmoi" value=" Thêm Mới ">Thêm Danh Mục</button>
        </form>
    </div>
</main>