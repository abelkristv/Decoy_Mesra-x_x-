<!DOCTYPE html>
<?php
use app\core\Session;
use app\core\Application;

session_start();

?>
<!-- CONTENT START -->
<?php
$ID = $_SESSION[Session::FLASH_KEY]['guru']['value'];
$sql = 
"
    SELECT Siswa.Nama_Siswa, Siswa.ID_Siswa, Kelas.Nama_Kelas, Guru.Nama_Guru
    FROM Siswa
    JOIN Kelas ON Siswa.ID_Kelas = Kelas.ID_Kelas
    JOIN Guru ON Kelas.ID_Guru = Guru.ID_Guru
    WHERE Guru.ID_Guru = '$ID'
";
$statement = Application::$app->db->pdo->prepare($sql);
$statement->execute();
$row = $statement->fetch();
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
<?php }while($row = $statement->fetch())?>
<br>

