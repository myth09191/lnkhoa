@extends('layouts.app')

@section('content')
@include('layouts.nav')
@hasanyrole('btv|admin')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật truyện</div>
                @if (session('status'))
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{route('truyen.update',[$truyen->id])}}" enctype='multipart/form-data'>
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên truyện</label>
                            <input type="text" class="form-control" value="{{$truyen->tentruyen}}" name="tentruyen" onkeyup="ChangeToSlug();" id="slug" placeholder="Tên danh mục...">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tác giả</label>
                            <input type="text" class="form-control" value="{{$truyen->tacgia}}" name="tacgia" placeholder="Tên tác giả...">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug tên truyện</label>
                            <input type="text" class="form-control" value="{{$truyen->slug_truyen}}" name="slug_truyen" id="convert_slug" placeholder="Slug danh mục...">

                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tóm tắt truyện</label>
                            <textarea class="form-control" name="tomtattruyen" id="exampleFormControlTextarea1" rows="5" style="resize:none">{{$truyen->tomtattruyen}}</textarea>
                        </div>
                        <label for="exampleInputEmail1">Danh mục truyện</label>
                            @foreach($danhmuc as $key => $muc)
                            <div class="form-check">
                                <input class="form-check-input" @if( $thuocdanhmuc->contains($muc->id) ) checked @endif
                                name="danhmuc[]" type="checkbox" id="danhmuc_{{$muc->id}}" value="{{$muc->id}}">
                                <label class="form-check-label" for="danhmuc_{{$muc->id}}">{{$muc->tendanhmuc}}</label>
                            </div>
                            @endforeach
                            <label for="exampleInputEmail1">Thể loại</label>
                            @foreach($theloai as $key => $the)
                            <div class="form-check">
                                <input class="form-check-input" @if( $thuoctheloai->contains($the->id) ) checked @endif
                                name="theloai[]" type="checkbox" id="theloai_{{$the->id}}" value="{{$the->id}}">
                                <label class="form-check-label" for="theloai_{{$the->id}}">{{$the->tentheloai}}</label>
                            </div>
                            @endforeach
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Từ khóa</label>
                                <input type="text" class="form-control" value="{{$truyen->tukhoa}}" name="tukhoa" placeholder="Từ khóa...">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Hình ảnh truyện</label>
                                <input type="file" class="form-control-file" name="hinhanh">
                                <td><img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" height="50" width="50"></td>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kích hoạt</label>
                                <select class="custom-select" name="kichhoat" aria-label="Default select example">
                                    @if($truyen->kichhoat ==0)
                                    <option selected value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                    @else
                                    <option value="0">Kích hoạt</option>
                                    <option selected value="1">Không kích hoạt</option>
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tình trạng</label>
                                <select class="custom-select" name="tinhtrang" aria-label="Default select example">
                                    <option value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                </select>
                            </div>
                            <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Truyện nổi bật</label>
                            <select class="custom-select" name="truyennoibat" aria-label="Default select example">
                                @if($truyen->truyen_noibat==0)
                                <option selected value="0">Truyện mới</option>
                                <option value="1">Truyện nổi bật</option>
                                <option value="2">Truyện xem nhiều</option>
                                <option value="3">Truyện đề cử nhiều</option>
                                @elseif($truyen->truyen_noibat==1)
                                <option  value="0">Truyện mới</option>
                                <option  selected value="1">Truyện nổi bật</option>
                                <option value="2">Truyện xem nhiều</option>
                                <option value="3">Truyện đề cử nhiều</option>
                                @elseif($truyen->truyen_noibat==2)
                                <option  value="0">Truyện mới</option>
                                <option  value="1">Truyện nổi bật</option>
                                <option selected value="2">Truyện xem nhiều</option>
                                <option value="3">Truyện đề cử nhiều</option>
                                @else
                                <option  value="0">Truyện mới</option>
                                <option  value="1">Truyện nổi bật</option>
                                <option  value="2">Truyện xem nhiều</option>
                                <option selected value="3">Truyện đề cử nhiều</option>
                                @endif
                            </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Hoàn thiện</label>
                                <select class="custom-select" name="hoanthien" aria-label="Default select example">
                                    <option value="0">Đã hoàn thành</option>
                                    <option value="1">Còn update</option>
                                </select>
                            </div>
                        </div>
                            <button type="submit" name="capnhap" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endhasanyrole
@endsection
<!DOCTYPE html>
<html lang="vi">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LNK Admin</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('dash-board')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">LNK Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Trang người dùng</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Quản lý:
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>User</span>
        </a>
        @role('admin')
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="dropdown-item" href="{{route('user.create')}}">Thêm user</a>

            <a class="dropdown-item" href="{{route('user.index')}}">Liệt kê user</a>
          </div>
        </div>
        @endrole
      </li>



      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Danh mục</span>
        </a>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          @hasanyrole('btv|admin')
            <a class="dropdown-item" href="{{route('danhmuc.create')}}">Thêm danh mục</a>
          
            <a class="dropdown-item" href="{{route('danhmuc.index')}}">Liệt kê danh mục</a>
            @endhasanyrole
          </div>
        </div>

      </li>



      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Thể loại</span>
        </a>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          @hasanyrole('btv|admin')
                <a class="dropdown-item" href="{{route('theloai.create')}}">Thêm thể loại</a>
              
                <a class="dropdown-item" href="{{route('theloai.index')}}">Liệt kê thể loại</a>
                @endhasanyrole
          </div>
        </div>

      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Truyện</span>
        </a>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          @hasanyrole('writer|admin')
            <a class="dropdown-item" href="{{route('truyen.create')}}">Thêm truyện chữ</a>
            @endhasanyrole
            @hasanyrole('btv|admin')
            <a class="dropdown-item" href="{{route('truyen.index')}}">Liệt kê truyện chữ</a>
            @endhasanyrole
          </div>
        </div>

      </li>



      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Chapter</span>
        </a>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          @hasanyrole('writer|admin')
                <a class="dropdown-item" href="{{route('chapter.create')}}">Thêm Chapter</a>
                @endhasanyrole
            @hasanyrole('btv|admin')
                <a class="dropdown-item" href="{{route('chapter.index')}}">Liệt kê chapter</a>
                @endhasanyrole
          </div>
        </div>

      </li>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->