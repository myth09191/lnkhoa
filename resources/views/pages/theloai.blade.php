@extends('../layout')
      @section('content')
      <!-- Mới Update -->
      <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$tentheloai}}</li>
        
    </ol>
</nav>
      <h3 style="color: black; font-size: bold;background-color:white">{{$tentheloai}}</h3>
      <body style="background-color: white;">
      <div class="album py-5" style="background-color:white">
    <div class="container">
      <div class="row"> 
        @php
          $count = count($truyen);
        @endphp
        @if($count==0)
        <div class="col-md-12">
          <div class="card mb-12 box-shadow">
            <div class="card-body">
          <p style="color: black; font-size:20px">Đang cập nhật thêm</p>
            </div>
            </div>
          </div>
        @else 
      @foreach($truyen as $key => $value)     
        <div class="col-md-3">
          <div class="card mb-3 box-shadow">
            <img class="card-img-top"style="height: 20rem" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" data-holder-rendered="true">

            <div class="card-body" style="height: 15rem">
                <h5 style="color:red;text-align: center;font-size: 20px">{{$value->tentruyen}}</h5>
                <p class="card-text"style="text-align: center">
                          @foreach($value->thuocnhieudanhmuctruyen as $thuocdanh)
                          <a href="{{url('danh-muc/'.$thuocdanh->slug_danhmuc)}}"><span class="badge badge-dark">{{$thuocdanh->tendanhmuc}}</span></a>
                          @endforeach
                          @foreach($value->thuocnhieutheloaitruyen as $thuocloai)
                          <a href="{{url('the-loai/'.$thuocloai->slug_theloai)}}"><span class="badge badge-info">{{$thuocloai->tentheloai}}</span></a>
                          @endforeach
                          <h5 style="text-align: center"><span class="badge badge-warning">{{$value->views}} lượt xem</span></h5>
                        </p>
                    
              <div class="d-flex justify-content-between align-items-center">
              
                  <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" style="text-align: center" class="btn btn-sm btn-success">Xem ngay</a><small class="text-muted">9 mins</small>
              </div>
            </div>
              </div>
            </div>
            @endforeach
            @endif
          </div>
           {{$theloai->links("pagination::bootstrap-4")}}
        </div>
      </div>  
        @endsection
      </body>
        