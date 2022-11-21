<?php

namespace App\Http\Controllers;

use App\Models\Spending;
use Illuminate\Http\Request;

class SpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $spendings = Spending::get();
        $param = [
            'spendings' => $spendings,
        ];
        return view('spending.index',  $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spending.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|min:6',
            'date' => 'required',
            'price' => 'required|integer',
            'note' => 'required',
        ]);
        $spending = new Spending();
        $spending->category = $request->category;
        $spending->date = $request->date;
        $spending->price = $request->price;
        $spending->note = $request->note;
        $spending->save();
        $notification = [
            'message' => 'Added successfully!',
            'alert-type' => 'success'
        ];
        return redirect()->route('spending.index')->with($notification);
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
        $spending = Spending::find($id);
        return view('spending.edit', compact('spending'));
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
        $validated = $request->validate([
            'category' => 'required|min:6',
            'date' => 'required',
            'price' => 'required|integer',
            'note' => 'required',
        ]);
        $spending = Spending::find($id);
        $spending->category = $request->category;
        $spending->date = $request->date;
        $spending->price = $request->price;
        $spending->note = $request->note;
        $spending->save();
        $notification = [
            'chinhsua' => 'Added successfully!',
            'alert-type' => 'success'
        ];
        return redirect()->route('spending.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spending = Spending::find($id);
        $spending->delete();
    }
}
