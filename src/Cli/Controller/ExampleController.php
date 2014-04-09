<?php

namespace Cli\Controller;

use Cli\Service\AuthService;
use Zend\Mvc\Controller\AbstractActionController;

class ExampleController extends AbstractActionController
{
    /**
     * @var AuthService $authService
     */
    protected $authService;

    /**
     * Assign the AuthService
     *
     * @param AuthService $authService
     *
     * @return ExampleController
     */
    public function setAuthService(AuthService $authService)
    {
        $this->authService = $authService;

        return $this;
    }

    /**
     * Say Hello if you know the password
     *
     * @return string
     */
    public function sayhelloAction()
    {
        $password = $this->authService->promptPassword(true);

        if ('secret' != $password) {
            return PHP_EOL . 'Invalid password, permission Denied' . PHP_EOL;
        }
        // Do the authenticated stuff, in this case, say Hello.
        return PHP_EOL . 'Hello' . PHP_EOL;
    }
}
