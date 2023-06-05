<?php

use app\core\Application;

class m0010_create_mapel_table
{
    public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
        CREATE TABLE Mapel(
            ID_Mapel CHAR(4) PRIMARY KEY NOT NULL,
            Nama_Mapel VARCHAR(20)
        );



        ";
        $db->pdo->exec($SQL);
    }

    public function down(): void
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE Mapel();";
        $db->pdo->exec($SQL);
    }
}

?>

