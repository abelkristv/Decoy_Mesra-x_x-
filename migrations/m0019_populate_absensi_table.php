<?php

use app\core\Application;

class m0019_populate_absensi_table
{
    public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
        INSERT INTO Absensi (ID_Siswa, ID_Kelas, ID_Mapel, Tanggal, Keterangan)
VALUES
('S001', 'K001', 'M001', '2022-01-01', 'Hadir'),
('S002', 'K001', 'M001', '2022-01-02', 'Tidak Hadir'),
('S003', 'K001', 'M002', '2022-01-03', 'Izin'),
('S004', 'K001', 'M002', '2022-01-04', 'Hadir'),
('S005', 'K002', 'M003', '2022-01-05', 'Sakit'),
('S006', 'K002', 'M003', '2022-01-06', 'Hadir'),
('S007', 'K003', 'M004', '2022-01-07', 'Tidak Hadir'),
('S008', 'K003', 'M004', '2022-01-08', 'Hadir'),
('S009', 'K004', 'M005', '2022-01-09', 'Izin'),
('S010', 'K004', 'M005', '2022-01-10', 'Hadir');
      ";
        $db->pdo->exec($SQL);
    }

    public function down(): void
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE Absensi();";
        $db->pdo->exec($SQL);
    }
}

?>


