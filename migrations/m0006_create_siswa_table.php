<?php

use app\core\Application;

class m0006_create_siswa_table
{
    public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
        CREATE TABLE Siswa(
            ID_Siswa CHAR(10) PRIMARY KEY NOT NULL,
            ID_Kelas CHAR(4), FOREIGN KEY (ID_Kelas) REFERENCES Kelas(ID_Kelas),
            Nama_Siswa VARCHAR(20),
            Jenis_Kelamin VARCHAR(10),
            Tanggal_Lahir DATE NOT NULL,
            Nama_Ortu VARCHAR(30),
            Alamat VARCHAR(50),
            No_HP_Orangtua CHAR(14)
        );


        ";
        $db->pdo->exec($SQL);
    }

    public function down(): void
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE Siswa();";
        $db->pdo->exec($SQL);
    }
}

?>

