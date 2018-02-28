<?php
/**
 * Created by PhpStorm.
 * User: ashaddad
 * Date: 27.02.18
 * Time: 16:32
 */
require_once'FormElement.php';

$login = new formElement('Anmelden', 'login', 'submit', true);
$register = new formElement('registrieren', 'register', 'submit', true);
$show_user = new formElement('Benutzer anzeigen', 'show_user', 'submit', true);
$send_login = new formElement('send', 'send_login', 'submit', true);
$send_register = new formElement('send', 'send_formular_register', 'submit', true);
$cancel = new formElement('abbrechen', 'cansel', 'submit', true);
$username = new formElement('Benutzername', 'username', 'text', true);
$password = new formElement('Passwort', 'password', 'password', true);
$password_confirm = new formElement('Passwort beschtätigen', 'password_confirm', 'password', true);
$firstname = new formElement('Vorname', 'firstname', 'text', true);
$lastname = new formElement('Nachname', 'lastname', 'text', true);
$address = new formElement('Adresse', 'address', 'text', true);
$email = new formElement('Email', 'email', 'email', true);
$date_of_birth = new formElement('Geburtsdatum', 'date_of_birth', 'date', true);
$select = new formElement('Geschlecht', 'gender', 'select', true);



?>
<html>
    <head>
    </head>
    <body>
        <form action="index.php" method="post">
            <?php
            print '<p>'.$login->render().'</p>';
            print '<p>'.$register->render().'</p>';
            print '<p>'.$show_user->render().'</p>';
            if (isset($_POST['login'])) {
                print '<h1>Login here</h1>';
                print '<p>'.$username->render().'</p>';
                print '<p>'.$password->render().'</p>';
                print '<p>'.$send_login->render().'</p>';
            } elseif (isset($_POST['register'])) {
                print '<p>'.$username->render().'</p>';
                print '<p>'.$password->render().'</p>';
                print '<p>'.$password_confirm->render().'</p>';
                print '<p>'.$firstname->render().'</p>';
                print '<p>'.$lastname->render().'</p>';
                print '<p>'.$email->render().'</p>';
                print '<p>'.$address->render().'</p>';
                print '<p>'.$date_of_birth->render().'</p>';
                $values_select = array(
                    'male' => 'männlich',
                    'Female' =>'weiblich'
                );
                $select->setValue($values_select);
                print '<p>'.$select->render().'</p>';
                print '<p>'.$send_register->render().'</p>';
            } else {
                if (isset($_POST['show_user'])) {
                    $connect = mysqli_connect('localhost', 'root', 'abed12345', 'library_oop');
                    $sql = "SELECT * FROM user WHERE id = 3";
                    $db_sql = mysqli_query($connect, $sql);
                    if (!$db_sql) {
                        print "Error: " . $sql . "<br>" . mysqli_error($this->_connection);
                    } else {
                        while ($zeile = mysqli_fetch_array($db_sql, MYSQLI_ASSOC)) {
                            $username->setValue($zeile['username']);
                            print '<p>' . $username->render() . '</p>';
                            $firstname->setValue($zeile['firstname']);
                            print '<p>' . $firstname->render() . '</p>';
                            $lastname->setValue($zeile['lastname']);
                            print '<p>' . $lastname->render() . '</p>';
                            $address->setValue($zeile['address']);
                            print '<p>' . $address->render() . '</p>';
                            $email->setValue($zeile['email']);
                            print '<p>' . $email->render() . '</p>';
                            $date_of_birth->setValue($zeile['date_of_birth']);
                            print '<p>' . $date_of_birth->render() . '</p>';
                            print '<p>'.$cancel->render().'</p>';
                        }
                    }
                }
            }
            ?>
        </form>
    </body>
</html>

