<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
     <div class="separar">
    <a class="button_a" id="logOut" href="{{route("cambiarIdioma")}}"><p>{{__("message.language")}}</p></a>
    <a class="button_a" href="{{route("out")}}" ><p>{{__("message.logOut")}}</p></a>
     </div>
   
   
</header>
<body>
<section class="flex-container">
  
    <div class="br">

    <label for="addRes" class="inline-flex items-center font-semibold"> {{__("message.resPass")}}</label>
    <form action="{{route('changePass')}}"> 
        <input name="changePass" type="text" placeholder=" {{__("message.newpass")}}"/>
        <button>{{__("message.send")}}</button>
    </form>
    </div>
    @foreach($restaurante as $item) 
    <div class="boxperfil">
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
  <h4>
        <a href="{{route("borrar",$item->idRes)}}">
    {{__("message.delete")}}</a>
    
        <a href="{{route("menu", $item->idRes)}}" >{{__("message.menu")}}</a>
    </h4>
    </div>
        @endforeach
    </section>

</body>
 <footer>
        Ián Banderas Tomillo
    </footer>
</html>