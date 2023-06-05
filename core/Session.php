<?php

namespace app\core;

class Session
{
    public const FLASH_KEY = 'flash_messages';

    public function __construct()
    {
        session_start();
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as $key => &$flashMessage) {
            //Mark to be removed
            $flashMessages['remove'] = true;
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }

    public function setFlash($key, $message)
    {
        $_SESSION[self::FLASH_KEY][$key] = [
            'value' => $message,
            'remove' => false
        ];
    }

    public function getFlash($key)
    {
        return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;
    }

    public function __destruct()
    {
        // Iterate over mark to be removed flashMessages
        //$flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        //foreach ($flashMessages as $key => &$flashMessage) {
        //    if ($flashMessages['remove']) {
        //        unset($flashMessages[$key]);
        //    }
        //}
        //$_SESSION[self::FLASH_KEY] = $flashMessages;
    }
}

?>
