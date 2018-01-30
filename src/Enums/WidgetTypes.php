<?php

namespace Viviniko\Widget\Enums;

class WidgetTypes
{
    const MENU = 'Menu';
    const LIST = 'List';
    const SINGLE = 'Single';
    const PRODUCT = 'Product';

    public static function values()
    {
        return [
            static::MENU => 'Menu',
            static::LIST => 'List',
            static::SINGLE => 'Single',
            static::PRODUCT => 'Product'
        ];
    }
}