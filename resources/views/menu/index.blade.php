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
    <a class="button_a" href="{{ route('main') }}">
        <p>{{ __('message.home') }}</p>
    </a>

    <div class="myImageNav"></div>

    <div class="separar">
        <a class="button_a" id="logOut" href="{{ route('cambiarIdioma') }}">
            <p>{{ __('message.language') }}</p>
        </a>
        <a class="button_a" href="{{ route('out') }}">
            <p>{{ __('message.logOut') }}</p>
        </a>
    </div>


</header>

<body>
    <section class="start">
        <div class="br">
            <label for="addRes" class="inline-flex items-center font-semibold"> {{__("message.addPla")}}</label>
            <form action="{{route('addPla')}}" name="addPla">
                <input type="hidden" name="idRes" value="{{$idRes}}" />
                <input type="text" name="name" placeholder="{{__("message.Name")}}" />
                <input type="text" name="desc" placeholder="{{__("message.Desc")}}" />
                <input type="text" name="com" placeholder="{{__("message.Comment")}}" />
                <input type="number" min=0 max=10 name="val" placeholder="{{__("message.val")}}" />
                <button>{{__("message.add")}}</button>
            </form>
        </div>

        @foreach($platos as $item)
        <div class="box">
        <table>
            <tr>
                <th> {{__("message.Name")}} </th>
                <th> {{__("message.Desc")}} </th>
            </tr>
            <tr>
                <td> {{$item->nombre}} </td>
                <td>  {{$item->descripcion}} </td>
            </tr>
            <tr>
                <td colspan="2"> 
                    <a href="{{route("verPlato", ["idPla"=>$item->idPla, "idRes"=>$idRes])}}" >{{__("message.see")}}</a>
                </td>
            </tr>
        </table>

        </div>
        @endforeach
        @if( count($platos) == 0)
            <h2>No hay platos</h2>
        @endif
        <div class="box2">
            {{ $platos->links() }}
        </div>
    </section>
</body>

<footer>
    Ián Banderas Tomillo
</footer>

</html>
