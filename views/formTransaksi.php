<!DOCTYPE html>
<?php
session_start();

use app\core\Session;

?>
<!-- CONTENT START -->
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
                  $conn = OpenCon();

                  $id_guru = $_SESSION[Session::FLASH_KEY]['guru']['value'];

                  $sql = "SELECT Nama_Kelas FROM Kelas WHERE Kelas.ID_Guru='$id_guru'";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    do {
                      echo "<option selected>". $row['Nama_Kelas']. "</option>";
                    } while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
                ?>
            </select>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-text">Siswa</div>
            <select class="form-select" id="input_anak" name="input_anak" aria-label="inputanak">
                <?php
                  $id_guru = $_SESSION[Session::FLASH_KEY]['guru']['value'];
                  $sql = "SELECT Siswa.Nama_Siswa FROM Siswa, Kelas WHERE Siswa.ID_Kelas = Kelas.ID_Kelas AND Kelas.ID_Guru = '$id_guru'";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    do {

                      echo "<option selected>". $row['Nama_Siswa']. "</option>";
                    } while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 

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
<!-- CONTENT END -->
</body>

</html>
