<?php
require_once 'database.php';
require_once 'models.php';

// Function to generate a random and secure cookie value
function generateCookieValue() {
    $length = 64; // Set the desired length for the cookie value
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+-=[]{}|:;"<>,.?/~'; // Define the characters to choose from
    $randomString = '';
    $max = strlen($characters) - 1;

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $max)];
    }

    return $randomString;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $form_action = $_POST["form_action"];
if ($form_action === "login") {
    // Assuming your form has input fields with names "email" and "password"
    $email = $_POST["email"];
    $user = User::getUserByEmail($email);

    if ($user !== -1) {
        // Email is registered, verify the password using bcrypt
        $password = $_POST["password"];
        $hashedPasswordFromDB = $user->password;
        $user_salt = $user->user_salt;
        $isPasswordCorrect = password_verify($password . $user_salt, $hashedPasswordFromDB);

        if ($isPasswordCorrect) {
            // Password matches, login successful

            // Generate a random and secure cookie value
            $cookieValue = generateCookieValue();

            // Set the cookie with a 4-day duration (4 * 24 * 60 * 60 seconds = 4 days)
            $cookieExpiration = time() + (4 * 24 * 60 * 60); // 4 days
            setcookie("titip_user", $cookieValue, $cookieExpiration, '/');

            // Create a new instance of the User class
            $loggedInUser = new User($user->email, $user->password, $user->status);

            // Insert the session information into the "sessions" table
            $loggedInUser->insertSession($cookieValue);

            header("Location: dashboard-konsumen.php");
            exit();
        } else {
    // Password doesn't match, display an error message
    $errorMessage = "Kata sandi salah";
    $encodedErrorMessage = urlencode($errorMessage);
    header("Location: masuk.php?error=$encodedErrorMessage&email=" . urlencode($email));
    exit();
}

    } else {
        // Email isn't registered, display an error message
        $errorMessage = "Email belum terdaftar";
        $encodedErrorMessage = urlencode($errorMessage);
        header("Location: masuk.php?error=$encodedErrorMessage");
        exit();
    }
}

 elseif ($form_action === "register") {
        // Assuming your form has input fields with names "email", "password", and "status"
        $reg_email = $_POST["email"];
        $reg_password = $_POST["password"];
        $reg_status = $_POST["status"];

        // Check if the email is already registered
        $existingUser = User::getUserByEmail($reg_email);
        if ($existingUser !== -1) {
            // Email is already registered, display an error message
            $errorMessage = "Email sudah terdaftar";
            $encodedErrorMessage = urlencode($errorMessage);
            header("Location: daftar.php?error=$encodedErrorMessage");
            exit();
        } else {
    // Email is not registered, proceed with user registration
    $newUser = new User($reg_email, $reg_password, $reg_status);
    if ($newUser->createUser()) {
        // Registration successful, redirect to masuk.php with success message
        $message = "Registrasi berhasil. Silahkan masuk";
        $encodedMessage = urlencode($message);
        header("Location: masuk.php?success=$encodedMessage");
        exit();
    } else {
        // Failed to register user, redirect to daftar.php with error message
        $message = "Registrasi gagal. Silahkan coba lagi";
        $encodedMessage = urlencode($message);
        header("Location: daftar.php?error=$encodedMessage");
        exit();
    }
}

    }  



    elseif ($form_action === "register-mitra") {
        // Assuming your form has input fields with names "email", "password", and "status"
        $reg_email = $_POST["email"];
        $reg_password = $_POST["password"];
        $reg_status = $_POST["status"];

        $reg_nama_toko = $_POST["nama_toko"];
        $reg_alamat = $_POST["alamat"];
        $reg_kelurahan = $_POST["kelurahan"];
        $reg_kecamatan = $_POST["kecamatan"];
        $reg_kota = $_POST["kota"];
        $reg_provinsi = $_POST["provinsi"];
        $reg_kode_pos = $_POST["kode_pos"];
        $reg_nama_pic = $_POST["penanggung_jawab"];
        $reg_nomer_pic = $_POST["kontak_wa"];


        // Check if the email is already registered
        $existingUser = User::getUserByEmail($reg_email);
        if ($existingUser !== -1) {
            // Email is already registered, display an error message
            $errorMessage = "Email sudah terdaftar";
            $encodedErrorMessage = urlencode($errorMessage);
            header("Location: daftar.php?error=$encodedErrorMessage");
            exit();
        } else {
    // Email is not registered, proceed with user registration IN DATA_USER
    $newUser = new User($reg_email, $reg_password, $reg_status); 
    if ($newUser->createUser()) {
        // Registration successful, redirect to masuk.php with success message
       // $message = "Registrasi berhasil. Silahkan masuk";
        //$encodedMessage = urlencode($message);
        //header("Location: masuk.php?success=$encodedMessage");
        //exit();
    } else {
        // Failed to register user, redirect to daftar.php with error message
        $message = "Registrasi gagal. Silahkan coba lagi";
        $encodedMessage = urlencode($message);
        header("Location: daftar.php?error=$encodedMessage");
        exit();
    }

        // Email is not registered, proceed with user registration IN DATA_MITRA


     // Create a new instance of User
     //$newUser2 = new User($user->email, $user->password, $user->status);


    //$newUser2 = new User($reg_email, $reg_password, $reg_status);
    //$newMitra = new User($reg_email, $reg_nama_toko, $reg_alamat, $reg_kelurahan, $reg_provinsi, $reg_nama_pic, $reg_nomer_pic);

   
    // Call the non-static method insertmitra() on the User instance
    $newMitra = $newUser->insertMitra($reg_email, $reg_nama_toko, $reg_alamat, $reg_kelurahan, $reg_kecamatan, $reg_kota, $reg_provinsi, $reg_kode_pos, $reg_nama_pic, $reg_nomer_pic);
    

    if ($newMitra) {
        // Registration successful, redirect to masuk.php with success message
        $message = "Registrasi berhasil. Silahkan masuk";
        $encodedMessage = urlencode($message);
        header("Location: masuk.php?success=$encodedMessage");
        exit();
    } else {
        // Failed to register user, redirect to daftar.php with error message
        $message = "Registrasi gagal. Silahkan coba lagi";
        $encodedMessage = urlencode($message);
        header("Location: daftar.php?error=$encodedMessage");
        exit();
    }


}

    } 



elseif ($form_action === "pesanan-masuk") {
    // Check if the user's cookie exists
    $cookieValue = isset($_COOKIE['titip_user']) ? $_COOKIE['titip_user'] : null;
    // $id_mitra = $_POST["user_id_mitra"];
    $id_mitra = isset($_POST["user_id_mitra"]) ? $_POST["user_id_mitra"] : null;

    

    // If the user's cookie exists and check the user's status based on the session (buat pesanan masuk mitra)
    if ($cookieValue && empty($id_mitra)) {
        // Get the user's email based on their session
        $userEmail = User::getUserEmailBySession($cookieValue);
    
        // Get the user information based on their email
        $user = User::getUserByEmail($userEmail);
    
        // If the user doesn't exist or is not a "mitra," redirect to dashboard-konsumen.php
// Assuming you have a User object already created, let's call it $user.
// Replace $user with the actual User object you have.

                if ($user && $user->status === "mitra") {
                    $nama_cust = $_POST["full-name"];
                    $size_paket = $_POST["size"];
                    $id_toko = $user->user_id;

                    // Create a new instance of User
                    $newUser = new User($user->email, $user->password, $user->status);

                    // Call the non-static method insertBarang() on the User instance
                    $newPackage = $newUser->insertBarang($nama_cust, $size_paket, $id_toko);

                    if ($newPackage) {
                        // Package insertion was successful
                        $response = array(
                            "status_pesanan_masuk" => "success",
                            "message" => "Package insertion was successful"
                        );
                        echo json_encode($response);
                    } else {
                        // Package insertion failed
                        $response = array(
                            "status_pesanan-masuk" => "error",
                            "message" => "Package insertion failed"
                        );
                        echo json_encode($response);
                    }
                } elseif ($user && $user->status === "konsumen") {
                    header("Location: dashboard-konsumen.php");
                    exit();
                }

    }


        // If the user's cookie exists and check the user's status based on the session (buat pesanan masuk akun konsumen)
        if ($id_mitra) {
            // Get the user's email based on their session
            $userEmail = User::getUserEmailBySession($cookieValue);
        
            // Get the user information based on their email
            $user = User::getUserByEmail($userEmail);
        
            // If the user doesn't exist or is not a "mitra," redirect to dashboard-konsumen.php
    // Assuming you have a User object already created, let's call it $user.
    // Replace $user with the actual User object you have.
    
                    if ($user && $user->status === "konsumen") {
                        $nama_cust = $_POST["full-name"];
                        $size_paket = $_POST["size"];
    
                        // Create a new instance of User
                        $newUser = new User($user->email, $user->password, $user->status);
    
                        // Call the non-static method insertBarangEmail() on the User instance
                        $newPackage = $newUser->insertBarangEmail($nama_cust, $size_paket, $id_mitra, $userEmail);
    
                        if ($newPackage) {
                            // Package insertion was successful
                            $response = array(
                                "status_pesanan_masuk" => "success",
                                "message" => "Package insertion was successful"
                            );
                            echo json_encode($response);
                        } else {
                            // Package insertion failed
                            $response = array(
                                "status_pesanan-masuk" => "error",
                                "message" => "Package insertion failed"
                            );
                            echo json_encode($response);
                        }
                    } elseif ($user && $user->status === "konsumen") {
                        header("Location: dashboard-konsumen.php");
                        exit();
                    }
    
        }
}





elseif ($form_action === "pesanan-keluar") {
    // Check if the user's cookie exists
    $cookieValue = isset($_COOKIE['titip_user']) ? $_COOKIE['titip_user'] : null;
    

    // If the user's cookie exists and check the user's status based on the session (buat pesanan masuk mitra)
    if ($cookieValue) {
        // Get the user's email based on their session
        $userEmail = User::getUserEmailBySession($cookieValue);
    
        // Get the user information based on their email
        $user = User::getUserByEmail($userEmail);
    
        // If the user doesn't exist or is not a "mitra," redirect to dashboard-konsumen.php
// Assuming you have a User object already created, let's call it $user.
// Replace $user with the actual User object you have.

                if ($user && $user->status === "mitra") {
                    $kode_ambil = $_POST["pickup_number"];
                    $harga_pickup = $_POST["harga"];

                    // Create a new instance of User
                    $newUser = new User($user->email, $user->password, $user->status);

                    // Call the non-static method insertBarang() on the User instance
                    $newPackage = $newUser->ambilBarang($kode_ambil, $harga_pickup);

                    if ($newPackage) {
                        $response = array(
                            "status_pesanan_keluar" => "success",
                            "message" => "Pesanan Telah Selesai"
                        );
                        echo json_encode($response);
                    } else {
                        // Package insertion failed
                        $response = array(
                            "status_pesanan-keluar" => "error",
                            "message" => "Gagal menyelesaikan pesanan. Silahkan coba lagi"
                        );
                        echo json_encode($response);
                    }
                } elseif ($user && $user->status === "konsumen") {
                    header("Location: dashboard-konsumen.php");
                    exit();
                }

    }


}








    
    else {
        // If form_action is post but not "login" or "register", handle the specific case here
        $method = $_SERVER["REQUEST_METHOD"];
        $message = "Invalid form_action: $form_action (Method: $method)";
        echo $message;

    }
} else {
    // If form_action is not "login" or "register", handle the specific case here
    $method = $_SERVER["REQUEST_METHOD"];
    $message = "Invalid form_action: $form_action (Method: $method)";
    echo $message;

}

// Output the message after all the logic is executed
