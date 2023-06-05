<!DOCTYPE html>
<?php
session_start();

use app\core\Session;

if (!isset($_SESSION[Session::FLASH_KEY]['guru'])) {
    header("Location: login");
}
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
                    <a href="grading" class="mapel nav-side-item  mt-2 ms-3" style="display: block;">
                        <img src="https://cdn-icons-png.flaticon.com/512/2228/2228722.png" alt="" width="30px" maxheight="30px">
                        Grading
                    </a>
                    <a href="saran" class="mapel nav-side-item  mt-2 ms-3" style="display: block;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/3d/Envelope-letter-icon.png" alt="" width="30px" maxheight="30px">
                        Saran
                    </a>
                </div>
                <a href="logout" class=" nav-side-item mt-2 ms-3 mb-5 pb-5" style="display: block;">
                    <img src="images/logout.png" alt="" width="30px" height="30px">
                    Logout
                </a>
            </nav>
            <!-- CONTENT START -->
            <div class="col-10 main-content">
                <form action="add_grading.php" method="POST">
                <div class="row m-3">
                    <h1>Grading siswa</h1>

                    <div class="input-group mb-3">
                        <div class="input-group-text">Siswa</div>
                        <select class="form-select" id="input_anak" name="input_anak" aria-label="inputanak">
                            <?php
                            function OpenCon(){
                                $dbhost = "127.0.0.1"; $dbuser = "root"; $dbpass = "";
                                $db_name = "Tadika_Mesra";
                                $conn = new mysqli($dbhost, $dbuser, $dbpass,$db_name) or die("Connect failed: %s\n". $conn -> error);
                                return $conn;
                            }
                            $conn = OpenCon();

                              $id_guru = $_SESSION[Session::FLASH_KEY]['guru']['value'];
                              $sql = "SELECT Siswa.Nama_Siswa FROM Siswa, Kelas WHERE Siswa.ID_Kelas = Kelas.ID_Kelas AND Kelas.ID_Guru = '$id_guru'";
                              $result = mysqli_query($conn, $sql);
                              $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                do {

                                  echo "<option selected>". $row['Nama_Siswa']. "</option>";
                                } while($row = mysqli_fetch_array($result, MYSQLI_ASSOC));
                            ?>
                        </select>
                    </div>

                    <?php
                      $id_guru = $_SESSION[Session::FLASH_KEY]['guru']['value'];
                      $sql = "SELECT Mapel.Nama_Mapel FROM Mapel
                                JOIN KelasMapel ON Mapel.ID_Mapel = KelasMapel.ID_Mapel
                                WHERE KelasMapel.ID_Guru = '$id_guru'";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    ?>
                    <div class="input-group mb-3">
                    <div class="input-group-text">Nilai <?= $row['Nama_Mapel']?> </div>
                        <select class="form-select" id="input_<?=strtolower($row['Nama_Mapel'])?>" name="input_<?=strtolower($row['Nama_Mapel'])?>" aria-label="input<?=strtolower($row['Nama_Mapel'])?>">
                            <option selected>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>D</option>
                        </select>
                    </div>
                    <div class="input-group mb-3 d-flex flex-column">
                        <label for="deskripsi_<?=strtolower($row['Nama_Mapel'])?>" class="form-label">Deskripsi Nilai <?=strtolower($row['Nama_Mapel'])?> </label>
                        <textarea class="form-control w-100" id="deskripsi_<?=strtolower($row['Nama_Mapel'])?>" name="deskripsi_<?=strtolower($row['Nama_Mapel'])?>" rows="3"></textarea>
                    </div>


                </div>
                <button class="btn btn-primary ms-4" type="submit">Submit</button>
                <br>
                </form>
            </div>
            <!-- CONTENT END -->
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
</body>

</html>