<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Portfolio Galerija</title>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="app" id="app">
            <nav class="navbar" role="navigation" aria-label="main navigation">
                <div class="navbar-brand">
                    <a class="navbar-item" href="/" id="port-logo" style="justify-content: space-between;">
                        <img src="/storage/portfolio-logo.svg" alt="Portfolio galerija">
                    </a>

                    <div style="position: absolute; right: 3em;" class="navbar-burger is-hidden-tablet" :class="{'is-active' : navbar_active}" @click="toggleNavbar()">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <br>

                    <img class="is-inline is-invisible-mobile" style="margin-top: 8em; margin-right: 3em; position: absolute; right: 3em;"src="/storage/esi-sukurtas-kad-kurtum.svg" alt="esi sukurtas, kad kurtum">

                </div>
                <div class="navbar-menu is-hidden-tablet is-hidden-desktop is-hidden-widescreen is-hidden-fullhd" :class="{'is-active' : navbar_active}">
                    <div class="navbar-start" style="text-align: center">
                        <a href="/parodos" class="navbar-item @if(Request::is('parodos') || Request::is('parodos/*')) is-active @endif">PARODOS</a>
                        <a href="/menininkai" class="navbar-item @if(Request::is('menininkai') || Request::is('menininkai/*')) is-active @endif">MENININKAI</a>
                        <a href="/renginiai" class="navbar-item @if(Request::is('renginiai') || Request::is('renginiai/*')) is-active @endif">RENGINIAI</a>
                        <a href="/dizainas" class="navbar-item @if(Request::is('dizainas') || Request::is('dizainas/*')) is-active @endif">DIZAINAS</a>
                        <a href="/fotografija" class="navbar-item @if(Request::is('fotografija') || Request::is('fotografija/*')) is-active @endif">FOTOGRAFIJA</a>
                        <a href="/dirbtuves" class="navbar-item @if(Request::is('dirbtuves') || Request::is('dirbtuves/*')) is-active @endif">DIRBTUVES</a>
                        <a href="/meniu" class="navbar-item @if(Request::is('menu') || Request::is('menu/*')) is-active @endif">MENIU</a>
                        <a href="/ledai" class="navbar-item @if(Request::is('ledai') || Request::is('ledai/*')) is-active @endif">LEDAI</a>
                        <a href="/nuoma" class="navbar-item @if(Request::is('nuoma') || Request::is('nuoma/*')) is-active @endif">NUOMA</a>
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
            <section class="section">
                <div class="columns">
                    <div class="column is-4-tablet is-3-desktop is-3-widescreen is-3-fullhd is-hidden-mobile">
                        <aside class="menu">
                          <ul class="menu-list">
                            <li>
                                <a href="/parodos" class="menu-link @if(Request::is('parodos') || Request::is('parodos/*')) active @endif">PARODOS</a>
                            </li><br>
                            <li>
                                <a href="/menininkai" class="menu-link @if(Request::is('menininkai') || Request::is('menininkai/*')) active @endif">MENININKAI</a>
                            </li><br>
                            <li>
                                <a href="/renginiai" class="menu-link @if(Request::is('renginiai') || Request::is('renginiai/*')) active @endif">RENGINIAI</a>
                            </li>

                            <div class="menu-divider"></div>

                            <li>
                                <a href="/dizainas" class="menu-link @if(Request::is('dizainas') || Request::is('dizainas/*')) active @endif">DIZAINAS</a>
                            </li><br>
                            <li>
                                <a href="/fotografija" class="menu-link @if(Request::is('fotografija') || Request::is('fotografija/*')) active @endif">FOTOGRAFIJA</a>
                            </li><br>
                            <li>
                                <a href="/dirbtuves" class="menu-link @if(Request::is('dirbtuves') || Request::is('dirbtuves/*')) active @endif">DIRBTUVĖS</a>
                            </li>

                            <div class="menu-divider"></div>

                            <li style="padding-right: 50px">
                                <a href="/meniu" class="menu-link @if(Request::is('meniu') || Request::is('meniu/*')) active @endif">MENIU</a>
                            </li>

                            <li style="padding-right: 50px"> 
                                <a href="/ledai" class="menu-link @if(Request::is('ledai') || Request::is('ledai/*')) active @endif">LEDAI</a>
                            </li>

                            <li style="padding-right: 50px">
                                <a href="/nuoma" class="menu-link @if(Request::is('nuoma') || Request::is('nuoma/*')) active @endif">NUOMA</a>
                            </li>

                            <div class="menu-divider"></div>

                            <li>
                                <a href="/kontaktai" class="menu-link @if(Request::is('kontaktai') || Request::is('kontaktai/*')) active @endif">KONTAKTAI</a>
                            </li><br>
                          </ul>
                        <div class="contact-icons">
                   {{--          <a class="contact-link" href="tel:+37062768061"><i class="contact-icon port-icon port-phone-2"></i></a> --}}
                            <a href="mailto:info@portfoliogalerija.lt"><i class="contact-icon port-icon port-email-83-2"></i></a>
                            <a href="https://goo.gl/maps/Ep7NFW9uCh42"><i class="contact-icon port-icon port-pin-3" target="_blank"></i></a>
                            <i class="contact-icon port-icon port-logo-instagram"></i>
                            <i class="contact-icon port-icon port-logo-fb-simple"></i>
                        </div>
                        @auth
                        <ul class="menu-list">
                            <div class="menu-divider"></div>
                            <div class="menu-divider"></div>
                            <div class="menu-divider"></div>
                            <li><a href="/admin" class="menu-link">Administravimas</a></li><br>
                            <li><a class="menu-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Atsijungti</a></li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none; visibility: hidden;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                        @endauth
                        </aside>
                    </div>
                    <div class="column is-7-tablet is-8-desktop is-8-widescreen is-8-fullhd ">
                        @yield('content')
                    </div>
                    <div class="column is-1"></div>
                </div>
            </section>
        </div>
        <script src="{!! mix('js/app.js') !!}" type="text/javascript"></script>
        @yield('scripts')
    </body>
</html>