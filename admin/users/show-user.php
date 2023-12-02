<h3 class="text-center">Danh Sách Người Dùng</h3>
<a href="index.php?page=add-user" class="btn btn-primary">Thêm Người Dùng Mới</a>
<table class="table table-striped">
    <thead>
        <th scope="col">STT</th>
        <th scope="col">Tài Khoản</th>
        <th scope="col">Mật Khẩu</th>
        <th scope="col">Họ Và Tên</th>
        <th scope="col">Email</th>
        <th scope="col">Số Điện Thoại</th>
        <th scope="col">Địa Chỉ</th>
        <th scope="col">Vai Trò</th>
        <th scope="col">Thao Tác</th>
    </thead>
    <tbody>

        <?php $i=1; foreach( $user as $key => $user){ ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $user['username'] ?></td>
            <td><?php echo $user['password'] ?></td>
            <td><?php echo $user['fullname'] ?></td>
            <td><?php echo $user['email'] ?></td>
            <td><?php echo $user['phone'] ?></td>
            <td><?php echo $user['address'] ?></td>
            <td><?php
        if($user['role']==0){
            echo 'Người Dùng';
        }else{
            echo 'Admin';
        }
        ?></td>
            <td><a href="index.php?page=update-user&id=<?php echo $user['id']?>"><i class="bx bx-edit"></i></a>|
                <a href=" index.php?page=del-user&id=<?php echo $user['id']?>"><i class="bx bx-trash"></i></a>
            </td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>