<h3 class="text-center">Danh Sách Danh Mục</h3>
<a href="index.php?page=add-category" class="btn btn-primary">Thêm Danh Mục Mới</a>
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


            <td><a href="index.php?page=update-category&id=<?php echo $category['id']?>"><i class="bx bx-edit"></i></a>|
                <a href=" index.php?page=del-category&id=<?php echo $category['id']?>"><i class="bx bx-trash"></i></a>
            </td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>