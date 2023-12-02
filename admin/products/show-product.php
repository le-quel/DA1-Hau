<h3 class="text-center">Quản Lý Sản Phẩm</h3>
<table class="table table-show-category">
    <thead>
        <tr>
            <th>STT</th>

            <th>Tên Sản Phẩm </th>
            <th>Hình Ảnh</th>


            <th>Giá</th>
            <th>Sale</th>

            <th>View</th>
            <th>Hot</th>
            <th>Số Lượng</th>
            <th>Ngày Nhập</th>

            <th>Thao Tác</th>
        </tr>
    </thead>
    <?php
        $i = 1;
        foreach ($product as $key => $product){
    ?>
    <tbody>
        <tr>
            <td><?php echo $i?></td>

            <td><?php echo $product['name'] ?></td>
            <td><img src="../Uploads/<?php echo $product['image']?>" alt="" width="50px"></td>


            <td><?php echo $product['price'] ?></td>
            <td><?php echo $product['sale'] ?></td>

            <td><?php echo $product['view'] ?></td>
            <td><?php echo $product['hot'] ?></td>
            <td><?php echo $product['quantity'] ?></td>
            <td><?php echo $product['created_at'] ?></td>

            <td><a href="index.php?page=update-product&id=<?php echo $product['id']?>"><i class="bx bx-edit"></i></a>
                <a href="index.php?page=del-product&id=<?php echo $product['id']?>"><i class="bx bx-trash"></i></a>
            </td>
        </tr>

        <?php $i++; }?>
    </tbody>
    <a href="index.php?page=add-product" class="btn btn-primary">Thêm Sản Phẩm Mới</a>
</table>