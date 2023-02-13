<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Writer;
class WriterController extends Controller
{
    public function __construct(){
        $this->middleware('validation');
        
    }
    public function writers(){
        
        // $result = Writer::all();
        $result = Writer::paginate(8);

        return view('writers', compact('result'));
    }
    // Create writer
    public function crud(Request $request){
        // dd($request);


        if($request->has('writer_delete')){
            $id = $request->input('writer_delete');
            
            $writer = Writer::find($id);
            $writer->delete();
            return redirect()
                ->route('writers');
                
        }
        else if($request->has('writer_create')){
            // dd($request->all());
            $writer = new Writer;
            $writer->writer_name = $request->input('writer_name');
            $writer->save();
            return redirect()
            ->route('writers');
            
        }
        else{
            $id = $request->input('id');
            $writer = Writer::findOrFail($id);
            $writer->update($request->all());
        }
                              
    }
}
