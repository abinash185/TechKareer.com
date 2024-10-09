namespace App\Form;

class RadioField extends Field
{
    private $options;

    public function __construct($name, $label, $options = [], $value = '')
    {
        parent::__construct($name, $label, $value);
        $this->options = $options;
    }

    public function render()
    {
        $html = "<label>{$this->label}</label>";
        foreach ($this->options as $option => $val) {
            $checked = ($this->value == $val) ? 'checked' : '';
            $html .= "<input type='radio' name='{$this->name}' value='$val' $checked /> $option ";
        }
        return $html;
    }
}
