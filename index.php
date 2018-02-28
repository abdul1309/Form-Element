<?php
require_once'InputFormElement.php';
require_once 'SelectFormElement.php';
require_once 'ButtonFormElement.php';
$login = new ButtonFormElement('Anmelden', 'login', true);
$register = new ButtonFormElement('registrieren', 'register', true);
$show_user = new ButtonFormElement('Benutzer anzeigen', 'show_user', true);
$send_login = new ButtonFormElement('send', 'send_login', true);
$send_register = new ButtonFormElement('send', 'send_formular_register', true);
$cancel = new ButtonFormElement('abbrechen', 'cansel', true);
$username = new InputFormElement('Benutzername', 'username', true);
$password = new InputFormElement('Passwort', 'password', true);
$password_confirm = new InputFormElement('Passwort beschtätigen', 'password_confirm', true);
$firstname = new InputFormElement('Vorname', 'firstname', true);
$lastname = new InputFormElement('Nachname', 'lastname', true);
$address = new InputFormElement('Adresse', 'address', true);
$email = new InputFormElement('Email', 'email', true);
$date_of_birth = new InputFormElement('Geburtsdatum', 'date_of_birth', true);
$select = new SelectFormElement('Geschlecht', 'gender', true);
?>
<html>
    <head>
    </head>
    <body>
        <form action="index.php" method="post">
            <?php
            $username->setType('text');
            $password->setType('password');
            $password_confirm->setType('password');
            $firstname->setType('text');
            $lastname->setType('text');
            $email->setType('email');
            $address->setType('text');
            $date_of_birth->setType('date');
            print '<p>'.$login->render().'</p>';
            print '<p>'.$register->render().'</p>';
            print '<p>'.$show_user->render().'</p>';
            if (isset($_POST['login'])) {
                print '<h1>Login here</h1>';
                print $username->render();
                print $password->render();
                print '<p>'.$send_login->render().'</p>';
            } elseif (isset($_POST['register'])) {
                print $username->render();
                print $password->render();
                print $password_confirm->render();
                print $firstname->render();
                print $lastname->render();
                print $email->render();
                print $address->render();
                print $date_of_birth->render();
                $values_select = array(
                    'male' => 'männlich',
                    'Female' =>'weiblich'
                );
                $select->setValue($values_select);
                print $select->render();
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
                            print $username->render();
                            $firstname->setValue($zeile['firstname']);
                            print $firstname->render();
                            $lastname->setValue($zeile['lastname']);
                            print $lastname->render();
                            $address->setValue($zeile['address']);
                            print $address->render();
                            $email->setValue($zeile['email']);
                            print $email->render();
                            $date_of_birth->setValue($zeile['date_of_birth']);
                            print $date_of_birth->render();
                            print '<p>'.$cancel->render().'</p>';
                        }
                    }
                }
            }
            ?>
        </form>
    </body>
</html>

