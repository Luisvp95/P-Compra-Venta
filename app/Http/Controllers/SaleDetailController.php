<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoresaleDetailRequest;
use App\Http\Requests\UpdatesaleDetailRequest;
use App\Models\saleDetail;

class SaleDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresaleDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresaleDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\saleDetail  $saleDetail
     * @return \Illuminate\Http\Response
     */
    public function show(saleDetail $saleDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\saleDetail  $saleDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(saleDetail $saleDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesaleDetailRequest  $request
     * @param  \App\Models\saleDetail  $saleDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesaleDetailRequest $request, saleDetail $saleDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\saleDetail  $saleDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(saleDetail $saleDetail)
    {
        //
    }
}
