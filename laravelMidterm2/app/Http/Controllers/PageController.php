<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\Cart;
use App\ProductType;
use Illuminate\Http\Request;
use Session;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
        $new_product= Product::where('new',1)->paginate(8);
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(4);
    	return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }
    public function getLoaisanpham($type){
        $sp_theoloai =Product::where('id_type',$type)->limit(3)->get();
        $sp_khac =Product::where('id_type','<>',$type)->limit(3)->get();
        $loai =ProductType::all();
        $loai_sp = ProductType::where('id',$type)->first();
    	return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }
    public function getChitietsanpham(Request $req){
        $sanpham = Product::where('id',$req->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(3);
        $sp_banchay = Product::where('promotion_price','=',0)->paginate(3);
        $sp_new = Product::select('id','name','id_type','description','unit_price','promotion_price','image','unit','new','created_at','updated_at')->where('new','>',0)->orderBy('updated_at','ASC')->paginate(3);
    	return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu','sp_banchay','sp_new'));
    }
    public function getLienhe(){
    	return view('page.lienhe');
    }
    public function getAbout(){
    	return view('page.about');
    }
    public function getAddtoCart(Request $req, $id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;               
        $cart = new Cart($oldCart);             
        $cart->add($product,$id);               
        $req->session()->put('cart', $cart);                
        return redirect()->back();              

    }
    public function getCheckout(){
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('dathang')->with(['cart'=>Session::get('cart'),
        'product_cart'=>$cart->items,'totalQty'=>$cart->totalQty,'totalPrice'=>$cart->totalPrice]);         
    }
    public function getRemovefromCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function create()
    {
        return view('dathang');
    }
     public function postCheckout(Request $req){                        
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->action('PageController@create')->back()->with('thongbao','Đặt hàng thành công');
       
    }
    public function getdathang(){
        if(Session('cart')){
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            return view('dathang')->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,
            'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
        };
    }
}