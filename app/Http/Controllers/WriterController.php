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
        $id = $request->input('id');

        $writer = Writer::findOrFail($id);
        $writer->update($request->all());      
        

        switch (true) {
            case $request->has('writer_create'):
                $writer = Writer::findOrFail($id);
                $writer->update($request->all()); 
                // return redirect()
                //     ->route('writers')
                //     ->with('success', 'Livro cadastrado com sucesso');
                
                break;

            case $request->has('writer_update'):
                $id = $request->input('writer_id');
                $writer = Writer::find($id);
                $writer->writer_name = $request->input('writer_name');
                $writer->save();
                return redirect()
                    ->route('writers')
                    ->with('success', 'Livro atualizado com sucesso');
                
                break;

            case $request->has('writer_delete'):
                $id = $request->input('writer_id');
                $writer = Writer::find($id);
                $writer->delete();
                return redirect()
                    ->route('writers')
                    ->with('success', 'Livro deletado com sucesso');

                break;
            
            ;
        }

    }
}
