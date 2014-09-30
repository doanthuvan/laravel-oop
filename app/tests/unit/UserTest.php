<?php


class UserTest extends TestCase {

    const ALL = 0;
    const NO_USERNAME = 1;
    const NO_FIRSTNAME = 2;
    const NO_LASTNAME = 3;
    const NO_EMAIL = 4;
    const NO_PASSWORD = 5;
    const NO_PASSWORD_CONFIRM = 6;

    private function _prepareUser($except = 0){
        $user = new User;

        if ($except != self::NO_USERNAME)
            $user->username = "trthanhbk";

        if ($except != self::NO_FIRSTNAME)
            $user->firstname = "thanh";

        if ($except != self::NO_LASTNAME)
            $user->lastname = "nguyen trung";

        if ($except != self::NO_EMAIL)
            $user->email = "thanhcttsp@gmail.com";

        if ($except != self::NO_PASSWORD)
            $user->password = "password";

        if ($except != self::NO_PASSWORD_CONFIRM)
            $user->password_confirmation = "password";

        return $user;
    }

    private function _getNumberOfErrors($user, $number){
        // User should not save
        $this->assertFalse($user->save());

        // Save the errors
        $errors = $user->errors()->all();

        // There should be number of error
        $this->assertCount($number, $errors);

        return $errors;
    }

    public function testCreateUserSuccess(){
        // Create a new User
        $user = $this->_prepareUser();

        // User should save
        $this->assertTrue($user->save());
    }

    public function testUsernameIsRequired()
    {
        // Create a new User
        $user = $this->_prepareUser(self::NO_USERNAME);

        // There should be 1 error
        $errors = $this->_getNumberOfErrors($user, 1);

        $this->assertEquals($errors[0], "The username field is required.");
    }

    public function testFirstnameIsRequired()
    {
        // Create a new User
        $user = $this->_prepareUser(self::NO_FIRSTNAME);

        // There should be 1 error
        $errors = $this->_getNumberOfErrors($user, 1);
        $this->assertEquals($errors[0], "The firstname field is required.");
    }

    public function testLastnameIsRequired()
    {
        // Create a new User
        $user = $this->_prepareUser(self::NO_LASTNAME);

        // There should be 1 error
        $errors = $this->_getNumberOfErrors($user, 1);
        $this->assertEquals($errors[0], "The lastname field is required.");
    }

    public function testEmailIsRequired()
    {
        // Create a new User
        $user = $this->_prepareUser(self::NO_EMAIL);

        // There should be 1 error
        $errors = $this->_getNumberOfErrors($user, 1);
        $this->assertEquals($errors[0], "The email field is required.");
    }

    public function testPasswordIsRequired()
    {
        // Create a new User
        $user = $this->_prepareUser(self::NO_PASSWORD);

        // There should be 1 error
        $errors = $this->_getNumberOfErrors($user, 1);
        $this->assertEquals($errors[0], "The password field is required.");
    }

    public function testPasswordConfirmIsRequired()
    {
        // Create a new User
        $user = $this->_prepareUser(self::NO_PASSWORD_CONFIRM);

        // There should be 2 error
        $errors = $this->_getNumberOfErrors($user, 2);
        $this->assertEquals($errors, ["The password confirmation does not match.", "The password confirmation field is required."]);
    }

    public function testUsernameUnique()
    {
        $this->_prepareUser()->save();
        // Create a new User
        $user = $this->_prepareUser();
        $user->email = "thanhnt@nal.vn";

        // There should be 1 error
        $errors = $this->_getNumberOfErrors($user, 1);
        $this->assertEquals($errors, ["The username has already been taken."]);
    }

    public function testEmailUnique()
    {
        $this->_prepareUser()->save();
        // Create a new User
        $user = $this->_prepareUser();
        $user->username = "thanhcttsp";

        // There should be 1 error
        $errors = $this->_getNumberOfErrors($user, 1);
        $this->assertEquals($errors, ["The email has already been taken."]);
    }

    public function testPasswordNotMatch()
    {
        // Create a new User
        $user = $user = $this->_prepareUser();
        $user->password_confirmation = "password01";

        // There should be 1 error
        $errors = $this->_getNumberOfErrors($user, 1);
        $this->assertEquals($errors, ["The password confirmation does not match."]);
    }

    public function testUsernameHasAtleast3Charaters()
    {
        // Create a new User
        $user = $this->_prepareUser();
        $user->username = "tr";

        // There should be 1 error
        $errors = $this->_getNumberOfErrors($user, 1);
        $this->assertEquals($errors, ["The username must be at least 3 characters."]);
    }

    public function testFirstnameHasAtleast2Charaters()
    {
        // Create a new User
        $user = $this->_prepareUser();
        $user->firstname = "t";

        // There should be 1 error
        $errors = $this->_getNumberOfErrors($user, 1);
        $this->assertEquals($errors, ["The firstname must be at least 2 characters."]);
    }

    public function testLastnameHasAtleast2Charaters()
    {
        // Create a new User
        $user = $this->_prepareUser();
        $user->lastname = "t";

        // There should be 1 error
        $errors = $this->_getNumberOfErrors($user, 1);
        $this->assertEquals($errors, ["The lastname must be at least 2 characters."]);
    }

    public function testPasswordHasLessThan6Charaters()
    {
        // Create a new User
        $user = $this->_prepareUser();
        $user->password = "pass";
        $user->password_confirmation = "pass";

        // There should be 2 error
        $errors = $this->_getNumberOfErrors($user, 2);
        $this->assertEquals($errors, ["The password must be between 6 and 12 characters.", "The password confirmation must be between 6 and 12 characters."]);
    }

    public function testPasswordHasMoreThan12Charaters()
    {
        // Create a new User
        $user = $this->_prepareUser();
        $user->password = "password123456";
        $user->password_confirmation = "password123456";

        // There should be 2 error
        $errors = $this->_getNumberOfErrors($user, 2);
        $this->assertEquals($errors, ["The password must be between 6 and 12 characters.", "The password confirmation must be between 6 and 12 characters."]);
    }

} 