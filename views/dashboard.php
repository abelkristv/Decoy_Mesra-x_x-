<!DOCTYPE html>
<?php

use app\core\Session;
session_start();

?>

<!-- CONTENT START -->
<?php function OpenCon(){
        $dbhost = "127.0.0.1"; $dbuser = "root"; $dbpass = "";
        $db_name = "Tadika_Mesra";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db_name) or die("Connect failed: %s\n". $conn -> error);
        return $conn;}$conn = OpenCon();?>

<?php 
$ID = $_SESSION[Session::FLASH_KEY]['siswa']['value'];
$sql = 

    "
        SELECT Siswa.ID_Siswa, Siswa.Nama_Siswa, Kelas.Nama_Kelas, Guru.Nama_Guru
        FROM Siswa
        JOIN Kelas ON Siswa.ID_Kelas = Kelas.ID_Kelas
        JOIN Guru ON Kelas.ID_Guru = Guru.ID_Guru
        WHERE Siswa.ID_Siswa = '$ID'
    ";
     $result = mysqli_query($conn, $sql);
     $data = mysqli_fetch_array($result);
?>
<div class="col-10 main-content">
    <div class="row">
        <div class="col-3 me-5 container-image">
            <img src="images/neko.png" alt="" width="300px" height="300px" id="profile" class="mt-3 ms-3">
        </div>
        <?php 
            echo '
            <div class="col-8 container-text mt-3 p-3">
                        <h1>Name : '.$data['Nama_Siswa'].'</h1>
                        <hr>
                        <p>ID_Siswa : '.$data['ID_Siswa'].'</p>
                        <p>Kelas : '.$data['Nama_Kelas'].'</p>
                        <p>Wali_Kelas : '.$data['Nama_Guru'].'</p>
                    </div>
            ';
            mysqli_close($conn);
        ?>
    </div>
    <br>
</div>

