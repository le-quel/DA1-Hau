<a href="index.php?page=add-category">Thêm Danh Mục Mới</a>
<h3 class="text-center">Danh Sách Danh Mục</h3>
<table class="table table-striped">
    <thead>
        <th scope="col">STT</th>
        <th scope="col">Tên Danh Mục</th>
        <th scope="col">Home</th>

        <th scope="col">Thao Tác</th>
    </thead>
    <tbody>

        <?php $i=1; foreach( $category as $key => $category){ ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $category['name'] ?></td>
            <td><?php echo $category['home'] ?></td>


            <td><a href="index.php?page=update-category&id=<?php echo $category['id']?>">Sửa</a>|
                <a href=" index.php?page=del-category&id=<?php echo $category['id']?>">Xóa</a>
            </td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>