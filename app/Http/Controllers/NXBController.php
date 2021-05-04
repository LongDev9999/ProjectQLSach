<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bangnhaxb;
use Validator;
class NXBController extends Controller
{
    public function Hienthi_NXB()
    {
        $nhaxb=bangnhaxb::all();//lay tất cả dữ liệu bảng NXB =>hien thi ra form thêm
        return view('danhsach_nxb',compact('nhaxb'));
        
    }
    public function Ham_Them_NhaXB(Request $request)
    {   
       $luat=
        [
            'ma_nxb' => 'required',
            'ten_nxb' => 'required',
        ];
        $baoloi=
        [
            'ma_nxb.required' => 'Mã Nhà Xuất Bản Không được để trống',
            'ten_nxb.required' => 'Tên Nhà Xuất Bản Không được để trống',
        ];

        $validator=Validator::make($request->all(),$luat,$baoloi);
        if($validator->fails())// neu co loi
        {
             return redirect()->back()->withErrors($validator);
             //=>về view('themnhaxb') và báo lỗi
        }
        else //-->KHÔNG có lỗi nhập vào==>KIểm tra tiếp xem đến giới hạn số hàng chưa ,thỏa mãn==>được thêm vào CSDL
        {
            $sohang=bangnhaxb::count(); 
        
            if ($sohang>=5) {
                $loimax="Chỉ được thêm tối đa 5 NXB.Bạn hãy quay lại.Thank you !";
                return redirect()->back()->withErrors($loimax);
            }
            else
            {
                $data = $request->all();
                // dd($data);
                bangnhaxb::create($data);
                return redirect('admin/nhaxb');
            }

        }
    }

    public function lay_data_sua($id) // Hiện data ra form để chỉnh sửa
    {
        $nhaxb=bangnhaxb::find($id);//lấy DL theo ID nhà XB=>hiển thị ra form sửa
        return view('sua_nxb',compact('nhaxb'));
    }
    
    public function Ham_sua(Request $request, $id)
    {   
        $luat=
        [
            'ma_nxb' => 'required',
            'ten_nxb' => 'required',
        ];
        $baoloi=
        [
            'ma_nxb.required' => 'Mã Nhà XB Không được để trống',
            'ten_nxb.required' => 'Tên Nhà XB Không được để trống',
        ];

        $validator=Validator::make($request->all(),$luat,$baoloi);
        if($validator->fails())// neu co loi
        {
             return redirect()->back()->withErrors($validator);
             //=>về view('themnhaxb') và báo lỗi
        }
        else //-->KHÔNG có lỗi==>được thêm vào CSDL
         {
            $data = $request->all();
            // dd($data);
            bangnhaxb::find($id)->update($data);
            return redirect('admin/nhaxb');
         }
     }

    public function Ham_xoa($id)
    {
         bangnhaxb::find($id)->delete();
         return redirect('admin/nhaxb');
       
    }
}
