<?php
namespace Viviniko\Widget\Models;

use Illuminate\Support\Facades\Config;
use Viviniko\Support\Database\Eloquent\Model;

class Widget extends Model
{
    protected $tableConfigKey = 'widget.widgets_table';

    protected $fillable = ['group_id', 'model_id', 'name', 'display_name', 'type', 'description', 'url', 'target', 'image', 'sort'];

    public function group()
    {
        return $this->belongsTo(Config::get('widget.widget_group', 'group_id'));
    }

    public function widgetModel()
    {
        return $this->belongsTo(Config::get('widget.widget_model'), 'model_id');
    }

    public function items()
    {
        return $this->hasMany(Config::get('widget.widget_item'), 'widget_id');
    }
}