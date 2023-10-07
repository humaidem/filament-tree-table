<?php

namespace Humaidem\FilamentTreeTable\Columns\Layout;

use Closure;
use Humaidem\FilamentTreeTable\Columns\Column;

class Panel extends Component
{
    /**
     * @var view-string
     */
    protected string $view = 'filament-tree-table::columns.layout.panel';

    /**
     * @param  array<Column | Component> | Closure  $schema
     */
    final public function __construct(array|Closure $schema)
    {
        $this->schema($schema);
    }

    /**
     * @param  array<Column | Component> | Closure  $schema
     */
    public static function make(array|Closure $schema): static
    {
        $static = app(static::class, ['schema' => $schema]);
        $static->configure();

        return $static;
    }
}
