<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SyncUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:Update {number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function json_update($response): void
    {
        try {
            DB::beginTransaction();
            DB::table("corpo_data")
                ->updateOrInsert(
                    ["registered_number" => str_replace("T", "", $response["registratedNumber"])],
                    [
                        'process' => (int)$response["process"],
                        'correct' => (int)$response["correct"],
                        'kind' => (int)$response["kind"],
                        'country' => (int)$response["country"],
                        'latest' => (int)$response["latest"],
                        'registration_date' => $response["registrationDate"] !== "" ? $response["registrationDate"] : "1900-01-01 00:00:00",
                        'update_date' => $response["updateDate"] !== "" ? $response["updateDate"] : "1900-01-01 00:00:00",
                        'disposal_date' => $response["disposalDate"] !== "" ? $response["disposalDate"] : "1900-01-01 00:00:00",
                        'expire_date' => $response["expireDate"] !== "" ? $response["expireDate"] : "1900-01-01 00:00:00",
                        'address' => $response["address"],
                        'address_prefecture_code' => (int)$response["addressPrefectureCode"],
                        'address_city_code' => (int)$response["addressCityCode"],
                        'address_request' => $response["addressRequest"],
                        'address_request_prefecture_code' => (int)$response["addressRequestPrefectureCode"],
                        'address_request_city_code' => (int)$response["addressRequestCityCode"],
                        'kana' => $response["kana"],
                        'name' => $response["name"],
                        'address_inside' => $response["addressInside"],
                        'address_inside_prefecture_code' => (int)$response["addressInsidePrefectureCode"],
                        'address_inside_city_code' => (int)$response["addressInsideCityCode"],
                        'trade_name' => $response["tradeName"],
                        'popular_name_previous_name' => $response["popularName_previousName"]
                    ]);
            DB::commit();
        } catch (Exception) {
            DB::rollback();
        }
    }

    public function handle(): int
    {
        $registered_number = $this->argument("number");
        $response = Http::get("https://web-api.invoice-kohyo.nta.go.jp/1/num?id=KSD7DkG9pnH3v&number=$registered_number&type=21&history=0")["announcement"][0];
        $this->json_update($response);
        return 0;
    }
}
