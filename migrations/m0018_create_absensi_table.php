<?php

use app\core\Application;

class m0018_create_absensi_table
{
    public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
        CREATE TABLE Absensi (
    ID_Absensi INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    ID_Siswa CHAR(10) NOT NULL, FOREIGN KEY (ID_Siswa) REFERENCES Siswa(ID_Siswa),
    ID_Kelas CHAR(4) NOT NULL, FOREIGN KEY (ID_Kelas) REFERENCES Kelas(ID_Kelas),
    ID_Mapel CHAR(4) NOT NULL, FOREIGN KEY (ID_Mapel) REFERENCES Mapel(ID_Mapel),
    Tanggal DATE NOT NULL,
    Keterangan ENUM('Hadir', 'Tidak Hadir', 'Izin', 'Sakit') NOT NULL,
    UNIQUE (ID_Siswa, ID_Mapel, Tanggal)
);        ";
        $db->pdo->exec($SQL);
    }

    public function down(): void
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE Absensi();";
        $db->pdo->exec($SQL);
    }
}

?>


