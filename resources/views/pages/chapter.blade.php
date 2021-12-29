@extends('../layout')
{{-- @section('slide')

@include('pages.slide')

@endsection --}}
@section('content')
<style type="text/css">
    .isDisabled {

        color: currentColor;

        pointer-events: none;

        opacity: 0.5;

        text-decoration: none;

    }

    .noidungchuong {
        padding: 20px;
        background-color: lightgoldenrodyellow;
        background: #fff;
        color: #000;
        text-align: justify;
        line-height: 40px !important;
        font-size: 25px !important;
        font-family: "Palatino Linotype", "Arial", "Times New Roman", sans-serif !important;
    }

    body {
        margin-top: 20px;
    }

    .comment-wrapper .panel-body {
        max-height: 650px;
        overflow: auto;
    }

    .comment-wrapper .media-list .media img {
        width: 64px;
        height: 64px;
        border: 2px solid #e5e7e8;
    }

    .comment-wrapper .media-list .media {
        border-bottom: 1px dashed #efefef;
        margin-bottom: 25px;
    }

    .tenchuong {
        text-align: center;
        font-size: 20px;
        color: red;
        font-weight: 900;
    }

    *,
    :after,
    :before {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .next {
        text-align: center;
        padding-left: 20px;
        padding-right: 20px;
    }

    .binhluan {
        text-align: center;
    }

    .nut {
        padding-left: 20px;
        padding-right: 20px;
    }

    #switch_color_chu {
        background: black !important;
        color: white;
    }

    .select {
        padding-left: 20px;
        padding-right: 20px;
    }

    .noidungchuong {
        background-color: lightgoldenrodyellow;
    }
</style>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{url('the-loai/'.$truyen_breadrumb->theloai->slug_theloai)}}">{{$truyen_breadrumb->theloai->tentheloai}}</a></li>
        <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen_breadrumb->danhmuctruyen->slug_danhmuc)}}">{{$truyen_breadrumb->danhmuctruyen->tendanhmuc}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$truyen_breadrumb->tentruyen}}</li>
    </ol>
</nav>


<body>
    <div class="row">
        <div class="col-md-12">
            <div class="tenchuong">
                <h4>{{$chapter->truyen->tentruyen}}</h4>
            </div>
            <div class="tenchuong">
                <p>Chương hiện tại: {{$chapter->tieude}}</p>
            </div>
            <div>
                <p>Chọn giao diện:
                    <select class="" id="switch_color">
                        <option value="sang">Sáng</option>
                        <option value="toi">Tối</option>
                    </select>
                </p>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <p class="mt-4 next"><a href="{{url('xem-chapter/'.$chapter_truoc)}}"><i class=" nut btn btn-danger fas fa-arrow-left {{$chapter->id==$min_id->id ? 'isDisabled' : ''}}"> Tập trước</i></a>
                    </div>
                    <div class="col-sm">
                        <div class="next">
                            <label for="exampleInputEmail1">Chọn chương:</label>
                            <br><select name="chon-chapter" class="mt-8 select custom-select chon-chapter">
                                @foreach($tatca_chapter as $key => $chap)
                                <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                                @endforeach
                            </select>
                            <br>
                        </div>
                    </div>
                    <div class="col-sm">
                        <p class="mt-4 next"><a href="{{url('xem-chapter/'.$chapter_sau)}}" class=" nut btn btn-danger fas fa-arrow-right {{$chapter->id==$max_id->id ? 'isDisabled' : ''}}">Tập sau</a></p>
                    </div>
                </div>
            </div>






            <div class="noidungchuong">
                {!! $chapter->noidung !!}
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <p class="mt-4 next"><a href="{{url('xem-chapter/'.$chapter_truoc)}}"><i class=" nut btn btn-danger fas fa-arrow-left {{$chapter->id==$min_id->id ? 'isDisabled' : ''}}"> Tập trước</i></a>
                    </div>
                    <div class="col-sm">
                        <div class="next">
                            <label for="exampleInputEmail1">Chọn chương:</label>
                            <br><select name="chon-chapter" class="mt-8 select custom-select chon-chapter">
                                @foreach($tatca_chapter as $key => $chap)
                                <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                                @endforeach
                            </select>
                            <br>
                        </div>
                    </div>
                    <div class="col-sm">
                        <p class="mt-4 next"><a href="{{url('xem-chapter/'.$chapter_sau)}}" class=" nut btn btn-danger fas fa-arrow-right {{$chapter->id==$max_id->id ? 'isDisabled' : ''}}">Tập sau</a></p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col">

            </div>
            <div class="col">
                <div class="fb-comments" style="background-color:white; " data-href="{{URL::current()}}" data-width="" data-numposts="3"></div>
            </div>
            <div class="col">

            </div>
        </div>
    </div>


</body>
@endsection
<script type="text/javascript">
    $(document).ready(function() {


        $("#switch_color").change(function() {
            $(document.body).toggleClass('switch_color');

        })



    })
</script>