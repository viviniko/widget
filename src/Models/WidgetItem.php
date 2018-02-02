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

    public function getData()
    {
        static $items = [];
        $data = $this->data;
        if (!empty($data['__item_id'])) {
            if (!isset($items[$data['__item_id']])) {
                $items[$data['__item_id']] = app(\Viviniko\Catalog\Repositories\Item\ItemRepository::class)->find($data['__item_id']);
            }
            if (!empty($items[$data['__item_id']])) {
                $data = array_merge($items[$data['__item_id']]->toArray(), $data);
            }
        }
        $data = (object)$data;
        $data->id = $this->id;
        $data->sort = $this->sort;

        return $data;
    }
}