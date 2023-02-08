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
        
        $result = Writer::all();

        return view('writers', compact('result'));
    }
    // Create writer
    public function crud(Request $request){
        // dd($request->has('writer_create'));
        $data = $request->all();
        switch (true) {
            case $request->has('writer_create'):
                Writer::create($data);
                return redirect()->route('writers');
                
                break;

            case $request->has('writer_update'):
                $id = 1;
                $writer = Writer::find($id);
                $writer->writer_name = $request->input('writer_name');
                $writer->save();
                return redirect()->route('writers');

                break;

            case $request->has('writer_delete'):
                $id = 5;
                $writer = Writer::find($id);
                $writer->delete();
                return redirect()->route('writers');

                break;
            
            ;
        }

    }

}
