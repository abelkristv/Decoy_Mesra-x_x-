<?php

use app\core\Application;

class m0014_create_saranGuru_table
{
    public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
      CREATE TABLE SaranGuru (
            ID_Siswa CHAR(10) PRIMARY KEY NOT NULL,
            ID_Guru CHAR(4) NOT NULL, FOREIGN KEY(ID_Guru) REFERENCES Guru(ID_Guru),
            Saran VARCHAR(100) NOT NULL
        );

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

