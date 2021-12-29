@extends('../layout')
      @section('content')
      <body style="background-color: white;color:black">
      <!-- Mới Update -->
      <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Truyện xem nhiều</li>
    </ol>
</nav>
      <h3>Truyện xem nhiều</h3>
        <div class="album py-5 bg-light">
    <div class="container">
      <div class="row"> 
        @php
          $count = count($truyen);
        @endphp
        @if($count==0)
        <div class="col-md-12" >
          <div class="card mb-12">
            <div class="card-body">
          <p>Đang cập nhật thêm</p>
            </div>
            </div>
          </div>
        @else 
        @foreach($truyenxemnhieu as $key => $tr)  
        <div class="col-md-3">
          <div class="card mb-3 box-shadow">
          <a href="{{url('xem-truyen/'.$tr->slug_truyen)}}"><img class="" style="max-height:200px" width="100%" src="{{asset('public/uploads/truyen/'.$tr->hinhanh)}}" alt="{{$tr->tentruyen}}"></a>
           
            <div class="card-body"style="height: 15rem">
                <h5 style="text-align:center" href="{{url('xem-truyen/'.$tr->slug_truyen)}}">{{$tr->tentruyen}}</h5>
                <p class="card-text"style="text-align:center">
                          @foreach($tr->thuocnhieudanhmuctruyen as $thuocdanh)
                          <a href="{{url('danh-muc/'.$thuocdanh->slug_danhmuc)}}"><span class="badge badge-dark">{{$thuocdanh->tendanhmuc}}</span></a>
                          @endforeach
                          @foreach($tr->thuocnhieutheloaitruyen as $thuocloai)
                          <a href="{{url('the-loai/'.$thuocloai->slug_theloai)}}"><span class="badge badge-info">{{$thuocloai->tentheloai}}</span></a>
                          @endforeach
                          <h5 style="text-align: center"><span class="badge badge-warning">{{$tr->views}} lượt xem</span></h5>
                        </p>
                       
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <span><a href="{{url('xem-truyen/'.$tr->slug_truyen)}}" class="btn btn-sm btn-success">Xem ngay</a></span>
                 
                </div>
           
              </div>
                       
            </div>
              </div>
            </div>
            @endforeach
            {{$truyenxemnhieu->links("pagination::bootstrap-4")}}
            @endif
          </div>
      
          
        </div>
      </div>  
        @endsection
      </body>
     