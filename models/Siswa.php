<?php

namespace app\models;

use app\core\DbModel;

class Siswa extends DbModel
{
    public string $ID_Siswa = '';
    public string $ID_Kelas = '';
    public string $Nama_Siswa = '';
    public string $Jenis_Kelamin = '';
    public string $Tanggal_Lahir = '';
    public string $Nama_Ortu = '';
    public string $Alamat = '';
    public string $NO_HP_Orangtua = '';

    public static function tableName(): string
    {
        return 'Siswa';
    }

    public function attributes(): array
    {
        return ['ID_Siswa', 'ID_Kelas', 'Nama_Siswa', 'Jenis_Kelamin',
                'Tanggal_Lahir', 'Nama_Ortu', 'Alamat', 'NO_HP_Orangtua'];
    }

    public function primaryKey(): string
    {
        return 'ID_Siswa';
    }

    public function rules(): array
    {
        return [
            'ID_Siswa' => [self::RULE_REQUIRED],
            'ID_Kelas'  => [self::RULE_REQUIRED],
            'Nama_Siswa'     => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'Jenis_Kelamin'  => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'Tanggal_Lahir' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
        ];
    }

    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }
}

?>
