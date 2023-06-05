<?php

namespace app\models;
use app\core\Model;
use app\core\Application;
use app\models\Siswa;

class LoginModel extends Model
{
    public string $Nama_Siswa = '';
    public string $ID_Siswa = '';

    public function rules(): array
    {
        return [
            'Nama_Siswa' => [self::RULE_REQUIRED],
            'ID_Siswa'  => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => 24]],
        ];
    }

    public function login(): bool
    {
        $siswa = Siswa::findOne(['Nama_Siswa' => $this->Nama_Siswa]);
        $guru = Guru::findOne(['Nama_Guru' => $this->Nama_Siswa]);
        if (!$siswa && !$guru) {
            $this->addError('Nama_Siswa', 'User does not exist with this name');
            return false;
        }

        if (($this->ID_Siswa != $siswa->ID_Siswa) &&
            ($this->ID_Siswa != $guru->ID_Guru)) {
            $this->addError('ID_Siswa', 'Password is incorrect');
            return false;
        }

        $value = $siswa;
        $user = 'siswa';
        if (!$siswa) {
            $value = $guru;
            $user = 'guru';
        }

        Application::$app->login($value, $user);
        return true;
    }


}

?>
