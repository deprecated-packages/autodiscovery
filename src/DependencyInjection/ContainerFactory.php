<?php declare(strict_types=1);

namespace Symplify\Autodiscovery\DependencyInjection;

use Psr\Container\ContainerInterface;
use Symplify\LatteToTwigConverter\HttpKernel\LatteToTwigConverterKernel;

final class ContainerFactory
{
    public function create(): ContainerInterface
    {
        $appKernel = new AutodiscoveryKernel();
        $appKernel->boot();

        // this is require to keep CLI verbosity independent on AppKernel dev/prod mode
        putenv('SHELL_VERBOSITY=0');

        return $appKernel->getContainer();
    }
}
