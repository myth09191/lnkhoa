@extends('../layout')

{{-- @section('slide')

  @include('pages.slide')

@endsection --}}

@section('content')
<style type="text/css">
  .tagcloud06 ul {
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .tagcloud06 ul li {
    display: inline-block;
    margin: 0 0 .3em 1em;
    padding: 0;
  }

  .tagcloud06 ul li a {
    position: relative;
    display: inline-block;
    height: 30px;
    line-height: 30px;
    padding: 0 1em 0 .75em;
    background-color: red;
    border-radius: 0 3px 3px 0;
    color: #fff;
    font-size: 13px;
    text-decoration: none;
    -webkit-transition: .2s;
    transition: .2s;
  }

  .tagcloud06 ul li a::before {
    position: absolute;
    top: 0;
    left: -15px;
    z-index: -1;
    content: '';
    width: 30px;
    height: 30px;
    background-color: red;
    border-radius: 50%;
    -webkit-transition: .2s;
    transition: .2s;
  }

  .tagcloud06 ul li a::after {
    position: absolute;
    top: 50%;
    left: -6px;
    z-index: 2;
    display: block;
    content: '';
    width: 6px;
    height: 6px;
    margin-top: -3px;
    background-color: #fff;
    border-radius: 100%;
  }

  .list_chapter li a:visited {
    color: grey;

  }

  .tagcloud06 ul li span {
    display: block;
    max-width: 100px;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
  }

  .tagcloud06 ul li a:hover {
    background-color: #555;
    color: #fff;
  }

  .tagcloud06 ul li a:hover::before {
    background-color: #555;
  }
</style>
<style>
  .checked {
    color: red;
  }
</style>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$truyen->tentruyen}}</li>
  </ol>
</nav>
<body class=""  style="background-color:white;color: black" >
<div class="row" style="background-color: white; color:black">
  <div class="col-md-8">
    <div class="row">
      <div class="col-md-3">
        <br>
        <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" data-holder-rendered="true">
      </div>
      <div class="col-md-9">
        <style type="text/css">
          .infotruyen {
            list-style: none;
          }
        </style>
        <br>
        <ul class="infotruyen">
          <!-- Yêu thích truyện--->
          <input type="hidden" value="{{$truyen->tentruyen}}" class="wishlist_title">
          <input type="hidden" value="{{\URL::current()}}" class="wishlist_url">
          <input type="hidden" value="{{$truyen->id}}" class="wishlist_id">

          <!-- ENd Yêu thích truyện--->


          <li style="font-family: Comic Sans MS;">Tên truyện: {{$truyen->tentruyen}}</li>
          <li style="font-family: Comic Sans MS;">Tác giả: {{$truyen->tacgia}}</li>
          <li style="font-family: Comic Sans MS;">Ngày đăng: {{$truyen->created_at->diffforHumans()}}</li>
          <li style="font-family: Comic Sans MS;">Ngày update: {{$truyen->updated_at->diffforHumans()}}</li>
          <li style="font-family: Comic Sans MS;"> Danh mục truyện :
            @foreach($truyen->thuocnhieudanhmuctruyen as $thuocdanh)

            <a href="{{url('danh-muc/'.$thuocdanh->slug_danhmuc)}}" style="font-family: Comic Sans MS;"><span class="badge badge-dark">{{$thuocdanh->tendanhmuc}}</span></a>
            @endforeach
          </li>
          <li style="font-family: Comic Sans MS;"> Thể loại truyện :
            @foreach($truyen->thuocnhieutheloaitruyen as $thuocloai)
            <a href="{{url('the-loai/'.$thuocloai->slug_theloai)}}" style="font-family: Comic Sans MS;"><span class="badge badge-info">{{$thuocloai->tentheloai}}</span></a>
          @endforeach
          </li>
         
          <li><div class="fb-like" data-href="{{URL::current()}}" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div></li>
           <li style="font-family: Comic Sans MS;">
            <label for="value">Điểm đánh giá: </label>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <!-- <meter id="value" min="0" max="100" low="30" high="75" optimum="80" value="98"></meter></li> -->
            @php
            $mucluc = count($chapter);
            @endphp
          <li style="font-family: Comic Sans MS;">Số chương: @php
            $mucluc = count($chapter);
            echo "$mucluc";
            @endphp</li>
          @if($truyen->tinhtrang==0)
          <li style="font-family: Comic Sans MS;">Trạng thái: Đã hoàn thành</li>
          @else
          <li style="font-family: Comic Sans MS;">Trạng thái: Đang update...</li>
          @endif
          <li style="font-family: Comic Sans MS;">Lượt xem: {{$truyen->views}}</li>

          @if($chapter_dau)
          <div class="btn-group">
            <li><a href="{{url('xem-chapter/'.$chapter_dau->slug_chapter)}}" class="btn btn-primary" style="font-size: 15px;">Đọc online</a></li> <br>
            <button class="btn btn-danger btn_thich_truyen" style="font-size: 15px;" style="margin-left: 10px"><i class="fa fa-heart" aria-hidden="true"> Yêu thích</i></button><br>
          </div>
          <li><a href="{{url('xem-chapter/'.$chapter_cuoi->slug_chapter)}}" style="font-size: 15px;" class="btn btn-success mt-2">Đọc chương mới nhất</a></li>
          @else
          <li><a href="" class="btn btn-primary">Chưa cập nhật!</a></li>
          @endif
        </ul>
      </div>
    </div>
    <div class="col-md-12">
      <h4 style="font-size: 30px;font-weight:bold;color:green" style="font-family: Comic Sans MS;">Tóm tắt</h4>
      <p style="font-family: Comic Sans MS;">{{$truyen->tomtattruyen}}</p>

    </div>
    <p style="font-size: 30px;font-weight:bold;color:green" style="font-family: Comic Sans MS;">Từ khóa tìm kiếm :
      @php
      $tukhoa = explode(",",$truyen->tukhoa);
      @endphp
    <div class="tagcloud06" style="font-size: 15px;">
      <ul>
        @foreach($tukhoa as $key => $tu)

        <li style="font-family: Comic Sans MS;"><a href="#"><span>{{$tu}}</span></a></li>

        @endforeach
      </ul>
    </div>
    </p>
    <hr>
    <button class="accordion" style="font-size: 30px;font-weight:bold;color:green">Mục lục:</button>
    <div class="panel">
      <ul class="mucluctruyen">
        @php
        $mucluc = count($chapter);
        @endphp
        @if($mucluc>0)
        @foreach($chapter as $key => $chap)
        <li id="list_chapter" style="font-family: Comic Sans MS;"><a href="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{{$chap->tieude}}}</a></li>
        @endforeach
        @else
        <li style="font-family: Comic Sans MS;">Hiện chưa có mục lục, đang cập nhât quay lại sau!</li>
        @endif
      </ul>
    </div>
    <div class="fb-comments" data-href="{{URL::current()}}" data-width="" data-numposts="3"></div>


    <div class="items">
      <h1 class="page-title" style="font-size: 30px;font-weight:bold;color:green">Truyện cùng danh mục:
        <i class="fa fa-angle-right"></i>
      </h1>

      <div class="row">
      @foreach($cungdanhmuc as $key => $value)
            <div class="col-md-3 p-1 mb-1">
              <div style="height:35rem;box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;">
                <div class="img-container">
                  <a href="{{url('xem-truyen/'.$value->slug_truyen)}}">
                    <img src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" style=" width:100%; max-height: 210px;">
                  </a>
                </div>
                <div class="info">
                  <h5 class="text-center">
                    <a href="{{url('xem-truyen/'.$value->slug_truyen)}}">{{$value->tentruyen}}</a>
                  </h5>
                  <p class="text-center">
                    @foreach($value->thuocnhieudanhmuctruyen->slice(0,2) as $thuocdanh)
                    <a href="{{url('danh-muc/'.$thuocdanh->slug_danhmuc)}}"><span class="badge badge-dark">{{$thuocdanh->tendanhmuc}}</span></a>
                    @endforeach
                    @foreach($value->thuocnhieutheloaitruyen->slice(0,2) as $thuocloai)
                    <a href="{{url('the-loai/'.$thuocloai->slug_theloai)}}"><span class="badge badge-info">{{$thuocloai->tentheloai}}</span></a>
                    @endforeach
                  </p>
                  @foreach($value->chapter as $chapend)
                  @if($loop->last)
                  <p class="text-center"><a href="{{url('xem-chapter/'.$chapend->slug_chapter)}}">----Chapter: {{$value->chapter->count()}}----</a></p>
                  @endif
                  @endforeach
                </div>
              </div>

            </div>
            @endforeach
      </div>
    
    
    
    
    </div>
    {{$cungdanhmuc->links("pagination::bootstrap-4")}}
  </div>


  <div class="col-md-4 pl-2">
    <div class="" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
      <h4 class="page-title text-center" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;color:red;font-weight:bold"><i class="fas fa-eye"></i>--TRUYỆN XEM NHIỀU--<i class="fas fa-eye"></i></h4>
      @php
      $dem=1;
      @endphp
      @foreach($truyenxemnhieu as $key => $tr)
      <div class="col-12 " style="max-height:120px;box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 3px;">
        <div class="row p-3">
          <div class="col-2 d-flex justify-content-center">00{{$dem++}}</div>
          <div class="col-3">
            <a href="{{url('xem-truyen/'.$tr->slug_truyen)}}"><img class="" style="max-height:90px" width="100%" src="{{asset('public/uploads/truyen/'.$tr->hinhanh)}}" alt="{{$tr->tentruyen}}"></a>
          </div>
          <div class="col-7 text-center">
            <h5>
              <a href="{{url('xem-truyen/'.$tr->slug_truyen)}}">{{$tr->tentruyen}}</a>
            </h5>
            <p><i class="fas fa-eye"> {{$tr->views}} lượt xem</i></p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <br>

    <div class="" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
      <h4 class="page-title text-center" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;color:red;font-weight:bold"><i class="fas fa-trophy"></i>--TOP TRUYỆN ĐỀ CỬ--<i class="fas fa-trophy"></i></i></h4>
      @php
      $dem=1;
      @endphp
      @foreach($truyendecu as $key => $decu)
      <div class="col-12  border-bottom p-2" style="max-height:120px;box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 3px;">
        <div class="row p-3">
          <div class="col-2 d-flex justify-content-center">00{{$dem++}}</div>
          <div class="col-3">
            <a href="{{url('xem-truyen/'.$decu->slug_truyen)}}"><img class="" style="max-height:90px" width="100%" src="{{asset('public/uploads/truyen/'.$decu->hinhanh)}}" alt="{{$decu->tentruyen}}"></a>
          </div>
          <div class="col-7 text-center">
            <h5>
              <a href="{{url('xem-truyen/'.$decu->slug_truyen)}}">{{$decu->tentruyen}}</a>
            </h5>
            <p><i class="fas fa-eye"> {{$value->views}} lượt xem</i></p>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <br>

    <div class="" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;" id="yeuthich">
      <h4 class="page-title text-center" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;color:red;font-weight:bold"><i class="fas fa-grin-hearts"></i>--TRUYỆN ĐÃ YÊU THÍCH--<i class="fas fa-grin-hearts"></i></h4>

    </div>

  </div>


</div>

<style>
  h4 {
    display: flex;
    flex-direction: row;
  }

  h4:before,
  h4:after {
    content: "";
    flex: 1 1;
    border-bottom: 2px solid red;
    margin: auto;
  }

  h4:before {
    margin-right: 10px
  }

  h4:after {
    margin-left: 10px
  }

  #demotext {
    color: #FFFFFF;
    background: #0e8dbc;
    text-shadow: 0 1px 0 #CCCCCC, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 4px 0 #b9b9b9, 0 5px 0 #aaa, 0 6px 1px rgba(0, 0, 0, .1), 0 0 5px rgba(0, 0, 0, .1), 0 1px 3px rgba(0, 0, 0, .3), 0 3px 5px rgba(0, 0, 0, .2), 0 5px 10px rgba(0, 0, 0, .25), 0 10px 10px rgba(0, 0, 0, .2), 0 20px 20px rgba(0, 0, 0, .15);
    color: #FFFFFF;
    background: #0e8dbc;
  }
</style>
</body>


@endsection

<style type="text/css">
  .col-md-7.sidebar a {
    /* padding: 0; */
    font-size: 15px;
    text-decoration: none;
    color: #000;
  }

  .col-md-7.sidebar {
    padding: 0;
  }

  .card-header {
    background: whitesmoke !important;
    font-size: auto;
  }

  .card-header1 {
    background: whitesmoke !important;
    font-size: 20px;

  }

  .col-md-8 {
    background-color: white;
    font-size: 20px;
  }

  .col-md-3 {

    background-color: white;
  }
</style>
<style type="text/css">
  .fas {
    font-size: 1.5rem;
  }


  *,
  :after,
  :before {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }

  user agent stylesheet i {
    font-style: italic;
  }

  .page-title {
    margin: 0;
    font-weight: 400;
    font-size: 20px;
    margin-bottom: 5px;
    text-transform: uppercase;
    color: #2980b9;
  }

  h1 {
    font-size: 2em;
    margin: 1.67em 0;
  }

  h2 {
    font-size: 15px;
    font-weight: bold;
    color: red;

  }

  user agent stylesheet h1 {
    font-size: 2em;
    font-weight: bold;
  }

  body {
    font-family: Tahoma, sans-serif, Helvetica, Arial;
    font-weight: 400;
    font-size: 14px;
    background-color: whitesmoke;

  }

  body {
    line-height: 1.42857143;
    color: #333;
  }

  html {
    font-size: 10px;
  }

  html {
    font-family: sans-serif;
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
  }

  .container {
    background-color: white;
  }

  .fancybox-nav,
  .owl-controls,
  html {
    -webkit-tap-highlight-color: transparent;
  }

  .fa-angle-right:before {
    content: "\f105";
  }



  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin: auto;
    text-align: center;
    font-family: arial;
  }

  .price {
    color: grey;
    font-size: 22px;
  }

  .card button {
    border: none;
    outline: 0;
    padding: 12px;
    color: white;
    background-color: green;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
  }

  .card button:hover {
    opacity: 0.7;
  }

  .accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
  }

  .active,
  .accordion:hover {
    background-color: #ccc;
  }

  .panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
  }
</style>