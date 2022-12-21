<?php

class SubscribeForm
{

    public $database;

    public function __construct()
    {
        $this->database = connectToDB();
    }

    public function subscribe($email)
    {
        // Only change code below this line 

        // Instruction: check if $email is empty or not, if empty, return 'Email is required'
        $error = '';

        if (empty($email)) {
            $error = 'Field is required';
        }

        if (!empty($email)) {

            $statement = $this->database->prepare('SELECT * FROM subscribed_email WHERE email = :email');
            $statement->execute([
                'email' => $email
            ]);

            $user = $statement->fetch();

            if ($user) {
                return 'You have already subscribed.';
            } else {

                $statement = $this->database->prepare('INSERT INTO subscribed_email (email) VALUES (:email)');
                $statement->execute([
                    'email' => $email
                ]);

                $error = 'You have successfully subscribed to our newsletter.';
            }
        }
        return $error;
        // Instruction: check if $email is valid, then add it into database, and return 'You have successfully subscribed to our newsletter'


        // Only change code above this line
    }
}
