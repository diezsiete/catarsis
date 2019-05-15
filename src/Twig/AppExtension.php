<?php

namespace App\Twig;


use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    /**
     * @var RequestStack
     */
    private $request;

    public function __construct(RequestStack $request)
    {
        $this->request = $request;
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('current_menu_item', [$this, 'currentMenuItem']),
        ];
    }

    public function currentMenuItem($value)
    {
        $route = $this->request->getCurrentRequest()->get('_route');
        return $value === $route ? "current-menu-item $value" : $value;
    }
}
