@extends('layouts.admin')

@section('center')

    <div class="table-responsive">
        <table class="uk-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Заг физ лица</th>
                <th>Заг юр лица</th>
                <th>Иконка</th>
                <th>Описание для физ лица</th>
                <th>Описание для юр лица</th>
            </tr>
            </thead>
            <tbody>

            @foreach($information as $info)
                <tr>
                    <td>{{$info['id']}}</td>
                    <td>{{$info['fizik_title']}}</td>
                    <td>{{$info['urik_title']}}</td>
                    <td><img uk-img style="height: 30px;widht:30px; object-fit: contain" src="{{ Storage::url('information_icons/' . $info['image']) }}"/></td>
                    <td>{{$info['fizik_text']}}</td>
                    <td>{{$info['urik_text']}}</td>

                    <td>
                        <a href="{{route('adminEditInformation', ['id' => $info['id']]) }}" class="btn btn-outline-primary">
                        <span uk-icon="pencil" class="uk-margin-small-right uk-icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="pencil"><path fill="none" stroke="#000" d="M17.25,6.01 L7.12,16.1 L3.82,17.2 L5.02,13.9 L15.12,3.88 C15.71,3.29 16.66,3.29 17.25,3.88 C17.83,4.47 17.83,5.42 17.25,6.01 L17.25,6.01 Z"></path>
                            <path fill="none" stroke="#000" d="M15.98,7.268 L13.851,5.148"></path>
                        </svg>
                        </span>
                        </a>
                    </td>

                    <td>
                        <a href="{{route('adminDeleteInfo', ['id' => $info['id']])}}" class="btn btn-danger">
                            <span class="ui-icon" uk-icon="close"></span>
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
