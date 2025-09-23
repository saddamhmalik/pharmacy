<?php

namespace App\Http\Controllers;

use App\Services\MedicineSearchService;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function medicines(Request $request, MedicineSearchService $medicineSearchService)
    {
        dd($request->all());
        dd($medicineSearchService);
    }
}
