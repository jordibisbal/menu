<?php

declare(strict_types=1);

namespace Menu\Shared\Flike;


final class Flike
{
    private Stack $data;
    private Stack $return;
    private Stack $dictionary;

    public function __construct()
    {
        $this->data = Stack::createEmpty();
        $this->return = Stack::createEmpty();
        $this->dictionary = Stack::createEmpty();
    }
}
