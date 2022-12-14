<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/index.css">
  <title>index_php</title>
  <style>
    .home{
      position: relative;
      background-color: #2d197c;
      height: 100vh;
      width: 100vw;
    }
    .list{
      display: inline-block;
      border: black solid 1px;
      border-radius: 10px;
      padding: 10px 20px;
      width: 600px;
      background-color: white;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
    .ttl {
      font-size: 18px;
      margin: 0px;
    }
    .error_box{
      font-size: 5px;
    }
    .error_list{
      padding-left: 15px;
    }
    .error_message{
      display: inline-block;
      list-style: none;
      padding: 0px 10px;
      background-color: #ffc9c9;
    }
    .create_box{
      width: 100%;
      margin: 10px;
    }
    .create_input{
      width: 90%;
    }
    .table_list{
      margin: 10px 0;
      width: 100%;
    }
    .txt_area{
      width:90%;
    }
    .create_button{
      border: #ff97f2 solid 2px;
      background-color: white;
      border-radius: 5px;
      font-weight: bold;
      color: #ff57f2;
      cursor: pointer;
      padding: 2px 7px;
    }
    .update_button{
      border: #ffbc80 solid 2px;
      background-color: white;
      border-radius: 5px;
      font-weight: bold;
      color: #ffbc80;
      cursor: pointer;
      padding: 5px 8px;
    }
    .delete_button{
      border: #a6ff7e solid 2px;
      background-color: white;
      border-radius: 5px;
      font-weight: bold;
      color: #a6ff7e;
      cursor: pointer;
      padding: 5px 8px;
    }
  </style>
</head>

<body>
  <div class="home">
    <div class="list">
      <div class="ttl-box">
        <h1 class="ttl">Todo List</h1>
      </div>
 
      @if(count($errors)>0)
        <div class="error_box">
          <ul class="error_list">
            <li>
              <p>?????????????????????????????????????????????</p>
            </li>
            <li class="error_message">
              @error('task')
                <p>{{$message}}</p>
              @enderror
            </li>
          </ul>
        </div>
      @endif

      <div class="create_box">
        <form action="/create" method="post">
          <label>
            @csrf
            <input type="text" name="task" class="create_input">
          </label>
          <button class="create_button">??????</button>
        </form>
      </div>

      <table class="table_list">
          <tr>
            <th>????????????</th>
            <th>?????????</th>
            <th>??????</th>
            <th>??????</th>
          </tr>

        @foreach($Todos as $Todo)
          <tr style="text-align: center;">
            <td>{{$Todo->created_at}}</td>
            <form action="/update/{{$Todo['id']}}" method="post">@csrf
              <td><input type="text" name="task" value="{{$Todo->task}}" class="txt_area"></td>
              <td><button class="update_button">??????</button></td>
            </form>
            <form action="/delete/{{$Todo['id']}}" method="post">@csrf
              <input type="hidden" name="task" value="{{$Todo->task}}">
              <td><button class="delete_button">??????</button></td>
            </form>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
</body>

</html>