<?php

namespace DesignPatterns\Mvc\Controller;


use DesignPatterns\Mvc\Controller;

class HelloController extends Controller
{
    public function index()
    {
        $data = ['title' => 'Design Patterns', 'data' => 'Hello Mvc'];

        return $this->view->render('hello/index', $data);
    }
}
