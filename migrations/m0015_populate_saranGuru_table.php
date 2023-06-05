<?php

use app\core\Application;

class m0015_populate_saranGuru_table
{
    public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
      INSERT INTO SaranGuru(ID_Siswa, ID_Guru, Saran)
VALUES
('S057', 'G006', 'Mohon maaf, anak saya sering sakit-sakitan belakangan ini'),
('S011', 'G002', 'Terima kasih sudah membantu mengatasi masalah konsentrasi anak saya saat belajar.'),
('S098', 'G010', 'Anak saya sangat menyukai kegiatan menggambar setiap hari'),
('S045', 'G005', 'Mohon maaf, anak saya sering sakit-sakitan belakangan ini'),
('S006', 'G001', 'Anak saya sangat menyukai kegiatan menggambar setiap hari'),
('S022', 'G003', 'Terima kasih sudah membantu mengatasi masalah konsentrasi anak saya saat belajar.'),
('S028', 'G003', 'Tolong berikan contoh tugas yang sesuai dengan tingkat kemampuan anak saya'),
('S053', 'G006', 'Anak saya sangat menyukai kegiatan bermain bersama teman-temannya di sekolah'),
('S024', 'G003', 'Tolong bantu anak saya untuk belajar berhitung'),
('S008', 'G001', 'Anak saya sangat menyukai kegiatan bermain bersama teman-temannya di sekolah'),
('S033', 'G004', 'Tolong berikan contoh tugas yang sesuai dengan tingkat kemampuan anak saya'),
('S046', 'G005', 'Tolong berikan contoh tugas yang sesuai dengan tingkat kemampuan anak saya'),
('S018', 'G002', 'Terima kasih sudah membantu mengatasi masalah konsentrasi anak saya saat belajar.'),
('S092', 'G010', 'Saya sangat senang melihat perkembangan anak saya dalam membaca'),
('S094', 'G010', 'Tolong berikan contoh tugas yang sesuai dengan tingkat kemampuan anak saya'),
('S020', 'G002', 'Saya sangat senang melihat perkembangan anak saya dalam membaca'),
('S085', 'G009', 'Terima kasih sudah mengajar anak saya dengan baik'),
('S031', 'G004', 'Anak saya sangat menyukai kegiatan menggambar setiap hari'),
('S017', 'G002', 'Mohon maaf, anak saya sering sakit-sakitan belakangan ini'),
('S039', 'G004', 'Anak saya sangat menyukai kegiatan menggambar setiap hari'),
('S062', 'G007', 'Anak saya sangat menyukai kegiatan bermain bersama teman-temannya di sekolah'),
('S052', 'G006', 'Saya sangat senang melihat perkembangan anak saya dalam membaca'),
('S019', 'G002', 'Anak saya kesulitan dalam belajar menulis huruf, tolong bantu'),
('S030', 'G003', 'Anak saya sangat menyukai kegiatan bermain bersama teman-temannya di sekolah'),
('S075', 'G008', 'Terima kasih sudah mengajar anak saya dengan baik'),
('S043', 'G005', 'Terima kasih sudah memberikan tugas rumah yang menyenangkan untuk anak'),
('S069', 'G007', 'Anak saya sangat menyukai kegiatan bermain bersama teman-temannya di sekolah'),
('S086', 'G009', 'Terima kasih sudah mengajar anak saya dengan baik'),
('S059', 'G006', 'Tolong bantu anak saya untuk belajar berhitung'),
('S084', 'G009', 'Terima kasih sudah memberikan tugas rumah yang menyenangkan untuk anak'),
('S004', 'G001', 'Terima kasih sudah memberikan tugas rumah yang menyenangkan untuk anak'),
('S040', 'G004', 'Anak saya kesulitan dalam belajar menulis huruf, tolong bantu'),
('S054', 'G006', 'Saya sangat senang melihat perkembangan anak saya dalam membaca'),
('S000', 'G001', 'Anak saya kesulitan dalam belajar menulis huruf, tolong bantu'),
('S076', 'G008', 'Tolong berikan contoh tugas yang sesuai dengan tingkat kemampuan anak saya'),
('S027', 'G003', 'Anak saya kesulitan dalam belajar menulis huruf, tolong bantu'),
('S037', 'G004', 'Mohon maaf, anak saya sering sakit-sakitan belakangan ini'),
('S044', 'G005', 'Saya sangat senang melihat perkembangan anak saya dalam membaca'),
('S003', 'G001', 'Terima kasih sudah membantu mengatasi masalah konsentrasi anak saya saat belajar.'),
('S083', 'G009', 'Anak saya kesulitan dalam belajar menulis huruf, tolong bantu'),
('S078', 'G008', 'Terima kasih sudah mengajar anak saya dengan baik'),
('S038', 'G004', 'Mohon maaf, anak saya sering sakit-sakitan belakangan ini'),
('S032', 'G004', 'Saya sangat senang melihat perkembangan anak saya dalam membaca'),
('S060', 'G006', 'Terima kasih sudah mengajar anak saya dengan baik'),
('S029', 'G003', 'Terima kasih sudah memberikan tugas rumah yang menyenangkan untuk anak'),
('S047', 'G005', 'Terima kasih sudah memberikan tugas rumah yang menyenangkan untuk anak'),
('S072', 'G008', 'Anak saya kesulitan dalam belajar menulis huruf, tolong bantu'),
('S073', 'G008', 'Anak saya kesulitan dalam belajar menulis huruf, tolong bantu'),
('S081', 'G009', 'Mohon maaf, anak saya sering sakit-sakitan belakangan ini'),
('S089', 'G009', 'Terima kasih sudah mengajar anak saya dengan baik');

        ";
        $db->pdo->exec($SQL);
    }

    public function down(): void
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE SaranGuru();";
        $db->pdo->exec($SQL);
    }
}

?>


