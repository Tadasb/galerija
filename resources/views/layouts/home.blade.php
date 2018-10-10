<!DOCTYPE html>
<html style="background-image: url({{asset('concrete.jpg')}})" style="height: 100vh; width: 100%;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Portfolio Galerija</title>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body style="margin: 0px;">
        <div class="app" id="app">
            <nav class="navbar" role="navigation" aria-label="main navigation" style="background: none">
                <div class="navbar-brand">
                    <a class="navbar-item" href="/" id="port-logo">
                        <img src="{{asset('portfolio-logo.svg')}}" alt="Portfolio galerija">
                    </a>

                    <div class="navbar-burger is-hidden-tablet" :class="{'is-active' : navbar_active}" @click="toggleNavbar()">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="navbar-menu is-hidden-tablet is-hidden-desktop is-hidden-widescreen is-hidden-fullhd" :class="{'is-active' : navbar_active}">
                    <div class="navbar-start" style="text-align: center">
                        <a href="/parodos" class="navbar-item @if(Request::is('parodos') || Request::is('parodos/*')) is-active @endif">PARODOS</a>
                        <a href="/menininkai" class="navbar-item @if(Request::is('menininkai') || Request::is('menininkai/*')) is-active @endif">MENININKAI</a>
                        <a href="/renginiai" class="navbar-item @if(Request::is('renginiai') || Request::is('renginiai/*')) is-active @endif">RENGINIAI</a>
                        <a href="/dizainas" class="navbar-item @if(Request::is('dizainas') || Request::is('dizainas/*')) is-active @endif">DIZAINAS</a>
                        <a href="/fotografija" class="navbar-item @if(Request::is('fotografija') || Request::is('fotografija/*')) is-active @endif">FOTOGRAFIJA</a>
                        <a href="/dirbtuves" class="navbar-item @if(Request::is('dirbtuves') || Request::is('dirbtuves/*')) is-active @endif">DIRBTUVES</a>
                        <a href="/menu-ledai" class="navbar-item @if(Request::is('menu-ledai') || Request::is('menu-ledai/*')) is-active @endif">MENU / LEDAI</a>
                        <a href="/kontaktai" class="navbar-item @if(Request::is('kontaktai') || Request::is('kontaktai/*')) is-active @endif">KONTAKTAI</a>
                        <div class="contact-icons block" style="padding-top: 12px">
                            <a class="contact-link" href="tel:+37062768061"><i class="contact-icon port-icon port-phone-2"></i></a>
                            <a href="mailto:info@portfoliogalerija.lt"><i class="contact-icon port-icon port-email-83-2"></i></a>
                            <a href="https://goo.gl/maps/Ep7NFW9uCh42"><i class="contact-icon port-icon port-pin-3" target="_blank"></i></a>
                            <i class="contact-icon port-icon port-logo-instagram"></i>
                            <i class="contact-icon port-icon port-logo-fb-simple"></i>
                        </div>
                    </div>
                    <div class="navbar-end">
                        <a class="navbar-item">

                        </a>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>
        <script src="{!! mix('js/app.js') !!}" type="text/javascript"></script>
    </body>
</html>