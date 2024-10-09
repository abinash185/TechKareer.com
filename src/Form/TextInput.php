namespace App\Form;

class TextInput extends Field
{
    public function render()
    {
        return "<label for='{$this->name}'>{$this->label}</label>
                <input type='text' name='{$this->name}' value='{$this->value}' />";
    }
}
