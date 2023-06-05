<?php

use app\core\Application;

class m0008_create_siswaMapel_table
{
    public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
        CREATE TABLE SiswaMapel(
            ID_SiswaMapel INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
            ID_Siswa CHAR(10) NOT NULL,
            Nama_Guru VARCHAR(30),
            Nama_Mapel VARCHAR(20),
            Nilai CHAR(4),
            Deskripsi VARCHAR(100)
        );



        ";
        $db->pdo->exec($SQL);
    }

    public function down(): void
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE SiswaMapel();";
        $db->pdo->exec($SQL);
    }
}

?>

