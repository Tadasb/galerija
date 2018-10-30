<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Portfolio ADMIN</title>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="app" id="app">
            <section>
                <div class="container">
                    <div class="columns">
                        <div class="column is-2">
                            <a class="" href="/" id="port-logo">
                                <img src="/storage/portfolio-logo.svg" alt="Portfolio galerija" style="padding: 15px;">
                            </a>
                            @auth
                            <div class="has-text-centered">
                                <p class="title is-4">{{auth()->user()->name}}</p>
                  {{--               <p class="subtitle is-6">{{auth()->user()->email}}</p> --}}
                                <a class="button" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Atsijungti</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none; visibility: hidden;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                            @endauth
                        </div>

                        <div class="column is-10">
                            <admin-tabs></admin-tabs>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script src="{!! mix('js/app.js') !!}" type="text/javascript"></script>
        <script>
            const app = new Vue({
                el: '#app',
            });

        </script>
    </body>
</html>