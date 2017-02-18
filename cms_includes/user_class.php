<?php

$user = new User;

class User
{
    public $registration_statement = 0;
    public $login_statement = 0;
    public $reset_password_statement;

    function create_account($data)
    {
        global $pdo;

        $sql1 = "SELECT * FROM `users` WHERE `name`='".$_POST['user_name']."'";
        $sql2 = "SELECT * FROM `users` WHERE `email`='".$_POST['email']."'";
        $result1 = $pdo->query($sql1);
        $result2 = $pdo->query($sql2);

        if(empty($_POST['user_name']) or empty($_POST['password']) 
        or empty($_POST['repeat_password']) or empty($_POST['email']) 
        or $_POST['dob_day'] == '-' or $_POST['dob_month'] == '-' or $_POST['dob_year'] == '-')
        {
            $this->registration_statement = 1;
        }
        elseif($_POST['password'] != $_POST['repeat_password'])
        {
            $this->registration_statement = 2;
        }
        elseif($user = $result1->fetch())
        {
            $this->registration_statement = 3;
        }
        elseif($user = $result2->fetch())
        {
            $this->registration_statement = 4;
        }
        else
        {
            $sql = "INSERT INTO `users` SET `name`=:name, `email`=:email, `password`=:password, `date_of_birth`=:date_of_birth";
            $s = $pdo->prepare($sql);

            $date_of_birth = $_POST['dob_year'].'-'.$_POST['dob_month'].'-'.$_POST['dob_day'];

            $s->bindValue(':name', $_POST['user_name']);
            $s->bindValue(':email', $_POST['email']);
            $s->bindValue(':password', md5('#keisfs94'.$_POST['password']));
            $s->bindValue(':date_of_birth', $date_of_birth);
            $s->execute();

            $_SESSION['logged'] = true;
            $_SESSION['user_id'] = $pdo->lastInsertId();

            $this->registration_statement = 5;
        }
    }

    function login($data)
    {
        global $pdo;
        $sql = "SELECT * FROM `users` WHERE `name`='".$_POST['loginUserName']."' AND `password`='".md5('#keisfs94'.$_POST['loginPassword'])."'";
        $result = $pdo->query($sql);
        if($user = $result->fetch())
        {
            $_SESSION['logged'] = true;
            $_SESSION['user_id'] = $user['id'];
            header('Location: '.$_POST['previous_url']);
        }
        else
        {
            $this->login_statement = 1;
            header('Location: '.$_POST['previous_url'].'#loginModal');
        }
    }

    function get_user_name()
    {
        global $pdo;

        $sql = "SELECT `name` FROM `users` WHERE `id`='".$_SESSION['user_id']."'";
        $result = $pdo->query($sql);
        $user = $result->fetch();

        return $user['name'];
    }

    function is_logged()
    {
        if(isset($_SESSION['logged']) && defined("USER_ID"))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function add_to_list_user_wants_to_read($book_id)
    {
        global $pdo;

        if($this->is_logged())
        {
            $sql = "INSERT INTO `user_wants_to_read` SET `book_id`='".$book_id."', `user_id`='".$_SESSION['user_id']."', `date_when_added`=now()";
            $s = $pdo->prepare($sql);
            $s->execute();
        }
        else
        {
            header('Location: #loginModal');
        }
    }

    function book_is_on_user_list($book_id)
    {
        global $pdo;

        if($this->is_logged())
        {
            $sql = "SELECT * FROM `user_wants_to_read` WHERE `book_id`='".$book_id."' AND `user_id`='".$_SESSION['user_id']."'";
            $result = $pdo->query($sql);
            if($user = $result->fetch())
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    function remove_from_list_user_wants_to_read($book_id)
    {
        global $pdo;

        $sql = "DELETE FROM `user_wants_to_read` WHERE `book_id`='".$book_id."' AND `user_id`='".$_SESSION['user_id']."'";
        $s = $pdo->prepare($sql);
        $s->execute();
    }

    function rated_book($book_id)
    {
        global $pdo;

        if($this->is_logged())
        {
            $sql = "SELECT * FROM `votes` WHERE `book_id`='".$book_id."' AND `user_id`='".$_SESSION['user_id']."'";
            $result = $pdo->query($sql);

            if($user = $result->fetch())
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    function added_review($book_id)
    {
        global $db;
        
        if($this->is_logged()) {
            $sql = $db->select('*', 'reviews', 'WHERE `book_id`="'.$book_id.'" AND `user_id`="'.USER_ID.'"');
            if($sql)
            {
                return $sql;
                return true;
            }
            else
            {
                return false;
            }
        } else {
            return false;
        }
    }

    function send_reset_password_email($email)
    {
        global $db;

        $sql = $db->select('*', 'users', 'WHERE `email`="'.$email.'"');
        if($sql)
        {
            $string = new_string();
            $db->insert('forgot_my_password', 'SET `email`="'.$email.'", `session_id`="'.$string.'", `date`=now()');

            $to = $email;
            $subject = 'Zresetuj swoje hasło - TheLibrary';
            $message = "Ta wiadomość została wysłana, ponieważ nastąpiło żądanie zmiany hasła.
            <br><br>
            Kliknij w poniższy link, aby zresetować swoje hasło:
            <br>
            <a href='/localhost/thelibrary/forgot_my_password.php?action=reset_password&email=$email&session_id=$string'>
            /localhost/thelibrary/forgot_my_password.php?action=reset_password&email=$email&session_id=$string
            </a>";
            $message = wordwrap($message, 70);
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: reset_password@thelibrary' . "\r\n";

            mail($to, $subject, $message, $headers);

            $this->reset_password_statement = 'send_reset_password_success';
        }
        else
        {
            $this->reset_password_statement = 'wrong_email';
        }
    }
}

?>