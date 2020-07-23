<?php
require_once('base_controller.php');

class PagesController extends BaseController
{
    function PagesController()
    {
        $this->folder = 'pages';
    }

    public function home()
    {
        $data = array(
            'name' => 'Hieu iceTea',
            'age' => 22
        );
        $this->render('home', $data);
    }

    public function error()
    {
        $this->render('error');
    }
}

?>