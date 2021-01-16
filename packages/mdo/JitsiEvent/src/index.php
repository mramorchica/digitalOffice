<?php

namespace Mdo\JitsiEvent;

class JitsiEvent
{
    public static function create(String $sName)
    {
        return 'Hi ' . $sName . '! How are you doing today?';
    }
}
