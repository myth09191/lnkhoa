@extends('../layout')
      @section('content')
      <body style="background-color: white;color:black">
      <!-- Mới Update -->
      <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Truyện đã yêu thích</li>
    </ol>
</nav>
<div class="container">
  <div class="row">
    <div class="col-sm">
    <div class="" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;"style="width:510px" id="yeuthich">
            <h4 class="page-title text-center" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;color:red;font-weight:bold"><i class="fas fa-grin-hearts"></i>--TRUYỆN ĐÃ YÊU THÍCH--<i class="fas fa-grin-hearts"></i></h4>

          </div>
    </div>
    <div class="col-sm">
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
    </div>
    <div class="col-sm">
      <h4>Top 10 cuốn sách hay nhất mọi thời đại</h4>
      <li>1. Đắc nhân tâm.</li>
      <li>2. 7 thói quen của người thành đạt.</li>
      <li>3. Cách nghĩ để thành công.</li>
      <li>4. Cuộc sống không giới hạn. </li>
      <li>5. Hành trình về Phương Đông.</li>
      <li>6. Người giàu có nhất thành Babylon.</li>
      <li>7. Quẳng gánh lo đi mà vui sống.</li>
      <li>8. Bộ sách – Hạt giống tâm hồn.</li>
      <li>9. Tốc độ của niềm tin</li>
      <li>10. Thói quen thứ 8</li>
      <p>-----Nguồn: http://news.go.vn-----</li>
    </div>
  </div>
</div>

        @endsection
     