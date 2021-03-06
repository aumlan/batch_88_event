<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\BrandModel;
use App\Models\BrandModelYear;
use App\Models\Contact;
use App\Models\Currency;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use App\QueryFilters\Brand_Sort;
use App\QueryFilters\Model_Sort;
use App\QueryFilters\Type_Sort;
use App\QueryFilters\Year_Sort;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    public function index(){

        $selected_language = Currency::find(1)->selected_language;
        App::setLocale($selected_language);


       $sliders = Slider::orderBy('id','DESC')->get();
       $brands = Brand::orderBy('id','DESC')->get();
       $gallery = Gallery::orderBy('id','DESC')->get();

       $best_selling = Product::orderBy('id','DESC')->where('productShowingPlace','Best Selling Product')->limit(4)->get();
       $featured_products = Product::orderBy('id','DESC')->where('productShowingPlace','Feature Product')->limit(4)->get();
       $new_arrivals = Product::orderBy('id','DESC')->where('productShowingPlace','New Arrival')->limit(4)->get();
       $top_reacted = Product::orderBy('id','DESC')->where('productShowingPlace','Top Reacted')->limit(4)->get();

        if(!MoBileView()){
       return view('welcome_mymorich',compact('featured_products','top_reacted','best_selling','new_arrivals','brands','sliders','featured_products','gallery'));
       }else{
        return view('mobile.welcome',compact('featured_products','top_reacted','best_selling','new_arrivals','brands','sliders','featured_products','gallery'));
       }
    }

    public function productDetails($id,$slug){
        $product =Product::find($id);
        $products =Product::where('category_id',$product->category_id)->skip(0)->take(8)->get();
        if(!MoBileView()){
        return view('product_details_mymorich',compact('product','products'));
        }else{
            return view('mobile.product_details_mymorich',compact('product','products'));
        }
    }

    public function terms_conditions()
    {
//        Toastr::success('Post added successfully :)','Success');
        return view('term&conditions');
    }

    public function faqs()
    {
        return view('faqs');
    }

    public function about()
    {
        if(!MoBileView()){
            return view('about');
        }else{
            return view('mobile.about');
        }
    }

    public function charity()
    {
        if(!MoBileView()){
            return view('charity');
        }else{
            return view('mobile.charity');
        }
    }

    public function education()
    {
        if(!MoBileView()){
            return view('education');
        }else{
            return view('mobile.education');
        }
    }

    public function environment()
    {
        if(!MoBileView()){
            return view('environment');
        }else{
            return view('mobile.environment');
        }
    }

    public function cultural()
    {
        if(!MoBileView()){
            return view('cultural');
        }else{
            return view('mobile.cultural');
        }
    }

    public function media()
    {
        if(!MoBileView()){
            return view('media');
        }else{
            return view('mobile.media');
        }
    }

    public function health()
    {
        if(!MoBileView()){
            return view('health');
        }else{
            return view('mobile.health');
        }
    }

    public function refund()
    {
        return view('refuenPolicy');
    }

    public function contact()
    {
        if(!MoBileView()){
            return view('contact');
        }else{
            return view('mobile.contact');
        }
    }

    public function search_mobile()
    {
        return view('mobile.search');
    }

    public function search($name)
    {

            $products = Product::with('productImage')
                ->join('brands', 'products.brand_id', '=', 'brands.id')
                ->join('categories', 'products.category_id', '=', 'categories.id')
//                ->join(DB::raw("SELECT `image` FROM `product_images` WHERE product_images.product_id = products.id LIMIT 1"))
//                ->leftjoin('product_images', 'products.id', '=', 'product_images.product_id')
//                ->join('product_images', function ($join) {
//                    $join->on('products.id', '=', 'product_images.product_id')
//                        ->latest();
//                })
                ->select('products.*','products.id as product_id','products.name as product_name', 'brands.*', 'brands.name as brand_name' ,'categories.*', 'categories.name as category_name')
                ->where('products.name','LIKE','%'.$name.'%')
                ->orWhere('brands.name','LIKE','%'.$name.'%')
                ->orWhere('categories.name','LIKE','%'.$name.'%')
                ->get();
        return response()->json($products);

    }

    public function getSubModel($id){
        $subModel= BrandModel::where('brand_id',$id)->get();
        return response()->json($subModel);
    }

    public function getSubModelYear($id){
        $subModelYear= BrandModelYear::where('brand_model_id',$id)->get();
        return response()->json($subModelYear);
    }

    public function search_filter()
    {
        $productsList = app(Pipeline::class)
            ->send(Product::query())
            ->through([
                Type_Sort::class,
                Brand_Sort::class,
                Model_Sort::class,
                Year_Sort::class,
            ])
            ->thenReturn()   // ->then(fn ($builder) => $builder->get())
            ->paginate(5);

//        dd(($productsList));
        $products = $productsList;

//        return response()->json($products.data);
        return view('search_filter_products', compact('products'));
        //return response()->json($products);
    }

    public function search_enter()
    {
        $name = request()->input('q');

        $products = Product::with('productImage')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
//                ->join(DB::raw("SELECT `image` FROM `product_images` WHERE product_images.product_id = products.id LIMIT 1"))
//                ->leftjoin('product_images', 'products.id', '=', 'product_images.product_id')
//                ->join('product_images', function ($join) {
//                    $join->on('products.id', '=', 'product_images.product_id')
//                        ->latest();
//                })
            ->select('products.*','products.id as product_id','products.name as product_name', 'brands.*', 'brands.name as brand_name' ,'categories.*', 'categories.name as category_name')
            ->where('products.name','LIKE','%'.$name.'%')
            ->orWhere('brands.name','LIKE','%'.$name.'%')
            ->orWhere('categories.name','LIKE','%'.$name.'%')
            ->get();

//        dd($products);
//        return view('search_result_products',compact('products', 'name'));

        if(!MoBileView())
        {
            return view('search_result_products',compact('products', 'name'));
        }
        else
        {
            return view('mobile.search_result_products',compact('products', 'name'));
        }



    }

    public function user_registration(Request $request)
    {

        $validated = $request->validate([
            'uid' => 'required|unique:users',
            'name' => 'required',
        ]);

        $imageName='';
        if ($request->hasFile('profile_picture')){
            $imageName = time().'.'.$request->profile_picture->extension();
            $request->profile_picture->move(public_path('/images/users'), $imageName);
        }

        $user  = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->school=$request->school;
        $user->dob=$request->dob;
        $user->zila=$request->zila;
        $user->designation=$request->designation;
        $user->permanent_address=$request->permanentAddress;
        $user->current_address=$request->currentAddress;
        $user->blood=$request->blood;
        $user->bikash=$request->bikash;
        $user->bikashto=$request->bikashto;
        $user->fb=$request->fb;
        $user->picture=$imageName;
        $user->uid=$request->uid;
        $user->password=Hash::make($request->password);

        $user->save();
        Toastr::success('???????????????,<br/>???????????????????????? ????????????????????? ??? <br/> ??????????????? ???????????????????????????????????? ????????????????????? ????????????????????? ??????????????? ??? ?????? ?????? ?????? ?????? ????????????????????? ?????????????????????????????? ???????????? ??????????????? ?????? ???????????????????????? ??????????????????????????? ???????????? ?????????????????? ???????????? ????????? ???','Success');






//        $notification = array(
//            'message' => '???????????????,
//                        ???????????????????????? ?????????????????????,
//                        ??????????????? ???????????????????????????????????? ????????????????????? ????????????????????? ??????????????????
//                        ?????? ?????? ?????? ?????? ????????????????????? ?????????????????????????????? ???????????? ??????????????? ?????? ???????????????????????? ??????????????????????????? ???????????? ?????????????????? ???????????? ????????????',
//            'alert-type' => 'success'
//        );

        return redirect()->route('welcome');
    }

    public function user_message(Request $request)
    {
        $contact = new Contact();
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->mobile=$request->mobile;
        $contact->message=$request->message;

        $contact->save();
        return back();
    }


}
