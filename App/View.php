<?php

namespace App;

/**
 * Class View
 * @property array lastThreeNews
 * @property mixed news
 * @package App
 */
class View
{
    use MagicTrait;

    /**
     * Display template.
     *
     * @param $template
     */
    public function display($template): void
    {
        foreach ($this->data as $name => $value) {
            $$name = $value;
        }

        include $template;
    }
}
