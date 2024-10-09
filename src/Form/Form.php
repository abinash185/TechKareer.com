namespace App\Form;


class Form
{
    private $fields = [];

    public function __construct($fieldConfigs)
    {
        foreach ($fieldConfigs as $fieldConfig) {
            $this->addField($fieldConfig);
        }
    }

    public function addField($config)
    {
        switch ($config['type']) {
            case 'text':
                $this->fields[] = new TextInput($config['name'], $config['label'], $config['value'] ?? '');
                break;

            case 'radio':
                $this->fields[] = new RadioField($config['name'], $config['label'], $config['options'], $config['value'] ?? '');
                break;

            // You can add more case statements here for other field types (textarea, select, etc.)
            
            default:
                throw new \Exception("Unknown field type: " . $config['type']);
        }
    }

    public function render()
    {
        $formHtml = "<form method='POST'>";

        foreach ($this->fields as $field) {
            $formHtml .= $field->render() . '<br>';  // Calling render() on each field object
        }

        $formHtml .= "<input type='submit' value='Submit' />";
        $formHtml .= "</form>";

        return $formHtml;
    }
}
