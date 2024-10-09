namespace App\Contact;

use App\Database\DBFactory;
use PDO;

class ContactManager
{
    private $db;

    public function __construct()
    {
        $this->db = DBFactory::getConnection();
    }

    public function addContact($name, $phone, $email, $address)
    {
        $stmt = $this->db->prepare("INSERT INTO contacts (name, phone, email, address) VALUES (:name, :phone, :email, :address)");
        return $stmt->execute(compact('name', 'phone', 'email', 'address'));
    }

    public function getContacts()
    {
        $stmt = $this->db->query("SELECT * FROM contacts");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateContact($id, $name, $phone, $email, $address)
    {
        $stmt = $this->db->prepare("UPDATE contacts SET name = :name, phone = :phone, email = :email, address = :address WHERE id = :id");
        return $stmt->execute(compact('id', 'name', 'phone', 'email', 'address'));
    }

    public function deleteContact($id)
    {
        $stmt = $this->db->prepare("DELETE FROM contacts WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
