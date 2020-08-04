<?php
namespace App\Components;

class Recursive {
    private $rawData;
    private $htmlSelect = '';
    public function __construct($data)
    {
        $this->rawData = $data;
    }

    function categoryRecursive($parentId = '', $id = 0, $text = '') {
        foreach ($this->rawData as $data) {
            if ( $data['parent_id'] == $id ) {
                if (!empty($parentId) && $parentId == $data['id']) {
                    $this->htmlSelect .= '<option selected value="'.$data["id"].'">' . $text . $data['name'] . '</option>';
                } else {
                    $this->htmlSelect .= '<option value="'.$data["id"].'">' . $text . $data['name'] . '</option>';
                }
                $this->categoryRecursive($parentId, $data['id'], $text.'--');
            }
        }
        return $this->htmlSelect;
    }
}
?>
