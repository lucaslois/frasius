<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quote::all();
        $quotes->reverse();
        return response()->json(['data' => $quotes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quote = Quote::create($request->all());
        return response()->json(['data' => $quote]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quote = Quote::find($id);
        if(!$quote)
            return response()->json(['error' => 'No existe una cita con ese ID']);

        return response()->json($quote);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quote = Quote::find($id);
        if(!$quote)
            return response()->json(['error' => 'No existe una cita con ese ID']);
        $quote->fill($request->all());
        $quote->save();
        return response()->json(['data' => $quote]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quote = Quote::find($id);
        if(!$quote)
            return response()->json(['error' => 'No existe una cita con ese ID']);
        $quote->delete();
    }

    public function authors() {
        $authors = Quote::all()->pluck('author');

        return response()->json($authors);
    }
}
