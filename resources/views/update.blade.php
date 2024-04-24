<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="text-align:center;background-color: linen;" >
<div style="background-color: cornsilk">
    <h2>Update</h2>
    @if($errors->any())
            <div >
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

    <form  action="/lists/{{$todo->id}}" method="post">
        @csrf
        @method('put')

        <div style="margin-top: 20px;margin-right: 20px;">
            <label>Task</label>
            <input type="text" name="text" value="{{$todo->text}}">
        </div>
        @csrf
        <div style="margin-top: 20px;">
            <input style="background-color:#c4ef8b;width:11%;" type='submit' value="Update">
        </div>

        </div>
    </form>
</div>




    
    
</body>
</html>