<?php

namespace App\Http\Controllers\Traits;


trait Responseable
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function backSuccess()
    {
        return back()->with('success', 200);
    }

    /**
     * @param $route
     * @param array $params
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectSuccess($route, $params = [])
    {
        return redirect()->route($route, $params)->with('success', 200);
    }

    /**
     * @return array
     */
    protected function success()
    {
        return ['status' => 200];
    }
}