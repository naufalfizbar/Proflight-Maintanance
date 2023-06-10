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
    <title>Warehouse System</title>
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


    <div class="container mx-auto px-4 py-8">
        <div class="max-w-lg mx-auto bg-white rounded-lg shadow-md">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between px-6 py-4">
                <div class="mb-4 md:mb-0">
                    <img class="w-44 mx-auto md:mx-0 md:mr-4" src="img/proflightlogo.png" alt="Image">
                </div>
                <div class="text-center md:text-left">
                    <h2 class="text-xl font-bold text-center">Warehouse System</h2>
                    <p class="text-gray-700">Monitor and update stock quantities</p>
                </div>
            </div>
            <div class="px-6 py-4">
                <?php           
                include ('koneksi.php');
                $id_barang = $_GET['id_barang'];
                $query = mysqli_query($connect, "SELECT * FROM `data_gudang` WHERE id_barang='$id_barang'");
                while($edit = mysqli_fetch_array($query)){?>

                <form action="werehouse_proses.php" enctype="multipart/form-data" method="post">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="id">Item ID</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="id_barang" type="text" placeholder="Enter item ID" value="<?= $edit['id_barang']; ?>"
                            required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="item">Item</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="nama_barang" type="text" placeholder="Enter item name"
                            value="<?= $edit['nama_barang']; ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="quantity">Quantity</label>
                        <div class="flex items-center">
                            <input
                                class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="banyak" type="number" placeholder="Enter quantity" value="<?= $edit['banyak']; ?>"
                                required>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <a href="warehouse_monitoring.php"><button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit" name="save">
                                Save
                            </button></a>
                    </div>
                </form>
                <?php }?>
            </div>
        </div>
    </div>
</body>

</html>