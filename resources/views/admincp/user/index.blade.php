@extends('layouts.app')

@section('content')

@include('layouts.nav')

@role('admin')

<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">Quản lý user</div>

      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif
        <table class="table table-striped" id="myTable">

          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tên</th>
              <th scope="col">Email</th>
              <th scope="col">Vai trò hiện tại</th>
              <th scope="col">Quyền dựa vào vai trò</th>
              <th scope="col">Assign/Role</th>

            </tr>
          </thead>
          <tbody>
            @foreach($user as $key => $u)
            <tr>
              <th scope="row">{{$key}}</th>
              <td>{{$u->name}}</td>
              <td>{{$u->email}}</td>
              <td>
                @foreach($u->roles as $key => $role)
                <span class="badge badge-pill badge-primary"> {{$role->name}}</span>
                @endforeach
              </td>
              <td>
                @foreach($role->permissions as $key => $permission)
                <span class="badge badge-warning">{{$permission->name}}</span>
                @endforeach
              </td>

              <th scope="row">
                <a class="btn btn-success" href="{{url('phan-vaitro/'.$u->id)}}">Phân vai trò</a>
                <a class="btn btn-primary" href="{{url('phan-quyen/'.$u->id)}}">Phân quyền</a>
                <form action="{{route('user.destroy',[$u-> id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Bạn có muốn xóa người dùng này không?')" class="btn btn-danger">Delete</button>
                                </form>
              </th>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endrole
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