<?php

namespace App\Http\Controllers;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\User;
use App\Models\Theloai;
use App\Models\Info;
use App\Models\ThuocDanh;
use App\Models\ThuocLoai;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function timkiemajax(Request $request){
        $data = $request->all();

        if($data['keywords']){

            $truyen = Truyen::where('tinhtrang',0)->where('tentruyen','LIKE','%'.$data['keywords'].'%')->get();

            $output = '
            <ul class="dropdown-menu" style="display:block;">'
            ;

            foreach($truyen as $key => $tr){
             $output .= '
             <li class="li_search_ajax"><a href="#">'.$tr->tentruyen.'</a></li>';
         }

         $output .= '</ul>';
         echo $output;
     }
    }
    public function decu(){
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $truyenxemnhieu = Truyen::orderBy('views','DESC')->where('kichhoat',0)->take(4)->get();
        $truyendecu = Truyen::where('truyen_noibat',3)->take(4)->paginate(8);
        $wishlist_truyen = Truyen::orderBy('views','DESC')->where('kichhoat',0)->take(4)->get();
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->paginate(16);
        $slide_truyen = Truyen::with('thuocnhieudanhmuctruyen','thuocnhieutheloaitruyen')->orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        return view('pages.truyendecu')->with(compact('slide_truyen','danhmuc','truyen','theloai','truyenxemnhieu','truyendecu'));
    }
    public function xemnhieu(){
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $truyenxemnhieu = Truyen::orderBy('views','DESC')->where('kichhoat',0)->take(4)->paginate(8);
        $truyendecu = Truyen::where('truyen_noibat',3)->take(4)->get();
        $wishlist_truyen = Truyen::orderBy('views','DESC')->where('kichhoat',0)->take(4)->get();
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->paginate(16);
        $slide_truyen = Truyen::with('thuocnhieudanhmuctruyen','thuocnhieutheloaitruyen')->orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        return view('pages.truyenxemnhieu')->with(compact('slide_truyen','danhmuc','truyen','theloai','truyenxemnhieu','truyendecu'));
    }
    public function dashboard(Request $request){
        $user = User::orderBy('id','DESC')->get();
        $user = User::with('roles','permissions')->get();
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $truyendecu = Truyen::where('truyen_noibat',3)->take(10)->get();
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->get();
        $chapter = Chapter::with('truyen')->orderBy('id','ASC')->get();
        $truyenxemnhieu = Truyen::orderBy('views','DESC')->where('kichhoat',0)->take(10)->get();
        return view('admincp.user.dashboard')->with(compact('user','slide_truyen','danhmuc','truyen','chapter','theloai','truyenxemnhieu','truyendecu'));
    }
public function yeuthich(){
    $theloai = Theloai::orderBy('id','DESC')->get();
    $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
    $truyenxemnhieu = Truyen::orderBy('views','DESC')->where('kichhoat',0)->take(4)->get();
    $truyendecu = Truyen::where('truyen_noibat',3)->take(4)->get();
    $wishlist_truyen = Truyen::orderBy('views','DESC')->where('kichhoat',0)->take(4)->get();
    $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->paginate(16);
    $slide_truyen = Truyen::with('thuocnhieudanhmuctruyen','thuocnhieutheloaitruyen')->orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
    return view('pages.truyenyeuthich')->with(compact('slide_truyen','danhmuc','truyen','theloai','truyenxemnhieu','truyendecu'));
}
    public function home(){
       /*  $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get(); */
     
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $truyenxemnhieu = Truyen::orderBy('views','DESC')->where('kichhoat',0)->take(4)->get();
        $truyendecu = Truyen::where('truyen_noibat',3)->take(4)->get();
        $wishlist_truyen = Truyen::orderBy('views','DESC')->where('kichhoat',0)->take(4)->get();
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->paginate(16);
        $slide_truyen = Truyen::with('thuocnhieudanhmuctruyen','thuocnhieutheloaitruyen')->orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        return view('pages.home')->with(compact('slide_truyen','danhmuc','truyen','theloai','truyenxemnhieu','truyendecu'));
    }
    public function danhmuc($slug){
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->paginate(4);
        $danhmuc_id = DanhmucTruyen::where('slug_danhmuc',$slug)->first();
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->where('danhmuc_id',$danhmuc_id->id)->paginate(8);
        $tendanhmuc =  $danhmuc_id->tendanhmuc;
        return view('pages.danhmuc')->with(compact('slide_truyen','danhmuc','truyen','theloai','tendanhmuc'));
    }
    public function theloai($slug){
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $theloai = Theloai::orderBy('id','DESC')->paginate(4);
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $theloai_id = Theloai::where('slug_theloai',$slug)->first();
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->where('theloai_id',$theloai_id->id)->paginate(8);
        $tentheloai =  $theloai_id->tentheloai;
        return view('pages.theloai')->with(compact('slide_truyen','danhmuc','truyen','theloai','tentheloai'));
    }
    public function xemtruyen($slug){
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $truyen = Truyen::with('danhmuctruyen','theloai')->where('slug_truyen',$slug)->where('kichhoat',0)->first();
        $chapter = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->get();
        $chapter_dau = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->first();
        $chapter_cuoi = Chapter::with('truyen')->orderBy('id','DESC')->where('truyen_id',$truyen->id)->first();
        $cungdanhmuc = Truyen::with('danhmuctruyen','theloai')->where('danhmuc_id',$truyen->danhmuctruyen->id)->whereNotIn('id',[$truyen->id])->paginate(8);
        $truyenxemnhieu = Truyen::where('truyen_noibat',2)->take(4)->get();
        $truyendecu = Truyen::where('truyen_noibat',3)->take(4)->get();
        //luotxem
        $truyen = Truyen::where('id',$truyen -> id)->first();
        $truyen->views = $truyen->views+1;
        $truyen -> save();
        return view('pages.truyen')->with(compact('truyendecu','truyenxemnhieu','slide_truyen','danhmuc','truyen','chapter','cungdanhmuc','chapter_dau','theloai','chapter_cuoi'));
    }
    public function xemchapter($slug){
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $theloai = Theloai::orderBy('id','DESC')->get();
        $truyen = Chapter::where('slug_chapter',$slug)->first();    
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $chapter = Chapter::with('truyen')->where('slug_chapter',$slug)->where('truyen_id',$truyen->truyen_id)->first();
        $tatca_chapter = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->truyen_id)->get();
        $chapter_sau = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','>',$chapter->id)->min('slug_chapter');
        $chapter_truoc = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','<',$chapter->id)->max('slug_chapter');  
    	$max_id =  Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','DESC')->first();
    	$min_id =  Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','ASC')->first();
        //breadrumb
        $truyen_breadrumb = Truyen::with('danhmuctruyen','theloai')->where('id',$truyen->truyen_id)->first();
        //end
        $truyen = Truyen::orderBy('id','DESC')->get();
        return view('pages.chapter')->with(compact('truyen','slide_truyen','truyen_breadrumb','danhmuc','chapter','tatca_chapter','chapter_sau','chapter_truoc','max_id','min_id','theloai'));
    }
    public function timkiem(){
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $tukhoa = $_GET['tukhoa'];
        $truyen = Truyen::with('danhmuctruyen','theloai')->where('tentruyen','LIKE','%'.$tukhoa.'%')->Orwhere('tomtattruyen','LIKE','%'.$tukhoa.'%')->Orwhere('tacgia','LIKE','%'.$tukhoa.'%')->paginate(8);
        return view('pages.timkiem')->with(compact('slide_truyen','danhmuc','truyen','theloai','tukhoa'));
    }
    public function tag($tag){
        $info = Info::find(1);
        $title = 'Tìm kiếm từ khóa';

        $meta_desc = 'Tìm kiếm từ khóa';
        $meta_keywords = 'Tìm kiếm từ khóa';
 
        
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $tags = explode("-", $tag);
       
        $truyen = Truyen::with('thuocnhieudanhmuctruyen','thuocnhieutheloaitruyen')->where(
            function ($query) use($tags) {
            for ($i = 0; $i < count($tags); $i++){
                $query->orwhere('tukhoa', 'like',  '%' . $tags[$i] .'%');
            }
            })->paginate(12);

        return view('pages.tag')->with(compact('danhmuc','truyen','theloai','slide_truyen','tag','info','title','meta_desc','meta_keywords'));
    }
   
}
