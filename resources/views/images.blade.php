
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>images</title>
</head>
<body style="text-align:center;background-color: linen;" >
    @forelse($todo->images as $i)
            <img style="width: 100px;" src = "{{$i->image}} "/>
               
        @empty
            <p>
                عکسی وجود ندارد
            </p>
    @endforelse

    <div id="contact" class="container">
        <h1 class="text-center" style="margin-top: 100px">Image Upload</h1>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{$message}}</strong>
            </div>

          
        @endif

        <form method="POST" action="/upload-image/{{$todo->id}}" enctype="multipart/form-data">
            @csrf
            <input type="file" class="form-control" name="image" />

            <button type="submit" class="btn btn-sm">Upload</button>
        </form>

    </div>
   
</body>
</html>

