<?php
require_once "../config.php";
$error = "";
class register
{
    private $name;
    private $email;
    private $role;
    private $password;
    private  $status;
    function __construct($name, $email, $role, $password)
    {
        if (empty($name) || empty($email) || empty($role) || empty($password)) {
            return "All fields are required";
        }
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->status = ($role === "Guide") ? "Pending" : "Active";
    }

    function AddUser()
    {

        $database = new Database();
        $db = $database->getConnection();
        $check = $db->prepare("SELECT Users_id FROM users WHERE userEmail = :email");
        $check->bindParam(":email", $this->email);
        $check->execute();
        $results_array = $check->fetchAll();

        $rowCount = count($results_array);

        if ($rowCount > 0) {
            return "email Dupelicated";
        } else {
            $sql = " INSERT INTO users (userName, userEmail, userRole, password_hash, userStatus)
                VALUES (:name, :email, :role, :password, :status) ";
            $stmt = $db->prepare($sql);
       

            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":role", $this->role);
            $stmt->bindParam(":password", $this->password);
            $stmt->bindParam(":status", $this->status);
            $test = $stmt->execute();
            if ($test) {
                return "success";
            } else {
                return "Fatal error";
            }
        }
    }
}


$checkUser = new register(trim($_POST["name"]), trim($_POST["email"]), $_POST["role"], $_POST["password"]);
$checking = $checkUser->AddUser();
if ($checking === "success") {
    header("Location: login.php");
} else {

    $error = $checking;
        header("Location: register.php?error=$error");
}

// $error = "";


// $name = trim($_POST["name"]);
// $email = trim($_POST["email"]);
// $role = $_POST["role"];
// $password = $_POST["password"];

// if (empty($name) || empty($email) || empty($role) || empty($password)) {
// $error = "All fie lds are required";
// } else {

// $check = mysqli_prepare($conn, "SELECT Users_id FROM users WHERE userEmail = ?");
// mysqli_stmt_bind_param($check, "s", $email);
// mysqli_stmt_execute($check);
// $result = mysqli_stmt_get_result($check);

// if (mysqli_num_rows($result) > 0) {
// $error = "Email already exists";
// } else {

// $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
// $status = ($role === "Guide") ? "Pending" : "Active";

// $stmt = mysqli_prepare($conn, "
// INSERT INTO users (userName, userEmail, userRole, password_hash, userStatus)
// VALUES (?, ?, ?, ?, ?)
// ");

// mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $role, $hashedPassword, $status);
// mysqli_stmt_execute($stmt);

// header("Location: login.php");
// exit;
// }
// }