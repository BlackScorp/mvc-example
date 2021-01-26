<?php
abstract class View_BaseView{

    public string $title = '';
    public function __toString()
    {
        $template = $this->getTemplate();
        if(!$template){
            return  '';
        }


        ob_start();
        extract(get_object_vars($this),EXTR_SKIP);
        require_once $template;
        $content = trim(ob_get_clean());


        return $content;

    }

    private function getTemplate()
    {

        $calledClass = str_replace('View_','',get_called_class());
        $calledClass = strtolower($calledClass);
        $templatePath = TEMPLATE_DIR.'/'.str_replace('_','/',$calledClass).'.php';
        if(!is_file($templatePath)){
           throw new Exception("Template ".$templatePath." not found");
        }

        return realpath($templatePath);
    }
}