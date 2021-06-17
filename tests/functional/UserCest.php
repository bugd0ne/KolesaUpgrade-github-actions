<?php

use Helper\Urls;

class UserCest
{
    /**
     * test for update info about user, and then delete him
     * @group test
     */
    public function checkUserUpdatedAndDeleted(FunctionalTester $I)
    {
        $email = $I->initFaker()->email;
        $name  = $I->initFaker()->firstName;
        $owner = $I->initFaker()->userName.'b0gdanshvets';

        $body = [
            'email' => $email,
            'name'  => $name,
            'owner' => $owner 
        ];

        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPost(Urls::$createUser, $body);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson(["status" => "ok"]);
        // grab _id for PUT
        $userId = implode($I->grabDataFromResponseByJsonPath('$._id'));
        // get request for getting info about posted user
        $I->sendGet(Urls::$getUserByOwner, ['owner' => $owner]);
        // put for updating user's name
        $updatedName = $I->initFaker()->name.'updated';
        $I->sendPut(Urls::$editUser.$userId, ['name' => $updatedName]);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson(["nModified" => 1]);
        //get response with updated name
        $I->sendGet(Urls::$getUserByOwner, ['owner' => $owner]);
        $I->seeResponseContainsJson(['name' => $updatedName]);
        // delete user
        $I->sendDelete(Urls::$deleteUser.$userId);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson(["deletedCount" => 1]);
        // get response with empty body
        $I->sendGet(Urls::$getUserByOwner, ['owner' => $owner]);
        $I->seeResponseContainsJson([]);
    }
}