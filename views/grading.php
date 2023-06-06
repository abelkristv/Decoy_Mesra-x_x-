<!DOCTYPE html>
<?php
session_start();

use app\core\Session;
use app\core\Application;

if (!isset($_SESSION[Session::FLASH_KEY]['guru'])) {
    header("Location: login");
}
?>
<!-- CONTENT START -->
<div class="col-10 main-content">
    <form action="add_grading.php" method="POST">
    <div class="row m-3">
        <h1>Grading siswa</h1>

        <div class="input-group mb-3">
            <div class="input-group-text">Siswa</div>
            <select class="form-select" id="input_anak" name="input_anak" aria-label="inputanak">
                <?php
                  $id_guru = $_SESSION[Session::FLASH_KEY]['guru']['value'];
                  $sql = "SELECT Siswa.Nama_Siswa FROM Siswa, Kelas WHERE Siswa.ID_Kelas = Kelas.ID_Kelas AND Kelas.ID_Guru = '$id_guru'";
                  $statement = Application::$app->db->pdo->prepare($sql);
                  $statement->execute();
                  $row = $statement->fetch();
                    do {

                      echo "<option selected>". $row['Nama_Siswa']. "</option>";
                    } while($row = $statement->fetch());
                ?>
            </select>
        </div>

        <?php
          $id_guru = $_SESSION[Session::FLASH_KEY]['guru']['value'];
          $sql = "SELECT Mapel.Nama_Mapel FROM Mapel
                    JOIN KelasMapel ON Mapel.ID_Mapel = KelasMapel.ID_Mapel
                    WHERE KelasMapel.ID_Guru = '$id_guru'";
          $statement = Application::$app->db->pdo->prepare($sql);
          $statement->execute();
          $row = $statement->fetch();
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

