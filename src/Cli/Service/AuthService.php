<?php

namespace Cli\Service;

class AuthService
{
    /**
     * Return password from a prompt,
     *
     * @return string
     */
    public function promptPassword()
    {
        $oldStyle = shell_exec('stty -g');
        fwrite(STDOUT, "Password:");
        shell_exec('stty -echo');
        $password = rtrim(fgets(STDIN), "\n");
        shell_exec('stty ' . $oldStyle);
        fwrite(STDOUT, PHP_EOL);

        return $password;
    }
}
