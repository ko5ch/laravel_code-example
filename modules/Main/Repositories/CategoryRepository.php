<?php

namespace Modules\Main\Repositories;

use Modules\Main\Entities\Category;

class CategoryRepository
{

    /**
     * @return \Illuminate\Database\Eloquent\Collection|Category[]
     */
    public function getAll()
    {
        return Category::all();
    }
}