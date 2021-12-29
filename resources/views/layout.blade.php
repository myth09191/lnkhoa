<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Web đọc truyện hay</title>
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
  <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">

  
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body class="antialiased">


  <!-- menu -->
  <style type="text/css">
 

    #switch_color_chu {
      background: black !important;
      color: white;
    }

    .switch_color {
      background: black;
      color: white;
    }

    .noidung_color {

      color: white;
    }

    .footer {
      margin: center;
    }

    .footer {
      text-align: center;
    }

    .noidungchuong.switch_color_chu {
      background: black;
      color: white;
    }
  </style>

  <nav class="navbar navbar-expand-lg navbar navbar navbar-dark bg-dark" style="font-size: 18px;">
    <div class="container bg-dark">
    <a class="navbar-brand" href="{{url('/')}}">
      <img src="{{asset('public/uploads/logo/logo.png')}}" width="60" height="30" alt="">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link fas fa-home" href="{{url('/')}}">Trang chủ <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fas fa-list-alt" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Danh mục truyện
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            @foreach($danhmuc as $key => $danh)
            <a class="dropdown-item fas fa-list-alt" href="{{url('danh-muc/'.$danh->slug_danhmuc)}}">{{$danh->tendanhmuc}}</a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fas fa-tags" href="nofollow" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Thể loại truyện
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach($theloai as $key => $the)
            <a class="dropdown-item fas fa-tags" href="{{url('the-loai/'.$the->slug_theloai)}}">{{$the->tentheloai}}</a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fas fa-user-circle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           
            @if(auth::check()) {{ Auth::user()->name }} 
            @else
            Đăng nhập
            @endif
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item fas fa-sign-in-alt" href="{{url('login')}}">  Login</a>
            <a class="dropdown-item fab fa-gratipay" href="{{url('yeu-thich')}}">  Truyện yêu thích</a>
            <a class="dropdown-item fas fa-sign-out-alt" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </li>


      </ul>
      <div class="row">
        <div class="col-md-12">

          <!-- Go to www.addthis.com/dashboard to customize your tools -->
          <div class="addthis_inline_share_toolbox"></div>
          <form autocomplete="off" class="form-inline my-2 my-lg-0" action="{{url('tim-kiem')}}" method="GET">
            @csrf
            <input class="form-control mr-sm-2" type="search" name="tukhoa" id="keywords" placeholder="Tìm kiếm tác giả, tên truyện..." aria-label="Search">
            <div id="search_ajax"></div>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
          </form>
        </div>
      </div>
    </div>
    </div>
  </nav>

  <main class="container bg-light">
    @yield('slide')
    @yield('content')
  </main>

  <footer class="text-muted py-5">
    <div class="container bg-dark footer">
      <p class="float-end mb-1 a1">
        <a href="#">Back to top</a>
      </p>
      <p class="a1 mb-1" style="color:white">Trang web đọc truyện với nhìu truyện hay đặc sắc!</p>
      <p class="a1 mb-0" style="color:white"> <a href="{{url('/')}}">Visit the homepage</a> or read our <a href="#">Created by LNKhoa </a>.</p>
    </div>
  </footer>

  

  </div>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
  <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/jquery.dataTables.min')}}" defer></script>
 
  <!-- Tìm kiếm nâng cao -->
  <script type="text/javascript">
    $('#keywords').keyup(function() {
      var keywords = $(this).val();
      if (keywords != '') {
        var _token = $('input[name="_token"]').val();

        $.ajax({
          url: "{{url('/timkiem-ajax')}}",
          method: "POST",
          data: {
            keywords: keywords,
            _token: _token
          },
          success: function(data) {
            $('#search_ajax').fadeIn();
            $('#search_ajax').html(data);
          }
        });

      } else {

        $('#search_ajax').fadeOut();
      }

    });

    $(document).on('click', '.li_search_ajax', function() {
      $('#keywords').val($(this).text());
      $('#search_ajax').fadeOut();
    });
  </script>


  <script type="text/javascript">
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
      dots: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 3
        },
        1000: {
          items: 6
        }
      }
    })
  </script>
  <script type="text/javascript">
    $('.chon-chapter').on('change', function() {
      var url = $(this).val();
      if (url) {
        window.location = url;
      }
      return false;
    });
    current_chapter();

    function current_chapter() {
      var url = window.location.href;
      $('.chon-chapter').find('option[value="' + url + '"]').attr("selected", true);
    }
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      if (localStorage.getItem('switch_color') !== null) {
        const data = localStorage.getItem('switch_color');
        const data_obj = JSON.parse(data);
        $(document.body).addClass(data_obj.class_1);
        $('.noidungchuong').addClass(data_obj.class_2);


        $("select option[value='toi']").attr("selected", "selected");

      }
    });


    $("#switch_color").change(function() {
      $(document.body).toggleClass('switch_color');
      $('.noidungchuong').toggleClass('switch_color_chu');

      if ($(this).val() == 'toi') {
        var item = {
          'class_1': 'switch_color',
          'class_2': 'switch_color_chu'
        }
        localStorage.setItem('switch_color', JSON.stringify(item));
      } else if ($(this).val() == 'sang') {
        localStorage.removeItem('switch_color');
      }





    });
  </script>
  <script>
    show_wishlist();

    function show_wishlist() {
      if (localStorage.getItem('wishlist_truyen') != null) {
        var data = JSON.parse(localStorage.getItem('wishlist_truyen'));
        data.reverse();

        for (i = 0; i < data.length; i++) {
          var title = data[i].title;
          var img = data[i].img;
          var id = data[i].id;
          var url = data[i].url;
          $('#yeuthich').append(`
          @php
            $dem=1;
          @endphp
          <div class="col-12  border-bottom p-2" style="max-height:120px;box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 3px;">
             <div class="row p-3">
                <div class="col-2 d-flex justify-content-center"><i class="fas fa-heart"></i></div>
                <div class="col-3">
                  <a href="`+url+`"><img class="" style="max-height:90px" width="100%" src="` + img + `"></a>
                </div>
                <div class="col-7 text-center">
                  <h5>
                    <a href="` + url + `">` + title + `</a>
                  </h5>
                </div>
             </div>
          </div>
        `);
        }

      }
    }
    $('.btn_thich_truyen').click(function() {
      $('.fa.fa-heart').css('color', '#fac');
      const id = $('.wishlist_id').val();
      const title = $('.wishlist_title').val();
      const img = $('.card-img-top').attr('src');
      const url = $('.wishlist_url').val();
      //alert(id);
      //alert(title);
      //alert(img);
      //alert(url);
      const item = {
        'id': id,
        'title': title,
        'img': img,
        'url': url
      }
      if (localStorage.getItem('wishlist_truyen') == null) {
        localStorage.setItem('wishlist_truyen', '[]');
      }
      var old_data = JSON.parse(localStorage.getItem('wishlist_truyen'));
      var matches = $.grep(old_data, function(obj) {
        return obj.id == id;
      })
      if (matches.length) {
        alert('Truyện đã trong danh sách yêu thích của bạn!');
        
      } 
      else {
        if (old_data.length <= 6) {
                old_data.push(item);
        } else {
                 alert('Tối đa 6 truyện!');
               }
        $('#yeuthich').append(`<div class="khungnho row mt-2 ">
              <div class="col-md-5"><img class="img img-responsive" width="100" height="100" class="card-img-top" src="` + img + `" alt="` + title + `"></div>
              <div class="col-md-7 sidebar">
                <a href="` + url + `">
                  <p>` + title + `</p>
                </a>
              </div>
            </div>`);
        localStorage.setItem('wishlist_truyen', JSON.stringify(old_data));
        alert('Đã lưu vào danh sách yêu thích');
      }
      localStorage.setItem('wishlist_truyen', JSON.stringify(old_data));


    });
  </script>
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="UpasU6It"></script>
  <script type="text/javascript">
    $('#myTable').DataTable();
  </script>
  <script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        }
      });
    }
  </script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="HEQ5ULkk"></script>
</html>