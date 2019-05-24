@extends("layouts.admin.layout", ["type" => "city", "action" => "index"])

@section("title", "都市一覧")


@section("content")

    <div class="main-content-inner">

        <!-- table dark start -->
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">都市一覧</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="text-uppercase bg-dark">
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">国家</th>
                                    <th scope="col">都市名</th>
                                    <th scope="col">ランク</th>
                                    <th scope="col">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cities as $city)
                                    <tr>
                                        <td scope="row">{{ $city->id }}</td>
                                        <td scope="row">{{ $city->country->value }}</td>
                                        <td>{{ $city->value }}</td>
                                        <td>{{ $city->rank }}</td>
                                        <td><i class="ti-pencil-alt">編集</i></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- pagention -->
                <div class="row justify-content-md-center">
                    <div class="col-md-4">
                        <div>{{ $cities->links() }}</div>
                    </div>
                </div>
                <br/>
            </div>
        </div>
        <!-- table dark end -->


    </div>
@endsection
