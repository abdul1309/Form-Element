<?php

/**
 * Created by PhpStorm.
 * User: ashaddad
 * Date: 28.02.18
 * Time: 20:42
 */
require_once'FormElement.php';

/**
 * Class TextFormElement
 */
class TextFormElement extends FormElement
{
    public $type;
    /**
     * @return string
     */

    public function render($type)
    {
        if ($this->mandatory == true) {
            if (!empty($_POST[$this->name])) {
                $value = $_POST[$this->name];
            } elseif (!empty($this->value)) {
                $value = $this->value;
            } else {
                $value = '';
            }
            $get_element = '<input type="'.$type.'" name="' . $this->name . '" value="' . $value . '" >';
            return $this->renderLabel().$get_element;

        }

    }


}