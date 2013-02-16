<?php

namespace Codopenex\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CodopenexUserBundle extends Bundle
{
	public function getParent()
    {
        return 'FOSUserBundle';
    }
}