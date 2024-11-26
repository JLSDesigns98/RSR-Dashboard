<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\StoreImport;
use App\Models\Store;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
//use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function importSheets(Request $request) {

        //Store the file path in the temp directory of the server
        $filePath = $request->file('import_file')->store('temp', 'local');
        //Access the filepath from the its route (defined in filesystems.php)
        $absoluteFilePath = storage_path('app/private/' . $filePath);


        //Read the excel file and store all the sheet names. 
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($absoluteFilePath);
        $sheetNames = [];


        foreach ($spreadsheet->getSheetNames() as $sheetName) {
            $sheetNames[] = $sheetName;
        }

        //save the filePath in the session so it can be accessed from importSheets
        session(['import_file_path' => $filePath]);

        return view('importSheets', compact('sheetNames'));
    }

    public function import(Request $request) {
        // Retrieve the file path from the session
        ///dd($request);
        $filePath = session('import_file_path'); // Get the path saved earlier
        if (!$filePath) {
            return redirect('/')->with('error', 'No file was uploaded or saved in the session.');
        }

        if($request->input('overwrite') == 'on') {
            Store::truncate();
        }

        $absoluteFilePath = storage_path('app/private/' . $filePath);
    
        $sheetName = $request->input('sheet');
    
        $import = new StoreImport();
        $import->setSheetName($sheetName);
    
        Excel::import($import, $absoluteFilePath, null, \Maatwebsite\Excel\Excel::XLSX);
    
        // Optionally delete the file after import
        unlink($absoluteFilePath);
    
        return redirect('/')->with('success', 'All good!');
    }

    public function edit(Request $request) {
        
        $selection = json_decode($request->group);
        
        foreach ($selection as $id) {
            if ($id > 0) {
                $store = Store::whereId($id)->first();
                
                $store->update($request->all());
                
            }
        }


        return redirect('/')->with('success', 'Store Updated');
    }

   public function orderTop($selectedGroup) {
    dd($selectedGroup);
    }
}

