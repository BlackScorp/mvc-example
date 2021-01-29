<?php
require_once  __DIR__.'/bootstrap.php';

$foo = new Controller_Index();
echo $foo->indexAction();

//route / => IndexController
//route /login => LoginController

//route /profile => ProfileController
//route /profile/list => ProfileController->listAction();
//route /profile/view/testuser1 => ProfileController->indexAction($userName)
//route /profile/edit => ProfileController
//route /posts => PostsController
//route /posts/list => PostsController->listAction();
//route /posts/view/1 => PostsController->viewAction($postId);
//route /posts/reply/1 => PostsController->replyAction($postId);

//route  /admin => AdminController