<?php


class Users
{
    public $id;
    public $pseudo;
    public $eMail;
    public $password;


        public static function inscription($db_blog) {
            $addUser = $db_blog -> prepare ('INSERT INTO users VALUES(NULL,:pseudo,:eMail,:password)');
            $userQueryCompare = $db_blog -> query ("SELECT * FROM users WHERE email = '". $_POST['email']."'")->fetch();
            var_dump($userQueryCompare);
            if ( $userQueryCompare['email'] === $_POST['email'] ) {
                Users::connect($db_blog);
            } else {
                $newuser = $addUser -> execute(array(
                    'pseudo' =>     $_POST['pseudo'],
                    'eMail' =>      $_POST['email'],
                    'password' =>   $_POST['password']
                ));
                if ($newuser) {
                    echo "Utilisateur " . $_POST['pseudo'] . " crée !";
                }   else {
                    echo "Une erreur est survenue lors de la creation de l'utilisateur :'( !";
                }
            }
        }


        public static function connect($db_blog) {
            session_start();
            $userQueryCompare = $db_blog -> query ("SELECT * FROM users WHERE email = '". $_POST['email']."'")->fetch();
            $_SESSION['user'] = array(
                "pseudo" => $_POST['pseudo'],
                "userId" => $userQueryCompare['id']
            );
            var_dump($_SESSION);
        }

//    public function disconect() {
//        unset($_SESSION['user']);
//    }

}