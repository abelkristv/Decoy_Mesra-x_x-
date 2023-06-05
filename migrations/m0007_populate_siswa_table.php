<?php

use app\core\Application;

class m0007_populate_siswa_table
{
    public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
        INSERT INTO Siswa (ID_Siswa, ID_Kelas, Tanggal_Lahir, Nama_Siswa, Jenis_Kelamin, Nama_Ortu, Alamat, No_HP_Orangtua) 
VALUES
('S001', 'K001', '2018-01-12', 'Aditya', 'Laki-laki', 'Arifin', 'Jl. Merdeka No. 12', '087230495618'),
('S002', 'K001', '2018-03-29', 'Ahmad', 'Perempuan', 'Budiman', 'Jl. Sudirman No. 45', '084963281075'),
('S003', 'K001', '2018-07-16', 'Aji', 'Laki-laki', 'Djoko', 'Jl. Diponegoro No. 78', '082648579034'),
('S004', 'K001', '2018-10-24', 'Andika', 'Perempuan', 'Edi', 'Jl. Gatot Subroto No. 90', '085930681472'),
('S005', 'K001', '2018-06-08', 'Ari', 'Laki-laki', 'Frans', 'Jl. Jenderal Sudirman No. 23', '084712503698'),
('S006', 'K001', '2018-09-11', 'Arif', 'Perempuan', 'Gunawan', 'Jl. Jenderal Ahmad Yani No. 56', '083590642871'),
('S007', 'K001', '2018-02-24', 'Aris', 'Laki-laki', 'Heryanto', 'Jl. Pahlawan Revolusi No. 89', '086578234019'),
('S008', 'K001', '2018-04-19', 'Arman', 'Perempuan', 'Ismail', 'Jl. Ahmad Dahlan No. 12', '086429583071'),
('S009', 'K001', '2018-08-30', 'Aulia', 'Laki-laki', 'Joko', 'Jl. HOS Cokroaminoto No. 45', '085793124068'),
('S010', 'K001', '2018-12-19', 'Bambang', 'Perempuan', 'Kurniawan', 'Jl. Kapten Pattimura No. 78', '082975346081'),
('S011', 'K002', '2018-01-28', 'Dika', 'Laki-laki', 'Lestari', 'Jl. Letjen S. Parman No. 90', '086049275831'),
('S012', 'K002', '2018-03-20', 'Dini', 'Perempuan', 'Mulyadi', 'Jl. Raden Inten No. 23', '084736985210'),
('S013', 'K002', '2018-07-09', 'Dewi', 'Laki-laki', 'Nurdin', 'Jl. Sultan Agung No. 56', '083510296748'),
('S014', 'K002', '2018-10-06', 'Eka', 'Perempuan', 'Oetomo', 'Jl. Sultan Hasanuddin No. 89', '081240731349'),
('S015', 'K002', '2018-06-22', 'Fadli', 'Laki-laki', 'Purnomo', 'Jl. Taman Siswa No. 12', '089720153468'),
('S016', 'K002', '2018-09-01', 'Fajar', 'Perempuan', 'Qodir', 'Jl. Jenderal Sudirman No. 45', '086489282761'),
('S017', 'K002', '2018-02-03', 'Farhan', 'Laki-laki', 'Rachmat', 'Jl. Jenderal Soedirman No. 78', '085327400836'),
('S018', 'K002', '2018-04-13', 'Farid', 'Perempuan', 'Suyadi', 'Jl. Brigjen Katamso No. 90', '0842153453827'),
('S019', 'K002', '2018-08-17', 'Firmansyah', 'Laki-laki', 'Tjahjono', 'Jl. Dr. Wahidin Sudirohusodo No. 23', '083094789713'),
('S020', 'K002', '2018-12-12', 'Galuh', 'Perempuan', 'Umar', 'Jl. Jenderal Besar Gatot Subroto No. 56', '081963028471'),
('S021', 'K003', '2018-01-23', 'Heri', 'Laki-laki', 'Vebrianto', 'Jl. Ahmad Yani No. 89', '086930284715'),
('S022', 'K003', '2018-03-10', 'Ihsan', 'Perempuan', 'Wiranto', 'Jl. Pahlawan Revolusi No. 12', '085701483972'),
('S023', 'K003', '2018-07-03', 'Ilham', 'Laki-laki', 'Xaverius', 'Jl. Jenderal Sudirman No. 45', '084620593827'),
('S024', 'K003', '2018-10-01', 'Indah', 'Perempuan', 'Yoga', 'Jl. Jenderal Ahmad Yani No. 78', '083450296784'),
('S025', 'K003', '2018-06-15', 'Irfan', 'Laki-laki', 'Zulfikar', 'Jl. Pahlawan Revolusi No. 90', '082390485712'),
('S026', 'K003', '2018-09-19', 'Ismail', 'Perempuan', 'Ade', 'Jl. Ahmad Dahlan No. 23', '081230874968'),
('S027', 'K003', '2018-02-17', 'Jamal', 'Laki-laki', 'Bambang', 'Jl. HOS Cokroaminoto No. 56', '080138472956'),
('S028', 'K003', '2018-04-01', 'Joko', 'Perempuan', 'Cokro', 'Jl. Kapten Pattimura No. 89', '089020582947'),
('S029', 'K003', '2018-08-25', 'Kurniawan', 'Laki-laki', 'Dewi', 'Jl. Letjen S. Parman No. 12', '087840295837'),
('S030', 'K003', '2018-12-07', 'Lestari', 'Perempuan', 'Edy', 'Jl. Raden Inten No. 45', '086690284716'),
('S031', 'K004', '2018-01-16', 'Luthfi', 'Laki-laki', 'Fauzi', 'Jl. Sultan Agung No. 78', '085540273895'),
('S032', 'K004', '2018-03-31', 'Miftah', 'Perempuan', 'Gede', 'Jl. Sultan Hasanuddin No. 90', '084490284716'),
('S033', 'K004', '2018-07-18', 'Mukti', 'Laki-laki', 'Hari', 'Jl. Taman Siswa No. 23', '083340295837'),
('S034', 'K004', '2018-10-27', 'Nadia', 'Perempuan', 'Iskandar', 'Jl. Jenderal Sudirman No. 56', '082290284716'),
('S035', 'K004', '2018-06-10', 'Nanda', 'Laki-laki', 'Jaka', 'Jl. Jenderal Soedirman No. 89', '081140295837'),
('S036', 'K004', '2018-09-03', 'Nandang', 'Perempuan', 'Kurnia', 'Jl. Brigjen Katamso No. 12', '084732056538'),
('S037', 'K004', '2018-02-25', 'Nova', 'Laki-laki', 'Laksana', 'Jl. Dr. Wahidin Sudirohusodo No. 45', '088940295837'),
('S038', 'K004', '2018-04-20', 'Nugroho', 'Laki-laki', 'Mardiyanto', 'Jl. Jenderal Besar Gatot Subroto No. 78', '087802847162'),
('S039', 'K004', '2018-08-31', 'Okta', 'Laki-laki', 'Nugroho', 'Jl. Ahmad Yani No. 90', '086664029583'),
('S040', 'K004', '2018-12-20', 'Pandu', 'Laki-laki', 'Octavianus', 'Jl. Pahlawan Revolusi No. 23', '085525028471'),
('S041', 'K005', '2018-01-29', 'Prasetya', 'Laki-laki', 'Priyo', 'Jl. Jenderal Sudirman No. 56', '084380284716'),
('S042', 'K005', '2018-03-22', 'Pratama', 'Perempuan', 'Rian', 'Jl. Jenderal Ahmad Yani No. 89', '083250295837'),
('S043', 'K005', '2018-07-11', 'Putra', 'Laki-laki', 'Suranto', 'Jl. Pahlawan Revolusi No. 12', '082120284716'),
('S044', 'K005', '2018-10-08', 'Rama', 'Perempuan', 'Tulus', 'Jl. Ahmad Dahlan No. 45', '081030295837'),
('S045', 'K005', '2018-06-23', 'Rizki', 'Laki-laki', 'Udin', 'Jl. HOS Cokroaminoto No. 78', '080040284716'),
('S046', 'K005', '2018-09-02', 'Rony', 'Perempuan', 'Vio', 'Jl. Kapten Pattimura No. 90', '088940295837'),
('S047', 'K005', '2018-02-04', 'Rizal', 'Laki-laki', 'Widodo', 'Jl. Merdeka No. 34', '087890284716'),
('S048', 'K005', '2018-04-14', 'Sabar', 'Laki-laki', 'Yulianto', 'Jl. Sudirman No. 67', '086840295837'),
('S049', 'K005', '2018-08-18', 'Sari', 'Laki-laki', 'Zainal', 'Jl. Diponegoro No. 9', '086090284716'),
('S050', 'K005', '2018-12-13', 'Satria', 'Laki-laki', 'Arief', 'Jl. Gatot Subroto No. 11', '089721534345'),
('S051', 'K006', '2018-01-24', 'Setya', 'Laki-laki', 'Bambang', 'Jl. Jenderal Sudirman No. 45', '084090284716'),
('S052', 'K006', '2018-03-11', 'Shandy', 'Perempuan', 'Cepi', 'Jl. Jenderal Ahmad Yani No. 78', '083040295837'),
('S053', 'K006', '2018-07-04', 'Slamet', 'Laki-laki', 'Dedy', 'Jl. Pahlawan Revolusi No. 101', '082090284716'),
('S054', 'K006', '2018-10-02', 'Sugeng', 'Perempuan', 'Erwin', 'Jl. Ahmad Dahlan No. 124', '081040295837'),
('S055', 'K006', '2018-06-16', 'Sulaiman', 'Laki-laki', 'Feri', 'Jl. HOS Cokroaminoto No. 147', '083520674821'),
('S056', 'K006', '2018-09-20', 'Sumardi', 'Perempuan', 'Gito', 'Jl. Kapten Pattimura No. 170', '089040295837'),
('S057', 'K006', '2018-02-18', 'Supriyanto', 'Laki-laki', 'Hartono', 'Jl. Letjen S. Parman No. 193', '088090284716'),
('S058', 'K006', '2018-04-02', 'Syahrul', 'Laki-laki', 'Iwan', 'Jl. Raden Inten No. 216', '087040295837'),
('S059', 'K006', '2018-08-26', 'Syarif', 'Laki-laki', 'Jati', 'Jl. Sultan Agung No. 239', '086090284716'),
('S060', 'K006', '2018-12-08', 'Taufik', 'Laki-laki', 'Karyanto', 'Jl. Sultan Hasanuddin No. 262', '086489352761'),
('S061', 'K007', '2018-01-17', 'Thariq', 'Laki-laki', 'Lutfi', 'Jl. Taman Siswa No. 285', '086405928671'),
('S062', 'K007', '2018-03-30', 'Toni', 'Perempuan', 'Muhammad', 'Jl. Jenderal Sudirman No. 308', '083040295837'),
('S063', 'K007', '2018-07-19', 'Umar', 'Laki-laki', 'Narto', 'Jl. Jenderal Soedirman No. 331', '082090284716'),
('S064', 'K007', '2018-10-28', 'Utama', 'Perempuan', 'Oki', 'Jl. Brigjen Katamso No. 354', '081040295837'),
('S065', 'K007', '2018-06-11', 'Wahyu', 'Laki-laki', 'Prasetyo', 'Jl. Dr. Wahidin Sudirohusodo No. 377', '086502978153'),
('S066', 'K007', '2018-09-04', 'Wildan', 'Perempuan', 'Qonitah', 'Jl. Jenderal Besar Gatot Subroto No. 400', '089040295837'),
('S067', 'K007', '2018-02-26', 'Yadi', 'Laki-laki', 'Rangga', 'Jl. Ahmad Yani No. 423', '088090284716'),
('S068', 'K007', '2018-04-21', 'Yudha', 'Laki-laki', 'Suroso', 'Jl. Pahlawan Revolusi No. 446', '087040295837'),
('S069', 'K007', '2018-08-30', 'Yulianto', 'Laki-laki', 'Tarmizi', 'Jl. Jenderal Sudirman No. 469', '086090284716'),
('S070', 'K007', '2018-12-19', 'Yusril', 'Laki-laki', 'Umar', 'Jl. Jenderal Ahmad Yani No. 492', '085327401986'),
('S071', 'K008', '2018-01-30', 'Yusuf', 'Laki-laki', 'Vino', 'Jl. Pahlawan Revolusi No. 515', '085793812068'),
('S072', 'K008', '2018-03-23', 'Yunus', 'Perempuan', 'Wahyudi', 'Jl. Ahmad Dahlan No. 538', '083040295837'),
('S073', 'K008', '2018-07-12', 'Zainal', 'Laki-laki', 'Yulianto', 'Jl. HOS Cokroaminoto No. 561', '082090284716'),
('S074', 'K008', '2018-10-09', 'Zaki', 'Perempuan', 'Zainal', 'Jl. Kapten Pattimura No. 584', '081040295837'),
('S075', 'K008', '2018-06-24', 'Zulfikar', 'Laki-laki', 'Agus', 'Jl. Letjen S. Parman No. 607', '086405928671'),
('S076', 'K008', '2018-09-03', 'Iqbal', 'Perempuan', 'Bambang', 'Jl. Raden Inten No. 630', '089040295837'),
('S077', 'K008', '2018-02-05', 'Fikri', 'Laki-laki', 'Chandra', 'Jl. Sultan Agung No. 653', '088090284716'),
('S078', 'K008', '2018-04-15', 'Dedy', 'Laki-laki', 'Dedi', 'Jl. Sultan Hasanuddin No. 676', '087040295837'),
('S079', 'K008', '2018-08-19', 'Dede', 'Laki-laki', 'Eko', 'Jl. Taman Siswa No. 699', '086090284716'),
('S080', 'K008', '2018-12-14', 'Darmawan', 'Laki-laki', 'Faisal', 'Jl. Jenderal Sudirman No. 722', '084215903827'),
('S081', 'K009', '2018-01-25', 'Dedi', 'Laki-laki', 'Gunarto', 'Jl. Jenderal Soedirman No. 745', '082973460581'),
('S082', 'K009', '2018-03-12', 'Anwar', 'Perempuan', 'Hadi', 'Jl. Brigjen Katamso No. 768', '087349028167'),
('S083', 'K009', '2018-07-05', 'Arifin', 'Laki-laki', 'Irfan', 'Jl. Dr. Wahidin Sudirohusodo No. 791', '084938571206'),
('S084', 'K009', '2018-10-03', 'Asrul', 'Perempuan', 'Joko', 'Jl. Jenderal Besar Gatot Subroto No. 814', '082645893701'),
('S085', 'K009', '2018-06-17', 'Chandra', 'Laki-laki', 'Kurniawan', 'Jl. Ahmad Yani No. 837', '085693872153'),
('S086', 'K009', '2018-09-21', 'Dwi', 'Perempuan', 'Lestari', 'Jl. Pahlawan Revolusi No. 860', '084732056198'),
('S087', 'K009', '2018-02-19', 'Eko', 'Laki-laki', 'Mulyadi', 'Jl. Jenderal Sudirman No. 883', '083520674821'),
('S088', 'K009', '2018-04-03', 'Fauzi', 'Laki-laki', 'Nurdin', 'Jl. Jenderal Ahmad Yani No. 906', '086502978153'),
('S089', 'K009', '2018-08-27', 'Hadi', 'Laki-laki', 'Oetomo', 'Jl. Pahlawan Revolusi No. 929', '086405928671'),
('S090', 'K009', '2018-12-09', 'Hanif', 'Laki-laki', 'Purnomo', 'Jl. Ahmad Dahlan No. 952', '085793812068'),
('S091', 'K010', '2018-01-18', 'Iqbal', 'Laki-laki', 'Qodir', 'Jl. HOS Cokroaminoto No. 975', '082973460581'),
('S092', 'K010', '2018-03-29', 'Khoirul', 'Perempuan', 'Rachmat', 'Jl. Kapten Pattimura No. 998', '086048275831'),
('S093', 'K010', '2018-07-16', 'Kresna', 'Laki-laki', 'Susanto', 'Jl. Letjen S. Parman No. 23', '084731695210'),
('S094', 'K010', '2018-10-24', 'Kuswanto', 'Perempuan', 'Tjahjono', 'Jl. Raden Inten No. 56', '083510298648'),
('S095', 'K010', '2018-06-08', 'Muhaimin', 'Laki-laki', 'Umar', 'Jl. Sultan Agung No. 89', '081240687953'),
('S096', 'K010', '2018-09-11', 'Nizar', 'Perempuan', 'Vebrianto', 'Jl. Sultan Hasanuddin No. 12', '089721534268'),
('S097', 'K010', '2018-02-24', 'Rizkiyah', 'Laki-laki', 'Wahyu', 'Jl. Taman Siswa No. 45', '086489352761'),
('S098', 'K010', '2018-04-19', 'Siti', 'Laki-laki', 'Yudi', 'Jl. Jenderal Sudirman No. 78', '085327401986'),
('S099', 'K010', '2018-08-31', 'Suprianto', 'Laki-laki', 'Zulfikar', 'Jl. Jenderal Soedirman No. 90', '084215903827'),
('S100', 'K010', '2018-12-20', 'Tri', 'Laki-laki', 'Agung', 'Jl. Brigjen Katamso No. 23', '083094285713');
        ";
        $db->pdo->exec($SQL);
    }

    public function down(): void
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE Siswa();";
        $db->pdo->exec($SQL);
    }
}

?>

