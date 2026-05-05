<?php

namespace App\Http\Controllers;

use App\Http\Requests\DishCreateRequest;
use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
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
        $dishes = Dish::all();

        return view('kitchen.dish', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('kitchen.dish_create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DishCreateRequest $request)
    {
        $dish = new Dish();
        $dish->name = $request->name;
        $dish->category_id = $request->category;

        $imageName = date('YmdHis').'.'.request()->dish_image->getClientOriginalExtension();
        request()->dish_image->move(public_path('images'), $imageName);

        $dish->image = $imageName;
        $dish->save(); 

        return redirect('dish')->with('status', 'Dish created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dish = Dish::find($id);
        // dd($dish);
        
        return view('kitchen.dish_detail', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dish = Dish::find($id);

        $categories = Category::all();

        return view('kitchen.dish_edit', compact('dish', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request()->validate([
            'name' => 'required',
            'category' => 'required',
        ]);

        $dish = Dish::find($id);
        $dish->name = $request->name;
        $dish->category_id = $request->category;

        // Check file input
        if($request->hasFile('dish_image')){
            if ($dish->image && file_exists(public_path('images/' . $dish->image))) {
                unlink(public_path('images/' . $dish->image));
            }
  
            $imageName = date('YmdHis') . '.' . $request->dish_image->extension();
            $request->dish_image->move(public_path('images'), $imageName);
        
            $dish->image = $imageName;
        }
        
        $dish->updated_at = now();
        $dish->save();

        return redirect('dish')->with('updated', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dish = Dish::find($id);
        $dish->delete();

        return redirect('dish')->with('deleted', 'Deleted successfully.');
    }
}
