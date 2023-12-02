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
<script>
document.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        var errors = [];

        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var fullname = document.getElementById('fullname').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var address = document.getElementById('address').value;

        // Check if fields are empty
        if (username === '' || password === '' || fullname === '' || email === '' || phone === '' ||
            address === '') {
            errors.push('Vui lòng điền đầy đủ thông tin.');
        }

        // Check password length
        if (password.length < 6) {
            errors.push('Mật khẩu phải có ít nhất 6 ký tự.');
        }

        // Check email format
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            errors.push('Địa chỉ email không hợp lệ.');
        }

        // Check phone number format (10 digits)
        var phoneRegex = /^\d{10}$/;
        if (!phoneRegex.test(phone)) {
            errors.push('Số điện thoại phải có 10 chữ số.');
        }

        // Display errors or submit the form
        if (errors.length > 0) {
            event.preventDefault(); // Prevent form submission
            alert(errors.join('\n')); // Display all errors
        }
    });
});
</script>