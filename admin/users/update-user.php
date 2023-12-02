<?php   
    if (!isset($one) || !is_array($one)) {
        $one = []; // Initialize $one as an empty array
    }
?>
<main class="my-5">
    <div class="container">
        <a href="index.php?page=user" class="btn btn-primary">Quay Lại</a>
        <h3 class="text-center">Chỉnh Sửa Thông Tin Người Dùng</h3>
        <form action="index.php?page=update-user" method="post">
            <div class="form-group mb-3">
                <label for="username">Tài Khoản</label>
                <input type="text" name="username" id="username" class="form-control" value="<?=$one[0]['username'] ?>"
                    placeholder="Tài Khoản....">
            </div>

            <div class="form-group mb-3">
                <label for="password">Mật Khẩu</label>
                <input type="password" name="password" id="password" placeholder="Mật Khẩu..."
                    value="<?=$one[0]['password'] ?>" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="fullname">Họ Và Tên</label>
                <input type="text" name="fullname" id="fullname" placeholder="Họ Và Tên..."
                    value="<?=$one[0]['fullname'] ?>" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="Email">Email</label>
                <input type="text" name="email" id="email" placeholder="Emai..." value="<?=$one[0]['email'] ?>"
                    class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="Phone">Số Điện Thoại</label>
                <input type="text" name="phone" id="phone" placeholder="Số Điện Thoại..." value="<?=$one[0]['phone'] ?>"
                    class="form-control">
            </div>


            <div class="form-group mb-3">
                <label for="address">Địa Chỉ</label>
                <input type="text" name="address" id="address" placeholder="address..." value="<?=$one[0]['address'] ?>"
                    class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="role"> Vai Trò</label>
                <select name="role" id="role" class="fomr-control" value="<?=$one[0]['role'] ?>">
                    <option class="fomr-control" value="0">Người Dùng</option>
                    <option class="fomr-control" value="1">Admin</option>
                </select>
            </div>
            <input type="hidden" name="id" value="<?=$one[0]['id'] ?>">
            <button type="submit" class="btn btn-primary" name="capnhat" value=" Cập Nhật ">Cập Nhật</button>
        </form>
    </div>
</main>