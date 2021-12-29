      @extends('../layout')
      @section('slide')
      @include('pages.slide')
      @endsection
      @section('content')

      <!-- Mới Update -->

      <body class="" style="background-color:white;color: black">
        <div class="row">
          <div class=" bg-white col-md-8">
            <h4 class="page-title" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;color:red;font-weight:bold"><i class="fas fa-book-open"></i>--TRUYỆN MỚI CẬP NHẬT--<i class="fas fa-book-open"></i></h4>
            <div class="row">
              @foreach($truyen as $key => $value)
              <div class="col-md-3 p-1 mb-1">
                <div style="height:24rem;box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;">
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
              <div class="col-12 d-flex justify-content-center mt-2">{{$truyen->links("pagination::bootstrap-4")}}</div>

            </div>

            <div class="row">
              <div class="fb-comments" data-href="http://lnkhoa.com/webtruyen/" data-width="" data-numposts="5"></div>
            </div>
          </div>





          <div class="col-md-4 pl-2">
            <div class="" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
              <h4 class="page-title text-center" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;color:red;font-weight:bold"><i class="fas fa-eye"></i><a href="{{url('xem-nhieu')}}" style="color:red">--TRUYỆN XEM NHIỀU--</a><i class="fas fa-eye"></i></h4>
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
              <h4 class="page-title text-center" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;color:red;font-weight:bold"><i class="fas fa-trophy"></i><a href="{{url('de-cu')}}" style="color:red">--TOP TRUYỆN ĐỀ CỬ--</a><i class="fas fa-trophy"></i></i></h4>
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

            <div class="" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;" style="width:510px" id="yeuthich">
              <h4 class="page-title text-center" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;color:red;font-weight:bold"><i class="fas fa-grin-hearts"></i><a href="{{url('yeu-thich')}}" style="color:red">--TRUYỆN ĐÃ YÊU THÍCH--</a><i class="fas fa-grin-hearts"></i></h4>

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


      <div class="fb-comments" data-href="http://localhost/webtruyen/xem-truyen/san-co-chien-ki" data-width="" data-numposts="3"></div>
      @endsection