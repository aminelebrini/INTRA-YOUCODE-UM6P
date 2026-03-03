<?php

    namespace App\Http\Repository;
    use App\Models\User;

    class AuthRepository
    {
        public function login($email, $password)
        {
            $user = User::where('email', $email)->first();

            if ($user && password_verify($password, $user->password)) {
                return $user;
            }

            return null;
        }
    }
?>