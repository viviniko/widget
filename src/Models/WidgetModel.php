<?php
namespace Viviniko\Widget\Models;

use Illuminate\Support\Facades\Config;
use Viviniko\Support\Database\Eloquent\Model;
use Viviniko\Widget\Enums\WidgetModelTypes;

class WidgetModel extends Model
{
    protected $tableConfigKey = 'widget.widget_models_table';

    protected $fillable = ['name', 'description', 'type', 'is_system'];

    protected $casts = [
        'is_system' => 'boolean',
    ];

    public function isFieldType()
    {
        return $this->type == WidgetModelTypes::FIELD;
    }

    public function isProductType()
    {
        return $this->type == WidgetModelTypes::PRODUCT;
    }

    public function fields()
    {
        return $this->hasMany(Config::get('widget.widget_model_field'), 'model_id');
    }
}