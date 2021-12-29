@extends('../layout')
      @section('content')
      <body style="background-color: white;color:black">
      <!-- Mới Update -->
      <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách truyện yêu thích</li>
    </ol>
</nav>
      <h3>Danh sách truyện yêu thích</h3>
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
      @foreach($truyen as $key => $value)     
        <div class="col-md-3">
          <div class="card mb-3 box-shadow">
            <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" style="height: 20rem" data-holder-rendered="true">

            <div class="card-body"style="height: 15rem">
                <h5 style="text-align:center">{{$value->tentruyen}}</h5>
                <p class="card-text"style="text-align:center">
                          @foreach($value->thuocnhieudanhmuctruyen as $thuocdanh)
                          <a href="{{url('danh-muc/'.$thuocdanh->slug_danhmuc)}}"><span class="badge badge-dark">{{$thuocdanh->tendanhmuc}}</span></a>
                          @endforeach
                          @foreach($value->thuocnhieutheloaitruyen as $thuocloai)
                          <a href="{{url('the-loai/'.$thuocloai->slug_theloai)}}"><span class="badge badge-info">{{$thuocloai->tentheloai}}</span></a>
                          @endforeach
                          <h5 style="text-align: center"><span class="badge badge-warning">{{$value->views}} lượt xem</span></h5>
                        </p>
                       
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <span><a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-sm btn-success">Xem ngay</a></span>
                 
                </div>
                <small class="text-muted">9 mins</small>
              </div>
                       
            </div>
              </div>
            </div>
            @endforeach
            @endif
          </div>
          {{$danhmuc->links("pagination::bootstrap-4")}}
        </div>
      </div>  
        @endsection
      </body>