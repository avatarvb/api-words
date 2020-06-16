<?php

namespace App\Http\Controllers;

use App\Word;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class wordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data =  DB::table('entries')->take(5000)->get();

        return response()->json(
            array(
                'status' => 'success',
                'words' => $data->toArray()
            ),
            201
        );
    }

    public function search(Request $request)
    {
        $query = $request->get('query');

        $data =  DB::table('entries')->where('word', 'like', "%$query%")->get();


        if ($data->count() > 0) {
            return response()->json(
                array(
                    'status' => 'success',
                    'words' => $data->toArray()
                ),
                201
            );
        } else {
            return response()->json(
                array(
                    'status' => 'error',
                    'words' => 'NO DATA'
                ),
                404
            );
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
