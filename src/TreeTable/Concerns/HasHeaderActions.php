<?php

namespace Onexer\FilamentTreeTable\TreeTable\Concerns;

use Closure;
use Onexer\FilamentTreeTable\Actions\Action;
use Onexer\FilamentTreeTable\Actions\ActionGroup;
use Onexer\FilamentTreeTable\Actions\BulkAction;
use Onexer\FilamentTreeTable\Actions\HeaderActionsPosition;
use Illuminate\Support\Arr;
use InvalidArgumentException;

trait HasHeaderActions
{
    /**
     * @var array<string, Action | BulkAction | ActionGroup>
     */
    protected array $headerActions = [];

    protected HeaderActionsPosition|Closure|null $headerActionsPosition = null;

    public function headerActionsPosition(HeaderActionsPosition|Closure|null $position = null): static
    {
        $this->headerActionsPosition = $position;

        return $this;
    }

    /**
     * @param  array<Action | BulkAction | ActionGroup> | ActionGroup  $actions
     */
    public function headerActions(array|ActionGroup $actions, string|Closure|null $position = null): static
    {
        foreach (Arr::wrap($actions) as $action) {
            $action->treeTable($this);

            if ($action instanceof ActionGroup) {
                foreach ($action->getFlatActions() as $flatAction) {
                    if ($flatAction instanceof BulkAction) {
                        $this->cacheBulkAction($flatAction);
                    } elseif ($flatAction instanceof Action) {
                        $this->cacheAction($flatAction);
                    }
                }
            } elseif ($action instanceof Action) {
                $this->cacheAction($action);
            } elseif ($action instanceof BulkAction) {
                $this->cacheBulkAction($action);
            } else {
                throw new InvalidArgumentException('TreeTable header actions must be an instance of '.Action::class.', '.BulkAction::class.' or '.ActionGroup::class.'.');
            }

            $this->headerActions[] = $action;
        }

        $this->headerActionsPosition($position);

        return $this;
    }

    public function getHeaderActionsPosition(): HeaderActionsPosition
    {
        $position = $this->evaluate($this->headerActionsPosition);

        if (filled($position)) {
            return $position;
        }

        return HeaderActionsPosition::Adaptive;
    }

    /**
     * @return array<string, Action | BulkAction | ActionGroup>
     */
    public function getHeaderActions(): array
    {
        return $this->headerActions;
    }
}
