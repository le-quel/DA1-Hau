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
                $img1 = $_FILES['img1']['name'];
                $img2 = $_FILES['img2']['name'];
                $img3 = $_FILES['img3']['name'];
                $img4 = $_FILES['img4']['name'];
                $gallery = array(
                    'img1'=> $img1,
                    'img2'=> $img2,
                    'img3'=> $img3,
                    'img4'=> $img4,
                );
                $target_dir = "../uploads/";

                $target_file = $target_dir . basename($_FILES['image']['name']);

                $image = $target_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                add_product($id, $name, $image, $gallery, $price, $sale, $info,$view, $hot,$quantity, $id_category);
            }
            $list_category = category_select_all();
            require_once "products/add-product.php";
            break;
            case 'update-product':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $one = getone_product($id);
                    // echo $id;
                    // print_r($one);
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
                    $img1 = $_FILES['img1']['name'];
                    $img2 = $_FILES['img2']['name'];
                    $img3 = $_FILES['img3']['name'];
                    $img4 = $_FILES['img4']['name'];
                    $gallery = array(
                        'img1'=> $img1,
                        'img2'=> $img2,
                        'img3'=> $img3,
                        'img4'=> $img4,
                    );
                    $target_dir = "../Uploads/";
    
                    $target_file = $target_dir . basename($_FILES['image']['name']);
    
                    $image = $target_file;
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                    update_product($id, $name, $image, $gallery, $price, $sale, $info,$view, $hot,$quantity, $id_category);
                    
                }
                $list_category = category_select_all();
                require_once "products/update-product.php";
                break;
            case 'del-product':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
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
            if(isset($_POST['themmoi'])){
                $name = $_POST['name'];
                $home = $_POST['home'];
                addcategory($name, $home);
            }
            require_once "categorys/add-category.php";
            break;
        case 'update-category':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $one=getonecategory($id);
              
            }
            if((isset($_POST['capnhat'])) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $home = $_POST['home'];
               
                updatecategory($id, $name, $home);
            }
          
            require_once "categorys/update-category.php";
            break;
        case 'del-category':
            if(isset($_GET['id'])){
                $id=$_GET['id'];
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
            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
               
                $username = $_POST['username'];
                $password = $_POST['password'];
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $role = $_POST['role'];
                addUser($id,$username, $password, $fullname, $email, $phone, $address, $role);
            }
            require_once "users/add-user.php";
            break;
            case 'update-user':
                if (isset($_GET['id'])) {
                   $id = $_GET['id'];
                   $one=getoneuser($id);
                 
               }
            
               if((isset($_POST['capnhat'])) && ($_POST['capnhat'])) {
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
               }
               $user = render_alluser();
               require_once "users/update-user.php";
               break;
               case 'del-user':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    deluser($id);
                }
                $user = render_alluser();
            require_once "users/show-user.php";
            break;
        default:
            require_once "views/home.php";
            break;
        
    }

} else {
    require_once "views/home.php";
}

require_once "views/footer.php";

ob_end_flush();
?>