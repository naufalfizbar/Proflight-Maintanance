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
    <title>Checker Form</title>
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
    <!-- FORM CHECKER -->
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-lg mx-auto bg-white rounded-lg shadow-md">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between px-6 py-4">
                <div class="mb-4 md:mb-0">
                    <img class="w-40  mx-auto md:mx-0 md:mr-4" src="img/proflightlogo.png" alt="Image">
                </div>
                <div class="text-center md:text-left">
                    <h2 class="text-xl font-bold">EXAMINATION FORM</h2>
                    <p class="text-gray-700 text-center">CESSNA 172</p>
                </div>
            </div>
            <div class="px-6 py-4">
                <form action="" method="post">
                    <div class="mb-4">
                        <!--REGISTRATION -->
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="registration">Aircraft
                            Registration</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="registrasi" type="text" placeholder="Enter Registration">
                    </div>
                    <div class="mb-4">
                        <!--TAKE OFF TIME  -->
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="take_off">Take Off Hours</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="keberangkatan" type="datetime-local" placeholder="">
                    </div>
                    <div class="mb-4">
                        <!--LANDING TIME-->
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="landing">Landing Time</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="kedatangan" type="datetime-local" placeholder="">
                    </div>
                    <div class="mb-4">
                        <!--OIL LEVEL-->
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="oil">Oil Level</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="oli" type="text" placeholder="Enter Oil Level">
                    </div>
                    <div class="mb-4">
                        <!--FUEL REMAINING-->
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="oil">Fuel Remaining</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="sisa_bensin" type="text" placeholder="Enter Fuel remaining">
                    </div>
                    <div class="mb-4">
                        <!--WALK AROUND -->
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="walk_around">Aircraft Walk
                            Around</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="kondisi" type="text" placeholder="Enter Aircraft Contidion">
                    </div>



                    <div class="flex justify-center">
                        <!--STATUS BOX -->
                        <label class="inline-flex py-3 px-3 rounded mb-3 bg-green-500 items-center mr-6">
                            <div class="w-5 h-5 border border-green-500 rounded-sm flex items-center justify-center">
                                <input type="radio" name="status" value="go-fly"
                                    class="form-radio h-3 w-3 text-green-500" id="fly">
                            </div>
                            <span class="ml-2 text-white font-bold">Go Fly</span>
                        </label>

                        <label class="inline-flex py-3 px-3 rounded mb-3 bg-red-500 items-center">
                            <div class="w-5 h-5 border border-red-500 rounded-sm flex items-center justify-center">
                                <input type="radio" name="status" value="no-go" class="form-radio h-3 w-3 text-red-500"
                                    id="no-fly">
                            </div>
                            <span class="ml-2 text-white font-bold">No Go Fly</span>
                        </label>
                    </div>




                    <!-- </form> -->
                    <div class="mb-4">
                        <!--MECHANIC INPUT -->
                        <label class="block text-gray-700 text-sm font-bold mt-3 mb-2" for="city">Mechanic Input</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="kerusakan" type="text" placeholder="Enter Problems" id="mekanik">
                    </div>
                    <div class="flex justify-center">
                        <!--BUTTON -->
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline"
                            type="submit" name="submit">
                            Submit
                        </button>
                    </div>
                </form>
                <script>
                var radioFly = document.getElementById('fly');
                var radioNoFly = document.getElementById('no-fly');
                var inputText = document.getElementById('mekanik');

                // Menambahkan event listener pada radio button
                radioFly.addEventListener('change', function() {
                    if (radioFly.checked) {
                        // Menonaktifkan input type teks
                        inputText.readOnly = true;
                    } else {
                        // Mengaktifkan kembali input type teks
                        inputText.readOnly = false;
                    }
                });
                radioNoFly.addEventListener('change', function() {
                    if (radioNoFly.checked) {
                        // Menonaktifkan input type teks
                        inputText.readOnly = false;
                    } else {
                        // Mengaktifkan kembali input type teks
                        inputText.readOnly = true;
                    }
                });
                </script>
                <?php                 
          if(isset($_POST['submit'])){
          include 'koneksi.php';
          //$id_pesawat = $_POST['id_pesawat'];
          $registrasi = $_POST['registrasi'];
          $keberangkatan  = $_POST['keberangkatan'];
          $kedatangan  = $_POST['kedatangan'];
          $oli  = $_POST['oli'];
          $sisa_bensin  = $_POST['sisa_bensin'];
          $kondisi  = $_POST['kondisi'];
          $kerusakan = $_POST['kerusakan'];
          $status = $_POST['status'];
          echo $keberangkatan;


          

        if ($status == 'go-fly') {
            $insert = mysqli_query($connect, "INSERT INTO `checker_log`(`registrasi`, `keberangkatan`, `kedatangan`, `oli`, `sisa_bensin`, `kondisi`) VALUES ('$registrasi', '$keberangkatan', '$kedatangan', '$oli', '$sisa_bensin', '$kondisi')");
        } else if ($status == 'no-go') {
            $insert = mysqli_query($connect, "INSERT INTO `checker`(`registrasi`, `keberangkatan`, `kedatangan`, `oli`, `sisa_bensin`, `kondisi`, `status`, `kerusakan`, `status_repair`) VALUES ('$registrasi', '$keberangkatan', '$kedatangan', '$oli', '$sisa_bensin', '$kondisi', '$status', '$kerusakan', '1')");
        }
       
        // $query	= mysqli_query($connect, $insert) or die(mysqli_error($connect));
        if($insert){    
            // header("location:menu.php");
        }
          else {
            // echo "Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
            echo "Error: " . mysqli_error($connect);
          }
        }
        ?>
            </div>
        </div>
    </div>
</body>

</html>