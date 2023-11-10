    <!-- Modal Event Update-->
    <div class="modal fade book-a-table" id="UpdatePosts{{ $post->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Event Section</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="php-email-form">
            @csrf
            @method('PUT')
            
            <div class="modal-body">
              <div class="form-group">
                <label for="image">Gambar</label>
                <input type="file" name="image" id="image" class="form-control" value="{{ $post->image }}">
              </div>
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control"  value="{{ $post->title }}">
              </div>
              <div class="form-group">
                <label for="content">Content</label>
                <input type="text" name="content" id="content" class="form-control" value="{{ $post->content }}">
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#HapusPosts{{ $post->id }}">Hapus</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>

          </form>

        </div>
      </div>
    </div>
    <!-- End Modal Event --> 

 