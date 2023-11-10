   <!-- Modal Konfirmasi Hapus  -->
   <div class="modal fade book-a-table" id="HapusPosts{{ $post->id }}" tabindex="-1" aria-labelledby="confirmResetModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirmResetModalLabel">Hapus</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="{{ $post->image }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                </div>
                </div>
            </div>
            </div>
          </div>
          <div class="modal-footer">
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="php-email-form">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal Event --> 