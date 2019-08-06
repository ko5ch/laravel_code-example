<?php

namespace Modules\Main\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class MainController extends Controller
{
    const VIEW_INDEX_GUEST = 'todo.index.guest';
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view(self::VIEW_INDEX_GUEST, []);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('main::show');
    }
}
