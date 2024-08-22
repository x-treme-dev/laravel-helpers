<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
</head>
<body>
    <form action="{{ route('form.store') }}" method='post' enctype='multipart/form-data'>
        @csrf
         <input type="text" name='path' id="path" required placeholder="Введите URL"  class="@error('path') is-invalid @else is-valid @enderror">
         @error('path')
         <b>{{ $message }}</b>
         @enderror
         <br><br>
         <input type="submit" value="Отправить">
       </form>
       <br>
       <p><b>Arr::random()</b></p>
        <hr>
        @if ($random = Session::get('random'))
            <div> {{ print_r($random) }} </div> 
        @endif
        <br>
        <p><b>Arr::query() + Arr::random()</b></p>
        <hr>
        @if ($query = Session::get('query'))
            <div> {{ $query }} </div> 
        @endif
         <br>
         <p><b>Arr::flatten()</b></p>
         <hr>
         <!--Проверить сессионную переменную $dataFlatten, записать ее значение-->
         @if ($dataFlatten = Session::get('dataFlatten'))
         <table>
            <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>email</th>
            <th>Birth date</th>
            <th>UUID</th>
            <th>Login</th>
            <th>Site</th>
            <th>md5</th>
            <th>sha1</th>
            <th>Registered</th>
            <th>Address</th>
            <th>Suite</th>
            <th>City</th>
            <th>ZipCode</th>
            <th>geo</th>
            <th>lat</th>
            <th>Phone</th>
            <th>Website</th>
            <th>Company Name</th>
            <th>Company CatchPhrase</th>
            <th>bs</th>
            </tr>
           <tbody>
             @foreach($dataFlatten as $item)
                @if( is_int($item) && $item == 1) <tr> 
                @elseif(is_int($item) && $item   !== 1) </tr><tr> 
                @else <td> {{ $item  }} </td>
                @endif 
             @endforeach
                </tr>
           </table>
         @endif
           
         <br>
         <p><b>Arr::dot() + Arr::take()</b></p>
         <hr>
         <!--Проверить сессионную переменную $array, записать ее значение-->
         @if ($dataDot = Session::get('dataDot'))
         <table>
            <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>email</th>
            <th>Birth date</th>
            <th>UUID</th>
            <th>Login</th>
            <th>Site</th>
            <th>md5</th>
            <th>sha1</th>
            <th>Registered</th>
            <th>Address</th>
            <th>Suite</th>
            <th>City</th>
            <th>ZipCode</th>
            <th>geo</th>
            <th>lat</th>
            <th>Phone</th>
            <th>Website</th>
            <th>Company Name</th>
            <th>Company CatchPhrase</th>
            <th>bs</th>
            </tr>
           <tbody>
             <tr>
             @foreach($dataDot as $item)
             @if( is_int($item) && $item == 1) <tr> 
                @elseif(is_int($item) && $item   !== 1) </tr><tr> 
                @else <td> {{ $item  }} </td>
                @endif 
             @endforeach
                </tr>
           </table>
         @endif
         
</body>
</html>