<?php
namespace Viviniko\Widget\Models;

use Illuminate\Support\Facades\Config;
use Viviniko\Support\Database\Eloquent\Model;

class WidgetModelField extends Model
{
    protected $tableConfigKey = 'widget.widget_model_fields_table';

    protected $fillable = ['model_id', 'name', 'display_name', 'description', 'is_required', 'input_type', 'input_data'];

    protected $casts = [
        'is_required' => 'boolean',
    ];

    public function widgetModel()
    {
        return $this->belongsTo(Config::get('widget.widget_model'), 'model_id');
    }
}