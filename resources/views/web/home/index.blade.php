<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{asset('web/images/')}}/logo.png">
    <title>Kết Nối Phụ Nữ</title>
    <link rel="stylesheet" href="{{asset('web/css/')}}/style.css">
    <link rel="stylesheet" href="{{asset('web/css/')}}/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('web/css/')}}/main.css">
    <link rel="stylesheet" href="{{asset('web/css/')}}/responsive.css">
    <link rel="stylesheet" href="{{asset('web/css/')}}/all.min.css" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('web/css/')}}/swiper-bundle.min.css" />

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="{{asset('web/css/')}}/fonts.googleapis.css2.css" rel="stylesheet">

    <!-- boostrap -->
    <script src="{{asset('web/js/')}}/jquery-3.3.1.slim.min.js"></script>
    <script src="{{asset('web/js/')}}/popper.min.js"></script>
    <script src="{{asset('web/js/')}}/bootstrap.min.js"></script>

    <!-- meta -->
    <meta name="title" content="ketnoiphunu.com" />
    <meta name="author" content="ketnoiphunu.com" />
    <meta name="description" content="ketnoiphunu.com">
    <meta name="keywords" content="ketnoiphunu.com">
    <meta name="author" content="ketnoiphunu.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <meta name="robots" content="index,follow" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="ketnoiphunu.com" />
    <meta property="og:image" content="{{asset('web/images/')}}/logo.png">
    <meta property="og:description" content="ketnoiphunu.com" />
</head>

<body>

<!-- LOADING -->
<div class="loading centering">
    <img src="" alt="">
    <img src="" alt="">
</div>

<!-- HEADER MOBILE -->
<div class="header-mobile hide-on-pc">
    <div class="header-mobile-right">
        <img  src="{{asset('web/images/')}}/logo.png" alt="">
    </div>
    <div class="header-mobile-left">
        <div class="header-mobile-icon centering" onclick="toggleNavMobile()">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>
</div>

<!-- NAV MOBILE -->
<div class="soft-menu" onclick="toggleNavMobile()">
    <ul class="soft-menu__list" onclick="{(e) => e.stopPropagation();}">
        <li onclick="toggleNavMobile()" class="soft-menu__item soft-menu__item--active">
            <a class="" href="#about" data-address="about">
                <i class="fa-solid fa-user-group"></i>Về chúng tôi
            </a>
        </li>
        <li class="soft-menu__item hehe">
            <a class="" href="#product" data-address="machine">
                <i class="fa-solid fa-cart-shopping"></i>Sản phẩm nổi bật
            </a>

            <!-- sub -->
        <li onclick="toggleNavMobile()" class="soft-menu__item soft-menu__item-sub">
            <a class="" href="#policy" data-address="service">
                <i class="fa-solid fa-book"></i>Chính sách
            </a>
        </li>
        <li onclick="toggleNavMobile()" class="soft-menu__item soft-menu__item-sub">
            <a class="" href="#feedback" data-address="vision">
                <i class="fa-solid fa-comments"></i>Phản hồi khách hàng
            </a>
        </li>

        <li onclick="toggleNavMobile()" class="soft-menu__item soft-menu__item-sub">
            <a class="" href="{{route('us.login.index')}}" data-address="vision">
                <i class="fa-solid fa-right-to-bracket"></i> Đăng nhập
            </a>
        </li>

        <div id="registerMobile" class="soft-menu__item soft-menu__item-sub" type="button">
            <a href="{{route('us.register')}}" data-address="vision">
                <i class="fa-sharp fa-solid fa-user-plus"></i> Đăng ký
            </a>
        </div>
    </ul>
</div>

<!-- HEADER -->
<div class="header-wrapper hidden-m hidden-tl">

    <div class="container">
        <div class="row">
            <!-- HEADER TITLE -->
            <div class="col-lg-2 hidden-m-t">
                <div class="header-title centering">
                    <a href="{{route('w.home')}}">
                        <img style="width: 50%" src="{{asset('web/images/')}}/logo.png" alt="">
                    </a>
                </div>
            </div>

            <!-- HEADER -->
            <header class="header col-lg-10 hidden-m-t">
                <a href="#about" class="header-item active">
                    Về chúng tôi
                </a>

                <a href="#product" class="header-item">
                    Sản phẩm nổi bật
                </a>

                <a href="#policy" class="header-item">
                    Chính sách
                </a>

                <a href="#feedback" class="header-item">
                    Phản hồi khách hàng
                </a>

                <div class="header-buttons">
                    <a href="{{route('us.login.index')}}">
                        <div class="header-item second-primary" type="button">
                            Đăng nhập
                        </div>
                    </a>

                    <a href="{{route('us.register')}}">
                        <div class="header-item centering header-button" type="button">
                            Đăng ký
                        </div>
                    </a>
                </div>

            </header>
        </div>
    </div>
</div>

<!-- INTRO CART -->
<div class="intro-cart">
    <div class="container">
        <img src="{{asset('web/images/backgroundHome.jpg')}}" alt="">
{{--        <div class="row centering">--}}
{{--            <div class="col-lg-9">--}}
{{--                <div class="cart-content">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6 col-12 centering">--}}
{{--                            <img src="{{asset('web/images/logo.png')}}" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 col-12">--}}
{{--                            <div class="cart-content-right">--}}
{{--                                <div class="cart-content-title">--}}
{{--                                    Kết Nối Phụ Nữ--}}
{{--                                </div>--}}
{{--                                <div class="cart-content-desc">--}}
{{--                                    Sứ mệnh của chúng tôi--}}
{{--                                </div>--}}
{{--                                <div class="cart-content-li">--}}
{{--                                    Thân Khỏe--}}
{{--                                </div>--}}
{{--                                <div class="cart-content-li">--}}
{{--                                    Tâm An--}}
{{--                                </div>--}}
{{--                                <div class="cart-content-li">--}}
{{--                                    Trí Minh--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-12 centering">--}}
{{--                            <div class="intro-button header-item centering header-button">--}}
{{--                                <a target="_blank" href="">--}}
{{--                                    Khám phá--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <div id="about" class="intro-bottom">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" preserveAspectRatio="none"
             viewBox="0 0 950 291.6" class="" fill="rgba(255, 255, 255, 1)">
            <defs>
                <style>
                    .cls-clnFoz {
                        opacity: 0.1;
                    }

                    .cls-jiZEDb {
                        opacity: 0.3;
                    }
                </style>
            </defs>
            <path class="cls-clnFoz" d="M401.5,270.1,0-.6H950L546.5,270.3A136.9,136.9,0,0,1,401.5,270.1Z"
                  transform="translate(0 0.6)"></path>
            <path class="cls-jiZEDb" d="M401.5,260.5,0-.6H950L546.5,260.6A136.9,136.9,0,0,1,401.5,260.5Z"
                  transform="translate(0 0.6)"></path>
            <path class="cls-veFcxo" d="M401.5,250.8,0-.6H950L546.5,251A136.9,136.9,0,0,1,401.5,250.8Z"
                  transform="translate(0 0.6)"></path>
        </svg>
    </div>
</div>

<!-- ABOUT -->
<div class="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{asset('web/images/')}}/traphonhi.jpg" alt="Kết Nối Phụ Nữ">
            </div>
            <div class="col-lg-6">
                <div class="partner-title primary-title">
                    VỀ CHÚNG TÔI
                </div>
                <div class="paragraph mt-2">
                    Là thương hiệu tiên phong kết hợp hoàn hảo giữa mô hình kinh doanh hiện đại và truyền thống trong lĩnh vực hỗ trợ các giải pháp giúp phụ nữ khởi nghiệp tại Việt Nam.
                </div>
                <div class="paragraph">
                    Phụ Nữ Khởi Nghiệp hoạt động trên nền kinh tế chia sẻ, ứng dụng công nghệ thông minh giúp tự động hóa quy trình hoạt động, giải quyết bài toán tối ưu hóa chi phí và tối đa hóa lợi ích cho khách hàng và người bán hàng.
                </div>
{{--                <div class="paragraph">--}}
{{--                    Hoạt động dưới sự Bảo trợ của Viện Khoa Học Giáo dục & Môi Trường và Viện Nghiên Cứu Phát Triển Y Dược Việt.--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>

<!-- U KNOW -->
<div class="u-know">
    <div class="container">
        <div class="partner-title primary-title">
            BẠN CÓ BIẾT?
        </div>
        <div class="u-know-desc linhga">
            Những căn bệnh nguy hiểm đang dần “trẻ hóa”, ảnh hưởng nghiêm trọng đến tuổi thọ con người
            <br>
            Theo thống kê tại Việt Nam
        </div>

        <div class="row mt-5">
            <div class="col-lg-3 col-6">
                <div class="u-know-cart">
                    <div class="u-know-cart-img">
                        <img src="{{asset('web/images/')}}/u-know-1.jpg" alt="">
                    </div>
                    <div class="u-know-cart-title text-center">
                        Đột quỵ
                    </div>
                    <div class="u-know-cart-desc text-center">
                        Có đến 10% người
                        <br> bị đột quỵ ở độ tuổi
                        <br> 18 - 35
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="u-know-cart">
                    <div class="u-know-cart-img">
                        <img src="{{asset('web/images/')}}/u-know-2.jpg" alt="">
                    </div>
                    <div class="u-know-cart-title text-center">
                        Cao huyết áp
                    </div>
                    <div class="u-know-cart-desc text-center">
                        Tỷ lệ từ 5% - 12%
                        <br> phổ biến ở người trẻ
                        <br> dưới 35 tuổi
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="u-know-cart">
                    <div class="u-know-cart-img">
                        <img src="{{asset('web/images/')}}/u-know-3.jpg" alt="">
                    </div>
                    <div class="u-know-cart-title text-center">
                        Tiểu đường
                    </div>
                    <div class="u-know-cart-desc text-center">
                        Những người dưới 20 tuổi
                        <br> mắc bệnh tiểu đường tuýp 2
                        <br> không còn hiếm
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="u-know-cart">
                    <div class="u-know-cart-img">
                        <img src="{{asset('web/images/')}}/u-know-4.jpg" alt="">
                    </div>
                    <div class="u-know-cart-title text-center">
                        HIV/AIDS
                    </div>
                    <div class="u-know-cart-desc text-center">
                        Tỷ lệ người trẻ mắc bệnh
                        <br> ngày càng tăng do sự
                        <br> thiếu hiểu biết
                    </div>
                </div>
            </div>

            <div class="col-12 mt-4">
                <div class="centering">
                    <div class="u-know-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                             preserveAspectRatio="none" viewBox="0 0 378.41 72.06" class=""
                             fill="rgba(0, 128, 55, 1)">
                            <polygon
                                points="362.56 72.06 15.85 72.06 0 36.45 15.85 0 362.56 0 378.41 36.45 362.56 72.06">
                            </polygon>
                        </svg>
                        <div class="u-know-button-text">
                            Quan tâm là chưa đủ, chúng ta cần hành động ngay
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- WE KNOW -->
<div class="we">
    <div class="container">
        <div class="row">
            <div class="col-lg-5" style="text-align: center;">
                <img src="{{asset('web/images/')}}/logo.png" alt="Kết Nối Phụ Nữ" style="width:300px;">
            </div>

            <div class="col-lg-7">
                <div class="we-title">
                    CHÚNG TÔI HIỂU RẰNG
                </div>
                <p class="we-paragraph text-light mt-4">
                    Sức khỏe là nền tảng cơ bản của một cuộc sống hạnh phúc, là cơ sở để con
                    người hiện thực hóa
                    lý tưởng cuộc đời mình
                    <br><br>
                    “Khi có sức khỏe, ta có cả ngàn ước mơ
                    <br>
                    Khi không có sức khỏe,
                    ước mơ duy nhất là có
                    được sức khỏe”
                    <br><br>
                    Hãy để <b>Kết Nối Phụ Nữ</b> bảo vệ sức khỏe bạn ngay từ hôm nay
                </p>
                <div class="centering-mobile" style="margin-bottom: 10px;">
                    <div id="product" class="we-button" type="button" class="btn btn-primary" data-toggle="modal"
                         data-target="#exampleModal">
                        Hành động
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SPECIAL PRODUCT -->
<div class="product mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-2">
                <div class="centering">
                    <div class="partner-title primary-title text-center">
                        SẢN PHẨM NỔI BẬT
                    </div>
                </div>
            </div>

            <div class="col-12">
                <!-- PARTNER -->
                <div id="partner" class="partner">
                    <div class=" mt-3">
                        <div class="swiper swiper-partner">
                            <div class="swiper-wrapper">

                                @foreach($product_hots as $product)
                                <div class="swiper-slide">
                                    <a class="product-cart">
                                        <div class="product-cart-img img-product"
                                             style="background-image: url('{{$product->image}}');">
                                        </div>
                                        <div class="product-cart-content primary-gradient-text-4">
                                            {{$product->name}}
                                        </div>
                                    </a>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<!-- SPECIAL NUMBER -->
<div id="number" class="number">
    <div class="number-boder number-border-top">

        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" preserveAspectRatio="none"
             viewBox="0 0 1920 148" class="" fill="rgba(255, 255, 255, 1)">
            <defs>
                <style>
                    .cls-hblThq {
                        opacity: 0.1;
                    }

                    .cls-wFlCxx {
                        opacity: 0.3;
                    }
                </style>
            </defs>
            <path class="cls-hblThq"
                  d="M1920,148H0L71.8,29.4A90.2,90.2,0,0,1,203.7,28l8.3,8.7a90.2,90.2,0,0,0,133-2.7l.2-.2a90.2,90.2,0,0,1,134.4-1.3l2.5,2.7a90.2,90.2,0,0,0,133.2,0l3.8-4.2a90.2,90.2,0,0,1,133.2,0l3.9,4.3a90.2,90.2,0,0,0,133.1.1l4.2-4.6a90.2,90.2,0,0,1,133,0l4.1,4.5a90.2,90.2,0,0,0,133.2-.2l3.7-4a90.2,90.2,0,0,1,133.2-.2l4.1,4.5a90.2,90.2,0,0,0,133,0l2.8-3.1A90.2,90.2,0,0,1,1575,33.8h0a90.2,90.2,0,0,0,133.1,2.9l8.3-8.7a90.2,90.2,0,0,1,131.9,1.5Z"
                  transform="translate(0 0)"></path>
            <path class="cls-wFlCxx"
                  d="M1920,148H0L71.8,49.4A90.2,90.2,0,0,1,203.7,48l8.3,8.7a90.2,90.2,0,0,0,133-2.7l.2-.2a90.2,90.2,0,0,1,134.4-1.3l2.5,2.7a90.2,90.2,0,0,0,133.2,0l3.8-4.2a90.2,90.2,0,0,1,133.2,0l3.9,4.3a90.2,90.2,0,0,0,133.1.1l4.2-4.6a90.2,90.2,0,0,1,133,0l4.1,4.5a90.2,90.2,0,0,0,133.2-.2l3.7-4a90.2,90.2,0,0,1,133.2-.2l4.1,4.5a90.2,90.2,0,0,0,133,0l2.8-3.1A90.2,90.2,0,0,1,1575,53.8h0a90.2,90.2,0,0,0,133.1,2.9l8.3-8.7a90.2,90.2,0,0,1,131.9,1.5Z"
                  transform="translate(0 0)"></path>
            <path class="cls-wjQsCO"
                  d="M1920,148H0L71.8,69.4A90.2,90.2,0,0,1,203.7,68l8.3,8.7a90.2,90.2,0,0,0,133-2.7l.2-.2a90.2,90.2,0,0,1,134.4-1.3l2.5,2.7a90.2,90.2,0,0,0,133.2,0l3.8-4.2a90.2,90.2,0,0,1,133.2,0l3.9,4.3a90.2,90.2,0,0,0,133.1.1l4.2-4.6a90.2,90.2,0,0,1,133,0l4.1,4.5a90.2,90.2,0,0,0,133.2-.2l3.7-4a90.2,90.2,0,0,1,133.2-.2l4.1,4.5a90.2,90.2,0,0,0,133,0l2.8-3.1A90.2,90.2,0,0,1,1575,73.8h0a90.2,90.2,0,0,0,133.1,2.9l8.3-8.7a90.2,90.2,0,0,1,131.9,1.5Z"
                  transform="translate(0 0)"></path>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" preserveAspectRatio="none"
             viewBox="0 0 1920 148" class="" fill="rgba(255, 255, 255, 1)">
            <defs>
                <style>
                    .cls-hblThq {
                        opacity: 0.1;
                    }

                    .cls-wFlCxx {
                        opacity: 0.3;
                    }
                </style>
            </defs>
            <path class="cls-hblThq"
                  d="M1920,148H0L71.8,29.4A90.2,90.2,0,0,1,203.7,28l8.3,8.7a90.2,90.2,0,0,0,133-2.7l.2-.2a90.2,90.2,0,0,1,134.4-1.3l2.5,2.7a90.2,90.2,0,0,0,133.2,0l3.8-4.2a90.2,90.2,0,0,1,133.2,0l3.9,4.3a90.2,90.2,0,0,0,133.1.1l4.2-4.6a90.2,90.2,0,0,1,133,0l4.1,4.5a90.2,90.2,0,0,0,133.2-.2l3.7-4a90.2,90.2,0,0,1,133.2-.2l4.1,4.5a90.2,90.2,0,0,0,133,0l2.8-3.1A90.2,90.2,0,0,1,1575,33.8h0a90.2,90.2,0,0,0,133.1,2.9l8.3-8.7a90.2,90.2,0,0,1,131.9,1.5Z"
                  transform="translate(0 0)"></path>
            <path class="cls-wFlCxx"
                  d="M1920,148H0L71.8,49.4A90.2,90.2,0,0,1,203.7,48l8.3,8.7a90.2,90.2,0,0,0,133-2.7l.2-.2a90.2,90.2,0,0,1,134.4-1.3l2.5,2.7a90.2,90.2,0,0,0,133.2,0l3.8-4.2a90.2,90.2,0,0,1,133.2,0l3.9,4.3a90.2,90.2,0,0,0,133.1.1l4.2-4.6a90.2,90.2,0,0,1,133,0l4.1,4.5a90.2,90.2,0,0,0,133.2-.2l3.7-4a90.2,90.2,0,0,1,133.2-.2l4.1,4.5a90.2,90.2,0,0,0,133,0l2.8-3.1A90.2,90.2,0,0,1,1575,53.8h0a90.2,90.2,0,0,0,133.1,2.9l8.3-8.7a90.2,90.2,0,0,1,131.9,1.5Z"
                  transform="translate(0 0)"></path>
            <path class="cls-wjQsCO"
                  d="M1920,148H0L71.8,69.4A90.2,90.2,0,0,1,203.7,68l8.3,8.7a90.2,90.2,0,0,0,133-2.7l.2-.2a90.2,90.2,0,0,1,134.4-1.3l2.5,2.7a90.2,90.2,0,0,0,133.2,0l3.8-4.2a90.2,90.2,0,0,1,133.2,0l3.9,4.3a90.2,90.2,0,0,0,133.1.1l4.2-4.6a90.2,90.2,0,0,1,133,0l4.1,4.5a90.2,90.2,0,0,0,133.2-.2l3.7-4a90.2,90.2,0,0,1,133.2-.2l4.1,4.5a90.2,90.2,0,0,0,133,0l2.8-3.1A90.2,90.2,0,0,1,1575,73.8h0a90.2,90.2,0,0,0,133.1,2.9l8.3-8.7a90.2,90.2,0,0,1,131.9,1.5Z"
                  transform="translate(0 0)"></path>
        </svg>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="centering">
                    <div class="number-title primary-title">
                        NHỮNG CON SỐ ẤN TƯỢNG
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="centering">
                    <div class="number-item">
                        <div class="number-item-icon">
                            <i class="fa-solid fa-user"></i>
                        </div>

                        <div class="number-item-content">
                            <div id="users-count" class="number-item-value">
                                0
                            </div>
                            <div class="number-item-desc">
                                Người đã
                                <br>
                                tin dùng
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="centering">
                    <div class="number-item">
                        <div class="number-item-icon">
                            <i class="fa-solid fa-users"></i>
                        </div>

                        <div class="number-item-content">
                            <div id="ctv-count" class="number-item-value">
                                0+
                            </div>
                            <div class="number-item-desc">
                                Cộng tác
                                <br>
                                viên
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="centering">
                    <div class="number-item">
                        <div class="number-item-icon">
                            <i class="fa-solid fa-gears"></i>
                        </div>

                        <div class="number-item-content">
                            <div id="partner-count" class="number-item-value">
                                0+
                            </div>
                            <div class="number-item-desc">
                                Đối tác
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="centering">
                    <div class="number-item">
                        <div class="number-item-icon">
                            <i class="fa-solid fa-house"></i>
                        </div>

                        <div class="number-item-content">
                            <div id="office-count" class="number-item-value">
                                0+
                            </div>
                            <div class="number-item-desc">
                                Văn phòng đại diện
                                <br>
                                trên toàn quốc
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 mt-5">
                <div class="u-know-desc linhga">
                    Đầu tư vào trí tuệ và sức khỏe là khoản đầu tư không bao giờ lỗ
                    <br>
                    Đó là lý do chúng tôi muốn đồng hành cùng bạn trên hành trình bảo vệ sức khỏe cộng đồng
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SPECIAL PRODUCT -->
<div class="map">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="partner-title primary-title">
                    HỢP TÁC KINH DOANH CÙNG CHÚNG TÔI
                </div>
            </div>

            <div class="col-md-5">
                <img src="{{asset('web/images/')}}/map-left.png" alt="">
            </div>

            <div class="col-md-7">
                <div class="map-img-right centering">
                    <img src="{{asset('web/images/')}}/map.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- STRONG POINT -->
<div class="map">
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <div class="partner-title primary-title mb-3">
                    6 LỢI THẾ VƯỢT TRỘI
                </div>
            </div>

            <div id="policy" class="col-12">
                <img class="hidden-tl hidden-tl hidden-m" src="{{asset('web/images/')}}/6NGANG.png" alt="">
                <div class="centering policy-mobile">
                    <img class="hidden-tl hide-on-pc hidden-pc-low " src="{{asset('web/images/')}}/6DOC.png" alt="">
                </div>
            </div>

        </div>
    </div>
</div>

<!-- POLICY -->
<div class="container">
    <div class="row mt-5">
        <div class="col-md-7">
            <div class="partner-title primary-title">
                CHÍNH SÁCH TRÍ TUỆ
            </div>
            <div class="centering">
                <div class="mt-4">

                    <div class="policy-item">
                        Thưởng thành viên
                    </div>
                    <div class="policy-desc up-tranlate">
                        Thưởng hoa hồng lên đến
                        <span class="policy-value">
                                40%
                            </span>
                    </div>

                    <div class="policy-item">
                        Thưởng lãnh đạo
                    </div>
                    <div class="policy-desc">
                        Ô tô và du lịch nước ngoài
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <img src="{{asset('web/images/')}}/model.png" alt="">
        </div>
    </div>
</div>

<!-- VOUCHER -->
{{--<div class="voucher container mt-5">--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-4">--}}
{{--            <div class="voucher-img">--}}
{{--                <div class="camera-icon hidden-m">--}}
{{--                    <i class="fa-solid fa-camera"></i>--}}
{{--                </div>--}}
{{--                <img src="{{asset('web/images/')}}/Asset 1-02.png" alt="">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="voucher-wrapper centering">--}}
{{--                <div class="voucher-content">--}}
{{--                    <div class="partner-title primary-title centering">--}}
{{--                        CHƯƠNG TRÌNH ƯU ĐÃI ĐẶC BIỆT--}}
{{--                        <div class="airplane">--}}
{{--                            <i class="fa-solid fa-plane"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="paragraph mt-3">--}}
{{--                        Chuyến du lịch khám phá đất nước Hàn Quốc và cơ hội thăm nhà máy sản xuất ECO LIFE - ECO--}}
{{--                        PLUS--}}
{{--                        <br>--}}
{{--                        Doanh số trực tiếp 400 triệu nhận ngay 1 vé--}}
{{--                    </div>--}}

{{--                    <div class="centering-mobile">--}}
{{--                        <a href="{{route('us.register')}}">--}}
{{--                            <div id="feedback" class="we-button voucher-button mt-5" type="button">--}}
{{--                                ĐĂNG KÝ NGAY--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<!-- BOTTOM BG -->
<div class="last-bg">

    <!-- FEEDBACK -->
    <div class="feedback pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="partner-title primary-title">
                        KHÁCH HÀNG NÓI GÌ VỀ CHÚNG TÔI
                    </div>
                    <div class="u-know-desc linhga">
                        Phản hồi thực tế của khách hàng là minh chứng cho thành công của chúng tôi
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <div class="swiper swiper-feedback">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="feedback-cart-wrapper">
                                    <div class="feedback-cart">
                                        <div class="feedback-cart-avt">
                                            <img src="{{asset('web/images/')}}/NGUYENAICHAU2.jpg" alt="">
                                        </div>
                                        <div class="feedback-cart-name">
                                            Chị Nguyễn Ái Châu
                                            <br>
                                            <i>Đối tác</i>
                                        </div>
                                        <div class="feedback-cart-content">
                                            Tôi vô cùng hạnh phúc khi được hợp tác với 1 doanh nghiệp hoạt động về
                                            lĩnh
                                            vực trí tuệ - sức khỏe và lấy điều này làm
                                            giá trị cốt lõi phát triển. Bởi với tôi sức khỏe là yếu tố ưu tiên hàng
                                            đầu
                                            quyết định đến thành công trong cuộc sống.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="feedback-cart-wrapper">
                                    <div class="feedback-cart">
                                        <div class="feedback-cart-avt">
                                            <img src="{{asset('web/images/')}}/NGUYENCONGTOAN.jpg" alt="">
                                        </div>
                                        <div class="feedback-cart-name">
                                            Anh Nguyên Công Toàn
                                            <br>
                                            <i>
                                                Đối tác
                                            </i>
                                        </div>
                                        <div class="feedback-cart-content">
                                            Việc ứng dụng mô hình tiếp thị liên kết vào kinh doanh khiến tôi đánh
                                            giá cao về tiềm năng phát triển của Kết Nối Phụ Nữ. Đó là khi tầm quan trọng của sức khỏe được lan tỏa đến cộng đồng
                                            một cách nhanh nhất giúp mọi người biết quan tâm
                                            bản thân mình nhiều hơn.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="feedback-cart-wrapper">
                                    <div class="feedback-cart">
                                        <div class="feedback-cart-avt">
                                            <img src="{{asset('web/images/')}}/TRANTHAOVAN.png" alt="">
                                        </div>
                                        <div class="feedback-cart-name">
                                            Chị Trần Thảo Vân
                                            <br>
                                            <i>
                                                Cộng tác viên
                                            </i>
                                        </div>
                                        <div class="feedback-cart-content">
                                            Tôi thấy mình may mắn khi được biết đến và làm việc tại Kết Nối Phụ Nữ. Đây không chỉ là nơi mang đến cơ hội thu nhập
                                            cho tôi mà còn giúp tôi hiểu biết nhiều hơn về vai trò của sức khỏe và
                                            trí tuệ. Cảm ơn Kết Nối Phụ Nữ rất nhiều.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="feedback-cart-wrapper">
                                    <div class="feedback-cart">
                                        <div class="feedback-cart-avt">
                                            <img src="{{asset('web/images/')}}/screenshot_1662375519.png" alt="">
                                        </div>
                                        <div class="feedback-cart-name">
                                            Cô Lê Thị Mai Liên
                                            <br>
                                            <i>
                                                Cộng tác viên
                                            </i>
                                        </div>
                                        <div class="feedback-cart-content">
                                            Các chương trình đào tạo tại Kết Nối Phụ Nữ mang đến cho cô rất nhiều
                                            kiến thức giúp cô càng thêm yêu công việc mà
                                            mình lựa chọn. Không phải mất quá nhiều thời gian mà vẫn có thu nhập đều
                                            đặn. Cô cảm ơn Kết Nối Phụ Nữ nhiều lắm.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="feedback-cart-wrapper">
                                    <div class="feedback-cart">
                                        <div class="feedback-cart-avt">
                                            <img src="{{asset('web/images/')}}/PHANQUANGMINH.jpg" alt="">
                                        </div>
                                        <div class="feedback-cart-name">
                                            Anh Phan Quang Minh
                                            <br>
                                            <i>
                                                Đại lý
                                            </i>
                                        </div>
                                        <div class="feedback-cart-content">
                                            Bên cạnh kiến thức và sản phẩm chất lượng, Kết Nối Phụ Nữ khiến tôi vô
                                            cùng hài lòng về các chương trình bán hàng và
                                            chính sách thưởng có giá trị cao. Đây là động lực lớn để những đại lý
                                            như chúng tôi luôn cố gắng làm việc hết mình.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="feedback-cart-wrapper">
                                    <div class="feedback-cart">
                                        <div class="feedback-cart-avt">
                                            <img src="{{asset('web/images/')}}/MACDANGKHOI2.jpg" alt="">
                                        </div>
                                        <div class="feedback-cart-name">
                                            Chú Mạc Đăng Khôi
                                            <br>
                                            <i>
                                                Khách hàng
                                            </i>
                                        </div>
                                        <div class="feedback-cart-content">
                                            Bước qua tuổi 50, vấn đề khiến chú luôn trăn trở, lo âu chính là sức
                                            khỏe của mình. Nhưng kể từ khi chú sử dụng các sản
                                            phẩm bổ sung của Kết Nối Phụ Nữ đã khiến sức khỏe chú cải thiện rất
                                            nhiều, xóa tan mọi lo lắng và an tâm tận hưởng
                                            tuổi già.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- QUESTION -->
    <div class="container">
        <div class="centering">
            <div class="we-title">
                CÂU HỎI THƯỜNG GẶP
            </div>
        </div>
        <div class="row pb-4">
            <div class="col-12">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item question-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="accor-title">
                                    <div class="accor-title-text">
                                        Mình muốn bán hàng tại Kết Nối Phụ Nữ phải bắt đầu từ đâu?
                                    </div>
                                    <div class="accor-title-icon">
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </div>
                                </div>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Liên hệ người giới thiệu để nhận link đăng ký và tham gia các buổi đào tạo về sản
                                phẩm, chính sách kinh doanh. Hoặc đến
                                trực tiếp các văn phòng Kết Nối Phụ Nữ trên toàn quốc để được hướng dẫn cụ thể
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item question-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <div class="accor-title">
                                    <div class="accor-title-text">
                                        Có được lựa chọn sản phẩm để bán không?
                                    </div>
                                    <div class="accor-title-icon">
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </div>
                                </div>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Có, hiện tại chúng tôi đang có 6 dòng sản phẩm chủ lực và hơn 2.000 sản phẩm trên
                                trang TMĐT để thành viên có thể lựa
                                chọn sản phẩm kinh doanh phù hợp
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item question-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <div class="accor-title">
                                    <div class="accor-title-text">
                                        Thu nhập của mình được trả qua đâu?
                                    </div>
                                    <div class="accor-title-icon">
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </div>
                                </div>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Thu nhập tại Kết Nối Phụ Nữ được trả qua hệ thống affiliate về ví tiền thanh toán
                                trong tài khoản cá nhân và có thể
                                rút về tài khoản ngân hàng trong vòng 24h
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item question-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <div class="accor-title">
                                    <div class="accor-title-text">
                                        Sản phẩm ở đây có phải chính hãng không?
                                    </div>
                                    <div class="accor-title-icon">
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </div>
                                </div>
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                100% các sản phẩm chính hãng đều có giấy chứng nhận và được kiểm định bởi Bộ Y Tế
                                Hàn Quốc và Việt Nam
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item question-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <div class="accor-title">
                                    <div class="accor-title-text">
                                        Liên hệ với Kết Nối Phụ Nữ bằng cách nào?
                                    </div>
                                    <div class="accor-title-icon">
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </div>
                                </div>
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Có 3 cách để bạn có thể liên hệ trực tiếp với chúng tôi:
                                <br>
                                Hotline: <a href="tel:0847694678">0847 694 678</a>
                                <br>
                                Kênh Zalo: <a href="https://zalo.me/0847694678">Kết Nối Phụ Nữ</a>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- FOOTER -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-title text-center">
                    CÔNG TY TNHH PHỤ NỮ KHỞI NGHIỆP VIỆT NAM
                </div>
            </div>

            <div class="col-lg-6 mt-3">
                <div class="centering h-100">
                    <div class="">
                        <div class="footer-li">
                            <div class="footer-li-icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="footer-li-text">
                                Hotline: <a href="tel:0847694678">0847 694 678</a>
                            </div>
                        </div>
                        <div class="footer-li">
                            <div class="footer-li-icon">
                                <i class="fa-solid fa-earth-americas"></i>
                            </div>
                            <div class="footer-li-text">
                                Website: <a href="https://ketnoiphunu.com" target="_blank"
                                            style="color: #fff;">ketnoiphunu.com</a>
                            </div>
                        </div>
{{--                        <div class="footer-li">--}}
{{--                            <div class="footer-li-icon">--}}
{{--                                <i class="fa-solid fa-envelope"></i>--}}
{{--                            </div>--}}
{{--                            <div class="footer-li-text">--}}
{{--                                Email: <a--}}
{{--                                    href="mailto:trituetunhienvietnam@gmail.com">trituetunhienvietnam@gmail.com</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mt-3">
                <div class="footer-primary">
                    SOCIAL MEDIA
                </div>

                <div class="footer-social centering">
{{--                    <a target="_blank" href="https://www.facebook.com/trituetunhien.official"--}}
{{--                       class="footer-social-item">--}}
{{--                        <img src="{{asset('web/images/')}}/fb.png" alt="">--}}
{{--                    </a>--}}

{{--                    <a target="_blank" href="https://www.youtube.com/channel/UCUM2MbllPdqSwz6KdBFTUhg"--}}
{{--                       class="footer-social-item">--}}
{{--                        <img src="{{asset('web/images/')}}/yb.png" alt="">--}}
{{--                    </a>--}}

                    <a target="_blank" href="https://ketnoiphunu.com" class="footer-social-item">
                        <img src="{{asset('web/images/')}}/logo.png" alt="tttn"
                             style="width: 65px; position: relative; top: -7px;">
                    </a>
                </div>

{{--                <div class="footer-primary mt-4">--}}
{{--                    THÔNG BÁO BỘ CÔNG THƯƠNG--}}
{{--                </div>--}}

{{--                <div class="footer-verify centering">--}}
{{--                    <a href="http://online.gov.vn/Home/WebDetails/96860?AspxAutoDetectCookieSupport=1">--}}
{{--                        <img src="{{asset('web/images/')}}/logoSaleNoti.png" alt="">--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>

<!-- SCROLL TO TOP -->
<div class="scroll-to-top">
    <i class="fa-solid fa-arrow-up"></i>
</div>

<!-- LOADING -->
<div id="loading" class="loading centering">
    <img src="{{asset('web/images/')}}/logo.png" alt="tttn">
    <img src="{{asset('web/images/')}}/loading.gif" alt="">
</div>
</body>

</html>

<script src="{{asset('web/js/')}}/bootstrap.bundle.min.js"></script>

<script src="{{asset('web/js/')}}/swiper-bundle.min.js"></script>

<script src="{{asset('web/js/')}}/main.js"></script>