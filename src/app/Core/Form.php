<?php

//namespace App\Core;

class Form
{
    private $method;
    private $action;
    private $id;
    private $name;
    private $fields;
    private $hasFileField;


    public function __construct($method, $id, $name, $action = null)
    {
        $this->method = $method;
        $this->id = $id;
        $this->name = $name;
        $this->action = $action;
        $this->fields = array();
        $this->hasFileField = false;
    }

    public function input($name, $label, $type, $options = array(), $checked = false)
    {
        $field = array(
            'label' => $label,
            'type' => $type,
            'options' => $options
        );

        if ($type == 'checkbox' && $checked) {
            $field['checked'] = 'checked';
        }
        $this->fields[$name] = $field;
    }

    public function textarea($name, $label, $options = array())
    {
        $this->fields[$name] = array(
            'label' => $label,
            'type' => 'textarea',
            'options' => $options
        );
    }

    public function select($name, $label, $options, $selected = null)
    {
        $field = array(
            'label' => $label,
            'type' => 'select',
            'options' => $options
        );
        if ($selected !== null) {
            $field['selected'] = $selected;
        }
        $this->fields[$name] = $field;
    }

    public function copyDownloadButton()
    {
        $this->fields[] = array(
            'type' => 'copyDownloadButton'
        );
    }

    public function button($name, $value, $label, $options = array())
    {
        $this->fields[] = array(
            'type' => 'button',
            'name' => $name,
            'value' => $value,
            'label' => $label,
            'options' => $options
        );
    }

    public function html($html)
    {
        $this->fields[] = array(
            'type' => 'html',
            'html' => $html,
        );
    }

    public function render()
    {
        $html = '<form method="' . $this->method . '" id="' . $this->id . '" name="' . $this->name . '" action="' . $this->action . '"';

        foreach ($this->fields as $name => $field) {
            if ($field['type'] == 'file') {
                $this->hasFileField = true;
                break;
            }
        }

        if ($this->hasFileField) {
            $html .= ' enctype="multipart/form-data"';
        }

        $html .= '>';

        foreach ($this->fields as $name => $field) {
            // $html .= '<div class="form-group">';
            if ($field['type'] != 'button' & $field['type'] != 'copyDownloadButton' & $field['type'] != 'html') {
                $html .= '<label for="' . $name . '">' . $field['label'] . '</label>';
            }
            switch ($field['type']) {
                case 'text':
                    $html .= '<input type="text" name="' . $name . '" id="' . $name . '"';
                    foreach ($field['options'] as $optionValue => $optionLabel) {
                        $html .= $optionValue . '="' . $optionLabel . '"';
                    }
                    $html .= '>';
                    break;

                case 'file':
                    $html .= '<input type="file" name="' . $name . '" id="' . $name . '"';
                    foreach ($field['options'] as $optionValue => $optionLabel) {
                        $html .= $optionValue . '="' . $optionLabel . '"';
                    }
                    $html .= '>';
                    break;

                case 'textarea':
                    $html .= '<textarea name="' . $name . '" id="' . $name . '"></textarea>';
                    break;

                case 'select':
                    $html .= '<div class="selectDiv">';
                    $html .= '<select name="' . $name . '" id="' . $name . '">';

                    foreach ($field['options'] as $optionValue => $optionLabel) {
                        $selected = '';
                        if (isset($field['selected']) && $optionValue === $field['selected']) {
                            $selected = 'selected';
                        }
                        $html .= '<option value="' . $optionValue . '" ' . $selected . '>' . $optionLabel . '</option>';
                    }

                    $html .= '</select>';
                    $html .= '</div>';
                    break;


                case 'checkbox':
                    $html .= '<input type="checkbox" name="' . $name . '" id="' . $name . '"';
                    if (isset($field['checked'])) {
                        $html .= ' checked';
                    }
                    $html .= '>';
                    break;

                case 'radio':
                    foreach ($field['options'] as $optionValue => $optionLabel) {
                        $html .= '<input type="radio" name="' . $name . '" id="' . $name . '_' . $optionValue . '" value="' . $optionValue . '">';
                        $html .= '<label for="' . $name . '_' . $optionValue . '">' . $optionLabel . '</label>';
                    }
                    break;

                case 'button':
                    $html .= '<button type="submit" name="' . $field['name'] . '" value="' . $field['value'] . '"';
                    foreach ($field['options'] as $optionValue => $optionLabel) {
                        $html .= $optionValue . '="' . $optionLabel . '"';
                    }
                    $html .= '>' . $field['label'] . '</button>';
                    break;

                case 'copyDownloadButton':
                    $html .= '<div class="text-right">';
                    $html .= '<button id="copy-btn"><svg data-icon="clipboard" width="16" height="16" viewBox="0 0 16 16"><desc>clipboard</desc><path d="M11 2c0-.55-.45-1-1-1h.22C9.88.4 9.24 0 8.5 0S7.12.4 6.78 1H7c-.55 0-1 .45-1 1v1h5V2zm2 0h-1v2H5V2H4c-.55 0-1 .45-1 1v12c0 .55.45 1 1 1h9c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1z" fill-rule="evenodd"></path></svg>Copy</button> ';
                    $html .= '<button id="download-btn"><svg data-icon="download" width="16" height="16" viewBox="0 0 384 512"><desc>download</desc><path d="M384 128h-128V0L384 128zM256 160H384v304c0 26.51-21.49 48-48 48h-288C21.49 512 0 490.5 0 464v-416C0 21.49 21.49 0 48 0H224l.0039 128C224 145.7 238.3 160 256 160zM255 295L216 334.1V232c0-13.25-10.75-24-24-24S168 218.8 168 232v102.1L128.1 295C124.3 290.3 118.2 288 112 288S99.72 290.3 95.03 295c-9.375 9.375-9.375 24.56 0 33.94l80 80c9.375 9.375 24.56 9.375 33.94 0l80-80c9.375-9.375 9.375-24.56 0-33.94S264.4 285.7 255 295z"></path></svg>Download</button>';
                    $html .= '</div>';
                    break;

                case 'html':
                    $html .= $field['html'];
                    break;

            }

            // $html .= '</div>';
        }

        $html .= '</form>';

        return $html;
    }
}


/*
<?php
// create a new form
$form = new Form('POST', 'id', '/submit-form.php');

// add some fields to the form
$form->input('name', 'Name:', 'text');
$form->textarea('message', 'Message:');
$form->select('gender', 'Gender:', array(
  'male' => 'Male',
  'female' => 'Female',
  'other' => 'Other'
));
$form->input('email', 'Email:', 'email');
$form->input('phone', 'Phone:', 'tel');

// add a submit button
$form->button('action', 'encode', 'Encode to Base64');

// render the form
echo $form->render();
?>


*/