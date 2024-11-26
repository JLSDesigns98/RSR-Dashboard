<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;


class StoreImport implements WithStartRow, WithMultipleSheets
{
    
    private $sheetName;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function sheets(): array
    {
        return [
            
            $this-> sheetName => new FirstSheetImport(),
            
        ];
    }

    public function setSheetName($sheetName) {
        $this->sheetName = $sheetName;
    }

    // public function model(array $row)
    // {
    //     //dd($row);

    //     $lastOrder = Store::orderBy('order','desc')->first()->order ?? 0;
        
    //     return new Store([
    //         'name' => $row[0],
    //         'code' => $row[1],
    //         'manager' => $row[2],
    //         'speedDial' => $row[3],
    //         'orderNumber' => $row[4],
    //         'orderValue' => $row[5],
    //         'notes' => $row[6],
    //         'order' => $lastOrder + 1

    //     ]);
    // }

    public function startRow(): int
    {
        return 2;
    }


}
