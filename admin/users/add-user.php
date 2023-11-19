<main class="my-5">
    <div class="container">
        <a href="index.php?page=user">Quay Lại</a>
        <h3 class="text-center">Thêm Người Dùng Mới</h3>
        <form action="index.php?page=add-user" method="post">
            <div class="form-group mb-3">
                <label for="username">Tài Khoản</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Tài Khoản....">
            </div>

            <div class="form-group mb-3">
                <label for="password">Mật Khẩu</label>
                <input type="password" name="password" id="password" placeholder="Mật Khẩu..." class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="fullname">Họ Và Tên</label>
                <input type="text" name="fullname" id="fullname" placeholder="Họ Và Tên..." class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="Email">Email</label>
                <input type="text" name="email" id="email" placeholder="Emai..." class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="Phone">Số Điện Thoại</label>
                <input type="text" name="phone" id="phone" placeholder="Số Điện Thoại..." class="form-control">
            </div>


            <div class="form-group mb-3">
                <label for="address">Địa Chỉ</label>
                <input type="text" name="address" id="address" placeholder="address..." class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="role"> Vai Trò</label>
                <select name="role" id="role" class="fomr-control">
                    <option class="fomr-control" value="0">Người Dùng</option>
                    <option class="fomr-control" value="1">Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="themmoi" value=" Thêm Mới ">Thêm Người Dùng</button>
        </form>
    </div>
</main>