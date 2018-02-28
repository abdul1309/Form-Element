<?php
/**
 * Created by PhpStorm.
 * User: ashaddad
 * Date: 28.02.18
 * Time: 20:40
 */
require_once'FormElement.php';
/**
 * Class SelectFormElement
 */
class SelectFormElement extends FormElement
{
    /**
     * Get a select element.
     *
     * @return string
     */
    public function render()
    {
        $options = null;
        $get_element_select = '<select name="' . $this->name . '" >';
        $option = ['<option value="">- bitte ausw&auml;hlen -</option>'];
        foreach ($this->value as $value => $row) {
            $option[] = '<option value="' . $row . '">' . $row . '</option>';
            $options = implode(PHP_EOL, $option);
        }
        return $this->renderLabel(). $get_element_select . $options . '</select>';
    }
}