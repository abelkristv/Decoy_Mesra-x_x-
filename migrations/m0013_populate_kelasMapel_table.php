<?php

use app\core\Application;

class m0013_populate_kelasMapel_table
{
    public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
      INSERT INTO KelasMapel (ID_Kelas, ID_Guru, ID_Mapel) 
        VALUES
        ('K001', 'G002', 'M001'),
        ('K002', 'G002', 'M002'),
        ('K003', 'G003', 'M003'),
        ('K004', 'G004', 'M004'),
        ('K005', 'G005', 'M005'),
        ('K006', 'G006', 'M001'),
        ('K007', 'G007', 'M002'),
        ('K008', 'G008', 'M003'),
        ('K009', 'G009', 'M004'),
        ('K010', 'G010', 'M005'),

        ('K001', 'G011', 'M002'),
        ('K002', 'G012', 'M003'),
        ('K003', 'G013', 'M004'),
        ('K004', 'G014', 'M005'),
        ('K005', 'G015', 'M001'),
        ('K006', 'G016', 'M002'),
        ('K007', 'G017', 'M003'),
        ('K008', 'G018', 'M004'),
        ('K009', 'G019', 'M005'),
        ('K010', 'G020', 'M001'),

        ('K001', 'G008', 'M003'),
        ('K002', 'G005', 'M004'),
        ('K003', 'G002', 'M005'),
        ('K004', 'G016', 'M001'),
        ('K005', 'G018', 'M002'),
        ('K006', 'G019', 'M003'),
        ('K007', 'G014', 'M004'),
        ('K008', 'G006', 'M005'),
        ('K009', 'G010', 'M001'),
        ('K010', 'G011', 'M002');

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

