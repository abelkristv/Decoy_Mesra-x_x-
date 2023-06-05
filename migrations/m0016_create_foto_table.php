<?php

use app\core\Application;

class m0016_create_foto_table
{
    public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
        CREATE TABLE Foto(
            ID_Foto CHAR(10) PRIMARY KEY NOT NULL,
            Nama_Foto Char(20),
            image BLOB NOT NULL
        );        ";
        $db->pdo->exec($SQL);
    }

    public function down(): void
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE Foto();";
        $db->pdo->exec($SQL);
    }
}

?>


