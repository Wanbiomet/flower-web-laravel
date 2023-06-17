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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
                    <input type="text" name="search" placeholder="Nhập để tìm kiếm...">
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
                        <input type="text" name="search" placeholder="Nhập để tìm kiếm...">
                        <button type="submit">
                            <div class="search-btn">
                                <i class="fas fa-search"></i>
                            </div>
                        </button>
                    </div>
                </form>
                <ul class="nav__mobile-list">
                    <li><a class="nav__mobile-link" href="http://flower-web.test/">Trang chủ</a></li>
                    <li><a class="nav__mobile-link" href="#">Dịp <i class='bx bx-chevron-right'></i></a>
                        <ul class="nav__mobile-submenu ">
                            @foreach($occasions as $item)
                            <li> <a href="/filterby/{{$item['occasion_id']}}/occasion">{{$item['occasion_name']}}</a> </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a class="nav__mobile-link" href="#">Đối Tượng <i class='bx bx-chevron-right'></i></a>
                        <ul class="nav__mobile-submenu">
                            <li> <a href="#">Người yêu</a> </li>
                            <li> <a href="#">Bạn bè</a> </li>
                            <li> <a href="#">Vợ và chồng</a> </li>
                            <li> <a href="#">Người thân</a> </li>
                            <li> <a href="#">Sếp</a> </li>
                            <li> <a href="#">Đồng nghiệp</a> </li>
                        </ul>
                    </li>
                    <li><a class="nav__mobile-link" href="#">Loại Hoa <i class='bx bx-chevron-right'></i></a>
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
                            <li><a href="/show-order"><i class='bx bx-check-square'>Đơn hàng</i></a> </li>
                            <li><a href="/profile"><i class='bx bx-user-circle'>Thông tin cá nhân</i></a> </li>
                            <li><a href="/profile"><i class='bx bx-edit'>Chỉnh sửa hồ sơ</i></a></li>
                            <li><a href="/logout"><i class='bx bx-log-out-circle'>Đăng xuất</i></a></li>
                        </ul>

                    </div>
                </div>
                @else
                <a class="action" href="/login">
                    <div class="btn-auth">Đăng nhập</div>
                </a>
                @endauth
            </div>
        </div>
        <div class="head_search">
            <nav class="navbar">
                <ul>
                    <li><a href="http://flower-web.test/">Trang chủ</a></li>
                    <li><a href="#">Dịp</a>
                        <i class='bx bx-chevron-down arrow occasion-arrow'></i>
                        <ul>
                            @foreach($occasions as $item)
                            <li> <a href="/filterby/{{$item['occasion_id']}}/occasion">{{$item['occasion_name']}}</a> </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="#">Đối Tượng</a>
                        <i class='bx bx-chevron-down arrow object-arrow'></i>
                        <ul>
                            <li> <a href="#">Người yêu</a> </li>
                            <li> <a href="#">Bạn bè</a> </li>
                            <li> <a href="#">Vợ và chồng</a> </li>
                            <li> <a href="#">Người thân</a> </li>
                            <li> <a href="#">Sếp</a> </li>
                            <li> <a href="#">Đồng nghiệp</a> </li>
                        </ul>
                    </li>
                    <li><a href="#">Loại Hoa</a>
                        <i class='bx bx-chevron-down arrow design-arrow'></i>
                        <ul>
                            @foreach($flowertypes as $item)
                            <li> <a href="/filterby/{{$item['flowertype_id']}}/type">{{$item['flowertype_name']}}</a> </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="#review">Giới thiệu</a></li>
                    <li><a href="#contact">Liên hệ</a></li>
                </ul>

            </nav>
        </div>
    </header>
    @yield('content')
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Truy cập nhanh</h3>
                <a href="#">trang chủ</a>
                <a href="#">Về chúng tôi</a>
                <a href="#">Sản phẩm</a>
                <a href="#">giới thiệu</a>
                <a href="#">liên hệ</a>
            </div>
            <div class="box">
                <h3>Liên kết phụ</h3>
                <a href="#">Tài khoản cá nhân</a>
                <a href="#">Đơn hàng của tôi</a>
                <a href="#">Danh mục yêu thích</a>
            </div>
            <div class="box">
                <h3>Địa chỉ</h3>
                <a href="#">Ý</a>
                <a href="#">Mỹ</a>
                <a href="#">Nhật bản</a>
                <a href="#">Pháp</a>
            </div>
            <div class="box">
                <h3>Thông tin liên hệ</h3>
                <a href="#">HOTLINE: +084369495084</a>
                <a href="#">EMAIL: QuangHoaTuoi@gmail.com</a>
                <a href="#">FACEBOOK: quanghoatuoishop</a>
                <a href="#">VĂN PHÒNG: Tầng 81,LandMark 81, District Binh Thach, City Ho Chi Minh</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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