
<!-- NAV ELEMENT START-->
<nav class="navbar navbar-expand-md navbar-dark" id="headerNav">

    <!-- DIV CONTAINER FLUID START-->
    <div class="container-fluid">

        <!-- "Solkari" home menu button -->
        <a class="navbar-brand" href="{{ url('/') }}">

            {{ config('lorekeeper.settings.site_name', 'Solkari') }}
        </a>

<!-- Mobile shrinking button -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">

            <!-- The 3 Line menu button--> <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Div Collapse Navbar tag-->

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- LEFT SIDE NAV BAR -->

            <ul class="navbar-nav ml-auto">

                <!-- NEWS link-->
                <li class="nav-item">
                    @if(Auth::check() && Auth::user()->is_news_unread && Config::get('lorekeeper.extensions.navbar_news_notif'))
                        <a class="nav-link d-flex text-warning" href="{{ url('news') }}"><strong>News</strong><i class="fas fa-bell"></i></a>
                    @else
                        <a class="nav-link" href="{{ url('news') }}">News</a>
                    @endif
                </li>

<!-- SALES link-->
                <li class="nav-item">
                    @if(Auth::check() && Auth::user()->is_sales_unread && Config::get('lorekeeper.extensions.navbar_news_notif'))
                        <a class="nav-link d-flex text-warning" href="{{ url('sales') }}"><strong>Adopts</strong><i class="fas fa-bell"></i></a>
                    @else
                        <a class="nav-link" href="{{ url('sales') }}">Adopts</a>
                    @endif
                </li>



                <!-- @/if means items that check against login -->

                @if(Auth::check())

                    <li class="nav-item dropdown">

                        <!-- Home dropdown-->

                        <a id="inventoryDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Home
                        </a>
<!-- Characters link-->
                        <div class="dropdown-menu" aria-labelledby="inventoryDropdown">
                            <a class="dropdown-item" href="{{ url('characters') }}">
                                My Residents
                            </a>
<!-- MYO slot link-->
                            <a class="dropdown-item" href="{{ url('characters/myos') }}">
                                My MYO Slots
                            </a>

                            <!-- Divider-->
<div class="dropdown-divider"></div>

<!-- inventory link-->
                            <a class="dropdown-item" href="{{ url('inventory') }}">
                                Inventory
                            </a>
<!-- Bank link-->
                            <a class="dropdown-item" href="{{ url('bank') }}">
                                Bank
                            </a>

                            <!-- Divider-->
<div class="dropdown-divider"></div>

<!-- bug report link-->
<a class="dropdown-item" href="{{ url('reports/bug-reports') }}">
    Bug Reports
</a>

                        </div> <!-- End of Home dropdown-->

                    </li>


                @endif
                <!-- End if tag for Signed in requirement-->

 <!-- ACTIVITIES dropdown start-->

 <li class="nav-item dropdown">

    <a id="queueDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Activity
    </a>

    <div class="dropdown-menu" aria-labelledby="queueDropdown">

<!-- Gallery link-->

<a class="dropdown-item" href="{{ url('gallery') }}">Gallery</a>

<!-- Prompts link-->
    <a class="dropdown-item" href="{{ url('prompts/prompts') }}">
        Prompts
    </a>
<!-- Divider-->
<div class="dropdown-divider"></div>
<!--shops link-->
    <a class="dropdown-item" href="{{ url('shops') }}">
        Shops
    </a>

    <a class="dropdown-item" href="{{ url('lore') }}">
        Lore
    </a>

<!-- Divider-->
<div class="dropdown-divider"></div>

<!-- Chara. Masterlist link-->
<a class="dropdown-item" href="{{ url('masterlist') }}">
Resident Masterlist
</a>

<!-- MYO slot masterlist link-->
<a class="dropdown-item" href="{{ url('myos') }}">
MYO Slot Masterlist
</a>

<a class="dropdown-item" href="{{ url('myo')}}">
MYO Guide
</a>

<!-- Divider-->
<div class="dropdown-divider"></div>

<!-- Raffles link-->
<a class="dropdown-item" href="{{ url('raffles') }}">
Raffles
</a>

<a class="dropdown-item" href="{{ url('faq') }}">
    FAQ
    </a>




    </div>
<!-- End of activities DIV-->
</li>
<!-- End of Activities drop down-->


            </ul> <!-- End navbar-nav class-->


            <!--RIGHT SIDE Navbar -->

            <ul class="navbar-nav ml-auto">

                <!-- Authentication Links -->

                @guest <!-- start of login | register and Submit | Profile-->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else

                <!-- MOD CROWN LINK-->
                    @if(Auth::user()->isStaff)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin') }}"><i class="fas fa-crown"></i></a>
                        </li>
                    @endif
                    <!-- Notification link-->
                    @if(Auth::user()->notifications_unread)
                        <li class="nav-item">
                            <a class="nav-link btn btn-secondary btn-sm" href="{{ url('notifications') }}"><span class="fas fa-envelope"></span> {{ Auth::user()->notifications_unread }}</a>
                        </li>
                    @endif

<!-- SUBMIT Dropdown start-->
                    <li class="nav-item dropdown">
                        <a id="browseDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Submit
                        </a>

<!-- submit prompt link-->
                        <div class="dropdown-menu" aria-labelledby="browseDropdown">
                            <a class="dropdown-item" href="{{ url('submissions/new') }}">
                                Submit Prompt
                            </a>

                            <!--Submit claim link-->
                            <a class="dropdown-item" href="{{ url('claims/new') }}">
                                Submit Claim
                            </a>

                            <!--submit report link-->
                            <a class="dropdown-item" href="{{ url('reports/new') }}">
                                Submit Report
                            </a>

                        </div>
                        <!-- End DIV for submit dropdown-->
                    </li>
<!-- End Submit list-->

<!-- PROFILE Dropdown start-->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ Auth::user()->url }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ Auth::user()->url }}">
                                Profile
                            </a>

                            <!-- notificiations link dropdown-->
                            <a class="dropdown-item" href="{{ url('notifications') }}">
                                Notifications
                            </a>

                            <!-- bookmarks link-->
                            <a class="dropdown-item" href="{{ url('account/bookmarks') }}">
                                Bookmarks
                            </a>

                            <!--setting link-->
                            <a class="dropdown-item" href="{{ url('account/settings') }}">
                                Settings
                            </a>

                            <!-- Logout option-->
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
<!--logout function-->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div> <!-- End DIV for profile dropdown-->
                    </li> <!--end profile list-->
                @endguest <!-- contains login|Register but also if logged in, the profile|Submit dropdown-->
            </ul> <!-- End of Right navbar listings-->
        </div> <!-- End Collapse Navbar Div-->
    </div> <!-- End Container fluid DIV-->
</nav> <!-- End of entire Navbar-->
