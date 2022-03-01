<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ManageAdminController extends Controller
{
    public function index()
    {
        $response = Admin::ManageIndex();
        if ($response["is_exists"] === null) {
            return App::abort("404");
        }
        $response = $response["admin_data"];
        return view("admin/manage/index", compact("response"));
    }

    public function create(Request $request)
    {
        return view("admin/manage/create");
    }

    public function edit($id)
    {
        $response = Admin::ManageEdit($id);
        if ($response["is_exists"] === null) {
            return App::abort("404");
        }
        $response = $response["admin_data"];
        return view("admin/manage/edit", compact("response"));

    }

    public function store(Request $request)
    {
        $response = Admin::ManageStore($request);
        if ($response["is_success"] === false) {
            return redirect("admin/manage/index")->with("flash_message", "作成できませんでした");
        }
        return redirect("admin/manage/index")->with("flash_message", "作成が完了しました。");
    }

    public function update(Request $request, $id)
    {
        $response = Admin::ManageUpdate($request,$id);
        if ($response["is_success"] === false) {
            return redirect("admin/manage/index")->with("flash_message", "削除できませんでした");
        }
        if ($response["is_exists"] === null) {
            return App::abort("404");
        }
        return redirect("admin/manage/index")->with("flash_message", "更新が完了しました。");

    }

    public function delete($id)
    {
        $response = Admin::ManageDelete($id);
        if ($response["is_exists"] === null) {
            return App::abort("404");
        }
        return redirect("admin/manage/index")->with("flash_message", "削除が完了しました");
    }
}
