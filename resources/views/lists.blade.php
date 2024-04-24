
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My todo list</title>
</head>
<body style="background-color: linen;" >
    @if($errors->any())
            <div >
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
    <form  action="/lists" method="post">
        <div style="margin-top: 20px;margin-right: 20px;display:flex">
            <label>Task</label>
            <input type="text" name="text">
            <input style="background-color:#c4ef8b;width:11%;margin-left: 5px;" type='submit' value="Add Task">
        </div>
        @csrf
     
    </form>

 
    <table style="text-align:center;border-collapse:collapse;border-bottom:1px solid black;width:50%">
        <tbody>
            @foreach($todo as $i)
            <tr>
                <td style="border-bottom:1px solid black;padding:10px">{{$i->text}}</td>
                <td>{{$i->user->name}}</td>
                <td style="border-bottom:1px solid black;padding:10px">
                    <form  action="/lists/{{$i->id}}" method="post">
                        @csrf
                        @method('delete')
                        <div style="margin-top: 20px;">
                            <input style="background-color:#c4ef8b" type='submit' value="delete">
                        </div>
                    </form>
                </td>
                <td style="border-bottom:1px solid black;padding:10px">
                    <form  action="/lists/{{$i->id}}" method="get">
                        @csrf
                        <div style="margin-top: 20px;">
                            <input style="background-color:#c4ef8b" type='submit' value="update">
                        </div>
                        
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  

  
    
</body>
</html>