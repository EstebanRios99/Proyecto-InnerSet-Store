<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Pedidos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <style>
        @page{
            margin: 0cm 0cm;
            font-size: 1em;
        }
        body{
            margin-top: 3cm;
        }
        header{
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #1d68a7;
            color: #ffffff;
            text-align: center;
            line-height: 30px;
        }
    </style>
</head>
<body>
<header>
    <h3><strong>Reporte de InnerSet Store</strong></h3>
</header>
<div class="container">
    <h4 style="text-align: center">Reporte de Ventas por Cliente</h4>
    <table class="table table-sm table-bordered">
        <thead class="thead-light">
        <tr>
            <th scope="col">N°</th>
            <th scope="col">Cliente</th>
            <th scope="col">Fecha</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Recargo</th>
            <th scope="col">Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($requests as $request)
            <tr>
                <th scope="row">{{$request->user_id}}</th>
                @foreach($users as $user)
                    @if ($user->id === $request->user_id)
                        <td>{{$user->name}}</td>
                    @endif
                @endforeach
                <td>{{$request->date}}</td>
                <td>{{($request->subtotal)}}</td>
                <td>{{$request->surcharge}}</td>
                <td>{{$request->total}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>

