<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Document</title>
</head>
<header>
<div class="separar2">
    <a class="button_a" href="{{route("profile")}}" ><p>{{__("message.profile")}}</p></a>
     

     <form method="post" action="{{route("cat")}}">
    @csrf
    <select name="cat">
        @foreach ($cat as $item)
            <option>
                {{$item}}
            </option>
        @endforeach
     </select>
     <button>{{__("message.find")}}</button>
     </form>

     <form method="post" action="{{route("ciu")}}">
    @csrf
    <select name="ciudad">
        @foreach ($ciudad as $item)
            <option value="{{$item->idCiu}}">
                {{$item->nombre}}
            </option>
        @endforeach
     </select>
     <button>{{__("message.find")}}</button>
     </form>
     </div>
   

     <div class="separar">
    <a class="button_a" id="logOut" href="{{route("cambiarIdioma")}}"><p>{{__("message.language")}}</p></a>
    <a class="button_a" href="{{route("out")}}" ><p>{{__("message.logOut")}}</p></a>
     </div>
   
   
</header>
<body>
    
    <section class="flex-container">
    @if (isset($mensaje))
    <script>
        alert("{{__("message.sorry")}}");
        location.href ='http://localhost:8000/';
    </script>
    {{--<h1>{{__("message.sorry")}}</h1>--}}
    @endif
    @foreach($restaurante as $item) 
    <div class="box">
    <h4 class="sub">
    {{__("message.Name")}}
    </h4>
       <h4 class="sub">
        {{__("message.category")}}
    </h4>
     <h4 class="sub">
        {{__("message.city")}}
    </h4>
    <h4>
        {{$item->nombre}}
    </h4>
 
    <h4>
        {{$item->categoria}}
    </h4>
 
    <h4>
    @foreach ($ciudad as $item2)
        @if ($item2->idCiu == $item->idCiu)
            {{$item2->nombre}}    
        @endif
    @endforeach
  </h4>

        <a href="{{route("menu", $item->idRes)}}" >{{__("message.menu")}}</a>
    </div>
        @endforeach
        <div class="box2">
    {{$restaurante->links()}}
    </div>
    </section>
   
    
</body>
    <footer>
        Ián Banderas Tomillo
    </footer>
</html>