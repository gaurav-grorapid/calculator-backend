<?php

namespace App\Services;

use App\Models\Calculations;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;


class CalculationService
{

    public static function create($data)
    {
        return Response::json(Calculations::create($data), 201);
    }

    public static function allCalculation($uuid)
    {
        $calculation = Calculations::where([[Calculations::USER_ID, $uuid],[Calculations::IS_ACTIVE,true]])->get()->toArray();
        if (count($calculation)>0) {
            return Response::json(["data"=>$calculation], 200);
        }
        else{
            return Response::json(["data"=>[],"message"=>"No records found"], 200);
        }
        

    }

    public static function updateCalculation($data,$uuid)
    {
        $calculation = Calculations::where("uuid",$uuid)->update($data);
        return Response::json(["data"=>$calculation,"message"=>"Record Updated"],200);
    }

    public static function deleteCalculation($uuid)
    {
        $calculation = Calculations::where("uuid",$uuid)->update([Calculations::IS_ACTIVE=>false]);
        return Response::json(["data"=> $calculation,"message"=>"Record Deleted"],200);
    }

}