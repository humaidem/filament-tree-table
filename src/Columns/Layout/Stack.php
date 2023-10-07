<?php

namespace Humaidem\FilamentTreeTable\Columns\Layout;

use Closure;
use Filament\Support\Concerns\HasAlignment;
use Humaidem\FilamentTreeTable\Columns\Column;
use Humaidem\FilamentTreeTable\Columns\Concerns\HasSpace;

class Stack extends Component
{
    use HasAlignment;
    use HasSpace;

    /**
     * @var view-string
     */
    protected string $view = 'filament-tree-table::columns.layout.stack';

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
