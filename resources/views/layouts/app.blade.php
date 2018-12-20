<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('partials._head')

<body>
    <div id="app">
        @include('partials._nav')

        <main class="py-4">
            <div class="container">
                <div class="row">                    
                    @yield('content')
                </div>
            </div>
        </main>
        @include('partials._footer')
    </div>
</body>
</html>
