<?php
namespace Viviniko\Widget\Models;

use Illuminate\Support\Facades\Config;
use Viviniko\Support\Database\Eloquent\Model;

class WidgetGroup extends Model
{
    protected $tableConfigKey = 'widget.widget_groups_table';

    protected $fillable = ['name', 'display_name', 'description', 'is_system'];

    protected $casts = [
        'is_system' => 'boolean',
    ];

    public function widgets()
    {
        return $this->hasMany(Config::get('widget.widget'), 'group_id');
    }
}