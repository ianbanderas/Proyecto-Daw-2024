<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
    <section class="flex-container">
        @if (isset($mensaje))
        <script>
            alert("{{ __('message.sorry') }}");
            location.href = 'http://localhost:8000/';
        </script>
        {{-- <h1>{{__("message.sorry")}}</h1> --}}
        @endif


    <form method="post" action="{{ route('cat') }}">
        @csrf
        <select name="cat">
            @foreach ($cat as $item)
            <option>
                {{ $item }}
            </option>
            @endforeach
        </select>
        <button>{{ __('message.find') }}</button>
    </form>

    <form method="post" action="{{ route('ciu') }}">
        @csrf
        <select name="ciudad">
            @foreach ($ciudad as $item)
            <option value="{{ $item->idCiu }}">
                {{ $item->nombre }}
            </option>
            @endforeach
        </select>
        <button>{{ __('message.find') }}</button>
    </form>

        <div class="box">
            <table>
                <tr>
                    <th>{{ __('message.Name') }}</th>
                    <th>{{ __('message.category') }}</th>
                    <th>{{ __('message.city') }}</th>
                    <th>{{ __('message.delete') }}</th>
                    <th>{{ __('message.menu') }}</th>
                </tr>

                @foreach ($restaurante as $item)
                <tr>
                    <td>
                        {{ $item->nombre }}
                    </td>

                    <td>
                        {{ $item->categoria }}
                    </td>

                    <td>
                        @foreach ($ciudad as $item2)
                        @if ($item2->idCiu == $item->idCiu)
                        {{ $item2->nombre }}
                        @endif
                        @endforeach
                    </td>

                    <td class="enlace">
                        <a href="{{ route('borrar', $item->idRes) }}">{{ __('message.delete') }}</a>
                    </td>

                    <td class="enlace">
                        <a href="{{ route('menu', $item->idRes) }}">{{ __('message.menu') }}</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>


        <!-- Paginación -->
        <div class="box2">
            {{ $restaurante->links() }}
        </div>
    </section>
</body>

<footer>
    Ián Banderas Tomillo
</footer>

</html>