<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

include_once 'ViewHelper.php';

abstract class AController
{
    private $template_dir = __DIR__.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR;
    private $title = 'Главная страница доски';

    /**
     * @param $template
     * @throws Exception
     */
    public function render($template)
    {
        // Базовый шаблон
        ob_start();
            include $this->template_dir.'base.php';
        $base = ob_get_clean();
        // Подключаемый шаблон
        if(file_exists($this->template_dir.$template)){
            ob_start();
            $vh = new ViewHelper();
            include $this->template_dir.$template;
            $content = ob_get_clean();
            echo str_replace('[content]',$content,$base);
        }else{
            throw new Exception('Template not found');
        }
    }

    public function render_404()
    {
        $this->set_title('Страница не найдена');
        $this->render('404.php');
    }

    public function redirect($location)
    {
        header('Location: '.$location);
    }

    /**
     * @param $title
     */
    public function set_title($title)
    {
        $this->title = $title;
    }

    abstract public function process();
}