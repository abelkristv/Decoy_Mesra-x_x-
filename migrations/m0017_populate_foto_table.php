<?php

use app\core\Application;

class m0017_populate_foto_table
{
    public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
        INSERT INTO Foto (ID_Foto, Nama_Foto, image)
VALUES
('F001', 'Adam Smith', 'image_data_1'),
('F002', 'Emily Johnson', 'image_data_2'),
('F003', 'Michael Brown', 'image_data_3'),
('F004', 'Emma Davis', 'image_data_4'),
('F005', 'Joshua Miller', 'image_data_5'),
('F006', 'Madison Wilson', 'image_data_6'),
('F007', 'Matthew Moore', 'image_data_7'),
('F008', 'Olivia Anderson', 'image_data_8'),
('F009', 'Jacob Taylor', 'image_data_9'),
('F010', 'Isabella Thomas', 'image_data_10');
       ";
        $db->pdo->exec($SQL);
    }

    public function down(): void
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE Foto();";
        $db->pdo->exec($SQL);
    }
}

?>


