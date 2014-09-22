<?php

use Prototype\Interfaces\UserRepository;

class UsersController extends BaseController {

    protected $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->beforeFilter('csrf', array('on'=>'post'));
        $this->beforeFilter('auth', array('only'=>array('getDashboard')));
        $this->userRepository = $userRepository;
    }

    public function getIndex(){
        return Redirect::action("UsersController@getDashboard");
    }

    public function getRegister() {
        return View::make('users.register');
    }

    public function postCreate() {
        $user = $this->userRepository->save();
        if ($user === true) {
            return Redirect::action('UsersController@getLogin')->with('message', 'Thanks for registering!');
        } else {
            return Redirect::action('UsersController@getRegister')->with('message', 'The following errors occurred')->withErrors($user->errors())->withInput();
        }
    }

    public function getLogin() {
        return View::make('users.login');
    }

    public function postSignin() {
        if (Auth::attempt(array('username'=>Input::get('username'), 'password'=>Input::get('password')))) {
            return Redirect::intended(action('UsersController@getDashboard'))->with('message', 'You are now logged in!');
        } else {
            return Redirect::action('UsersController@getLogin')
                ->with('message', 'Your username/password combination was incorrect')
                ->withInput();
        }
    }

    public function getDashboard() {
        return View::make('layouts.dashboard');
    }

    public function getLogout() {
        Auth::logout();
        return Redirect::action('UsersController@getLogin')->with('message', 'Your are now logged out!');
    }

    public function getAll(){
        return $this->userRepository->all();
    }

    public function getAllEloquent(){
        return User::all();
    }

    public function getById($id){
        return $this->userRepository->getById($id);
    }

    public function getByEmail($email){
        return $this->userRepository->getFirstBy("email", $email);
    }
} 