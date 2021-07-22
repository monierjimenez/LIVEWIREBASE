<?php

namespace App\Http\Controllers\admin;

use App\Record;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RecordController extends Controller
{
    public function index()
    {
        if (!in_array('PRRV', explode(".", auth()->user()->permissions)))
            return redirect()->route('admin')->with('flasherror', 'Permissions denied to perform this operation, contact the administrator.');

        $records = Record::all();
        return view('admin.records.index', compact('records'));
    }
    //function me da todos los records ordenanos por fechas de creado
    public function recordGeneral()
    {
        return Datatables()->of(Record::with("user")
           )
            ->editColumn('updated_at', function ($record) {
                return [
                    'display' => $record->updated_at->format('Y-m-d, G:i:s'), //, G:i:s
                    'timestamp' => $record->updated_at->timestamp
                ];
            })
            ->rawColumns(['descripcion', 'descripcion'])
            ->toJson();
    }
}
