@extends('layouts.app')

@section('content')
@include('layouts.nav')
@hasanyrole('btv|admin')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Truyện</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <table class="table table-striped table-reponsive" id="myTable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên truyện</th>
                <th scope="col">Tên tác giả</th>
                <th scope="col">Hình ảnh truyện</th>
                <th scope="col">Slug truyện</th>
                <!-- <th scope="col">Tóm tắt</th> -->
                <th scope="col">Danh mục</th>
                <th scope="col">Thể loại</th>
                <th scope="col">Từ khóa</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Ngày update</th>
                <th scope="col">Kích hoạt</th>
                <th scope="col">Hoàn thiện</th>
                <th scope="col">Nổi bật</th>
                <th scope="col">Quản lí </th>
              </tr>
            </thead>
            <tbody>
              @foreach($list_truyen as $key => $truyen)
              <tr>
                <th scope="row">{{$key}}</th>
                <td>{{$truyen->tentruyen}}</td>
                <td>{{$truyen->tacgia}}</td>
                <td><img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" height="50" width="50"></td>
                <td>{{$truyen->slug_truyen}}</td>
                <!--  <td>{{$truyen->tomtattruyen}}</td> -->
                <td>{{$truyen->danhmuctruyen->tendanhmuc}}</td>
                <td>{{$truyen->theloai->tentheloai}}</td>
                <td>{{$truyen->tukhoa}}</td>

                <td>
                  {{$truyen->created_at}} - {{$truyen->created_at->diffforHumans()}}
                </td>
                </td>
                <td>
                  @if($truyen->updated_at!='')
                  {{$truyen->updated_at}} - {{$truyen->updated_at->diffforHumans()}}
                </td>
                @endif
                </td>
                <td>
                  @if($truyen->kichhoat==0)
                  <span class="text text-success">Kích hoạt</span>
                  @else
                  <span class="text text-danger">Không kích hoạt</span>
                  @endif
                </td>
                <td>
                  @if($truyen->hoanthien==0)
                  <span class="text text-success">Đã hoàn thành</span>
                  @else
                  <span class="text text-primary">Còn update</span>
                  @endif
                </td>
                <td width="10%">
                  @if($truyen->truyen_noibat==0)
                  <form>
                    @csrf
                    <select class="custom-select truyennoibat" data-truyen_id="{{$truyen->id}}" name="truyennoibat" aria-label="Default select example">

                      <option selected value="0">Truyện mới</option>
                      <option value="1">Truyện nổi bật</option>
                      <option value="2">Truyện xem nhiều</option>
                      <option value="3">Truyện đề cử nhiều</option>

                    </select>
                  </form>
                  @elseif($truyen->truyen_noibat==1)
                  <form>
                    @csrf
                    <select class="custom-select truyennoibat" data-truyen_id="{{$truyen->id}}" name="truyennoibat" aria-label="Default select example">

                      <option value="0">Truyện mới</option>
                      <option selected value="1">Truyện nổi bật</option>
                      <option value="2">Truyện xem nhiều</option>
                      <option value="3">Truyện đề cử nhiều</option>

                    </select>
                  </form>
                  @elseif($truyen->truyen_noibat==2)
                  <form>
                    @csrf
                    <select class="custom-select truyennoibat " data-truyen_id="{{$truyen->id}}" name="truyennoibat" aria-label="Default select example">

                      <option value="0">Truyện mới</option>
                      <option value="1">Truyện nổi bật</option>
                      <option selected value="2">Truyện xem nhiều</option>
                      <option value="3">Truyện đề cử nhiều</option>

                    </select>
                  </form>
                  @else
                  <form>
                    @csrf
                    <select class="custom-select truyennoibat" data-truyen_id="{{$truyen->id}}" name="truyennoibat" aria-label="Default select example">

                      <option value="0">Truyện mới</option>
                      <option value="1">Truyện nổi bật</option>
                      <option value="2">Truyện xem nhiều</option>
                      <option selected value="3">Truyện đề cử nhiều</option>

                    </select>
                  </form>
                  @endif
                </td>


                <td>
                  <a href="{{route('truyen.edit',[ $truyen-> id])}}" class=" btn btn-primary">Edit</a>
                  <form action="{{route('truyen.destroy',[$truyen-> id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button onclick="return confirm('Bạn có muốn xóa truyện này không?')" class="btn btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

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