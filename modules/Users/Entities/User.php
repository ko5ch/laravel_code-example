<?php

namespace Modules\Users\Entities;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Modules\Main\Entities\Task;

class User extends Authenticatable
{
	use LaratrustUserTrait, Notifiable;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
        'name', 'email', 'email_token', 'password',
        'avatar', 'username',
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    const DEFAULT_AVATAR = 'default/img/avatar.png';

    /**
     * @return bool
     */
    public function getIsEditorAttribute()
    {
        return $this->hasRole('admin');
    }

    /**
     * @return bool
     */
    public function getIsConfirmedAttribute()
    {
        return $this->email && is_null($this->email_token);
    }

    /**
     * @return string
     */
    public function getAvatarAttribute()
    {
        return $this->getOriginal('avatar') ?: self::DEFAULT_AVATAR;
    }

    /**
     * @return string
     */
    public function getAvatarUrlAttribute()
    {
        return asset($this->avatar);
    }

	/**
	 * This mutator automatically hashes the password.
	 *
	 * @var string
	 */
	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = \Hash::make($value);
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
