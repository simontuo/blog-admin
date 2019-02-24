<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    protected $breadcrumbs;

    /**
     * ResourceController constructor.
     */
    public function __construct()
    {
        $this->breadcrumbs = config('breadcrumb.' . \Route::currentRouteName());
    }

    public function index()
    {
        return view('resources.index');
    }

    public function pageSearch(Request $request)
    {
        $resources = Resource::paginate($request->pagesSize);
        
        return response()->json(['data' => $resources, 'columns' => Resource::transformColumn()]);
    }

    public function show()
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
