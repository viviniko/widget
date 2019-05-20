<?php

namespace Viviniko\Widget\Repositories\Widget;

use Illuminate\Support\Facades\Config;
use Viviniko\Repository\EloquentRepository;

class EloquentWidget extends EloquentRepository implements WidgetRepository
{
    public function __construct()
    {
        parent::__construct(Config::get('widget.widget'));
    }
}