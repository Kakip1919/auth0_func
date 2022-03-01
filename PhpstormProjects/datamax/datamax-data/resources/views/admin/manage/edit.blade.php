<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.parts.head',['title'=>'スポンサー情報編集'])
</head>

<body class="g-sidenav-show  bg-gray-200">
@include('admin.parts.sidemenu',['active'=>'sponsor'])
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @include('admin.parts.navbar')
    <div class="container-fluid py-1">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="container">
                        <div class="row">
                            <div class="card-header p-3">
                                <h4 class="align-middle text-center　px-2">管理者情報編集</h4>
                            </div>
                        </div>
                        @if (session('update_message'))
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <span
                                    class="alert-text text-white"><strong>{{ session('update_message') }}</strong></span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="row my-2">
                            <div class="col-md-3">
                                <div class="input-group input-group-outline my-2">
                                    <h7 class="align-middle text-center">管理者名</h7>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-1">
                                    <input type="text" name="name" value="{{old("name", $response->name)}}"
                                           class="form-control is-invalid">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-3">
                                <div class="input-group input-group-outline my-2">
                                    <h7 class="align-middle text-center">ログインID</h7>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-1">
                                    <input type="text" name="login_id"
                                           value="{{old("login_id", $response->login_id)}}"
                                           class="form-control is-invalid">
                                    @error('login_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-3">
                                <div class="input-group input-group-outline my-2">
                                    <h7 class="align-middle text-center">ロール</h7>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-1">
                                    <input type="text" name="role" value="{{old("role", $response->role)}}"
                                           class="form-control is-invalid">
                                    @error('role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-3">
                                <div class="input-group input-group-outline my-2">
                                    <h7 class="align-middle text-center">パスワード</h7>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-1">
                                    <input type="password" name="password"
                                           value="{{old("password", $response->password)}}"
                                           class="form-control is-invalid">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-3">
                                <div class="input-group input-group-outline my-2">
                                    <h7 class="align-middle text-center">備考</h7>
                                    <input type="hidden" value="{{$response->id}}" name="id">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-1">
                                        <textarea rows="10" name="remarks"
                                                  class="form-control is-invalid">{{old("remarks", $response->remarks)}}</textarea>
                                    @error('remarks')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn bg-gradient-secondary" data-bs-toggle="modal"
                                data-bs-target="#updateModal">更新
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">削除
                        </button>
                    </div>
                </div>
                <div class="modal fade" id="updateModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">
                                    更新の確認</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route("admin.manage.update",["manage_id"=>$response->id])}}"
                                  method="post">
                                @csrf
                                <input type="hidden" name="id" value="">
                                <div class="modal-body">
                                    この企業情報を更新しますか？
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-secondary"
                                            data-bs-dismiss="modal">キャンセル
                                    </button>
                                    <button type="submit" class="btn bg-gradient-primary">更新</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">
                                    削除の確認</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route("admin.manage.delete",["manage_id"=>$response->id])}}"
                                  method="post">
                                @csrf
                                <div class="modal-body">
                                    この管理者を削除しますか？
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-secondary"
                                            data-bs-dismiss="modal">キャンセル
                                    </button>
                                    <button type="submit" class="btn bg-gradient-primary">削除</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <a href="{{url("/admin/manage/index")}}">
                    <button type="button" class="btn btn-secondary">キャンセル</button>
                </a>
            </div>
        </div>
    </div>
</main>
@include('admin.parts.footer_script')
</body>

</html>
