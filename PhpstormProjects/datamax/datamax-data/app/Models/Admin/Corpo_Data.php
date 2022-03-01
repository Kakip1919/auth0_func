<?php

namespace App\Models\Admin;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

/**
 * @property mixed $registered_number
 * @property mixed $process
 * @property mixed $correct
 * @property mixed $kind
 * @property mixed $country
 * @property mixed $latest
 * @property mixed $registration_date
 * @property mixed $update_date
 * @property mixed $disposal_date
 * @property mixed $expire_date
 * @property mixed $address
 * @property mixed $address_prefecture_code
 * @property mixed $address_city_code
 * @property mixed $address_request
 * @property mixed $address_request_prefecture_code
 * @property mixed $address_request_city_code
 * @property mixed $kana
 * @property mixed $name
 * @property mixed $address_inside
 * @property mixed $address_inside_prefecture_code
 * @property mixed $address_inside_city_code
 * @property mixed $trade_name
 * @property mixed $popular_name_previous_name
 * @method static where(string $string, $registratedNumber)
 * @method static updateOrInsert(array[] $array)
 * @method static paginate(int $int)
 * @method static Corpo_DataIndex()
 * @method static Corpo_DataDetail()
 * @method static Corpo_DataUpdate($id)
 * @method static Corpo_DataDelete($id)
 */
class Corpo_Data extends Model
{
    use HasFactory;

    protected string $table = "corpo_data";


    public function scopeCorpo_DataIndex($query)
    {
        return self::paginate(50);
    }

    public function scopeCorpo_DataDetail($query, $id): array
    {
        if (self::where("id", $id)->first() === null) {
            return ["is_exists" => null];
        }
        return ["is_exists" => "is_exists", "corpo_data" => self::where("id", $id)->first()];
    }

    public function scopeCorpo_DataUpdate($query, $id): array
    {
        if (self::where("id", $id)->first() === null) {
            return ["is_exists" => null];
        }
        $update_target = self::where("id", $id)->first()->registered_number;
        Artisan::call("command:Update T$update_target");

        return ["is_exists" => "exists", "id" => $id];
    }

    public function scopeCorpo_DataDelete($query, $id): array
    {
        if (self::where("id", $id)->first() === null) {
            return ["is_exists" => null];
        }
        try {
            DB::beginTransaction();
            self::where("id", $id)->delete();
            DB::commit();

            return ["is_exists" => "exists", "is_success" => true, "id" => $id];
        } catch (Exception) {
            DB::rollback();
            return ["is_exists" => true, "is_success" => false];
        }
    }
}



