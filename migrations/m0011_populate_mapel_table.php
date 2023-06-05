<?php

use app\core\Application;

class m0011_populate_mapel_table
{
    public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
       INSERT INTO Mapel (ID_Mapel, Nama_Mapel) 
            VALUES
            ('M001', 'Membaca'),
            ('M002', 'Menulis'),
            ('M003', 'Berhitung'),
            ('M004', 'Menggambar'),
            ('M005', 'Mewarnai');

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

