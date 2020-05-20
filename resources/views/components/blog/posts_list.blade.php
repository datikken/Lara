<h1>Posts list</h1>

@foreach ($posts as $post)
    <div class="postContent">
        @php echo $post['content'] @endphp
    </div>
@endforeach
