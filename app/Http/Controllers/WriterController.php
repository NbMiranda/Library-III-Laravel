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

    // CRUD writers
    public function crud(Request $request){
        
        // DELETE WRITER
        if($request->has('writer_delete')){
            $id = $request->input('writer_delete');
            
            $writer = Writer::find($id);
            $writer->delete();
            return redirect()->back();
                
        }

        // CREATE WRITER
        else if($request->has('writer_create')){
            // dd($request->all());
            $writer = new Writer;
            $writer->writer_name = $request->input('writer_name');
            $writer->save();
            return redirect()->back();
            
        }

        // UPDATE WRITER
        else if($request->has('writer_update')){
            
            $id = $request->input('id');
            $writer = Writer::findOrFail($id);
            $writer->update($request->all());
        }
                              
    }
}
