<?php
if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0))
{
    extract($_SESSION['s_user']);
    $userinfo=get_user($id);
    extract($userinfo);
}
?>
<div class="containerfull">
<h1> Đăng kí thành viên </h1>
        <img src="layout/images/banner.webp" alt="">
    </div>

    <section class="containerfull">
        <div class="container">
            <div class="boxleft mr2pt menutrai">
                <h1>Dành cho bạn</h1><br><br>
                
                <a href="">Cập nhật thông tin</a>
                <a href="">Lịch sử mua hàng</a>
                <a href="">Thoát hệ thống</a>
            </div>
            <div class="boxright">
                <h1>Đăng kí</h1><br>
                <div class="containerfull mr30">
                <form action="index.php?pg=updateuser" method="post">

                    <div class="row">
                        <div class="col-25">
                        <label for="username">Tên đăng nhập</label>
                        </div>
                        <div class="col-75">
                        <input type="text" id="username" value="<?=$username?>" name="username" placeholder="Nhập họ và tên" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                        <label for="password">Mật khẩu</label>
                        </div>
                        <div class="col-75">
                        <input type="password" id="password"value="<?=$password?>" name="password" placeholder="mật khẩu" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                        <label for="Email">Email</label>
                        </div>
                        <div class="col-75">
                        <input type="text" id="email" value="<?=$email?>" name="email" placeholder="email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                        <label for="Email">Địa chỉ</label>
                        </div>
                        <div class="col-75">
                        <input type="text" id="diachi" value="<?=$address?>" name="address" placeholder=" Địa chỉ" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                        <label for="Email">Điện thoại</label>
                        </div>
                        <div class="col-75">
                        <input type="text" id="dienthoai" value="<?=$phone?>" name="phone" placeholder="Điện thoại" class="form-control">
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                    </div>
                    </form>
                                </div>


                            </div>
    </section>