<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Music Insert</title>

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Music Insert</h1>
                </div>
                <div class="col-md-6">
                    <h1>Music Albums</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">

                    @if (\Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! \Session::get('success') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form action="{{ route('MusicInsert') }}" method="POST">

                        @csrf
                        <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" placeholder="Album name" name="title" id="title" required>
                        </div>

                        <div class="form-group">
                        <label for="singer">Singer:</label>
                        <input type="text" class="form-control" placeholder="Singer" name="singer" id="singer" required>
                        </div>


                        <div class="form-group">
                            <label for="realease_date">Release:</label>
                            <input type="date" class="form-control" placeholder="Date" name="release_date" id="release_date" required>
                        </div>

                        <div class="form-group">
                            <label for="songs">No. Songs:</label>
                            <input type="number" class="form-control" placeholder="songs" name="songs" id="songs" required>
                        </div>

                    
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <div class="col-md-9 mt-3">
                    @if (\Session::has('delete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {!! \Session::get('delete') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if (\Session::has('like'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! \Session::get('like') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Album</th>
                                <th>Singer</th>

                               <th>Likes</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @if (isset($music))
                                @foreach ($music as $data)
                                    <tr>
                                        <td>{{ $data->title }}</td>
                                        <td>
                                            <a href="{{ route('AlbumSearch', $data->singer) }}">{{ $data->singer }}</a>
                                        </td>
                                        <td>{{ $data->like }}</td>
                                        
                                        <td>
                                            <a href="{{ route('MusicViewEdit', $data->id) }}" class="btn btn-warning">View/Edit</a>
                                            <a href="{{ route('MusicDelete', $data->id) }}" class="btn btn-danger">Delete</a>
                                            <a href="{{ route('MusicLike', $data->id) }}" class="btn btn-primary">Like</a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            @endif
                           
                           
                        </tbody>
                    </table>
                </div>
           </div>
        </div>
    </section>

















    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>