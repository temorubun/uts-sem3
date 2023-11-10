<!doctype html>
<html lang="en">
    <head>
    
        <meta charset="utf-8">
    
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title>Agung Hendi Temorubun</title>
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
    </head>
  
    <body>


        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">

                    <button type="button" class="btn btn-md btn-success rounded shadow-sm border-0 mb-3" data-bs-toggle="modal" data-bs-target="#TambahPosts">ADD NEW POST</button>
                    <div class="card border-0 rounded shadow-sm">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Content</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($posts as $post)
                                    <tr data-bs-toggle="modal" data-bs-target="#UpdatePosts{{ $post->id }}">
                                        <td class="text-center">
                                            <img src="{{ $post->image }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $post->title }}</td>
                                        <td>{!! $post->content !!}</td>
                                    </tr>
                                    @include('posts.update.index')
                                    @include('posts.delete.index')
                                    @empty
                                    <div class="alert alert-danger">
                                        Data Post belum Tersedia.
                                    </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('posts.create.index')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
    </body>

</html>