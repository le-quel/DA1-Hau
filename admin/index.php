<?php
session_start();
ob_start();

require_once "../models/pdo.php";
require_once "../models/user.php";
require_once "../models/thong-ke.php";
require_once "../models/category.php";
require_once "../models/product.php";

if (isset($_SESSION["admin"]) && is_array($_SESSION["admin"]) && (count($_SESSION["admin"]) > 0)) {
    $admin = $_SESSION["admin"];
    extract($admin);
} else {
    header('Location: login.php');
}


require_once "views/header.php";

if (isset($_GET["page"])) {
    $page = $_GET["page"];

    switch ($page) {
        case 'statistical':
            $list_tksp = get_statistical();

            require_once "views/statistical/statistical.php";
            break;
        case 'product':
            $product =  list_product();
            require_once "products/show-product.php";
            break;
        case 'add-product':

            if ((isset($_POST['themmoi'])) && ($_POST['themmoi'])) {


                $id_category = $_POST['id_category'];
                $name = $_POST['name'];

                $info = $_POST['info'];
                $price = $_POST['price'];
                $sale = $_POST['sale'];
                $view = $_POST['view'];
                $hot = $_POST['hot'];
                $quantity = $_POST['quantity'];

              
                // Xử lý tải lên ảnh chính
                $image_path; // Giữ nguyên URL ảnh cũ mặc định
                if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                    $target_dir = "../Uploads/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        $image_path = $target_file;
                    } else {
                        $message = "Lỗi khi tải lên ảnh.";
                    }
                } else {
                    // Người dùng không tải lên ảnh mới, giữ nguyên URL của ảnh cũ
                    $image_path = $one[0]['image']; // Sử dụng URL ảnh cũ, điều này cần phải được thay đổi tùy vào cấu trúc dữ liệu của bạn.
                }
        
                $gallery_images = [];
                // $target_dir_gallery = "../Uploads";
                $target_dir = "../uploads/";
                if (isset($_FILES["gallery"])) {
                    foreach ($_FILES["gallery"]["tmp_name"] as $key => $tmp_name) {
                        $gallery_image_name = $_FILES["gallery"]["name"][$key];
                        $gallery_target_file = $target_dir . basename($gallery_image_name);
                        // Chỉ xử lý ảnh nếu người dùng đã tải lên
                        if ($_FILES["gallery"]["error"][$key] == UPLOAD_ERR_OK) {
                            if (move_uploaded_file($tmp_name, $gallery_target_file)) {
                                $gallery_images[] = $gallery_target_file;
                            } else {
                                $message = "Lỗi khi tải lên ảnh trong gallery.";
                                break;
                            }
                        }
                    }
                }
        
                if (empty($message)) {
                    $galleryData = ["images" => $gallery_images];
                    $jsonGallery = json_encode($gallery_images);
                    
                   // Insert product data
                try {
                    $sql = "INSERT INTO product(name, image, gallery, price, sale, info,view, hot, quantity, id_category, created_at) VALUES (?,?,?,?,?,?,?,?,?,?,NOW())";
                 
                    pdo_execute($sql, $name, $image_path, $jsonGallery,  $price, $sale, $info, $view, $hot, $quantity, $id_category);
                  

                    echo "Thêm thành công!";
                }catch (PDOException $e) {
                    echo "Thêm thất bại: " . $e->getMessage();
                }
                                }
                                header('Location: index.php?page=product');
                            }
            $list_category = category_select_all();
            require_once "products/add-product.php";
            break;
           case 'update-product':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $one = getone_product($id);
               
                }
                
                if ((isset($_POST['capnhat'])) && ($_POST['capnhat'])) {
           
            $id_category = $_POST['id_category'];
            $name = $_POST['name'];

            $info = $_POST['info'];
            $price = $_POST['price'];
            $sale = $_POST['sale'];
            $view = $_POST['view'];
            $hot = $_POST['hot'];
            $quantity = $_POST['quantity'];

          
            // Xử lý tải lên ảnh chính
            $image_path = "";
            if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                $target_dir = "../Uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image_path = $target_file;
                } else {
                    $message = "Lỗi khi tải lên ảnh.";
                }
            }
    
            $gallery_images = [];
            // $target_dir_gallery = "../Uploads";
            $target_dir = "../uploads/";
            if (isset($_FILES["gallery"])) {
                foreach ($_FILES["gallery"]["tmp_name"] as $key => $tmp_name) {
                    $gallery_image_name = $_FILES["gallery"]["name"][$key];
                    $gallery_target_file = $target_dir . basename($gallery_image_name);
                    // Chỉ xử lý ảnh nếu người dùng đã tải lên
                    if ($_FILES["gallery"]["error"][$key] == UPLOAD_ERR_OK) {
                        if (move_uploaded_file($tmp_name, $gallery_target_file)) {
                            $gallery_images[] = $gallery_target_file;
                        } else {
                            $message = "Lỗi khi tải lên ảnh trong gallery.";
                            break;
                        }
                    }
                }
            }
    
            if (empty($message)) {
                $galleryData = ["images" => $gallery_images];
                $jsonGallery = json_encode($gallery_images);
                if ($image_path!="" &&  $jsonGallery!=""){
                    try {
                        $sql = "UPDATE product SET name=?, image=?, gallery=?, price=?, sale=?, info=?, view=?, hot=?, quantity=?, id_category=?, created_at=NOW(), update_at=NOW() WHERE id=?";
                        pdo_execute($sql, $name, $image_path, $jsonGallery,  $price, $sale, $info, $view, $hot, $quantity, $id_category, $id);
                        echo "Chỉnh sửa thành công";
                    } catch (PDOException $e) {
                        echo "Chỉnh Sửa thất bại! " . $e->getMessage();
                    }
                }else {
                    try {
                        $sql = "UPDATE product SET name=?, price=?, sale=?, info=?, view=?, hot=?, quantity=?, id_category=?, created_at=NOW(), update_at=NOW() WHERE id=?";
                        pdo_execute($sql, $name,  $price, $sale, $info, $view, $hot, $quantity, $id_category, $id);
                        echo "Chỉnh sửa thành công";
                    } catch (PDOException $e) {
                        echo "Chỉnh Sửa thất bại! " . $e->getMessage();
                    }
                }
               // Insert product data
              
                            }
                            header('Location: index.php?page=product');
                        }

        $list_category = category_select_all();
        require_once "products/update-product.php";
        break;

        case 'del-product':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                del_product($id);
            }
            $product =  list_product();
            require_once "products/show-product.php";
            break;
        case 'category':
            $category = category_select_all();
            require_once "categorys/show-category.php";
            break;
        case 'add-category':
            if (isset($_POST['themmoi'])) {
                $name = $_POST['name'];
                $home = $_POST['home'];
                addcategory($name, $home);
                header("Location: index.php?page=category");
            }
            require_once "categorys/add-category.php";
            break;
        case 'update-category':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $one = getonecategory($id);
            }
            if ((isset($_POST['capnhat'])) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $home = $_POST['home'];

                updatecategory($id, $name, $home);
                header("Location: index.php?page=category");
            }

            require_once "categorys/update-category.php";
            break;
        case 'del-category':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delcategory($id);
            }
            $category = category_select_all();
            require_once "categorys/show-category.php";
            break;
        case 'user':
            $user = render_alluser();
            require_once "users/show-user.php";
            break;
        case 'add-user':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {

                $username = $_POST['username'];
                $password = $_POST['password'];
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $role = $_POST['role'];
                addUser($id, $username, $password, $fullname, $email, $phone, $address, $role);
                header('Location: index.php?page=user');
            }
            require_once "users/add-user.php";
            break;
        case 'update-user':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $one = getoneuser($id);
            }

            if ((isset($_POST['capnhat'])) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $role = $_POST['role'];
                $user = render_alluser();
                updateUser($id, $username, $password, $fullname, $email, $phone, $address, $role);
                header("Location: index.php?page=user");
            }
            $user = render_alluser();
            require_once "users/update-user.php";
            break;
        case 'del-user':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                deluser($id);
            }
            $user = render_alluser();
            require_once "users/show-user.php";
            break;
        default:
        $list_tksp = get_statistical();
        require_once "views/statistical/statistical.php";
            break;
    }
} else {
    $list_tksp = get_statistical();
    require_once "views/statistical/statistical.php";
}

require_once "views/footer.php";

ob_end_flush();