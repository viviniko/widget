<?php
namespace Viviniko\Widget\Models;

use Illuminate\Support\Facades\Config;
use Viviniko\Support\Database\Eloquent\Model;

class WidgetModel extends Model
{
    protected $tableConfigKey = 'widget.widget_models_table';

    protected $fillable = ['name', 'description', 'is_system'];

    protected $casts = [
        'is_system' => 'boolean',
    ];

    public function fields()
    {
        return $this->hasMany(Config::get('widget.widget_model_field'), 'model_id');
    }
}