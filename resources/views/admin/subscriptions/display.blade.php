@extends('layouts.admin')

@section('center')

    <div class="d-flex flex-row align-items-center m-2 ml-0">
        <h2 class="mr-3">Почтовые подписки</h2>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Почта</th>
                <th>Дата</th>
            </tr>
            </thead>
            <tbody>

            @foreach($posts as $post)
                <tr>
                    <td>{{$post['email']}}</td>
                    <td>{{$post['date']}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>

        {{ $posts->links() }}

    </div>
@endsection
