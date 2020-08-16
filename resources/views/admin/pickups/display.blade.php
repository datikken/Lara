@extends('layouts.admin')

@section('center')
    <div class="d-flex flex-row align-items-center mt-2 mb-2">
        <h2 class="mr-3">Пункты самовывоза</h2>

        <div class="dropdown ml-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Добавить
            </button>
            <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton" data-savePickup>
                <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="Широта"
                    name="lat"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

                <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="Долгота"
                    name="long"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

                <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="Адрес"
                    name="address">

                <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="Ближ станция метро"
                    name="closest_station">

                <a href="#" class="btn btn-primary" data-savePickupBtn>
                    Сохранить
                </a>

            </div>
        </div>

    </div>
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>№</th>
            <th>Широта</th>
            <th>Долгота</th>
            <th>Адресс</th>
            <th>Ближ станция метро</th>
            <th>Создан</th>
        </tr>
        </thead>
        <tbody>

        @foreach($pickups as $pickup)
            <tr>
                <td>{{$pickup['id']}}</td>
                <td>{{$pickup['status']}}</td>
                <td>{{$pickup['date']}}</td>
                <td>{{$pickup['del date']}}</td>
                <td>{{$pickup['price']}}</td>
                <td>{{$pickup['user_id']}}</td>
                <td>{{$pickup['payment_status']}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
