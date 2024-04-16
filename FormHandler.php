<?php
require_once 'User.php';

class FormHandler {
    private $name;
    private $email;
    private $user;

    public function __construct($name, $email) {
        $this->name = htmlspecialchars($name);
        $this->email = htmlspecialchars($email);
        $this->user = new User(connectToDatabase());
    }

    public function processForm() {
        $this->user->addUser($this->name, $this->email);
    }

    public function displayData(){
        echo "Name: " . $this->name . "<br>";
        echo "Email: " . $this->email . "<br>";
    }
}
?>
