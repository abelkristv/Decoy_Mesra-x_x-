<?php

use app\core\Application;

class m0021_populate_makanan_table
{
    public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
        
            INSERT INTO Makanan (ID_Makanan, Nama_Makanan)
VALUES
('M001', 'Nasi Goreng'),
('M002', 'Mie Goreng'),
('M003', 'Nasi Uduk'),
('M004', 'Nasi Ayam'),
('M005', 'Nasi Kebuli'),
('M006', 'Mie Ayam'),
('M007', 'Nasi Campur'),
('M008', 'Sate Ayam'),
('M009', 'Sate Kambing'),
('M010', 'Nasi Pecel');

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


