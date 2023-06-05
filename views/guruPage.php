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

<?php function CloseCon($conn){$conn -> close();}?>
