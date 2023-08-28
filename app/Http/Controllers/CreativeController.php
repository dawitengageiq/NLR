<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Lead;
use App\CampaignView;

class CreativeController extends Controller
{
    protected $user;
    protected $creative;
    /**
     * Load the  needed configuration
     *
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
     *
     * @return
     */
    public function statistics(Request $request)
    {
        return $this->creative->getStatistics($request);
    }

    /**
     *Get statistics.
     *
     * @return
     */
    public function report(Request $request)
    {
        return $this->creative->getReport($request);
    }



}
