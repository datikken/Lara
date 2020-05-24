@foreach ($posts as $post)
    <div class="postList">
        @php echo $post['content'] @endphp
    </div>
@endforeach
