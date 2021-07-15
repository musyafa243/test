<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <title>Customer</title>
</head>
<body>
    <h1>Customer</h1>
    <form id="fsim" action="/simpandata" method="POST" >
        @csrf
        <div class="container mt-3">
            <div class="mt-2">Name : <input type="text" name="name"></div>
            <div class="mt-2">Address : <input type="text" name="address"></div>
            <div class="mt-2">Email : <input type="text" name="email"></div>
            <div class="mt-2"><button type="submit">simpan</button></div>
        
        </div>
    </form>
    <div class="container mt-3">
        <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($customer as $user)
            <tr>
                <th scope="row"></th>
                <td>{{ $user->name}}</td>
                <td>{{ $user->address }}</td> 
                <td>{{ $user->email }}</td> 
            </tr>
        @endforeach
        </tbody>
    </table> 
    </div>
    <script>
        $( "#fsim" ).submit(function( event ) {
  
             // Stop form from submitting normally
             event.preventDefault();
 
             // Get some values from elements on the page:
             var $form = $( this ),
             term = $form.find( "input[name='name']" ).val(),
             silm = $form.find( "input[name='email']" ).val(),
             tank = $form.find( "input[name='address']" ).val(),
             url = $form.attr( "action" );
             var posting = $.post( url, {"_token": "{{ csrf_token() }}", name: term, email: silm, address: tank } );
 
             console.log(posting);
             });
     </script>
</body>
</html>