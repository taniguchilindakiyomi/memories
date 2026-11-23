<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MemoryRequest;
use App\Models\Memory;

class MemoriesController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

       $query = Memory::query();

       if (!empty($keyword)) {
           $query->where('title', 'LIKE', "%{$keyword}%")
                 ->orWhere('content', 'LIKE', "%{$keyword}%");
       }

        $memories = $query->orderBy('date', 'desc')->get();

        return view('index', compact('memories', 'keyword'));
    }




    public function create()
    {
        $date = request('date', date('Y-m-d'));
        return view('create', compact('date'));
    }




    public function store(MemoryRequest $request)
    {
        $memory = new Memory();

    $memory->date = $request->date;
    $memory->title = $request->title;
    $memory->content = $request->content;

    if ($request->hasFile('image')) {
        $memory->image = $request->file('image')->store('memories', 'public');
    }

    $memory->save();

    return redirect('/detail/' . $memory->id);
    }

    public function detail($id)
    {
        $memory = Memory::findOrFail($id);

        return view('detail', compact('memory'));
    }



    public function edit($id)
    {
        $memory = Memory::findOrFail($id);
        return view('edit', compact('memory'));
    }





    public function update(MemoryRequest $request, $id)
    {
        $memory = Memory::findOrFail($id);

    $memory->date = $request->date;
    $memory->title = $request->title;
    $memory->content = $request->content;

    if ($request->hasFile('image')) {
        $memory->image = $request->file('image')->store('memories', 'public');
    }

    $memory->save();

    return redirect('/detail/' . $memory->id);
    }




    public function destroy($id)
    {
        $memory = Memory::findOrFail($id);

        $memory->delete();

        return redirect('/');
    }


}

