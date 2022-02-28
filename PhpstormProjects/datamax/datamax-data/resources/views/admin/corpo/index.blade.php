<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.parts.head',['title'=>'企業データ一覧'])
</head>

<body class="g-sidenav-show  bg-gray-200">
@include('admin.parts.sidemenu',['active'=>'corpo'])
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @include('admin.parts.navbar')
    <div class="container-fluid py-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm text-dark active" aria-current="">企業データ管理</li>
            </ol>
        </nav>
        @if (session('flash_message'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <span
                                    class="alert-text text-white"><strong>{{ session('flash_message') }}</strong></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <form>
                                <div class="row">
                                    <h6 class="col-md-7 text-white text-capitalize ps-4">企業データ一覧</h6>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="rom px-3">
                            <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">検索
                            </button>
                        </div>
                        <!-- Modal -->

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">企業データ検索</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="" method="post">
                                        @csrf
                                        <div class="container">
                                            <div class="row my-2">
                                                <div class="col-md-4">
                                                    <div class="input-group input-group-outline my-2">
                                                        <h7 class="align-middle text-center">法人番号</h7>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="input-group input-group-outline my-1">
                                                        <input type="text" class="form-control" name="title"
                                                               onfocus="focused(this)" onfocusout="defocused(this)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-2">
                                                <div class="col-md-4">
                                                    <div class="input-group input-group-outline my-2">
                                                        <h7 class="align-middle text-center">氏名又は名称</h7>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="input-group input-group-outline my-1">
                                                        <input type="text" class="form-control" name="sponsor"
                                                               onfocus="focused(this)" onfocusout="defocused(this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary"
                                                    data-bs-dismiss="modal">閉じる
                                            </button>
                                            <button type="submit" class="btn bg-gradient-primary">検索</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        法人番号
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        会社名
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        会社所在地
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        人格区分
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        登録年月日
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        更新年月日
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($response as $res)
                                    <tr>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{$res->id}}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{$res->registered_number}}</p>
                                        </td>
                                        <td>
                                            <a class="index_link"
                                               href="{{route("admin.corpo.detail", ["corpo_id"=> $res->id])}}">{{$res->name}}</a>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">{{$res->address}}</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-xs font-weight-bold">{{$res->kind}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-xs font-weight-bold">{{$res->registration_date}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-xs font-weight-bold">{{$res->update_date}}</span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        {{ $response->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('admin.parts.footer_script')
</body>
</html>
