<?php
/**
 * Created by PhpStorm.
 * User: ashaddad
 * Date: 28.02.18
 * Time: 20:42
 */
require_once'FormElement.php';

/**
 * Class InputFormElement
 */
class InputFormElement extends FormElement
{
    private $_type;

    /**
     * Set the Element´s type
     *
     * @param $type string $type the title of element will be displayed in a browser.
     *
     * @return set a type of element
     */
    public function setType($type)
    {
        $this->_type = $type;
    }

    /**
     * Get HTML element.
     *
     * @return string
     */
    public function render()
    {
        if ($this->mandatory == true) {
            if (!empty($_POST[$this->name])) {
                $value = $_POST[$this->name];
            } elseif (!empty($this->value)) {
                $value = $this->value;
            } else {
                $value = '';
            }
            $get_element = '<input type="'.$this->_type.'" name="' . $this->name . '" value="' . $value . '" >';
            return $this->renderLabel().$get_element;
        }
    }

}