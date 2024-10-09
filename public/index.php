require '../vendor/autoload.php';

use App\Form\Form;

$fields = [
    [
        'type' => 'text',
        'name' => 'name',
        'label' => 'Name',
    ],
    [
        'type' => 'text',
        'name' => 'phone',
        'label' => 'Phone Number',
    ],
    
    [
        'type' => 'radio',
        'name' => 'gender',
        'label' => 'Gender',
        'options' => ['Male' => 'male', 'Female' => 'female']
    ]
];

$form = new Form($fields);
echo $form->render();
