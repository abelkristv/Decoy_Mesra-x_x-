<!DOCTYPE html>
<?php
session_start();

use app\core\Session;

if (!isset($_SESSION[Session::FLASH_KEY]['siswa'])) {
    header("Location: login");
}
?>

        <!-- CONTENT START -->
        <?php 
            function OpenCon(){
                $dbhost = "127.0.0.1"; 
                $dbuser = "root"; 
                $dbpass = "";
                $db_name = "Tadika_Mesra";
                $conn = new mysqli($dbhost, $dbuser, $dbpass,$db_name) or die("Connect failed: %s\n". $conn -> error);
                return $conn;
            }
            $conn = OpenCon();
            
            $ID = $_SESSION[Session::FLASH_KEY]['siswa']['value'];
            $sql = 
            "
                SELECT Kelas.Nama_Kelas, Guru.Nama_Guru FROM Kelas, Guru, Siswa 
                WHERE Siswa.ID_Siswa = 'S001'
                AND Kelas.ID_Kelas = Siswa.ID_Kelas
                AND Kelas.ID_Guru = Guru.ID_Guru;
            ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            ?>
        <div class="col-10 main-content">
            <div class="mt-5 mx-3">
              <div class="h2">Mapel Siswa</div>
                <hr class="border border-dark border-3 bg-dark">
                <div class="d-flex flex-row justify-content-between mx-3">
                    <div class="h3">Kelas <?= $row['Nama_Kelas']?></div>
                    <div class="h3 ml-auto">Wali Kelas: <?= $row['Nama_Guru']?></div>
                </div>
                <hr>
                <div class="cont my-4">
                    <?php
                    function isEven($number){
                        return($number % 2 == 0);
                    }
            
                    $ID = $_SESSION[Session::FLASH_KEY]['siswa']['value'];
                    $sql =
                    "
                    SELECT SiswaMapel.Nama_Mapel, SiswaMapel.Nama_Guru, SiswaMapel.Nilai, SiswaMapel.Deskripsi
                    FROM Siswa
                    JOIN SiswaMapel ON SiswaMapel.ID_Siswa = Siswa.ID_Siswa
                    
                    WHERE Siswa.ID_Siswa = '$ID';
                    ";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $i = 0;
                    do{
                        ?>
                    
                    <?php if(isEven($i)){?>
                    <div class="row my-3">
                        <?php }?>
                        <div class="col mx-3 py-3 border border-2 rounded bg-light">
                            <h2 class="mt-1"><?= $row['Nama_Mapel'] ?></h2>
                            <hr>
                            Pengajar: <?= $row['Nama_Guru'] ?>
                            <div class="progress mt-3" role="progressbar" aria-label="Basic example"
                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar w-75"></div>
                        </div>
                        <h5>Nilai: <?= $row['Nilai'] ?></h1>
                        <p><?= $row['Deskripsi']?></p>
                    </div>
                    <?php if(!isEven($i)){?>
                </div>
                    <?php }$i++;}while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) ?>
                </div>
              </div>
            </div>
        <form action="add_saran.php" method="POST">
          <div class="input-group mb-3 ms-4 d-flex flex-column">
            <label for="catatan_guru" class="form-label">Catatan untuk guru</label>
            <textarea class="form-control w-100" id="catatan_guru" name="catatan_guru" rows="3"></textarea>
          </div>
          <button class="btn btn-primary ms-4" type="submit">Submit</button>
        </form>
        </div>

    </div>
</div>


    <?php function CloseCon($conn){$conn -> close();}?>

