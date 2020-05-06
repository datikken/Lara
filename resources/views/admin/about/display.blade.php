@extends('layouts.admin')

@section('center')

    {{--<div class="table-responsive">--}}
        {{--<table class="uk-table">--}}
            {{--<thead>--}}
            {{--<tr>--}}
                {{--<th>#</th>--}}
                {{--<th>Год</th>--}}
                {{--<th>Заголовок</th>--}}
                {{--<th>Описание</th>--}}
                {{--<th>Содержание</th>--}}
                {{--<th>Создан</th>--}}
                {{--<th>Обновлен</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}

            {{--@foreach($years as $year)--}}
                {{--<tr>--}}
                    {{--<td>{{$year['id']}}</td>--}}
                    {{--<td>{{$year['year']}}</td>--}}
                    {{--<td>{{$year['heading']}}</td>--}}
                    {{--<td>{{$year['description']}}</td>--}}
                    {{--<td>{{$year['text']}}</td>--}}
                    {{--<td>{{$year['created_at']}}</td>--}}
                    {{--<td>{{$year['updated_at']}}</td>--}}

                    {{--<td>--}}
                        {{--<a href="{{route('adminEditInformation', ['id' => $year['id']]) }}" class="btn btn-outline-primary">--}}
                        {{--<span uk-icon="pencil" class="uk-margin-small-right uk-icon">--}}
                        {{--<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="pencil">--}}
                            {{--<path fill="none" stroke="#000" d="M17.25,6.01 L7.12,16.1 L3.82,17.2 L5.02,13.9 L15.12,3.88 C15.71,3.29 16.66,3.29 17.25,3.88 C17.83,4.47 17.83,5.42 17.25,6.01 L17.25,6.01 Z"></path>--}}
                            {{--<path fill="none" stroke="#000" d="M15.98,7.268 L13.851,5.148"></path>--}}
                        {{--</svg>--}}
                        {{--</span>--}}
                        {{--</a>--}}
                    {{--</td>--}}

                    {{--<td>--}}
                        {{--<a href="{{route('adminDeleteInfo', ['id' => $year['id']])}}" class="btn btn-danger">--}}
                            {{--<span class="ui-icon" uk-icon="close"></span>--}}
                        {{--</a>--}}
                    {{--</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}

            {{--</tbody>--}}
        {{--</table>--}}

        {{--<ul class="uk-pagination">--}}
        {{--{{ $yearrmation->links() }}--}}
        {{--</ul>--}}

    {{--</div>--}}

@endsection
