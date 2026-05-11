<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Gate::allows('access-admin', Auth::user())){
            return redirect('/order')->with('access', 'Unauthorized.');
        }else{
            $tables = Table::all();

            return view('kitchen.table', compact('tables'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kitchen.table_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|numeric|max:20',
        ]);

        $table = new Table();
        $table->number = $request->number;
        $table->save();

        return redirect('/tables')->with('created', 'Table successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $table = Table::find($id);
        $table->delete();

        return back()->with('deleted', 'Table successfully deleted.');
    }
}
