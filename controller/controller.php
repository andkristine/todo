
<?php include_once '../view/components/header.php'; 

class Controller
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "todo";
    private $conn;

    public function getConn() {
        return $this->conn;
    }
    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch(Exception $e) {
            echo "Failed" . $e->getMessage();
        }
    }
    public function fetchEntries($id) {

        $res = null;
        $select = "SELECT * FROM entries WHERE user_id = '$id'";
        if($sql = $this->conn->query($select)) {
            while($row = mysqli_fetch_assoc($sql)) { 
                $res[] = $row; 
            }
        }
        return $res;
    } 
    public function deleteEntry($id) {
        $delete = "DELETE FROM entries WHERE id = '$id'";
        if($sql = $this->conn->query($delete)) {
            return true;
        }
        else {
            return false;
        }
        return $res;
    }  

}