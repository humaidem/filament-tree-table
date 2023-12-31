<?php

namespace Humaidem\FilamentTreeTable\Columns\Layout;

class View extends Component
{
    /**
     * @param  view-string  $view
     */
    final public function __construct(string $view)
    {
        $this->view($view);
    }

    /**
     * @param  view-string  $view
     */
    public static function make(string $view): static
    {
        return app(static::class, ['view' => $view]);
    }
}
