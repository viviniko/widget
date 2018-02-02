<?php

namespace Viviniko\Widget\Enums;

class WidgetModelTypes
{
    const FIELD = 'Field';
    const PRODUCT = 'Product';

    public static function values()
    {
        return [
            static::FIELD => static::FIELD,
            static::PRODUCT => static::PRODUCT,
        ];
    }
}