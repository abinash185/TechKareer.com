namespace Abina\\Assign\\Database;

use PDO;
use PDOException;

class DBFactory
{
    private static $db;

    public static function getConnection(): PDO
    {
        if (self::$db === null) {
            try {
                self::$db = new PDO(
                    'mysql:host=localhost;dbname=contacts',
                    'root', // Your DB username
                    '',     // Your DB password
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );
            } catch (PDOException $e) {
                die('Connection failed: ' . $e->getMessage());
            }
        }
        return self::$db;
    }
}
