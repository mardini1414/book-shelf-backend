<?php

namespace App\Http\Controllers\BookShelf;

use App\Http\Controllers\Controller;
use App\Models\Bookshelf;
use Illuminate\Http\Request;

class BookShelfController extends Controller
{
    public function index()
    {
        $books = Bookshelf::orderBy('id', 'desc')->paginate(10, ['id', 'title', 'author', 'year', 'is_readed']);

        return response()->json($books);
    }

    public function show($id)
    {
        $books = Bookshelf::where('id', $id)->first(['id', 'title', 'author', 'year', 'is_readed']);

        return response()->json($books);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:30',
            'author' => 'required|max:30',
            'year' => 'required|numeric',
            'is_readed' => 'required|bool'
        ]);

        Bookshelf::create($request->all());

        return response()->json(['message' => 'the book has been successfully added']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:30',
            'author' => 'required|max:30',
            'year' => 'required|numeric',
            'is_readed' => 'required|bool'
        ]);

        Bookshelf::where('id', $id)->update($request->except('_method'));

        return response()->json(['message' => 'the book has been successfully updated']);
    }

    public function destroy($id)
    {
        Bookshelf::where('id', $id)->delete();

        return response()->json(['message' => 'the book has been successfully deleted']);
    }
}
