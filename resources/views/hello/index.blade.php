<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>Index</title>
  </head>
  <body>
    <h1>Hello/Index</h1>
    <p>{{$msg}}</p>
    <ul>
      @foreach ($data as $item)
      <li>{!!$item!!}</li>
      @endforeach
    </ul>
  </body>
</html>