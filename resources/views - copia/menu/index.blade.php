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
    <a class="button_a" href="{{route("main")}}" ><p>{{__("message.home")}}</p></a>
    <a class="button_a" href="{{route("profile")}}" ><p>{{__("message.profile")}}</p></a>
     </div>
    <p class="button_b">{{__("message.NameRes")}}: {{$restaurante}}</p>

     <div class="separar">
    <a class="button_a" id="logOut" href="{{route("cambiarIdioma")}}"><p>{{__("message.language")}}</p></a>
    <a class="button_a" href="{{route("out")}}" ><p>{{__("message.logOut")}}</p></a>
     </div>
   
   
</header>
<body>
<section class="start">
        @if($prop == true)
        <div class="br">
        <label for="addRes" class="inline-flex items-center font-semibold"> {{__("message.addPla")}}</label>
            <form action="{{route('addPla')}}" name="addPla">
                <input type="hidden" name="idRes" value="{{$idRes}}"/>
                <input type="text" name="name" placeholder="{{__("message.Name")}}"/>
                <input type="text" name="desc" placeholder="{{__("message.Desc")}}"/>
                <button>{{__("message.add")}}</button>
            </form>
    </div>
        @endif
         @foreach($platos as $item) 
    <div class="box">
    <h4 class="sub2 sub">
    {{__("message.Name")}}
    </h4>
       <h4 class="sub2 sub">
        {{__("message.Desc")}}
    </h4>
    <h4 class="sub2">
        {{$item->nombre}}
    </h4>
 
    <h4 class="sub2">
        {{$item->descripcion}}
    </h4>
        <a href="{{route("verPlato", ["idPla"=>$item->idPla, "idRes"=>$idRes])}}" >{{__("message.see")}}</a>

    </div>
        @endforeach
        
        </section>
</body>
 <footer>
        Ián Banderas Tomillo
    </footer>
</html>