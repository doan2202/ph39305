<!doctype html>
<html lang="en">
  <head>
    <title>Create</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>Create</h1>
        <a href="{{ route('post.index')}}" class="btn btn-primary">List</a>
        <form action="{{ route('store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Title </label>
                <input type="text" name="title" class="form-control">
              </div>
            <div class="mb-3">
                <label for="" class="form-label">Image </label>
                <input type="text" name="image" class="form-control">
              </div>
            <div class="mb-3">
                <label for="" class="form-label">Description </label>
                <input type="text" name="description" class="form-control">
              </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Content</label>
                <input type="text" name="content" class="form-control">
              </div>
            <div class="mb-3">
                <label for="" class="form-label">View </label>
                <input type="number" name="view" class="form-control">
              </div>
            <div class="mb-3">
                <label for="" class="form-label">Category Name </label>
                <select  name="cate_id" class="form-select">
                    @foreach ( $categories as $cate )
                    <option value="{{$cate->id}}">
                        {{$cate->name}}
                    </option>
                    @endforeach
                </select>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-success">Save</button>

             </div>
        </form>

    </div>
  </body>
</html>
