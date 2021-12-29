<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Session;
use App\Models\Truyen;
use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Theloai;
use App\Models\ThuocDanh;
use App\Models\ThuocLoai;
use App\Models\Chapter;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $list_truyen = Truyen::with('thuocnhieudanhmuctruyen','thuocnhieutheloaitruyen')->orderBy('id','DESC')->paginate(8);
        return view('pages.home')->with(compact('list_truyen'));
    }
}
