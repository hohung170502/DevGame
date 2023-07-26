<?php

include './admin/config/config.inc.php';
session_start();

// Connect database
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_GET['action'])) {
    return;
}

$action = $_GET['action'];

switch ($action) {
    case 'signup':
        signup();
        break;
    case 'login':
        login();
        break;
    case 'addGame':
        AddGame();
        break;
    case 'deleteGame':
        DeleteGame();
        break;
    case 'getDetail':
        GetDetail();
        break;
    case 'updateGame':
        UpdateGame();
        break;
    default:
        return;
}

function signup()
{
    global $db;
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? md5($_POST['password']) : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // Check if fields are empty
    if (empty($username) || empty($password) || empty($email)) {
        echo json_encode(['status' => false, 'message' => 'Không được để thiếu thông tin']);
        return;
    }

    // Check if username is already exists
    $sql = "SELECT * FROM `account` WHERE `username` = '$username'";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo json_encode(['status' => false, 'message' => 'Tên đăng nhập đã tồn tại']);
        return;
    }

    // Insert new account
    $sql = "INSERT INTO `account` (`username`, `password`, `email`) VALUES ('$username', '$password', '$email')";
    $result = mysqli_query($db, $sql);

    if ($result) {
        echo json_encode(['status' => true, 'message' => 'Đăng ký thành công']);
        return;
    }
    echo json_encode(['status' => false, 'message' => 'Đăng ký thất bại']);
}

function login()
{
    global $db;
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? md5($_POST['password']) : '';

    // Check if fields are empty
    if (empty($username) || empty($password)) {
        echo json_encode(['status' => false, 'message' => 'Không được để thiếu thông tin']);
        return;
    }
    
    // Check if account is exists
    $sql = "SELECT * FROM `account` WHERE `username` = '$username' AND `password` = '$password'";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['Username'] = $username;
        echo json_encode(['status' => true, 'message' => 'Đăng nhập thành công']);
        return;
    }

    echo json_encode(['status' => false, 'message' => 'Tên đăng nhập hoặc mật khẩu không đúng']);
}

function AddGame()
{
    global $db;
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $discount = isset($_POST['discount']) ? $_POST['discount'] : 0;
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $image = isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : '';
    
    // Check if fields are empty
    if (empty($name) || empty($price)) {
        echo json_encode(['status' => false, 'message' => 'Không được để thiếu thông tin']);
        return;
    }

    $username = $_SESSION['Username'];
    // Get id user
    $sql = "SELECT * FROM `account` WHERE `username` = '$username' AND `role` = '1'";
    $result = mysqli_query($db, $sql);

    $id_admin = null;

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id_admin = $row['id'];
    } else {
        echo json_encode(['status' => false, 'message' => 'Không có quyền truy cập']);
        return;
    }


    if ($image != '') {
        // Upload image
        $target_dir = "./assets/img/Uploads/";
        $target_file = $target_dir . time(). basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo json_encode(['status' => false, 'message' => 'Lỗi upload ảnh']);
            return;
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image = time() . basename($_FILES["image"]["name"]);
            } else {
                echo json_encode(['status' => false, 'message' => 'Lỗi upload ảnh']);
                return;
            }
        }
    }
    else {
        $image = 'STEAM 200 TWD.png';
    }

    // Insert new game
    $sql = "INSERT INTO `games` (`name`, `desc`, `status`, `price`, `discount`, `author`, `type`, `image`) VALUES ('$name', '$description', '$status', '$price', '$discount', '$id_admin', '$type', '$image')";
    
    $result = mysqli_query($db, $sql);
    if ($result) {
        echo json_encode(['status' => true, 'message' => 'Thêm sản phẩm thành công']);
        return;
    }
    echo json_encode(['status' => false, 'message' => 'Thêm sản phẩm thất bại']);
}

function DeleteGame()
{
    global $db;
    $id = isset($_POST['id']) ? $_POST['id'] : '';

    // check if fields are empty
    if (empty($id)) {
        echo json_encode(['status' => false, 'message' => 'Không được để thiếu thông tin']);
        return;
    }

    // check if game is exists
    $sql = "SELECT * FROM `games` WHERE `id` = '$id'";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
        $sql = "DELETE FROM `games` WHERE `id` = '$id'";
        $result = mysqli_query($db, $sql);
        if ($result) {
            echo json_encode(['status' => true, 'message' => 'Xóa sản phẩm thành công']);
            return;
        }
    }

    echo json_encode(['status' => false, 'message' => 'Sản phẩm không tồn tại']);
}

function GetDetail()
{
    global $db;
    $id = isset($_POST['id']) ? $_POST['id'] : '';

    // check if fields are empty
    if (empty($id)) {
        echo json_encode(['status' => false, 'message' => 'Không được để thiếu thông tin']);
        return;
    }

    $sql = "SELECT * FROM `games` WHERE `id` = '$id'";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode(['status' => true, 'data' => $row]);
        return;
    }
    echo json_encode(['status' => false, 'message' => 'Sản phẩm không tồn tại']);
}

function UpdateGame() 
{
    global $db;
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : 0;
    $price = isset($_POST['price']) ? $_POST['price'] : 0;
    $discount = isset($_POST['discount']) ? $_POST['discount'] : 0;
    $type = isset($_POST['type']) ? $_POST['type'] : 0;

    $image = isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : '';

    
    // Check if fields are empty
    if (empty($id) || empty($name) || empty($price)) {
        echo json_encode(['status' => false, 'message' => 'Không được để thiếu thông tin']);
        return;
    }

    if ($image != '') {
        // Upload image
        $target_dir = "./assets/img/Uploads/";
        $target_file = $target_dir . time(). basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }


        // Check file size
        if ($_FILES["image"]["size"] > 5000000) {
            $uploadOk = 0;
        }


        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo json_encode(['status' => false, 'message' => 'Lỗi upload ảnh']);
            return;
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image = time() . basename($_FILES["image"]["name"]);
            } else {
                echo json_encode(['status' => false, 'message' => 'Lỗi upload ảnh']);
                return;
            }
        }
    }
    
    if ($image != '') {
        $sql = "UPDATE `games` SET `name` = '$name', `desc` = '$description', `status` = '$status', `price` = '$price', `discount` = '$discount', `type` = '$type', `image` = '$image' WHERE `id` = '$id'";
    } else {
        $sql = "UPDATE `games` SET `name` = '$name', `desc` = '$description', `status` = '$status', `price` = '$price', `discount` = '$discount', `type` = '$type' WHERE `id` = '$id'";
    }

    $result = mysqli_query($db, $sql);
    if ($result) {
        echo json_encode(['status' => true, 'message' => 'Cập nhật sản phẩm thành công']);
        return;
    }
    echo json_encode(['status' => false, 'message' => 'Cập nhật sản phẩm thất bại']);
}