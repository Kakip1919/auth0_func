<?php

namespace App\Console\Commands;

use App\Models\Corpo_Data;
use Illuminate\Console\Command;

/**
 * @method Corpo_Data()
 * @property $Corpo_Data
 */
class SyncInit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SyncInit {file_path}';

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

    public function json_store($corpo_data): void
    {
        foreach ($corpo_data as $data) {
            echo $data["sequenceNumber"];
            $corpo_db = new Corpo_Data;
            $corpo_db->registered_number = (int)str_replace("T", "", $data["registratedNumber"]);
            $corpo_db->process = (int)$data["process"];
            $corpo_db->correct = (int)$data["correct"];
            $corpo_db->kind = (int)$data["kind"];
            $corpo_db->country = (int)$data["country"];
            $corpo_db->latest = (int)$data["latest"];
            $corpo_db->registration_date = $data["registrationDate"] !== '' ? $data["registrationDate"] : '1900-01-01 00:00:00';
            $corpo_db->update_date = $data["updateDate"] !== '' ? $data["updateDate"] : '1900-01-01 00:00:00';
            $corpo_db->disposal_date = $data["disposalDate"] !== '' ? $data["updateDate"] : '1900-01-01 00:00:00';
            $corpo_db->expire_date = $data["expireDate"] !== '' ? $data["expireDate"] : '1900-01-01 00:00:00';
            $corpo_db->address = $data["address"];
            $corpo_db->address_prefecture_code = (int)$data["addressPrefectureCode"];
            $corpo_db->address_city_code = (int)$data["addressCityCode"];
            $corpo_db->address_request = $data["addressRequest"];
            $corpo_db->address_request_prefecture_code = (int)$data["addressRequestPrefectureCode"];
            $corpo_db->address_request_city_code = (int)$data["addressRequestCityCode"];
            $corpo_db->kana = $data["kana"];
            $corpo_db->name = $data["name"];
            $corpo_db->address_inside = $data["addressInside"];
            $corpo_db->address_inside_prefecture_code = (int)$data["addressInsidePrefectureCode"];
            $corpo_db->address_inside_city_code = (int)$data["addressInsideCityCode"];
            $corpo_db->trade_name = $data["tradeName"];
            $corpo_db->popular_name_previous_name = $data["popularName_previousName"];
            $corpo_db->save();
        }
    }

    public
    function handle(): int
    {
        $file_path = $this->argument("file_path");
        $json = file_get_contents($file_path);
        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $corpo_data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        $this->json_store($corpo_data);
        return 0;
    }
}
