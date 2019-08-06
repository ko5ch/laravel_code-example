<?php

namespace Modules\Main\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Users\Entities\User;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'category_id', 'uid', 'status'];

    public const STATUS_UNDONE  = 0;
    public const STATUS_DONE    = 1;

    /**
     * @return mixed
     */
    public function getIsDoneAttribute()
    {
        return (bool)$this->status;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
