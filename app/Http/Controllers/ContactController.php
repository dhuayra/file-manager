<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('contact.index', compact('contacts'));
    }

    public function export(Request $request){
        $contacts = Contact::all();
        $csvFile = 'contactList.csv';
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$csvFile",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $callback = function() use ($contacts){
            $file = fopen('php://output', 'w');
            fputcsv($file, ['id', 'Name', 'Phone', 'Email', 'Age', 'Birth Date']); 

            foreach ($contacts as $contact) {
                fputcsv($file, [$contact->id, $contact->name, $contact->phone, $contact->email, $contact->age, $contact->birth_date]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }


    public function import(Request $request){

        $file = $request->file('csv_file');

        if (!$file) {
            return redirect()->back()->with('error', 'Select file csv');
        }

        $contents = file_get_contents($file->path());

        $rows = array_map('str_getcsv', explode("\n", $contents));        

        foreach (array_slice($rows, 1) as $row) {

            if (!empty($row[0])) {
                DB::table('contacts')->insert([
                    'name' => $row[1],
                    'phone' => $row[2],
                    'email' => $row[3],
                    'age' => $row[4], 
                    'birth_date' => $row[5],
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        return redirect()->route('dataTables');
    }
}
