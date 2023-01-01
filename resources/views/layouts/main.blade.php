<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('/fronted/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/fronted/css/jquery-ui.min.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>@yield('title')</title>
</head>

<body>
    <header>
        <div class="mid_header">
            <input type="checkbox" name="" id="toggler">
            <label for="toggler" class="fas fa-bars"></label>
            <a href="/" class="logo">QHoaTuoi
                <div class="circle">
                    <img src="{{asset('/fronted/images/icon_hoa.png')}}" class="logo_icon" alt="">
                </div>
            </a>
            <form action="{{route('search')}}">
                <div class="search-box">
                    <input type="text" name="search" placeholder="Type something">
                    <button type="submit">
                        <div class="search-btn">
                            <i class="fas fa-search"></i>
                        </div>
                    </button>
                </div>
            </form>

            <label for="toggler" class="over_lay"></label>

            <nav class="nav__mobile">
                <div class="nav__mobile-info">
                    <div class="nav__mobile-user">
                        <i class="fa-sharp fa-solid fa-user-tie"></i>
                        <h1>Quang Nguyen</h1>
                    </div>
                    <label for="toggler" class="nav__mobile-close"><i class="fas fa-times"></i></label>
                </div>
                <form action=" {{route('search')}}">
                    <div class="search-box">
                        <input type="text" name="search" placeholder="Type something">
                        <button type="submit">
                            <div class="search-btn">
                                <i class="fas fa-search"></i>
                            </div>
                        </button>
                    </div>
                </form>
                <ul class="nav__mobile-list">
                    <li><a class="nav__mobile-link" href="#home">Home</a></li>
                    <li><a class="nav__mobile-link" href="#">Occasion <i class='bx bx-chevron-right'></i></a>
                        <ul class="nav__mobile-submenu ">
                            @foreach($occasions as $item)
                            <li> <a href="/filterby/{{$item['occasion_id']}}/occasion">{{$item['occasion_name']}}</a> </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a class="nav__mobile-link" href="#">Object <i class='bx bx-chevron-right'></i></a>
                        <ul class="nav__mobile-submenu">
                            <li> <a href="#">Lover</a> </li>
                            <li> <a href="#">Friend</a> </li>
                            <li> <a href="#">Wife</a> </li>
                            <li> <a href="#">Husband</a> </li>
                            <li> <a href="#">Mothers vs Dads </a> </li>
                            <li> <a href="#">Boss</a> </li>
                            <li> <a href="#">Colleague</a> </li>
                        </ul>
                    </li>
                    <li><a class="nav__mobile-link" href="#">Flowers <i class='bx bx-chevron-right'></i></a>
                        <ul class="nav__mobile-submenu">
                            @foreach($flowertypes as $item)
                            <li> <a href="/filterby/{{$item['flowertype_id']}}/type">{{$item['flowertype_name']}}</a> </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="settings">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="/cart" class="fas fa-shopping-cart"> <span id="cart_count" class="cart_count">0</span></a>
                    <label for="toggler" style=" font-size: 2rem;padding: 0 10px;color: #555;" class="fas fa-search"></label>
                </div>
                @auth
                <div class="user_info">
                    <input type="checkbox" name="" id="toggler">
                    <div class="profile" onclick="menuToggle();">
                        <img src="{{asset('/fronted/images/avatardefault_92824.png')}}" alt="">
                    </div>
                    <div class="menu">
                        <h3>{{auth()->user()->name}}</h3>
                        <ul>
                            <li><a href="/show-order"><i class='bx bx-check-square'>my order</i></a> </li>
                            <li><a href="/profile"><i class='bx bx-user-circle'>my profile</i></a> </li>
                            <li><a href="/profile"><i class='bx bx-edit'>edit profile</i></a></li>
                            <li><a href="/logout"><i class='bx bx-log-out-circle'>logout</i></a></li>
                        </ul>

                    </div>
                </div>
                @else
                <a class="action" href="/login">
                    <div class="btn-auth">Login</div>
                </a>
                @endauth
            </div>
        </div>
        <div class="head_search">
            <nav class="navbar">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#">Occasion</a>
                        <i class='bx bx-chevron-down arrow occasion-arrow'></i>
                        <ul>
                            @foreach($occasions as $item)
                            <li> <a href="/filterby/{{$item['occasion_id']}}/occasion">{{$item['occasion_name']}}</a> </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="#">Object</a>
                        <i class='bx bx-chevron-down arrow object-arrow'></i>
                        <ul>
                            <li> <a href="#">Lover</a> </li>
                            <li> <a href="#">Friend</a> </li>
                            <li> <a href="#">Wife</a> </li>
                            <li> <a href="#">Husband</a> </li>
                            <li> <a href="#">Mothers vs Dads</a> </li>
                            <li> <a href="#">Boss</a> </li>
                            <li> <a href="#">Colleague</a> </li>
                        </ul>
                    </li>
                    <li><a href="#">Flowers</a>
                        <i class='bx bx-chevron-down arrow design-arrow'></i>
                        <ul>
                            @foreach($flowertypes as $item)
                            <li> <a href="/filterby/{{$item['flowertype_id']}}/type">{{$item['flowertype_name']}}</a> </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="#review">Review</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>

            </nav>
        </div>
    </header>
    @yield('content')
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>quick links</h3>
                <a href="#">home</a>
                <a href="#">about</a>
                <a href="#">products</a>
                <a href="#">review</a>
                <a href="#">contact</a>
            </div>
            <div class="box">
                <h3>extra links</h3>
                <a href="#">my account</a>
                <a href="#">my order</a>
                <a href="#">my favorite</a>
            </div>
            <div class="box">
                <h3>locations</h3>
                <a href="#">India</a>
                <a href="#">USA</a>
                <a href="#">Japan</a>
                <a href="#">France</a>
            </div>
            <div class="box">
                <h3>contact info</h3>
                <a href="#">HOTLINE:+084369495084</a>
                <a href="#">EMAIL:QuangHoaTuoi@gmail.com</a>
                <a href="#">FACEBOOK:quanghoatuoishop</a>
                <a href="#">ADDRESS:floor 81,LandMark 81, District Binh Thach, City Ho Chi Minh</a>
                <img src="{{asset('/fronted/images/payment.png')}}" alt="">
            </div>
        </div>
        <div class="credit"> created by <span> CTY TNHH MTV QUANG HOA TUOI</span> </div>
        <button onclick="topFunction()" id="myBtn"><i class='bx bxs-chevrons-up'></i></button>
    </section>
    <script src="{{asset('/fronted/js/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        loadCartCount()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function loadCartCount() {
            $.ajax({
                url: '{{route("loadCartCount")}}',
                dataType: 'json',
                method: 'get',
                success: function(res) {
                    $('#cart_count').html('');
                    $('#cart_count').html(res.count);
                }
            })
        }
        $('.flowertype-filter').click(function() {
            var flowertype = [];
            $('.flowertype-filter').each(function() {
                if ($(this).is(":checked")) {
                    flowertype.push($(this).val())
                }
            })
            Final = flowertype.toString();
            $.ajax({
                url: '{{route("filter")}}',
                type: 'get',
                data: "flowertype=" + Final,
                success: function(res) {
                    if (res.status == 200) {
                        $('#update').html(res.view);
                    }
                }
            })
        })
        $('.occasions').click(function() {
            var occasion = [];
            $('.occasions').each(function() {
                if ($(this).is(":checked")) {
                    occasion.push($(this).val())
                }
            })
            Final = occasion.toString();
            $.ajax({
                url: '{{route("filter")}}',
                type: 'get',
                data: "occasion=" + Final,
                success: function(res) {
                    $('#update').html(res.view);
                }
            })
        })
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('/fronted/js/jquery-ui.min.js')}}"></script>

    <script>
        function handlePlus(e) {
            e.target.parentElement.querySelector('#amount').value++;
        }

        function handleMinus(e) {
            if (e.target.parentElement.querySelector('#amount').value > 1) e.target.parentElement.querySelector('#amount').value--
        }
    </script>
    @yield('script')
</body>





</html>