
<html>
<head>
    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">
</head>
@include("admin.admincss")
<body>
<div class="container-scroller" style="height:2000px">
@include("admin.navbar")

<div style="position: relative;top: 60px; right: -150px">
    <form class="clean-form" action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <div>
            <label>Étel</label>
            <input style="color: ghostwhite" type="text" name="title" placeholder="Adja meg az étel nevét" required>
        </div>
        <div>
            <label>Ár</label>
            <input style="color: ghostwhite" type="number" name="price" placeholder="Adja meg az étel árát" required>
        </div>
        <div>
            <label>Kép</label>
            <input type="file" name="image" required>
        </div>
        <div>
            <label>Leírás</label>
            <input style="color: ghostwhite" type="text" name="description" placeholder="Adja meg az étel leírását" required>
        </div>
        <div>
            <input class="clean-button" type="submit" value="Mentés">
        </div>
    </form>

    <div>
        <table class="clean-table">
            <tr>
                <th style="padding: 30px">Étel</th>
                <th style="padding: 30px">Ár</th>
                <th style="padding: 30px">Leírás</th>
                <th style="padding: 30px">Kép</th>
                <th style="padding: 30px">Módosítás</th>
                <th style="padding: 30px">Törlés</th>
            </tr>
            @foreach($data as $data)
            <tr text-align="center">
                <td>{{$data->title}}</td>
                <td>{{$data->price}}</td>
                <td>{{$data->description}}</td>
                <td><img height="150" width="150" src="/foodimage/{{$data->image}}"></td>
                <td><a href="{{url('/updateview',$data->id)}}">Frissítés</a></td>
                <td><a href="{{url('/deletemenu',$data->id)}}">Törlés</a></td>
            </tr>
            @endforeach

        </table>

    </div>

</div>
</div>
@include("admin.adminscript")
</body>
</html>
