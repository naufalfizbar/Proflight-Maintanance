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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Warehouse Stock Monitoring</title>
</head>

<body class="bg-gray-100">
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
                        <a href="list_mechanic_input.php"
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

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-lg mx-auto bg-white rounded-lg shadow-md">
            <div class="px-6 py-4">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                    <div class="mb-4 md:mb-0">
                        <img class="w-48 mx-auto md:mx-0 md:mr-4" src="img/proflightlogo.png" alt="Image">
                    </div>
                    <div class="text-center md:text-left">
                        <h2 class="text-xl font-bold text-center">Warehouse System</h2>
                        <p class="text-gray-700">Monitor and manage stock items</p>
                    </div>
                </div>
                <!-- Stock items display -->
                <div class="mb-4">
                    <form action="" method="post">
                        <h3 class="text-lg font-bold mb-2">Stock Items</h3>
                        <?php
                            include 'koneksi.php';
                            $sql = mysqli_query($connect, "SELECT * FROM `data_gudang`WHERE id_barang");
                            while($data = mysqli_fetch_array($sql)){
                        ?>
                        <ul class="border border-gray-300 rounded p-2">
                            <li class="flex justify-between items-center py-1">

                                <span class="font-medium"><?=$data['nama_barang']?></span>
                                <div class="flex items-center space-x-2">
                                    <span class="text-gray-500">Quantity: <?=$data['banyak']?></span>
                                    <a href="werehouse_edit.php?id_barang=<?php echo $data['id_barang']; ?>"><button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                            type="button">
                                            Edit
                                        </button></a>
                                    <a href="hapus_barang.php?id_barang=<?php echo $data['id_barang']; ?>"><button
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                            type="button">
                                            Delete
                                        </button>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <?php } ?>
                </div>
                <div class="flex justify-end">
                    <a href="warehouse_tambah.php">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="button">
                            Add Item
                        </button>
                    </a>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>