<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Объекты</title>
  <style>
    @font-face {
      font-family: "DejaVu Sans";
      font-style: normal;
      font-weight: 400;
      src: url("~fonts/dejavu-sans/DejaVuSans.ttf");
      /* IE9 Compat Modes */
      src: 
        local("DejaVu Sans"), 
        local("DejaVu Sans"), 
        url("~fonts/dejavu-sans/DejaVuSans.ttf") format("truetype");
    }
    body { 
      font-family: "DejaVu Sans";
      font-size: 12px;
    }
  </style>
</head>
<body>
    <h1>{{ $thesis->thesis_title }}</h1>
    <h1>{{ $thesis->thesis_title_en }}</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</p>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        
        <tr>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
        </tr>

        @foreach ($authors as $author)
        <div>{{ formatFullName($author->last_name, $author->first_name, $author->middle_name) }}</div>
        @endforeach

</p>

        
    </table>

    {!! $thesis->text !!}
  
</body>
</html>

