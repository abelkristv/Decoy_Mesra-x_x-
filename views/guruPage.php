<!DOCTYPE html>
<?php
use app\core\Session;

session_start();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\main.min.css?v="<?php echo time(); ?>">
    <link rel="stylesheet" href="css\styles.css?v=<?php echo time(); ?>">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light border-bottom-3 bg-primary sticky-md-top">
        <div class="container-fluid">
            <a class="navbar-brand ms-5" href="./dasbor.php">
                <img src="https://www.kemdikbud.go.id/main/addons/shared_addons/themes/november_theme/img/kemdikbud_64x64.png"
                    alt="" width="60" height="60" class="d-inline-block ">
                TK Tadika Mesra | Monitoring System
            </a>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-2 bg-secondary flex-column nav-side d-flex justify-content-between">
                <div class="d-flex flex-column">
                    <a href="guruPage" class="dasbor nav-side-item  mt-5 ms-3" style="display: block;">
                        <img src="images/list.png" alt="" width="30px" , height="30px">
                        List Siswa
                    </a>
                    <a href="transaksi" class="transaksi nav-side-item  mt-2 ms-3" style="display: block;">
                        <img src="images/transaction.png" alt="" width="30px" height="30px">
                        Buku Penghubung
                    </a>
                    <a href="formTransaksi" class="mapel nav-side-item  mt-2 ms-3" style="display: block;">
                        <img src="images/newTransaction.png" alt="" width="30px" maxheight="30px">
                        Tambah Buku Penghubung
                    </a>
                    <a href="./grading.php#" class="mapel nav-side-item  mt-2 ms-3" style="display: block;">
                        <img src="https://cdn-icons-png.flaticon.com/512/2228/2228722.png" alt="" width="30px" maxheight="30px">
                        Grading
                    </a>
                    <a href="./logout.php#" class=" nav-side-item mt-2 ms-3 mb-5 pb-5" style="display: block;">
                        <img src="images/logout.png" alt="" width="30px" height="30px">
                        Logout
                    </a>
                </div>
            </nav>
            <!-- CONTENT START -->
            <div class="col-10 main-content">
            <?php function OpenCon(){
                    $dbhost = "127.0.0.1"; $dbuser = "root"; $dbpass = "";
                    $db_name = "Tadika_Mesra";
                    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db_name) or die("Connect failed: %s\n". $conn -> error);
                    return $conn;
                }
                $conn = OpenCon();
                $ID = $_SESSION[Session::FLASH_KEY]['guru']['value'];
                $sql = 
                "
                    SELECT Siswa.Nama_Siswa, Siswa.ID_Siswa, Kelas.Nama_Kelas, Guru.Nama_Guru
                    FROM Siswa
                    JOIN Kelas ON Siswa.ID_Kelas = Kelas.ID_Kelas
                    JOIN Guru ON Kelas.ID_Guru = Guru.ID_Guru
                    WHERE Guru.ID_Guru = '$ID'
                ";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                do{
                ?>
                    <div class="row">
                    <div class="col-2">
                        <img src="images/neko.png" alt="" width="150px" height="150px" id="profile" class="mt-3 ms-3">
                    </div> 
                    <div class="col container-text-2 mt-3 me-4 d-flex flex-column">
                        <h1 class="m-0"><?= $row['Nama_Siswa'] ?></h1>
                        <hr class="m-0">
                        <p class="m-0 mt-2">ID : <?= $row['ID_Siswa'] ?></p>
                        <p class="m-0">Kelas : <?= $row['Nama_Kelas'] ?></p>
                        <p class="m-0">Wali Kelas : <?= $row['Nama_Guru'] ?></p>
                    </div>
            </div>
            <?php }while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) ?>
            <br>
            </div>
        </div>
    </div>



    <?php function CloseCon($conn){$conn -> close();}?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA?3yGxIOqMEjwtxJY7qPCqsdltbNJuaOe923Mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>
