<?php
if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0))
{
    extract($_SESSION['s_user']);
    $userinfo=get_user($id);
    $_SESSION['s_user']=$userinfo;
    extract($userinfo);
}
?>
<main class="my-5">
    <div class="container">
        <h3 class="text-center mb-3">Thông tin khách hàng</h3>

        <form action="index.php" method="POST" class="form-container">
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
                <input type="text" name="username" value="<?=$username?>" id="username" class="form-control">
                <span class="err" id="usernameErr"></span>
            </div>

            <div class="form-group mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" value="<?=$email?>" id="email" class="form-control">
                <span class="err" id="emailErr"></span>
            </div>

            <div class="form-group mb-4">
                <label for="password">Mật Khẩu</label>
                <input type="password" name="password" value="<?=$password?>" id="password" class="form-control">
                <span class="err" id="passwordErr"></span>
            </div>
            <p>Cập nhật thành công /<a class="text-danger" href="index.php">Quay về trang chủ</a></p>
            

        </form>
    </div>

</main>