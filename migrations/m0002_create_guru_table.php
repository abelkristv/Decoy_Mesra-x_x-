<?php

use app\core\Application;

class m0002_create_guru_table
{
    public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE Guru(
                    ID_Guru CHAR(4) PRIMARY KEY NOT NULL,
                    Nama_Guru VARCHAR(30),
                    Alamat VARCHAR(50),
                    No_HP CHAR(14),
                    Jenis_Kelamin CHAR(10)
                );
        ";
        $db->pdo->exec($SQL);
    }

    public function down(): void
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE Guru();";
        $db->pdo->exec($SQL);
    }
}

?>
