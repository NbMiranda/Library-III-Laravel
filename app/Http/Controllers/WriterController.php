<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Writer;
class WriterController extends Controller
{
    // login validation
    public function __construct(){
        $this->middleware('validation'); 
    }

    // writers select with pagination
    public function writers(){
        $arrayId = Writer::pluck('id')->all();

        $result = Writer::paginate(7);

        $firstItem = $result->firstItem() - 1;
        $count = $result->count();

        return view('writers', compact('result', 'arrayId', 'firstItem', 'count'));
    }

    // CREATE Writer
    public function create(Request $request) {

        Writer::create($request->all());
        return redirect()->back();
    }

    // UPDATE Writer
    public function update(Request $request) {
        $id = $request->input('id');
        $writer = Writer::findOrFail($id);
        $writer->update($request->all());
    }

    // DELETE Writer
    public function delete(Request $request) {
        $id = $request->input('writer_delete');
        
        $writer = Writer::find($id);
        $writer->delete();
        return redirect()->back();
    }
}
