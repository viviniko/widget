<?php
namespace Viviniko\Widget\Models;

use Illuminate\Support\Facades\Config;
use Viviniko\Support\Database\Eloquent\Model;

class Widget extends Model
{
    protected $tableConfigKey = 'widget.widgets_table';

    protected $fillable = ['name', 'display_name', 'type', 'description', 'url', 'target', 'image', 'fields'];

    protected $casts = [
        'fields' => 'array',
    ];

    public function items()
    {
        return $this->hasMany(Config::get('widget.widget_item'), 'widget_id');
    }
}