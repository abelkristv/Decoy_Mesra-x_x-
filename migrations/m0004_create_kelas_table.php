<?php

use app\core\Application;

class m0004_create_kelas_table
{
    public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
                CREATE TABLE Kelas (
                ID_Kelas CHAR(4) PRIMARY KEY NOT NULL,
                Nama_Kelas VARCHAR(20),
                ID_Guru CHAR(4), FOREIGN KEY(ID_Guru) REFERENCES Guru(ID_Guru)    
);

        ";
        $db->pdo->exec($SQL);
    }

    public function down(): void
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE Kelas();";
        $db->pdo->exec($SQL);
    }
}

?>
