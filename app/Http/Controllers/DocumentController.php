<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index(){
        $documents = Document::orderBy('updated_at', 'desc')->get();
        return view('document.index', compact('documents'));
    }

    public function upload(Request $request){
        try {
            if ($request->hasFile('document')) {
                $file = $request->file('document');

                $file_name = $file->getClientOriginalName(); 
                $file_size = $file->getSize(); 
                $file_type = $file->getMimeType();

                $file_path = $file->storeAs('public/documents', $file_name);

                $document = new Document();
                $document->name = $file_name;
                $document->format = $file_type;
                $document->size = $file_size;
                $document->icon = 'pdf?.png';
                $document->description = 'Save on: '.$file_path;
                $document->save();
            }

            return redirect()->route('files');

        } catch (\Throwable $th) {
            $error = $th->getMessage();
            return view('document.index')->with('error', $error);
        }
    }
}
