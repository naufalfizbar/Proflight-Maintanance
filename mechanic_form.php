<?php
session_start();
if (empty($_SESSION['username'])) {
   header("Location:index.php?massage=belum_login");
}
?>
<?php 
$id_pesawat = $_GET['id'];
if(isset($_POST['signaturesubmit'])){
    // $id_pesawat = $_GET['id']; 
    $signature = $_POST['signature'];
    $signatureFileName = uniqid().'.png';
    $signature = str_replace('data:image/png;base64,', '', $signature);
    $signature = str_replace(' ', '+', $signature);
    $data = base64_decode($signature);
    $file = 'signatures/'.$signatureFileName;
    file_put_contents($file, $data);
    $msg = "<div class='alert alert-success'>Signature Uploaded</div>";
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad"></script>

    <title>Signature Forms</title>
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
                <?php
                                
                include ('koneksi.php');
                $id_pesawat = $_GET['id'];
                $query = mysqli_query($connect, "SELECT * FROM `checker` WHERE id_pesawat='$id_pesawat'");
                while($edit = mysqli_fetch_array($query)){?>

                <form action="" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="id_pesawat" value="<?= $edit['id_pesawat']; ?>">
                    <div class="mb-4">
                        <!--REGISTRATION -->
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="registration">Aircraft
                            Registration</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="registrasi" type="text" placeholder="Enter Registration"
                            value="<?= $edit['registrasi']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <!--TAKE OFF TIME  -->
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="take_off">Take Off Hours</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="keberangkatan" type="datetime-local" placeholder=""
                            value="<?= $edit['keberangkatan']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <!--LANDING TIME-->
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="landing">Landing Time</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="kedatangan" type="datetime-local" placeholder="" value="<?= $edit['kedatangan']; ?>"
                            required>
                    </div>
                    <div class="mb-4">
                        <!--OIL LEVEL-->
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="oil">Oil Level</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="oli" type="text" placeholder="Enter Oil Level" value="<?= $edit['oli']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <!--FUEL REMAINING-->
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="oil">Fuel Remaining</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="sisa_bensin" type="text" placeholder="Enter Fuel remaining"
                            value="<?= $edit['sisa_bensin']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <!--WALK AROUND -->
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="walk_around">Aircraft Walk
                            Around</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="kondisi" type="text" placeholder="Enter Aircraft Contidion"
                            value="<?= $edit['kondisi']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <!--MECHANIC INPUT -->
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="city">Mechanic Input</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="kerusakan" type="text" placeholder="Enter Problems" value="<?= $edit['kerusakan']; ?>"
                            required>
                    </div>
                    <!-- </form> -->

                    <!-- BUTTON START & FINISH -->
                    <!-- HTML with Tailwind CSS classes -->

                    <?php
                        if($edit['status_repair'] ==  '1'){
                    ?>
                    <a href="edit_status_repair.php?id=<?=$edit['id_pesawat']?>&status=0" id="toggle-button"
                        class="status-button bg-green-500 hover:bg-green-700 w-full active:bg-red-500 active:hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-colors duration-300">
                        Start Repairr
                    </a>
                    <?php
                        }else{
                    ?>
                    <a href="edit_status_repair.php?id=<?=$edit['id_pesawat']?>&status=1" id="toggle-button"
                        class="status-button bg-red-500 hover:bg-green-700 w-full active:bg-red-500 active:hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-colors duration-300">
                        finish repair
                    </a>
                    <?php
                    
                        }
                    }
                    ?>

                    <?php
                    include('koneksi.php');
                    $id_pesawat = $_GET['id'];
                    if (isset($_POST['submit'])) {
                    // $start_time = $_POST['start_time'];
                    // $end_time = $_POST['end_time'];
                    $signature = $_POST['signature'];
                    
                    // Membuat query untuk menyimpan data ke database
                    $sql =  mysqli_query($connect,"UPDATE `checker` SET signature = '$signatureFileName' WHERE id_pesawat= '$id_pesawat'");
                    
                    if ($sql) {
                        echo "Data berhasil disimpan";
                    } else {
                        echo "Error: " . $sql . "<br>" . $connect->error;
                    }

                    // Menutup koneksi database
                    mysqli_close($connect);
                    }
                    ?>



                    <!-- <input type="text" id="start_time" readonly>
                    <input type="text" id="end_time" readonly> -->

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                    <div class="flex justify-center">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline"
                            type="submit" name="submit">Submit</button>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <br>
                                <?php echo isset($msg)?$msg:''; ?>
                                <h2>Chief Mechanic Signature</h2>
                                <hr style="border:1px solid black">
                                <div id="canvasDiv"></div>
                                <hr style="border:1px solid black">
                                <br>
                                <!-- <button type="button" class="btn btn-danger" id="reset-btn">Clear</button>
                                <button type="button" class="btn btn-success" id="btn-save">Save</button> -->

                                <button type="button"
                                    class="bg-red-500 active:hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-colors duration-300"
                                    id="reset-btn">Clear</button>
                                <button type="button"
                                    class="bg-blue-500 active:hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-colors duration-300"
                                    id="btn-save">Save</button>


                            </div>
                            <form id="signatureform" action="" style="display:none" method="post">
                                <input type="hidden" id="signature" name="signature">
                                <input type="hidden" name="signaturesubmit" value="1">
                            </form>
                        </div>
                    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
<script>
$(document).ready(() => {
    var canvasDiv = document.getElementById('canvasDiv');
    var canvas = document.createElement('canvas');
    canvas.setAttribute('id', 'canvas');
    canvasDiv.appendChild(canvas);
    $("#canvas").attr('height', $("#canvasDiv").outerHeight());
    $("#canvas").attr('width', $("#canvasDiv").width());
    if (typeof G_vmlCanvasManager != 'undefined') {
        canvas = G_vmlCanvasManager.initElement(canvas);
    }

    context = canvas.getContext("2d");
    $('#canvas').mousedown(function(e) {
        var offset = $(this).offset()
        var mouseX = e.pageX - this.offsetLeft;
        var mouseY = e.pageY - this.offsetTop;

        paint = true;
        addClick(e.pageX - offset.left, e.pageY - offset.top);
        redraw();
    });

    $('#canvas').mousemove(function(e) {
        if (paint) {
            var offset = $(this).offset()
            //addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
            addClick(e.pageX - offset.left, e.pageY - offset.top, true);
            console.log(e.pageX, offset.left, e.pageY, offset.top);
            redraw();
        }
    });

    $('#canvas').mouseup(function(e) {
        paint = false;
    });

    $('#canvas').mouseleave(function(e) {
        paint = false;
    });

    var clickX = new Array();
    var clickY = new Array();
    var clickDrag = new Array();
    var paint;

    function addClick(x, y, dragging) {
        clickX.push(x);
        clickY.push(y);
        clickDrag.push(dragging);
    }

    $("#reset-btn").click(function() {
        context.clearRect(0, 0, window.innerWidth, window.innerWidth);
        clickX = [];
        clickY = [];
        clickDrag = [];
    });

    $(document).on('click', '#btn-save', function() {
        var mycanvas = document.getElementById('canvas');
        var img = mycanvas.toDataURL("image/png");
        anchor = $("#signature");
        anchor.val(img);
        $("#signatureform").submit();
    });

    var drawing = false;
    var mousePos = {
        x: 0,
        y: 0
    };
    var lastPos = mousePos;

    canvas.addEventListener("touchstart", function(e) {
        mousePos = getTouchPos(canvas, e);
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
    }, false);


    canvas.addEventListener("touchend", function(e) {
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas.dispatchEvent(mouseEvent);
    }, false);


    canvas.addEventListener("touchmove", function(e) {

        var touch = e.touches[0];
        var offset = $('#canvas').offset();
        var mouseEvent = new MouseEvent("mousemove", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
    }, false);



    // Get the position of a touch relative to the canvas
    function getTouchPos(canvasDiv, touchEvent) {
        var rect = canvasDiv.getBoundingClientRect();
        return {
            x: touchEvent.touches[0].clientX - rect.left,
            y: touchEvent.touches[0].clientY - rect.top
        };
    }


    var elem = document.getElementById("canvas");

    var defaultPrevent = function(e) {
        e.preventDefault();
    }
    elem.addEventListener("touchstart", defaultPrevent);
    elem.addEventListener("touchmove", defaultPrevent);


    function redraw() {
        //
        lastPos = mousePos;
        for (var i = 0; i < clickX.length; i++) {
            context.beginPath();
            if (clickDrag[i] && i) {
                context.moveTo(clickX[i - 1], clickY[i - 1]);
            } else {
                context.moveTo(clickX[i] - 1, clickY[i]);
            }
            context.lineTo(clickX[i], clickY[i]);
            context.closePath();
            context.stroke();
        }
    }
})
</script>




</html>