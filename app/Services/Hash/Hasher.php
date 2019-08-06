<?php

namespace App\Services\Hash;

use Hashids\Hashids;

class Hasher
{
    /**
     * @param mixed ...$args
     * @return string
     */
    public static function encode(...$args)
    {
        return app(Hashids::class)->encode(...$args);
    }

    /**
     * @param $enc
     * @return mixed
     */
    public static function decode($enc)
    {
        if (is_int($enc)) {
            return $enc;
        }

        return app(Hashids::class)->decode($enc)[0] ?? $enc;
    }
}