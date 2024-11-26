<?php

namespace App\Imports;

use App\Models\Store;
use Exception;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class FirstSheetImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $lastOrder = Store::orderBy('order', 'desc')->first()->order ?? 0;
        foreach ($rows as $row) {
            // Skip the header row if needed
            if ($row[0] === 'Store Name') continue;
            if ($row[0] === null) continue;

            try {
                    Store::create([
                        'name' => $row[0],
                        'code' => $row[1],
                        'manager' => $row[2],
                        'speedDial' => $row[3],
                        'orderNumber' => $row[4],
                        'orderValue' => $row[5],
                        'notes' => $row[6] ,
                        'order' => ++$lastOrder,
                    ]);
                 }
            catch (Exception $e) {
                continue;
            }
           
        }
    }
}