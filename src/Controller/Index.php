<?php


final class Controller_Index
{

    public function indexAction() : View_Index
    {
        $view = new View_Index();
        $view->title = 'Virtuelle Tierpraxis';
        /**
         * @var Model_User $user;
         */
        $user = Model_User::findById(1);

        if($user){
            $view->isLoggedIn = true;
            $view->username = $user->username;
        }



        return $view;
    }
}