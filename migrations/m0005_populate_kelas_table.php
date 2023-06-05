<?php

use app\core\Application;

class m0005_populate_kelas_table
{
    public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
                INSERT INTO Kelas (ID_Kelas, Nama_Kelas, ID_Guru) 
                VALUES
                ('K001', '1A', 'G001'),
                ('K002', '1B', 'G002'),
                ('K003', '2A', 'G003'),
                ('K004', '2B', 'G004'),
                ('K005', '3A', 'G005'),
                ('K006', '3B', 'G006'),
                ('K007', '4A', 'G007'),
                ('K008', '4B', 'G008'),
                ('K009', '5A', 'G009'),
                ('K010', '5B', 'G010');  

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

