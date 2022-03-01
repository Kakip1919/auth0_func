<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.parts.head',['title'=>'管理者新規登録'])
</head>

<body class="g-sidenav-show  bg-gray-200">
@include('admin.parts.sidemenu',['active'=>'sponsor'])
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @include('admin.parts.navbar')
    <div class="container-fluid py-1">
        <div class="row">
            @if (session('store_message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <span class="alert-text text-white"><strong>{{ session('store_message') }}</strong></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="col-12">
                <div class="card my-4">
                    <form action="{{route('admin.manage.store')}}" method="post">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="card-header p-3">
                                    <h4 class="align-middle text-center px-2">管理者新規追加</h4>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-2">
                                        <h7 class="align-middle text-center">管理者名</h7>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-1">
                                        <input type="text" name="name" value="{{old("name")}}"
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
                                        <input type="text" name="login_id" value="{{old("login_id")}}"
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
                                        <input type="text" name="role" value="{{old("role")}}"
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
                                        <input type="password" name="password" value="{{old("password")}}"
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
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-1">
                                        <textarea rows="10" name="remarks"
                                                  class="form-control is-invalid">{{old("remarks")}}</textarea>
                                        @error('remarks')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 text-center">
                            <button class="btn btn-primary" type="submit" onclick="DisableButton(this);">登録</button>
                        </div>
                    </form>
                </div>
                <a href="{{route('admin.manage.index')}}">
                    <button type="button" class="btn btn-secondary">キャンセル</button>
                </a>
            </div>
        </div>
    </div>
</main>
@include('admin.parts.footer_script')
</body>

</html>
