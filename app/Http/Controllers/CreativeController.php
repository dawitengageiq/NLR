<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreativeController extends Controller
{
    protected $user;

    protected $creative;

    /**
     * Load the  needed configuration
     */
    public function __construct(\App\Http\Services\Creative $creative)
    {
        $this->middleware('auth');
        $this->middleware('admin');

        $this->user = auth()->user();
        $this->creative = $creative;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.creativeStats');
    }

    /**
     *Get statistics.
     */
    public function statistics(Request $request)
    {
        return $this->creative->getStatistics($request);
    }

    /**
     *Get statistics.
     */
    public function report(Request $request)
    {
        return $this->creative->getReport($request);
    }
}
