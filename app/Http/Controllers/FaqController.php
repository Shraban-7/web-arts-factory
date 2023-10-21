<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Faq::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return json_encode($faq);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $faq->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
    }
}
