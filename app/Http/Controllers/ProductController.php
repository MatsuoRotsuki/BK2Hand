<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        try {
            $products = Product::with('images')
                ->latest()
                ->paginate(10);

            // return response()->json([
            //     'data' => $products,
            //     'message' => 'Get all products successfully',
            //     'success' => true,
            // ], 200);

            $categories = Category::whereNull('parent_id')->get();
            foreach ($categories as $category) {
                $category->childCategories;
            }

            return view('dashboard', [
                'products' => $products,
                'categories' => $categories,
            ]);
        } catch(Exception $e)
        {
            return response()->json([
                'message' => $e->getMessage(),
                'success' => false,
            ], 500);
        }
    }

    public function search(Request $request)
    {   
        $regExp = [
            '/[aáảàạãăắẳằặẵâấẩầậẫ]/iu' => '[aáảàạãăắẳằặẵâấẩầậẫ]',
            '/[eéẻèẹẽêếểềệễ]/iu' => '[eéẻèẹẽêếểềệễ]',
            '/[iíỉìịĩ]/iu' => '[iíỉìịĩ]',
            '/[uúủùụũưứửừựữ]/iu' => '[uúủùụũưứửừựữ]',
            '/[oóỏòọõôốổồộỗơớởờợỡ]/iu' => '[oóỏòọõôốổồộỗơớởờợỡ]',
            '/[yýỷỳỵỹ]/iu' => '[yýỷỳỵỹ]',
            '/[dđ]/iu' => '[dđ]',
        ];

        try {
            $result = $request->keyword;
            foreach ($regExp as $key => $value) {
                $result = preg_replace($key, $value, $result);
            }

            $products = Product::with('categories', 'images')
                ->when($request->keyword, function ($query) use ($request, $result) {
                    $query->where('products.name', 'REGEXP', $result);
                })
                ->when($request->cid, function ($query) use ($request) {
                    $query->whereHas('categories', function ($query) use ($request) {
                        $query->where('categories.category_id', $request->cid);
                    });
                })
                ->when($request->priceRange != 0, function ($query) use ($request) {
                    $between = [
                        '1' => ['0','99999'],
                        '2' => ['100000','499999'],
                        '3' => ['500000','999999'],
                        '4' => ['1000000', '99999999999'],
                    ];
                    $query->whereRaw('CONVERT(price, SIGNED) BETWEEN ? and ?', $between[$request->priceRange]);
                })
                ->when($request->sortByPrice != 0, function ($query) use ($request) {
                    if ($request->sortByPrice == 1) $query->orderByRaw('CONVERT(products.price, SIGNED) asc');
                    elseif ($request->sortByPrice == 2) $query->orderByRaw('CONVERT(products.price, SIGNED) desc');
                    elseif ($request->sortByPrice == 3) $query->orderBy('created_at', 'desc');
                    elseif ($request->sortByPrice == 4) $query->orderBy('created_at', 'asc');
                })
                ->when($request->timeUsed != 0, function ($query) use ($request) {
                    $between = [
                        '1' => ['0', '5'],
                        '2' => ['6', '11'],
                        '3' => ['12', '18'],
                        '4' => ['19', '24'],
                        '5' => ['25', '9999999'],
                    ];
                    $query->whereRaw('CONVERT(time_used, SIGNED) BETWEEN ? and ?', $between[$request->timeUsed]);
                })
                ->paginate(6);
            
            return view('search', [
                'products' => $products->appends(request()->except('page')),
            ]);
        } catch(Exception $e)
        {
            return response()->json([
                'message' => $e->getMessage(),
                'success' => false,
            ], 500);
        }
    }

    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        foreach ($categories as $category) {
            $category->childCategories;
        }

        return view('product.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => ['required', 'string', 'exists:categories,category_id'],
            'title' => ['required', 'string', 'max:30'],
            'time_used' => ['required', 'numeric', 'min:1'],
            'price' => ['required', 'numeric', 'min:1000'],
            'description' => ['required', 'string', 'max:255'],
            'images' => ['required'],
            'images.*' => ['file','mimes:jpg,jpeg,png', 'max:1024'],
            'video' => ['nullable', 'file', 'mimes:mp4,wmv,avi,mpeg'],
            'unit' => ['required', 'numeric', Rule::in(['0', '1'])],
        ]);

        $month = $request->unit == '0' ? $request->time_used : $request->time_used * 12;

        $product = Product::create([
            'name' => $request->title,
            'price' => $request->price,
            'time_used' => $month,
            'description' => $request->description,
            'user_id' => auth()->user()->user_id,
        ]);

        $product->categories()->attach($request->category_id);

        if ($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                $filename = uniqid('image_') . '.' . $image->getClientOriginalExtension();

                $image->storeAs('images', $filename, 'public');
                $fileUrl = Storage::url("images/{$filename}");
                $product->images()->create([
                    'image_url' => $fileUrl,
                ]);
            }
        }

        if ($request->hasFile('video')) {
            $uploadedVideo = $request->file('video');
            $filename = uniqid('video_') .'.'. $uploadedVideo->getClientOriginalExtension();
            $uploadedVideo->storeAs('videos', $filename, 'public');
            $fileUrl = Storage::url("videos/{$filename}");

            $product->videos()->create([
                'video_url' => $fileUrl,
            ]);
        }

        alert()->success(__('Thành công'), 'Sản phẩm của bạn đang được chờ duyệt');

        return redirect()->route('product.show', ['id' => $product->product_id]);
    }

    public function show($id)
    {
        try {
            $product = Product::with(['user', 'images', 'videos'])->find($id);
            if (!isset($product)) {
                return response()->json([
                    'message' => 'Product not found',
                    'success' => false,
                ], 404);
            }

            $currentCategory = Category::with('products')
                ->whereHas('products', function ($query) use ($product) {
                    $query->where('products.product_id', $product->product_id);
                })
                ->first();
            
            $similarProducts = $currentCategory->products()
                ->whereNot('products.product_id', $product->product_id)
                ->inRandomOrder()
                ->limit(5)
                ->get();

            return view('product.show', [
                'product' => $product,
                'similarProducts' => $similarProducts,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'success' => false,
            ], 500);
        }
    }

    public function manage(){
        return view('product.manage', [
            
        ]);
    }

    public function edit(Product $product)
    {

    }

    public function update(Request $request, Product $product)
    {

    }

    public function destroy(Product $product)
    {

    }
}
