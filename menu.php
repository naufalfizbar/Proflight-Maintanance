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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
    <title>Menu</title>
</head>

<body class="bg-slate-100">
    <!-- NAVBAR START -->
    <nav class="bg-blue-500 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0">
                    <img class="h-8 w-50" src="img/proflightlogo.png" alt="Logo">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="menu.php"
                            class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="checker.php"
                            class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium">Checker</a>
                        <a href="mechanic_form.php"
                            class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium">Mechanic</a>
                        <a href="warehouse_monitoring.php"
                            class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium">Warehouse</a>
                        <a href="status.php"
                            class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium">Status</a>
                        <a href="logout.php"
                            class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium">Log Out</a>
                    </div>
                </div>
                <div class="md:hidden">
                    <button type="button"
                        class="text-gray-200 hover:text-white focus:outline-none focus:text-white focus:bg-blue-700 inline-flex items-center justify-center p-2 rounded-md"
                        id="mobile-menu-btn">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="hidden md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="menu.php"
                    class="text-white hover:text-gray-200 block px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="checker.php"
                    class="text-white hover:text-gray-200 block px-3 py-2 rounded-md text-base font-medium">Checker</a>
                <a href="list_mechanic_input.php"
                    class="text-white hover:text-gray-200 block px-3 py-2 rounded-md text-base font-medium">Mechanic</a>
                <a href="warehouse_monitoring.php"
                    class="text-white hover:text-gray-200 block px-3 py-2 rounded-md text-base font-medium">Warehouse</a>
                <a href="status.php"
                    class="text-white hover:text-gray-200 block px-3 py-2 rounded-md text-base font-medium">Status</a>
                <a href="logout.php"
                    class="text-white hover:text-gray-200 block px-3 py-2 rounded-md text-base font-medium">Log Out</a>
            </div>
        </div>
    </nav>

    <!-- Content goes here -->

    <script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
        var mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
    </script>
    <!-- NAVBAR END -->

    <div>
        <h1 class="text-xl text-blue-900 text-center translate-y-44 font-semibold">Proflight Maintanance System</h1>
    </div>
    <div class="flex justify-center items-center h-screen">
        <div class="grid grid-cols-2 gap-2 p-4">
            <!-- <h1 class="text-xl text-blue-900 text-center">Proflight Maintanance System</h1> -->
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 px-6 rounded">
                <a href="list_mechanic_input.php" id=""><span
                        class="material-symbols-outlined block">handyman</span>Mechanic</a>
            </button>
            <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-4 px-6 rounded">
                <a href="checker.php" id=""><span class="material-symbols-outlined block ">checklist</span>Checkker</a>
            </button>
            <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-4 px-6 rounded">
                <a href="status.php" id=""><span
                        class="material-symbols-outlined block">wifi_protected_setup</span>Status</a>
            </button>
            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-4 px-6 rounded">
                <a href="warehouse_monitoring.php" id=""><span
                        class="material-symbols-outlined block">warehouse</span>Warehouse</a>
            </button>
        </div>
    </div>
</body>

</html>