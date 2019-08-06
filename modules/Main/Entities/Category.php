<?php

namespace Modules\Main\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Users\Entities\User;
use Carbon\Carbon;

class Category extends Model
{
    protected $fillable = ['name'];

    public const CATEGORIES = [self::CURRENT, self::PAST, self::FUTURE];
    public const CURRENT    = 'current';
    public const FUTURE     = 'future';
    public const PAST       = 'past';

    /**
     * @param $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * @return bool
     */
    public function getIsCurrentAttribute()
    {
        return $this->name == self::CURRENT;
    }

    /**
     * @return bool
     */
    public function getIsFutureAttribute()
    {
        return $this->name == self::FUTURE;
    }

    /**
     * @return bool
     */
    public function getIsPastAttribute()
    {
        return $this->name == self::PAST;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

}
