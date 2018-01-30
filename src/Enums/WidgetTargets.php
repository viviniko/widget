<?php
namespace Viviniko\Widget\Enums;

class WidgetTargets
{
    const SELF = '_self';
    const BLANK = '_blank';
    public static function values()
    {
        return [
            static::SELF => trans('app.target_self'),
            static::BLANK => trans('app.target_blank')
        ];
    }
}