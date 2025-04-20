<?php

if (!function_exists("gravatar")) {
    /**
     * Return a Gravatar image URL for the given email.
     *
     * @param string $email
     * @param int $size
     * @param string $default
     * @return string
     */
    function gravatar($email, $size = 0, $default = "")
    {
        $email = hash('md5', strtolower($email));

        return $email ? "https://www.gravatar.com/avatar/{$email}" . ($size > 0 ? "?s={$size}" : "") : $default;
    }
}

