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
    <link rel="stylesheet" href="css\main.min.css?v="<?php echo time(); ?>">
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
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
                    <a href="logout" class=" nav-side-item mt-2 ms-3 mb-5 pb-5" style="display: block;">
                        <img src="images/logout.png" alt="" width="30px" height="30px">
                        Logout
                    </a>
                </div>
            </nav>
            <!-- CONTENT START -->
            <div class="col-10 main-content">
                <form action="#" method="POST">
                <div class="row m-3">
                    <h1>Transaksi Input</h1>
                    <div class="input-group mb-3">
                        <div class="input-group-text">Kelas</div>
                        <select class="form-select disable" id="input_kelas" name="input_kelas" aria-label="inputkelas" disabled>
                            <?php
                            function OpenCon(){
                                $dbhost = "127.0.0.1"; $dbuser = "root"; $dbpass = "";
                                $db_name = "Tadika_Mesra";
                                $conn = new mysqli($dbhost, $dbuser, $dbpass,$db_name) or die("Connect failed: %s\n". $conn -> error);
                                return $conn;
                            }
                              var_dump($_SESSION[Session::FLASH_KEY]['guru']['value']);
                              $conn = OpenCon();

                              $id_guru = $_SESSION[Session::FLASH_KEY]['guru']['value'];

                              $query = "SELECT Nama_Kelas FROM Kelas WHERE Kelas.ID_Guru='$id_guru'";
                              $result = $connection->query($query);
                              if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  echo "<option selected>". $row['Nama_Kelas']. "</option>";
                                }
                              }
                            ?>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-text">Siswa</div>
                        <select class="form-select" id="input_anak" name="input_anak" aria-label="inputanak">
                            <?php
                              $id_guru = $_SESSION[Session::FLASH_KEY]['guru']['value'];
                              $query = "SELECT Siswa.Nama_Siswa FROM Siswa, Kelas WHERE Siswa.ID_Kelas = Kelas.ID_Kelas AND Kelas.ID_Guru = '$id_guru'";
                              $result = $connection->query($query);
                              if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {

                                  echo "<option selected>". $row['Nama_Siswa']. "</option>";
                                }
                              }
                            ?>
                        </select>
                    </div>


                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputgambar" name="input_gambar"
                            aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                    </div>

                    <div class="input-group mb-3 d-flex flex-column">
                        <label for="deskripsi_transaksi" class="form-label">Deskripsi Transaksi</label>
                        <textarea class="form-control w-100" id="deskripsi_transaksi" name="deskripsi_transaksi" rows="3"></textarea>
                    </div>
                    <div class="input-group mb-3 d-flex flex-column">
                        <label for="catatan_guru" class="form-label">Catatan Guru</label>
                        <textarea class="form-control w-100" id="catatan_guru" name="catatan_guru" rows="3"></textarea>
                    </div>
                    <div class="input-group mb-3 d-flex flex-column">
                        <label for="input_makanan" class="form-label">Input Makanan</label>
                        <textarea class="form-control w-100" id="input_makanan" name="input_makanan" rows="3"></textarea>
                    </div>
                </div>
                <button class="btn btn-primary ms-4" type="submit">Submit</button>
                </form>
            </div>
            <!-- CONTENT END -->
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
</body>

</html>
