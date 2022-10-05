<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KoleksiController extends Controller
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
        // $categories = Category::pluck('title', 'id');
        $data = Category::all();
        // $category = Category::whereNotNull('category_id')->get();

        return view("koleksi.create", compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'date_receive' => 'required',
        ]);

        $string = Str::random(4);
        $code = ($string . rand(10, 100));
        Product::create([
            'kode' => $code,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
            'date_receive' => $request->date_receive,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('collection.index')->with([
            'message' => 'Koleksi Created Successfully',
            'type' => 'success'
        ]);
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
        $koleksi = Product::where('id', $id)->first();
        $categories = Category::pluck('title', 'id');

        return view('koleksi.edit', compact('koleksi', 'categories'));
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
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'date_receive' => 'required',
        ]);

        $input = $request->all();

        Product::find($id)->update($input);

        return redirect()->route('collection.index')->with([
            'message' => 'Koleksi Updated Successfully',
            'type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back()->with([
            'message' => 'Category Deleted Successfully',
            'type' => 'danger'
        ]);
    }
}
