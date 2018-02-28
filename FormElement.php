<?php

/**
 * Created by PhpStorm.
 * User: ashaddad
 * Date: 27.02.18
 * Time: 16:33
 */
class FormElement
{
    private $_label;
    private $_name;
    private $_type;
    private $_mandatory;
    private $_value;

    /**
     * FormElement constructor.
     *
     * @param $label string      $label     the title of element will be displayed in a browser.
     * @param $name string       $name      the   title of element will be displayed in a browser.
     * @param $type string       $type      the title of element will be displayed in a browser.
     * @param $mandatory boolean $mandatory for check.
     *
     * @return set values
     */
    public function __construct($label, $name, $type, $mandatory)
    {
        $this->_label = $label;
        $this->_name = $name;
        $this->_type = $type;
        $this->_mandatory = $mandatory;
    }

    /**
     * Set values.
     *
     * @param $value mixed $value the elements values will be.
     *
     * @return set anew values.
     */
    public function setValue($value)
    {
        $this->_value = $value;
    }

    /**
     * Get HTML element.
     *
     * @return string
     */
    public function render()
    {
        if ($this->_mandatory == true) {
            if ($this->_type != 'submit') {
                print '<label name = ' . $this->_name . '>' . $this->_label . '</label>';
            }
            $get_element = null;
            if (!empty($_POST[$this->_name])) {
                $value = $_POST[$this->_name];
            } elseif (!empty($this->_value)) {
                $value = $this->_value;
            } else {
                $value = '';
            }
            switch ($this->_type) {
            case 'text':
                $get_element = '<input type="text" name="' . $this->_name . '" value="' . $value . '" >';
                break;
            case 'password':
                $get_element = '<input type="password" name="' . $this->_name . '" value="' . $value . '"">';
                break;
            case 'email':
                $get_element = '<input type="email" name="' . $this->_name . '" value="' . $value . '"">';
                break;
            case 'date':
                $get_element = '<input type="date" name="' . $this->_name . '" value="' . $value . '"">';
                break;
            case 'submit':
                $get_element = '<input type="submit" name="' . $this->_name . '" value="' . $this->_label . '">';
                break;
            case 'link':
                $get_element = '<a href="' . $this->_name . '" >' . $this->_label . '</a>';
                break;
            case 'button':
                $get_element = '<button type="submit"  name="' . $this->_name . '" value = "' . $value . '">' . $this->_label . '</button>';
                break;
            case 'select':
                $options = null;
                $get_element_select = '<select name="' . $this->_name . '" >';
                $option = ['<option value="">- bitte ausw&auml;hlen -</option>'];
                foreach ($this->_value as $value => $row) {
                    $option[]= '<option value="' . $row . '">' . $row . '</option>';
                    $options = implode(PHP_EOL, $option);
                }
                $get_element = $get_element_select . $options . '</select>';
                break;

            }
            return $get_element;
        }

    }
}