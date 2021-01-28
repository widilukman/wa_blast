<?php
session_start(); //inisialisasi session
require_once('../functions/db_login.php');

//cek apakah user sudah submit login
if (isset($_POST['login'])) {
    $valid = TRUE; //flag
    //cek validasi email
    $username = test_input($_POST['kode']);
    if ($username == '') {
        $error_username = "username is required";
        $valid = FALSE;
    }

    //cek validasi password
    $password = test_input($_POST['password']);
    if ($password == "") {
        $error_password = "password is required";
        $valid = FALSE;
    }

    //cek validasi
    if ($valid) {
        //asign query
        $query_user = " SELECT * FROM user WHERE kode='" . $username . "' AND password='" . md5($password) . "' ";
        //execute query
        $result = $db->query($query_user);
        if (!$result) {
            die('could not querry the databases: <br>' . $db->error);
        } else {
            if ($result->num_rows > 0) {   //login berhasil
                $row = $result->fetch_object();
                $_SESSION['nama'] = $row->nama;
                header('location: index.php');
                exit;
            } else {   //login gagal
                $error_email = 'Kombinasi username dan password salah';
                $error_password = 'Kombinasi username dan password salah';
            }
        }
        //close db connection
        $db->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | WA Blast</title>
    <!-- Favicon icon -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="../assets/plugins/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="../assets/images/login_image.png" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper mb-4">
                                <img src="../assets/images/logo-text.png" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Sign into your account</p>
                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                <div class="form-group <?php if (isset($error_username)) echo "is-invalid"; ?>" >
                                    <label for="username" class="sr-only">Username</label>
                                    <input type="text" value="<?php if (isset($username)) echo $username; ?>" name="kode" id="username" class="form-control" placeholder="Username">
                                    <span><?php if (isset($error_username)) echo $error_username; ?></span>
                                </div>
                                <div class="form-group mb-4 <?php if (isset($error_password)) echo "is-invalid"; ?>">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                                    <span><?php if (isset($error_password)) echo $error_password; ?></span>
                                </div>
                                <input type="submit" name="login" id="login" class="btn btn-block login-btn mb-4" value="login">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>