<x-admin-master>
    @section('content')
        <h1>Edit Post</h1>
        <form action="{{ route('post.update', $post) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text"
                       class="form-control" 
                       name="title"
                       placeholder="Enter title"
                       value="{{ $post->title }}"
                >
            </div>

            <div class="form-group">
                <div><img src="{{ filter_var($post->post_image, FILTER_VALIDATE_URL)
                    ? $post->post_image
                    : '/storage/' . $post->post_image 
                    }}"
                    height="100px" 
                    alt="wait for it">
                </div>
                <label for="file">File</label>
                <input type="file" 
                       class="form-control-file" 
                       name="post_image"
                       id="post_image"
                >
            </div>

            <div class="form-group">
                <label for="body">Content</label>
                <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{ $post->body }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection
</x-admin-master>