<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
session_start();

/**
 * Autoloader, nutzt _ in Klassen Namen um daraus die Ordnerstruktur herzuleiten
 */
spl_autoload_register(function ($className){
    $path = __DIR__.'/src/'.str_replace(['_','\\'],'/',$className).'.php';
    if(is_file($path)){
        require_once $path;
    }
});

const TEMPLATE_DIR = __DIR__.'/templates';

const DATABASE = [
    'host'=>'localhost',
    'username'=>'root',
    'dbname'=>'test',
    'password'=>'',
    'charset'=>'utf8'
];

$foo = new Controller_Index();
echo $foo->indexAction();