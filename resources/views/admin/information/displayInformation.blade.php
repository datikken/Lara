@extends('layouts.admin')

@section('center')
    <div class="d-flex flex-row align-items-center mt-2 mb-2">
        <h2 class="mr-3">Информация</h2>

        <a href="{{ route('adminCreateInfo') }}">
            <button class="btn btn-primary">
                Создать
            </button>
        </a>
    </div>

    <div class="table-responsive">
        <table class="uk-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Иконка</th>
                <th>Категория</th>
                <th>Заг. физ лица</th>
                <th>Заг. юр лица</th>
                <th>Опис. для физ лица</th>
                <th>Опис. для юр лица</th>
            </tr>
            </thead>
            <tbody>

            @foreach($information as $info)
                <tr>
                    <td>{{$info['id']}}</td>
                    <td><img uk-img style="height: 30px;widht:30px; object-fit: contain" src="{{ Storage::url('information_icons/' . $info['image']) }}"/></td>
                    <td>{{$info['category']}}</td>
                    <td>{{$info['fizik_title']}}</td>
                    <td>{{$info['urik_title']}}</td>

                    <td>{{Str::limit($info['fizik_text'], 20)}}</td>
                    <td>{{Str::limit($info['urik_text'], 20)}}</td>

                    <td>
                        <a href="{{route('adminEditInformation', ['id' => $info['id']]) }}" class="btn btn-outline-primary">
                            Ред.
                        </a>
                    </td>

                    <td>
                        <a href="{{route('adminDeleteInfo', ['id' => $info['id']])}}" class="btn btn-danger">
                            <span class="ui-icon" uk-icon="close">X</span>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        {{--<ul class="uk-pagination">--}}
            {{--{{ $information->links() }}--}}
        {{--</ul>--}}

    </div>

@endsection
