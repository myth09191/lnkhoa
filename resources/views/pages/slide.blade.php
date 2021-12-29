<div class="slider mt-3">
    <h3 class="page-title" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;color:red;font-weight:bold"><i class="fas fa-book-open"></i>--HAY NÊN ĐỌC--<i class="fas fa-book-open"></i></h3>
           
           <div class="owl-carousel owl-theme mb-5">

               @foreach($truyen as $key => $slide)

                   <div class="item position-relative" style="padding:1px">
                       
                   <a href="{{url('xem-truyen/'.$slide->slug_truyen)}}"><img src="{{asset('public/uploads/truyen/'.$slide->hinhanh)}}" style="max-height: 205px;"></a> 

                       <h4 class="mycolor" style="text-align: center;text-overflow: hidden; width:100%;font-weight: bold;"><a href="{{url('xem-truyen/'.$slide->slug_truyen)}}">{{$slide->tentruyen}}</a></h4>
                       <!-- <span class=" badge badge-danger position-absolute "  style="top:10px;left:10px">{{$slide->views}}<i class="fas fa-eye"></i></span> -->
                       <span class="badge badge-danger position-absolute" style="top:10px;right: 10px;"><i class="fas fa-eye">  {{$slide->views}}</i>
                   </div>

               @endforeach  



           </div>
</div>
<style>
  h3 {
  display: flex;
  flex-direction: row;
}
h3:before, h3:after{
  content: "";
  flex: 1 1;
  border-bottom: 2px solid red;
  margin: auto;
}
h3:before {
  margin-right: 10px
}
h3:after {
  margin-left: 10px
}
#demotext {
color: #FFFFFF;
background: #0e8dbc;
text-shadow: 0 1px 0 #CCCCCC, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 4px 0 #b9b9b9, 0 5px 0 #aaa, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3), 0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15);
color: #FFFFFF;
background: #0e8dbc;
}
</style>
            