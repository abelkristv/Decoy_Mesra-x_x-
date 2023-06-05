<?php

use app\core\Application;

class m0020_create_makanan_table
{
    public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
        
            CREATE TABLE Makanan(
                ID_Makanan CHAR(10) PRIMARY KEY NOT NULL,
                Nama_Makanan CHAR(20)
            );

                ";
        $db->pdo->exec($SQL);
    }

    public function down(): void
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE Makanan();";
        $db->pdo->exec($SQL);
    }
}

?>


