<main class="my-5">
    <div class="container">
        <h3 class="text-center mb-3">Đăng Ký</h3>

        <form action="index.php?page=register-function" method="POST" class="form-container">
            <p class="err">
                <?php
                if (isset($_SESSION["message"]) && $_SESSION["message"] != "") {
                    echo $_SESSION["message"];
                    unset($_SESSION["message"]);
                }
                ?>
            </p>
            <div class="form-group mb-4">
                <label for="username">Tên Đăng Nhập</label>
                <input type="text" name="username" id="username" class="form-control">
                <span class="err" id="usernameErr"></span>
            </div>

            <div class="form-group mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
                <span class="err" id="emailErr"></span>
            </div>

            <div class="form-group mb-4">
                <label for="password">Mật Khẩu</label>
                <input type="password" name="password" id="password" class="form-control">
                <span class="err" id="passwordErr"></span>
            </div>

            <div class="form-group mb-4">
                <label for="confirm">Nhập Lại Mật Khẩu</label>
                <input type="password" name="confirm" id="confirm" class="form-control">
                <span class="err" id="confirmErr"></span>
            </div>

            <div class="form-group mb-3">
                <input type="submit" value="Đăng Ký" class="btn-form" name="btn-register">
            </div>

            <p>Bạn Đã Có Tài Khoản ? <a class="text-danger" href="index.php?page=login">Đăng Nhập Ngay</a></p>
        </form>
    </div>

</main>