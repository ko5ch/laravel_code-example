<?php

namespace Modules\Main\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Modules\Main\Repositories\CategoryRepository;

class TasksFilter extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function run()
    {
        $categories = (new CategoryRepository())->getAll()->map(function ($item) {
            return $item->name;
        });
        $categories->prepend('All Tasks');

        return view('todo.widgets.tasks_filter', compact('categories'));
    }
}