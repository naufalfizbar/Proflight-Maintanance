<?php
session_start();
if (empty($_SESSION['username'])) {
   header("Location:index.php?massage=belum_login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    neon: ["Tilt Neon"],
                },
            },
        },
    };
    </script>
    <title>Log In</title>
</head>

<body class="flex items-center justify-center h-screen bg-slate-50">
<div class="p-8 rounded-md bg-slate-300 max-w-xl mx-auto">
    <div class="text-center mb-6">
        <img class="w-40 mx-auto" src="img/proflightlogo.png" alt="">
        <h1 class="text-lg font-semibold">LOGIN</h1>
    </div>
    <div class="mb-4">
        <label class="text-md font-semibold block mb-1" for="username">Username</label>
        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="username" placeholder="Enter Username">
    </div>
    <div class="mb-6">
        <label class="text-md font-semibold block mb-1" for="password">Password</label>
        <input type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password" placeholder="Enter Password">
    </div>
    <div class="flex items-center justify-center">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="LOGIN">
            Enter
        </button>
    </div>
    <center>
        <?php
        if (isset($_GET['message'])) {
            if ($_GET['message'] == "gagal") {
                echo "Login Gagal, Username atau Password salah";
            } elseif ($_GET['message'] == "logout") {
                echo "Berhasil logout";
            } elseif ($_GET['message'] == "belum_login") {
                echo "Anda belum login";
            }
        }
        ?>
    </center>
</div>



</body>

</html>