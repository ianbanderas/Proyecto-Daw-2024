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
<div class="separar2">
    <a class="button_a" href="{{route("main")}}" ><p>{{__("message.home")}}</p></a>
    
     </div>
    <p class="button_b">{{__("message.NameUsu")}} {{Auth::user()->nombre}}</p>

     <div class="separar">
    <a class="button_a" id="logOut" href="{{route("cambiarIdioma")}}"><p>{{__("message.language")}}</p></a>
    <a class="button_a" href="{{route("out")}}" ><p>{{__("message.logOut")}}</p></a>
     </div>
   
   
</header>
<body>
<section class="flex-container">
    <div class="br">
    <label for="addRes" class="inline-flex items-center font-semibold"> {{__("message.addRes")}}</label>
    <form action="{{route('addRes')}}" name="addRes">
        <select name="formCiu">
        <option disabled selected>{{__("message.city")}}</option>
        @foreach ($ciudad as $item)
            <option value="{{$item->idCiu}}">
                {{$item["nombre"]}}
            </option>
        @endforeach
        
        </select>

        <input name="formRes" type="text" placeholder={{__("message.NameRes")}}/>
        <input name="formResCat" type="text" placeholder={{__("message.category")}}/>
        <button>{{__("message.add")}}</button>
    </form>
    </div>
    <div class="br">

    <label for="addRes" class="inline-flex items-center font-semibold"> {{__("message.resPass")}}</label>
    <form action="{{route('changePass')}}"> 
        <input name="changePass" type="text" placeholder=" {{__("message.newpass")}}"/>
        <button>{{__("message.send")}}</button>
    </form>
    </div>
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
        <a href="{{route("borrar",$item->idRes)}}">
    {{__("message.delete")}}</a>

    </div>
        @endforeach
        
    </section>

</body>
 <footer>
        Ián Banderas Tomillo
    </footer>
</html>