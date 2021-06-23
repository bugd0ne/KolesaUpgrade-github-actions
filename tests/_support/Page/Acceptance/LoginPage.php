<?php
namespace Page\Acceptance;
/**
 * Login page
 */
class LoginPage
{
    /**
     * username for locked user
     */
    public const LOCKED_USER_NAME = 'locked_out_user';
    /**
     * password for user (not just locked)
     */
    public const PASSWORD = 'secret_sauce';
    /**
     * URL for login page
     */
    public static $URL = '';

    /**
     * selector for input user name
     */
    public static $usernameField = '#user-name';
    /**
     * selector for input password of user name
     */
    public static $password = '#password';
    /**
     * selector for log in button
     */
    public static $loginButton = '#login-button';
    /**
     * selector for container with error text and other linked elements
     */
    public static $errorBoxContainer = '.error-message-container';
    /**
     * selector for button which closes error box
     */
    public static $closeErrorBoxButton = '.error-message-container .error-button';

    /**
     * Object of acceptance tester
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    /**
     * constructor
     */
    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

    /**
     * function to fill username field
     */
    public function fillUserNameField(){
        $this->acceptanceTester->fillField(self::$usernameField, self::LOCKED_USER_NAME);
        return $this;
    }
    /**
     * function to fill password field
     */
    public function fillPasswordField(){
        $this->acceptanceTester->fillField(self::$password, self::PASSWORD);
        return $this;
    }
    /**
     * function to click login button 
     */
    public function clickLoginButton(){
        $this->acceptanceTester->click(self::$loginButton);
        return $this;
    }
    /**
     * function to click button which hides error box
     */
    public function closeErrorBox(){
        $this->acceptanceTester->click(self::$closeErrorBoxButton);
        return $this;
    }
}
