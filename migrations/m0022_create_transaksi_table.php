<?php

use app\core\Application;

class m0022_create_transaksi_table
{
    public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
        
            CREATE TABLE Transaksi(
    ID_Transaksi INT AUTO_INCREMENT PRIMARY KEY,
    Date DATE NOT NULL,
    ID_Siswa CHAR(4) NOT NULL, FOREIGN KEY (ID_Siswa) REFERENCES Siswa(ID_Siswa),
    ID_Foto CHAR(10), FOREIGN KEY (ID_Foto) REFERENCES Foto (ID_Foto),
    ID_Makanan CHAR(10), FOREIGN KEY (ID_Makanan) REFERENCES Makanan (ID_Makanan),
    Deskripsi_Transaksi VARCHAR (200),
    Catatan_Guru VARCHAR (200)
);

            ";
        $db->pdo->exec($SQL);
    }

    public function down(): void
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE Transaksi();";
        $db->pdo->exec($SQL);
    }
}

?>


