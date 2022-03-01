<?php

namespace App\Models\Admin;

use Exception;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

/**
 * @method static create(array $array)
 * @method static get()
 * @method static exists()
 * @method static ManageIndex()
 * @method static where(string $string, string $string1)
 * @method static ManageStore(Request $request)
 * @method static find($id)
 * @method static ManageEdit()
 * @method static ManageUpdate()
 * @method static ManageDelete()
 * @property mixed $id
 * @property mixed $remarks
 * @property mixed $password
 * @property mixed $login_id
 * @property mixed $name
 * @property mixed $is_super
 * @property mixed $role
 */
class Admin extends Authenticatable
{
    use Notifiable;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        "name", 'login_id', 'password',"remarks",
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function scopeManageIndex($query): array
    {
        if (self::exists()) {
            return ["admin_data" => self::get(), "is_exists" => "exists"];
        }
        return ["is_exists" => null];
    }

    public function scopeManageStore($query, Request $request): ?array
    {
        $admin_model = new Admin();
        $admin_name = $request->input("name");
        $login_id = $request->input("login_id");
        $role = $request->input("role");
        $password = $request->input("password");
        $remarks = $request->input("remarks");
        $admin_model->name = $admin_name;
        $admin_model->login_id = $login_id;
        $admin_model->role = $role;
        $admin_model->password = $password;
        $admin_model->remarks = $remarks;
        try {
            DB::beginTransaction();
            $admin_model->save();
            $last_insert_id = $admin_model->id;
            DB::commit();
            return ["is_success" => true, "last_id" => $last_insert_id];
        } catch (Exception $e) {
            DB::rollback();
            return ["is_success" => false];
        }
    }

    public function scopeManageEdit($query, $id): array
    {
        if (self::find($id) === null) {
            return ["is_exists" => null];
        }
        return ["admin_data" => self::where("id", $id)->first(), "is_exists" => "exists"];
    }

    public function scopeManageUpdate($query, Request $request, $id)
    {
        if (self::find($id) === null) {
            return ["is_exists" => null];
        }
        $admin_name = $request->input("name");
        $login_id = $request->input("login_id");
        $role = $request->input("role");
        $password = $request->input("password");
        $remarks = $request->input("remarks");
        $update_data = [
            'name' => $admin_name,
            "login_id" => $login_id,
            'role' => $role,
            "password" => $password,
            "remarks" => $remarks
        ];
        try {
            DB::beginTransaction();
            self::where('id', $id)->update($update_data);
            DB::commit();
            return ["is_exists" => "exists", "is_success" => true, "current_id" => $id];
        } catch (Exception) {
            DB::rollback();
            return ["is_exists" => "exists", "is_success" => false, "current_id" => $id];
        }
    }

    public function scopeManageDelete($query, $id)
    {
        if (self::find($id) === null) {
            return ["is_exists" => null];
        }
        self::find($id)->delete();
        return ["is_success"=>true, "is_exists"=>"exists"];
    }
}
