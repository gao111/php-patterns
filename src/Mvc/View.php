<?php

namespace DesignPatterns\Mvc;


class View
{
    protected $path;

    protected $postfix;

    public function __construct(array $options = [])
    {
        $this->path    = $options['path'] ?? __DIR__ . '/View/';
        $this->postfix = $options['postfix'] ?? '.phtml';
    }

    public function render(string $view, array $data = [])
    {
        $template = $this->getPath($view);

        if (!file_exists($template))
            throw new \InvalidArgumentException(sprintf('Template [%s] not exist!', $view));

        extract($data);

        include $template;

        return true;
    }

    protected function getPath($view)
    {
        return $this->path . $view . $this->postfix;
    }
}
