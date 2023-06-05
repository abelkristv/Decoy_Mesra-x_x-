<?php

use app\core\Application;

class m0012_create_kelasMapel_table
{
    public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
       CREATE TABLE KelasMapel (
            ID_Kelas CHAR(4) NOT NULL, FOREIGN KEY (ID_Kelas) REFERENCES Kelas(ID_Kelas),
            ID_Mapel CHAR(4) NOT NULL, FOREIGN KEY (ID_Mapel) REFERENCES Mapel(ID_Mapel),
            ID_Guru CHAR(4) NOT NULL, FOREIGN KEY(ID_Guru) REFERENCES Guru(ID_Guru)
        );

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

