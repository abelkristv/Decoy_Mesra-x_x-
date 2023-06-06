<!DOCTYPE html>
<?php
session_start();
use app\core\Session;
use app\core\Application;

if (!isset($_SESSION[Session::FLASH_KEY]['siswa'])) {
    header("Location: login");
}
?>
           </nav>
            <!-- CONTENT START -->
            <div class="col-10 main-content">
            <?php 
                $ID = $_SESSION[Session::FLASH_KEY]['siswa']['value'];
                $sql = 
                "
                SELECT g.Nama_Guru
                FROM Siswa s
                JOIN Kelas k ON s.ID_Kelas = k.ID_Kelas
                JOIN Guru g ON k.ID_Guru = g.ID_Guru
                WHERE s.ID_Siswa = 'S001'
                ";
                $statement = Application::$app->db->pdo->prepare($sql);
                $statement->execute();
                $row = $statement->fetch();

                $wali = $row['Nama_Guru'];
                $sql = 
                "
                    SELECT Date, m.Nama_Makanan, f.image, t.Deskripsi_Transaksi, t.Catatan_Guru
                    FROM Transaksi t
                    LEFT JOIN Makanan m ON t.ID_Makanan = m.ID_Makanan
                    LEFT JOIN Foto f ON t.ID_Foto = f.ID_Foto
                    JOIN Siswa s ON t.ID_Siswa = s.ID_Siswa
                    WHERE s.ID_Siswa = '$ID'
                ";
                $statement = Application::$app->db->pdo->prepare($sql);
                $statement->execute();
                $row = $statement->fetch();
                do{
                ?>
                <div class="row mx-3 my-3">
                    
                    <?php if(!is_null($row['image'])){?>
                    <div class="mx-3 my-2 bg-primary col-7 rounded-5 image-transaction-container d-flex flex-wrap p-0">
                    <?php $imageURL = 'img/'.$row['image'];?>
                        <img src="<?= $imageURL?>" alt="" class="" height="282px">
                    </div>
                    <?php } ?>

                    <div class="mx-3 my-2 bg-primary col-6 rounded-5 p-2">
                        <div class="m-2 h2"><?= $row['Date'] ?></div>
                        <div class="mx-2 fs-5"> Makan Siang: <?= $row['Nama_Makanan'] ?></div>
                        <div class="mx-2 fs-5"> <?= $row['Deskripsi_Transaksi'] ?></div>
                        <div class="mx-2 fs-5">Catatan dari <?= $wali ?>:</div>
                        <p class="mx-2 ms-4"><?= $row['Catatan_Guru'] ?></p>
                    </div>
                </div>
                <?php }while($row = $statement->fetch()) ?>


            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA?3yGxIOqMEjwtxJY7qPCqsdltbNJuaOe923Mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
</body>

</html>
