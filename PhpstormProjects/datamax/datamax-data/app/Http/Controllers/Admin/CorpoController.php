<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Corpo_Data;
use Illuminate\Support\Facades\App;

class CorpoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $response = Corpo_Data::Corpo_DataIndex();
        return view("admin/corpo/index", compact("response"));
    }

    public function detail($id)
    {
        $response = Corpo_Data::Corpo_DataDetail($id);
        if ($response["is_exists"] === null) {
            return App::abort(404);
        }
        $response = $response["corpo_data"];
        return view("admin/corpo/detail", compact("response"));
    }

    public function update($id)
    {
        $response = Corpo_Data::Corpo_DataUpdate($id);
        if ($response["is_exists"] === null) {
            return App::abort(404);
        }
        return redirect("admin/corpo/detail/$id")->with("flash_message", "ID".$response["id"]."番を更新しました。");
    }

    public function delete($id)
    {
        $response = Corpo_Data::Corpo_DataDelete($id);
        if ($response["is_exists"] === null) {
            return App::abort(404);
        }
        return redirect("admin")->with("flash_message", "ID".$response["id"]."番を削除しました。");
    }
}
