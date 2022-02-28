<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.parts.head',['title'=>'企業データ詳細情報'])
</head>

<body class="g-sidenav-show  bg-gray-200">
@include('admin.parts.sidemenu',['active'=>'corpo'])
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @include('admin.parts.navbar')
    <div class="container-fluid py-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                                       href="{{route("admin.corpo.index")}}">企業データ一覧</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="企業データ詳細情報">企業データ詳細情報</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="container">
                        <div class="row">
                            <div class="card-header p-3">

                                <h4 class="align-middle text-center　px-2">企業データ詳細情報</h4>
                            </div>
                        </div>
                        <table class="table mb-0 table-bordered">
                            <thead>
                            <tr>
                                <td>
                                    氏名又は名称
                                </td>
                                <td>
                                    {{$response->name}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    法人番号
                                </td>
                                <td class="text-center">
                                    {{$response->registered_number}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    事業者処理区分
                                </td>
                                <td class="text-center">
                                    {{$response->process}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    訂正区分
                                </td>
                                <td class="text-center">
                                    {{$response->correct}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    人格区分
                                </td>
                                <td class="text-center">
                                    {{$response->kind}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    国内外区分
                                </td>
                                <td class="text-center">
                                    {{$response->country}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    最新履歴
                                </td>
                                <td class="text-center">
                                    {{$response->latest}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    登録年月日
                                </td>
                                <td class="text-center">
                                    {{$response->registration_date}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    更新年月日
                                </td>
                                <td class="text-center">
                                    {{$response->update_date}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    取消年月日
                                </td>
                                <td class="text-center">
                                    {{$response->disposal_date}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    失効年月日
                                </td>
                                <td class="text-center">
                                    {{$response->expire_date}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    本店又は主たる事務所の所在地(法人)
                                </td>
                                <td>
                                    {{$response->address}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    本店又は主たる事務所の所在地都道府県コード(法人)
                                </td>
                                <td class="text-center">
                                    {{$response->address_prefecture_code}}
                                </td>
                            <tr>
                                <td>
                                    本店又は主たる事務所の所在地市区町村コード(法人)
                                </td>
                                <td class="text-center">
                                    {{$response->address_city_code}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    本店又は主たる事務所の所在地(公表申出)
                                </td>
                                <td>
                                    {{$response->address_request}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    本店又は主たる事務所の所在地都道府県コード(公表申出)
                                </td>
                                <td class="text-center">
                                    {{$response->address_request_prefecture_code}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    本店又は主たる事務所の所在地市区町村コード(公表申出)
                                </td>
                                <td class="text-center">
                                    {{$response->address_request_city_code}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    日本語カナ
                                </td>
                                <td>
                                    {{$response->kana}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    氏名又は名称
                                </td>
                                <td>
                                    {{$response->name}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    国内において行う資産の譲渡等に係る事務所、事業所その他これらに準ずるものの所在地
                                </td>
                                <td>
                                    {{$response->address_inside}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    国内において行う資産の譲渡等に係る事務所、事業所その他これらに準ずるものの所在地都道府県コード
                                </td>
                                <td class="text-center">
                                    {{$response->address_inside_prefecture_code}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    国内において行う資産の譲渡等に係る事務所、事業所その他これらに準ずるものの所在地市区町村コード
                                </td>
                                <td class="text-center">
                                    {{$response->address_inside_city_code}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    主たる屋号
                                </td>
                                <td>
                                    {{$response->trade_name}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    通称・旧性
                                </td>
                                <td>
                                    {{$response->popular_name_previous_name}}
                                </td>
                            </tr>
                            </thead>
                        </table>

                        <div class="row my-2">
                            <div class="col-md-9">
                                <div class="mr-5">
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
                                        <form action="{{route("admin.corpo.update",["corpo_id"=>$response->id])}}" method="post">
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
                                        <form action="{{route("admin.corpo.delete",["corpo_id"=>$response->id])}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="">
                                            <div class="modal-body">
                                                この企業情報を削除しますか？
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('admin.corpo.index')}}">
            <button type="button" class="btn btn-secondary">戻る</button>
        </a>
    </div>
@include('admin.parts.footer_script')
</body>

</html>
