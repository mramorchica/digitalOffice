<?php

namespace Mdo\JitsiEvent;

class JitsiEvent
{
    public static function createLink(String $title)
    {
        $link = 'MDO';
        $link .= str_replace(' ', '', $title);
        $link .= rand(100, 10000);

        return $link;
    }

    public static function makeMeet($meetCode, $userData)
    {
        return view('JitsiEvent::meeting', ['meetCode' => $meetCode, 'userData' => $userData]);
    }
}
