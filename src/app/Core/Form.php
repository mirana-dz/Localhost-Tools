<?php

//namespace App\Core;

/**
 * Class Form
 *
 * Represents an HTML form with fields and buttons.
 */
class Form
{
    private string $method;
    private ?string $action;
    private string $id;
    private string $name;
    private array $fields;
    private bool $hasFileField;

    /**
     * Constructs a new instance of the Form class.
     *
     * @param string $method The HTTP method used for submitting the form (e.g. 'GET', 'POST').
     * @param string $id The unique identifier for the form.
     * @param string $name The name of the form.
     * @param string|null $action The URL to which the form data will be submitted.
     */
    public function __construct(string $method, string $id, string $name, string $action = null)
    {
        $this->method = $method;
        $this->id = $id;
        $this->name = $name;
        $this->action = $action;
        $this->fields = array();
        $this->hasFileField = false;
    }

    /**
     * Adds an input field to the form.
     *
     * @param string $name The name of the input field.
     * @param string $label The label for the input field.
     * @param string $type The type of the input field.
     * @param array $options An array of additional options for the input field.
     * @param bool $checked Whether the checkbox input is checked or not.
     * @return void
     */
    public function input(string $name, string $label, string $type, array $options = array(), bool $checked = false): void
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

    /**
     * Adds a textarea field to the form.
     *
     * @param string $name The name of the textarea field.
     * @param string $label The label for the textarea field.
     * @param array $options An array of additional options for the textarea field.
     * @return void
     */
    public function textarea(string $name, string $label, array $options = array()): void
    {
        $this->fields[$name] = array(
            'label' => $label,
            'type' => 'textarea',
            'options' => $options
        );
    }

    /**
     * Adds a select field to the form.
     *
     * @param string $name The name of the select field.
     * @param string $label The label for the select field.
     * @param array $options An array of options for the select field.
     * @param mixed|null $selected The selected option for the select field.
     * @return void
     */
    public function select(string $name, string $label, array $options, mixed $selected = null): void
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

    /**
     * Adds a copy/download button to the form.
     *
     * @return void
     */
    public function copyDownloadButton(): void
    {
        $this->fields[] = array(
            'type' => 'copyDownloadButton'
        );
    }

    /**
     * Adds a button to the form.
     *
     * @param string $name The name of the button.
     * @param string $value The value of the button.
     * @param string $label The label for the button.
     * @param array $options An array of additional options for the button.
     * @return void
     */
    public function button(string $name, string $value, string $label, array $options = array()): void
    {
        $this->fields[] = array(
            'type' => 'button',
            'name' => $name,
            'value' => $value,
            'label' => $label,
            'options' => $options
        );
    }

    /**
     * Adds raw HTML to the form.
     *
     * @param string $html The HTML code to add to the form.
     * @return void
     */
    public function html(string $html): void
    {
        $this->fields[] = array(
            'type' => 'html',
            'html' => $html,
        );
    }

    /**
     * Renders a form HTML string.
     *
     * @return string The HTML string of the form.
     */
    public function render(): string
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
            if ($field['type'] != 'button' & $field['type'] != 'copyDownloadButton' & $field['type'] != 'html') {
                $html .= '<label for="' . $name . '" class="form-label">' . $field['label'] . '</label>';
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