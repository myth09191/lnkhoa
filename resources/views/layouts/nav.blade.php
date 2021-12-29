<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="{{route('user.index')}}">Admin <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            @role('admin')
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Quản lí user
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           
                <a class="dropdown-item" href="{{route('user.create')}}">Thêm user</a>
            
                <a class="dropdown-item" href="{{route('user.index')}}">Liệt kê user</a>
             
            </div>
@endrole
        </li>
        
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Quản lí danh mục
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @hasanyrole('btv|admin')
                <a class="dropdown-item" href="{{route('danhmuc.create')}}">Thêm danh mục</a>
        
                <a class="dropdown-item" href="{{route('danhmuc.index')}}">Liệt kê danh mục</a>
                @endhasanyrole
            </div>

        </li>

        
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Thể loại
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @hasanyrole('btv|admin')
                <a class="dropdown-item" href="{{route('theloai.create')}}">Thêm thể loại</a>
              
                <a class="dropdown-item" href="{{route('theloai.index')}}">Liệt kê thể loại</a>
                @endhasanyrole
            </div>

        </li>
      
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Truyện chữ
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @hasanyrole('writer|admin')
            <a class="dropdown-item" href="{{route('truyen.create')}}">Thêm truyện chữ</a>
            @endhasanyrole
            @hasanyrole('btv|admin')
            <a class="dropdown-item" href="{{route('truyen.index')}}">Liệt kê truyện chữ</a>
            @endhasanyrole
                
            </div>

        </li>

        
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Chapter
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @hasanyrole('writer|admin')
                <a class="dropdown-item" href="{{route('chapter.create')}}">Thêm Chapter</a>
                @endhasanyrole
            @hasanyrole('btv|admin')
                <a class="dropdown-item" href="{{route('chapter.index')}}">Liệt kê chapter</a>
                @endhasanyrole
            </div>

        </li>

    </ul>
    
</div>
</nav>
</div>
