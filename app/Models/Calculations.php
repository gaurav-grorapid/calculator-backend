<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculations extends Model
{
    use HasFactory;
    use Uuids;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public const USER_ID = "user_id";
    public const CALCULATION_NAME = "name";
    public const CALCULATION_QUERY = "query";
    public const CALCULATION_RESULT = "result";
    public const IS_ACTIVE = "is_active";

    protected $fillable = [
        self::CALCULATION_NAME,
        self::USER_ID,
        self::CALCULATION_QUERY,
        self::CALCULATION_RESULT,
        self::IS_ACTIVE,
    ];
}
