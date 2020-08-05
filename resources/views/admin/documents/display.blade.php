@extends('layouts.admin')

@section('center')
    <div class="d-flex flex-row align-items-center mt-2 mb-2">
        <h2 class="mr-3">Документы</h2>

        <a href="{{ route('AdminDisplayDocumentUpload') }}">
            <button class="btn btn-primary">
                Создать
            </button>
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Расширение</th>
                <th>Создан</th>
                <th>Обновлен</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>

            @foreach($documents as $document)
                <tr>
                    <td>{{$document['id']}}</td>
                    <td>{{$document['file_name']}}</td>
                    <td>{{$document['file_extension']}}</td>
                    <td>{{$document['created_at']}}</td>
                    <td>{{$document['updated_at']}}</td>
                    <td>
                        <a href="{{ route('AdminDeleteDocument', ['id' => $document['id']]) }}" class="btn btn-danger">
                            <span class="ui-icon uk-icon" uk-icon="close">
                                <svg width="20" height="20"
                                     viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg"
                                     data-svg="close">
                                    <path fill="none"
                                          stroke="#000"
                                          stroke-width="1.06"
                                          d="M16,16 L4,4"></path>
                                    <path
                                        fill="none" stroke="#000" stroke-width="1.06"
                                        d="M16,4 L4,16">

                                    </path>
                                </svg>
                            </span>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection
