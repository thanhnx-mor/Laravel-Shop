<?php
namespace App\Components;
use App\Menu;

class MenuRecusive {
    private $html;
    public function __construct()
    {
        $this->html = '';
    }

    public function menuRecursiveAdd($parentId = 0, $subMark = '')
    {
        $rawData = Menu::where('parent_id', $parentId)->get();
        forEach ($rawData as $data) {
            $this->html .= '<option value="'.$data->id.'">'. $subMark.$data->name . '</option>';
            $this->menuRecursiveAdd($data->id, $subMark.'--');
        }
        return $this->html;
    }

}

?>
