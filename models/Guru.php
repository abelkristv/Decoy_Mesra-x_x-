<?php

namespace app\models;

use app\core\DbModel;

class Guru extends DbModel
{
    public string $ID_Guru = '';
    public string $Nama_Guru = '';
    public string $Jenis_Kelamin = '';
    public string $Alamat = '';
    public string $No_HP = '';

    public static function tableName(): string
    {
        return 'Guru';
    }

    public function attributes(): array
    {
        return ['ID_Guru', 'Nama_Guru', 'Jenis_Kelamin',
                'Alamat', 'No_HP'];
    }

    public function primaryKey(): string
    {
        return 'ID_Guru';
    }

    public function rules(): array
    {
        return [
            'ID_Guru' => [self::RULE_REQUIRED],
            'Nama_Guru'     => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'Jenis_Kelamin'  => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'No_HP' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
        ];
    }

    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }
}

?>
