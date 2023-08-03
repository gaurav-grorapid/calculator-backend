<?php

namespace App\Http\Controllers\V1\Calculation;

use App\Http\Controllers\Controller;
use App\Services\CalculationService;
use Illuminate\Http\Request;

class CalculationController extends Controller
{

    public function __construct(CalculationService $calculationService)
    {
        $this->calculationService = $calculationService;
    }

    public function createCalculation(Request $request)
    {
      return $this->calculationService->create($request->all());
    }

    public function getAllCalculation(Request $request,$uuid)
    {
        return $this->calculationService->allCalculation($uuid);
    }


    public function updateCalculation(Request $request,$uuid)
    {
        return $this->calculationService->updateCalculation($request->all(),$uuid);
    }

    public function deleteCalculation(Request $request,$uuid)
    {   
        return $this->calculationService->deleteCalculation($uuid);
    }


}