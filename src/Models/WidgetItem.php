<?php
namespace Viviniko\Widget\Models;

use Illuminate\Support\Facades\Config;
use Viviniko\Support\Database\Eloquent\Model;

class WidgetItem extends Model
{
    protected $tableConfigKey = 'widget.widget_items_table';

    protected $fillable = ['widget_id', 'sort', 'data'];

    protected $casts = [
        'data' => 'array',
    ];

    public function widget()
    {
        return $this->belongsTo(Config::get('widget.widget'), 'widget_id');
    }
}