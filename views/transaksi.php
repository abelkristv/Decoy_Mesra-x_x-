<!DOCTYPE html>
<?php
session_start();

use app\core\Session;
use app\core\Application;

?>
<!-- CONTENT START -->
<div class="col-10 main-content">
<?php 
    $ID = $_SESSION[Session::FLASH_KEY]['guru']['value'];
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
    $statement = Application::$app->db->pdo->prepare($sql);
    $statement->execute();
    $row = $statement->fetch();
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
    <?php }while($row = $statement->fetch()) ?>

</body>

</html>
