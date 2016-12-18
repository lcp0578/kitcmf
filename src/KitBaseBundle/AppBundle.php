<?php

namespace KitBaseBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class KitBaseBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
