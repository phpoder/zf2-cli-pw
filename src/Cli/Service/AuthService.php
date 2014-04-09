<?php

namespace Cli\Service;

class AuthService
{
    /**
     * Return password from a prompt,
     * @link http://www.dasprids.de/blog/2008/08/22/getting-a-password-hidden-from-stdin-with-php-cli
     *
     * @param bool $stars
     *
     * @return string
     */
    public function promptPassword($stars)
    {
        // Get current style
        $oldStyle = shell_exec('stty -g');
        fwrite(STDOUT, "Password:");

        if ($stars === false) {
            shell_exec('stty -echo');
            $password = rtrim(fgets(STDIN), "\n");
        } else {
            shell_exec('stty -icanon -echo min 1 time 0');

            $password = '';
            while (true) {
                $char = fgetc(STDIN);

                if ($char === "\n") {
                    break;
                } else if (ord($char) === 127) {
                    if (strlen($password) > 0) {
                        fwrite(STDOUT, "\x08 \x08");
                        $password = substr($password, 0, -1);
                    }
                } else {
                    fwrite(STDOUT, "*");
                    $password .= $char;
                }
            }
        }

        // Reset old style
        shell_exec('stty ' . $oldStyle);

        // Return the password
        return $password;
    }
}