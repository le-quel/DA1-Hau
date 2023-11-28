<main class="my-5">
    <div class="container">
        <h3 class="text-center mb-3">Đăng Nhập</h3>

        <form action="index.php?page=login-function" method="POST" class="form-container">
            <?php
            if (isset($_SESSION["message"]) && $_SESSION["message"] != "") {
                echo $_SESSION["message"];
                unset($_SESSION["message"]);
            }
            ?>
            <div class="form-group mb-4">
                <label for="username">Tên Đăng Nhập</label>
                <input type="text" name="username" id="username" class="form-control">
                <span class="err" id="usernameErr"></span>
            </div>

            <div class="form-group mb-4">
                <label for="password">Mật Khẩu</label>
                <input type="password" name="password" id="password" class="form-control">
                <span class="err" id="passwordErr"></span>
            </div>

            <div class="form-group mb-3">
                <input type="submit" value="Đăng Nhập" class="btn-form" name="btn-login">
            </div>

            <p>Bạn Chưa Có Tài Khoản ? <a class="text-danger" href="index.php?page=register">Đăng Ký Ngay</a></p>
            <p>Bạn là admin ? <a href="http://da1-hau.test/admin/login.php" class="text-danger">Run as administrator </a></p>
            <a href="" class="text-danger">Quên Mật Khẩu ?</a>
            
        </form>
    </div>
</main>