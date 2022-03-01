<?php

namespace App\Console\Commands;

use App\Models\Corpo_Data;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SyncUpsert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:Upsert {from_date} {to_date}';

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

    private function upsert($from_date, $to_date, $divide_size): void
    {
        $c = 0;
        for ($i = 1; $i < $divide_size + 1; $i++) {
            $responses = Http::get("https://web-api.invoice-kohyo.nta.go.jp/1/diff?id=KSD7DkG9pnH3v&from=$from_date&to=$to_date&type=21&divide=$i")->json();
            foreach ($responses["announcement"] as $response) {
                $c++;
                echo $c . "\n";
                try {
                    DB::beginTransaction();
                    DB::table("corpo_data")
                        ->updateOrInsert
                        (["registered_number" => str_replace("T", "", $response["registratedNumber"])],
                            [
                                "process" => (int)$response["process"],
                                "correct" => (int)$response["correct"],
                                "kind" => (int)$response["kind"],
                                "country" => (int)$response["country"],
                                "latest" => (int)$response["latest"],
                                "registration_date" => $response["registrationDate"] !== '' ? $response["registrationDate"] : "1900-01-01 00:00:00",
                                "update_date" => $response["updateDate"] !== '' ? $response["updateDate"] : "1900-01-01 00:00:00",
                                "disposal_date" => $response["disposalDate"] !== '' ? $response["disposalDate"] : "1900-01-01 00:00:00",
                                "expire_date" => $response["expireDate"] !== '' ? $response["expireDate"] : "1900-01-01 00:00:00",
                                "address" => $response["address"],
                                "address_prefecture_code" => (int)$response["addressPrefectureCode"],
                                "address_city_code" => (int)$response["addressCityCode"],
                                "address_request" => $response["addressRequest"],
                                "address_request_prefecture_code" => (int)$response["addressRequestPrefectureCode"],
                                "address_request_city_code" => (int)$response["addressRequestCityCode"],
                                "kana" => $response["kana"],
                                "name" => $response["name"],
                                "address_inside" => $response["addressInside"],
                                "address_inside_prefecture_code" => (int)$response["addressInsidePrefectureCode"],
                                "address_inside_city_code" => (int)$response["addressInsideCityCode"],
                                "trade_name" => $response["tradeName"],
                                "popular_name_previous_name" => $response["popularName_previousName"]
                            ]);
                    DB::commit();
                    echo "成功しました:";
                } catch (Exception) {
                    DB::rollback();
                    echo "失敗しました";
                }
            }
        }
    }

    public function handle(): int
    {
        $from_date = $this->argument("from_date");
        $to_date = $this->argument("to_date");
        $response = Http::get("https://web-api.invoice-kohyo.nta.go.jp/1/diff?id=KSD7DkG9pnH3v&from=$from_date&to=$to_date&type=21");
        $divide_size = (int)$response->json()["divideSize"];
        $this->upsert($from_date, $to_date, $divide_size);
        return 0;
    }
}
