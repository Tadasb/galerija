<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="index,follow">
        <title>@yield('title') - Portfolio Galerija</title>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <meta property="og:site_name" content="Portfolio galerija">
        <meta property="og:url" content="{{Request::url()}}">
        <meta property="og:title" content="@yield('title')">
        @if(isset($page))
        <meta property="og:image" content="{{data_get($page, 'data.og_image.url')}}">
        <meta name="description" content="{{data_get($page, 'short_description')}}">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400" rel="stylesheet">
        @endif
        @yield('meta')
        @yield('style')
    </head>
    <body style="background-color: #F5F1EC">
        <div class="body" style="width: 100%; overflow:hidden;" id="app">
            <div class="menu noselect">
                <div class="mt-5" id="logo" >
                    <a href="/">
                    <img class="pr-5" src="/storage/portfolio-art-studio-cafe.svg" alt="Portfolio galerija" style="max-width: 100%"></a>
                </div>
                <div class="" >
                    <i class="py-4 port port-d-add port-lg" onclick="document.getElementById('plus').classList.toggle('port-rotate-45'); document.getElementById('nav').classList.toggle('d-none'); document.getElementById('content').classList.toggle('d-none');" id="plus"></i>

                    <div class="d-none menu-list pb-4" id="nav">
                        <div><a href="/parodos" class="menu-link @if(Request::is('parodos') || Request::is('parodos/*')) active @endif">PARODOS</a></div>
                        <div><a href="/menininkai" class="menu-link @if(Request::is('menininkai') || Request::is('menininkai/*')) active @endif">MENININKAI</a></div>
                        <div><a href="/renginiai" class="menu-link @if(Request::is('renginiai') || Request::is('renginiai/*')) active @endif">RENGINIAI</a></div>
                        <div><a href="/dizainas" class="menu-link @if(Request::is('dizainas') || Request::is('dizainas/*')) active @endif">DIZAINAS</a></div>
                        <div><a href="/fotografija" class="menu-link @if(Request::is('fotografija') || Request::is('fotografija/*')) active @endif">FOTOGRAFIJA</a></div>
                        <div><a href="/dirbtuves" class="menu-link @if(Request::is('dirbtuves') || Request::is('dirbtuves/*')) active @endif">DIRBTUVES</a></div>
                        <div><a href="/meniu" class="menu-link @if(Request::is('meniu') || Request::is('menu/*')) active @endif">MENIU</a></div>
                        <div><a href="/ledai" class="menu-link @if(Request::is('ledai') || Request::is('ledai/*')) active @endif">LEDAI</a></div>
                        <div><a href="/nuoma" class="menu-link @if(Request::is('nuoma') || Request::is('nuoma/*')) active @endif">NUOMA</a></div>
                        <div><a href="/kontaktai" class="menu-link @if(Request::is('kontaktai') || Request::is('kontaktai/*')) active @endif">KONTAKTAI</a></div>
                    </div>
                </div>
            </div>
            
            <div class="content" id="content" style="text-align: center;">
                @if(isset($page) && Request::is('index') == false)
                    <div class="page-text ml-auto mr-auto px-3" style="max-width: 500px;">
                        <div>
                            {!!data_get($page, 'data.text')!!}
                        </div>
                    </div>
                @endif

                <div class="page">
                    @yield('content')
                </div>
            </div>
        </div>

{{--         <div class="app" id="app">
            <nav class="navbar" role="navigation" aria-label="main navigation">
                <div class="navbar-brand">
                    <a class="navbar-item" href="/" id="port-logo" style="justify-content: space-between;">
                        <img src="/storage/portfolio-logo.svg" alt="Portfolio galerija">
                    </a>

                    <div style="position: absolute; right: 20px;" class="navbar-burger is-hidden-tablet" id="hamburger" onclick="document.getElementById('hamburger').classList.toggle('is-active'); document.getElementById('mobile-navigation').classList.toggle('is-active');">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <br>

                    <img class="d-none d-md-inline" style="margin-top: 116px; position: absolute; right: 37px;"src="/storage/esi-sukurtas-kad-kurtum.svg" alt="esi sukurtas, kad kurtum">

                </div>
                <div class="navbar-menu is-hidden-tablet is-hidden-desktop is-hidden-widescreen is-hidden-fullhd" id="mobile-navigation">
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
                            <a class="contact-link" href="tel:+37062768061"><i class="contact-icon port port-phone-2"></i></a>
                            <a href="mailto:info@portfoliogalerija.lt"><i class="contact-icon port port-email-83-2"></i></a>
                            <a href="https://goo.gl/maps/Ep7NFW9uCh42"><i class="contact-icon port port-pin-3" target="_blank"></i></a>
                            <i class="contact-icon port port-logo-instagram"></i>
                            <i class="contact-icon port port-logo-fb-simple"></i>
                        </div>
                    </div>
                    <div class="navbar-end">
                        <a class="navbar-item">

                        </a>
                    </div>
                </div>
            </nav>
            <section class="" style="margin: 28px 40px;">
                <div class="row">
                    <div class="d-none d-md-block col-md-4 col-lg-3">
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
                            <a class="contact-link" href="tel:+37062737154"><i class="contact-icon port port-phone-2"></i></a>
                            <a href="mailto:info@portfoliogalerija.lt"><i class="contact-icon port port-email-83-2"></i></a>
                            <a href="https://goo.gl/maps/7LG3Gp5Dt6S2" target="blank"><i class="contact-icon port port-pin-3" ></i></a>
                            <a href="https://www.instagram.com/portfolio.cafe/" target="blank"><i class="contact-icon port port-logo-instagram"></i></a>
                            <a href="https://www.facebook.com/portfoliobirzai" target="blank"><i class="contact-icon port port-logo-fb-simple"></i></a>
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
                    <div class="col-12 col-md-8 col-lg-9">
                        @yield('content')
                    </div>
                </div>
            </section>
        </div> --}}
        <script src="{!! mix('js/app.js') !!}" type="text/javascript"></script>
        @yield('scripts')
    </body>
</html>