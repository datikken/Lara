<div class="table-responsive">

    @if($errors->any())

        <div class="alert-danger alert">
            <ul>

                <li>{!! print_r($errors->all()) !!}</li>

            </ul>
        </div>
    @endif

    <h3>Current Image</h3>
    <div><img src="{{asset('storage')}}/{{$product['image']}}" width="100" height="100" style="max-height: 220px" alt=""/></div>

        <form action="/admin/updateImage/{{$product->id}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

            <div class="form-group">
                <label for="description">Update image</label>
                <input type="file" class="" name="image" id="image" placeholder="Image" value="{{$product->image}}" required>
            </div>

            <button type="submit" name="submit" class="btn btn-default">Submit</button>

        </form>

</div>