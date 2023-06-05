<!DOCTYPE html>
<?php
session_start();

use app\core\Session;

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\main.min.css?v=<?php echo time(); ?>">
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
                    <a href="grading" class="mapel nav-side-item  mt-2 ms-3" style="display: block;">
                        <img src="https://cdn-icons-png.flaticon.com/512/2228/2228722.png" alt="" width="30px" maxheight="30px">
                        Grading
                    </a>
                    <a href="saran" class="mapel nav-side-item  mt-2 ms-3" style="display: block;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/3d/Envelope-letter-icon.png" alt="" width="30px" maxheight="30px">
                        Saran
                    </a>
                    <a href="./logout.php#" class=" nav-side-item mt-2 ms-3 mb-5 pb-5" style="display: block;">
                        <img src="images/logout.png" alt="" width="30px" height="30px">
                        Logout
                    </a>
                </div>
            </nav>
            <!-- CONTENT START -->
            <div class="col-10 main-content">
            <?php 
                function OpenCon(){
                    $dbhost = "127.0.0.1"; 
                    $dbuser = "root"; 
                    $dbpass = "";
                    $db_name = "Tadika_Mesra";
                    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db_name) or die("Connect failed: %s\n". $conn -> error);
                    return $conn;
                }
                $ID = $_SESSION[Session::FLASH_KEY]['guru']['value'];

                $conn = OpenCon();
                $sql = 
                "
                    SELECT t.Date, m.Nama_Makanan, f.image, t.Deskripsi_Transaksi, t.Catatan_Guru
                    FROM Transaksi t
                    JOIN Makanan m on t.ID_Makanan = m.ID_Makanan
                    LEFT JOIN Foto f ON f.ID_Foto = t.ID_Foto
                    JOIN Siswa s ON t.ID_Siswa = s.ID_Siswa
                    JOIN Kelas k ON k.ID_Kelas = s.ID_Kelas
                    JOIN Guru g ON k.ID_Guru = g.ID_Guru
                    WHERE g.ID_Guru = '$ID';
                ";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                do{
                ?>

                <div class="row mx-3 my-3">
                    <?php if(!is_null($row['image'])){?>
                    <div class="mx-3 my-2 bg-primary col-7 rounded-5 image-transaction-container d-flex flex-wrap p-0">
                        <?php $imageURL = $row['image']; echo $imageURL?>
                        <img src="<?= $imageURL?>" alt="" class="" height="282px">
                    </div>
                    <?php } ?>

		            <div class="mx-3 my-2 bg-primary col-6 rounded-5  p-4">
                            <div class="m-2 h2"><?= $row['Date'] ?></div>
                            <div class="mx-2 fs-5"> Makan Siang: <?= $row['Nama_Makanan'] ?></div>
                            <div class="mx-2 fs-5"> <?= $row['Deskripsi_Transaksi'] ?></div>
                            <div class="mx-2 fs-5">Catatan untuk murid:</div>
                            <p class="mx-2 ms-4"><?= $row['Catatan_Guru'] ?></p>
                    </div>
                
                </div>
                <?php }while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) ?>


            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA?3yGxIOqMEjwtxJY7qPCqsdltbNJuaOe923Mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
</body>

</html>
