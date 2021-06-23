<?php

use Page\Acceptance\LoginPage;

/**
 * Class for checking failing authorization
 */
class LoginCest
{
    /**
    * Checking failed auth for locked user
    */
    public function checkLockedUserFailAuth(AcceptanceTester $I)
    {
        $loginPage = new LoginPage($I);
        
        $I->amOnPage(LoginPage::$URL);
        $loginPage->fillUserNameField()
                  ->fillPasswordField()
                  ->clickLoginButton();
        $I->waitForElementVisible(LoginPage::$errorBoxContainer);
        $loginPage->closeErrorBox();
        $I->dontSee(LoginPage::$errorBoxContainer);
    }
}
