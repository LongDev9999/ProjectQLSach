<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\bangsach;
use App\bangnhaxb;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;

use Illuminate\Database\Eloquent\Model;
use Validator;

class QLSachController extends Controller
{
    public function Ham_taotk(Request $request)
    {
        $luat=
        [
            'txttaikhoan' => 'required',
            'txtmatkhau' => 'required',
        ];
        $baoloi=
        [
            'txttaikhoan.required' => 'Tên Tài Khoản Không được để trống,hãy nhập lại',
            'txtmatkhau.required' => 'Mật khẩu Không được để trống,hãy nhập lại',
        ];

        $validator=Validator::make($request->all(),$luat,$baoloi);
        if($validator->fails())// neu co loi
        {
             return redirect()->back()->withErrors($validator);
             //=>về view('dangky') và báo lỗi
        }
        else //-->KHÔNG có lỗi==>được thêm vào CSDL
        {
            $themtk=new User;
            $themtk->name=$request->txttaikhoan;
            $mk=$request->txtmatkhau;
            $themtk->password=bcrypt($mk);//MÃ HÓA MẬT KHẨU 

            $themtk->save();
            echo '<script>alert("Bạn Đã ĐĂNG KÝ thành công");
            window.location="dangnhap" </script>';
        }
        
    }
    public function Ham_dangnhap(Request $request)
    {
        $tendn=$request->txtusername;
        $mk=$request->txtpassword;
       if(Auth::attempt(['name' => $tendn, 'password' => $mk]))
       {
            return redirect('admin/danhsach'); //đăng nhập đúng=>chuyen huong ve route danhsach==>hiển thị danh sách
       }
       else 
       {
         return view('dangnhap',['loi'=>'Sai TK Hoặc MK,Nhập lại']);//đăng nhập sai
       }
    
    }
    public function dangxuat()
    {
        Auth::logout(); // ĐĂNG XUẤT
        echo '<script>alert("Bạn Đã ĐĂNG XUẤT thành công");
            window.location="dangnhap" </script>';
    }
    
    public function HienThi()//Hien thi tat ca DL
    {
        if (Auth::check()) //NẾU ĐÃ ĐĂNG NHẬP==>Lấy DL và hiển thị 
        {
            $all_data=DB::table('tbl_sach')->join('tbl_nxb','tbl_sach.ma_nxb','=','tbl_nxb.ma_nxb')->get();
            return view('danhsach',compact('all_data'));
        }
        else //NẾU CHƯA ĐĂNG NHẬP==>về trang đăng nhập
        {
            return redirect('dangnhap');
        }
    
    }
    
    public function Goi_trang_them()
    {
        $nhaxb=bangnhaxb::all();//lay tất cả dữ liệu bảng NXB =>hien thi ra form thêm
        return view('themsach',compact('nhaxb'));
    }

    public function Ham_them(Request $request)
    {   
       $luat=
        [
            'ma_sach' => 'required',
            'ten_sach' => 'required',
            'tacgia' => 'required',
            'ma_nxb'=>'required',
        ];
        $baoloi=
        [
            'ma_sach.required' => 'Mã sách Không được để trống.Hãy nhập lại',
            'ten_sach.required' => 'Tên sách Không được để trống.Hãy nhập lại',
            'ma_nxb.required' => 'Nhà Xuất Bản KHÔNG được để trống.Hãy thêm nhà xuất bản trước !',
            'tacgia.required' => 'Tác giả Không được để trống.Hãy nhập lại',
        ];

        $validator=Validator::make($request->all(),$luat,$baoloi);
        if($validator->fails())// neu co loi
        {
             return redirect()->back()->withErrors($validator);
             //=>về view('trangthem') và báo lỗi
        }
        else //-->KHÔNG có lỗi==>được thêm vào CSDL
        {
            $sohang=bangsach::count(); 
        
            if ($sohang>5) {
                $loimax="Chỉ được thêm tối đa 5 bản ghi.Bạn hãy quay lại.Thank you !";
                return redirect()->back()->withErrors($loimax);
            }
            else
            {
                $data = $request->all();
                // dd($data);
                bangsach::create($data);
                return redirect('admin/danhsach');
            }

           
        }
    }

    public function lay_data_sua($id) // Hiện data ra form để chỉnh sửa
    {
        $nhaxb=bangnhaxb::all();//lay tất cả dữ liệu bảng NXB =>hiển thị ra form sửa
        $sach=bangsach::find($id);// dd($data);
        return view('getEdit',compact('sach','nhaxb'));
    }
    
    public function Ham_sua(Request $request, $id)
    {   
        $luat=
         [
             'ma_sach' => 'required',
             'ten_sach' => 'required',
             'tacgia' => 'required',
         ];
         $baoloi=
         [
             'ma_sach.required' => 'Mã sách Không được để trống',
             'ten_sach.required' => 'Tên sách Không được để trống',
             'tacgia.required' => 'Tác giả Không được để trống',
         ];
 
         $validator=Validator::make($request->all(),$luat,$baoloi);
         if($validator->fails())// neu co loi
         {
              return redirect()->back()->withErrors($validator);
              //=>về view('getEdit') và báo lỗi
         }
         else //-->KHÔNG có lỗi==>được thêm vào CSDL
         {
            $data = $request->all();
            // dd($data);
            bangsach::find($id)->update($data);
            return redirect('admin/danhsach');
         }
     }

    public function Ham_xoa($id)
    {
        bangsach::find($id)->delete();
        return redirect('admin/danhsach');
    }

}
