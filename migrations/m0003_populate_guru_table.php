<?php

use app\core\Application;

class m0003_populate_guru_table
{
    public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
            
INSERT INTO Guru (ID_Guru, Nama_Guru, Alamat, No_HP, Jenis_Kelamin) 
VALUES
('G001', 'John Smith', 'Jl. Merdeka No. 12', '089268398416', 'Laki-laki'),
('G002', 'Jane Doe', 'Jl. Jenderal Sudirman No. 25', '082791368151', 'Perempuan'),
('G003', 'Michael Johnson', 'Jl. Ahmad Yani No. 37', '086433204469', 'Laki-laki'),
('G004', 'Emily Brown', 'Jl. Perintis Kemerdekaan No. 49', '083266915996', 'Perempuan'),
('G005', 'Joshua Davis', 'Jl. Pahlawan Revolusi No. 61', '082359241802', 'Laki-laki'),
('G006', 'Ashley Miller', 'Jl. Cendrawasih No. 73', '084144521780', 'Perempuan'),
('G007', 'Matthew Wilson', 'Jl. Kesejahteraan No. 85', '082948016371', 'Laki-laki'),
('G008', 'Olivia Moore', 'Jl. Persatuan No. 97', '087609653648', 'Perempuan'),
('G009', 'Jacob Taylor', 'Jl. Kesatuan No. 109', '088853553514', 'Laki-laki'),
('G010', 'Isabella Anderson', 'Jl. Persahabatan No. 121', '081015818721', 'Perempuan'),
('G011', 'Sudirman Sastra', 'Jl. Kebangsaan No. 133', '085482508883', 'Laki-laki'),
('G012', 'Tuti Wulan', 'Jl. Pembangunan No. 145', '088791968123', 'Perempuan'),
('G013', 'Agus Gunawan', 'Jl. Kemerdekaan No. 157', '089773101060', 'Laki-laki'),
('G014', 'Rina Purnama', 'Jl. Kenangan No. 169', '087674367915', 'Perempuan'),
('G015', 'Budi Hartono', 'Jl. Sejahtera No. 181', '086889497832', 'Laki-laki'),
('G016', 'Diana Sari', 'Jl. Bangsa No. 193', '082766873980', 'Perempuan'),
('G017', 'Eko Prasetyo', 'Jl. Negara No. 205', '085374697941', 'Laki-laki'),
('G018', 'Fajar Wahyudi', 'Jl. Warga No. 217', '086297215828', 'Laki-laki'),
('G019', 'Gusti Ayu', 'Jl. Sosial No. 229', '087233892666', 'Perempuan'),
('G020', 'Hendra Setiawan', 'Jl. Pendidikan No. 241', '084521129271', 'Laki-laki');
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
