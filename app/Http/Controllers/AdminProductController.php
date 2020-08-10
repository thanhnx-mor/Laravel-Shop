<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\ProductImage;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    private $categories;
    private $product;
    private $product_image;
    use StorageImageTrait;
    public function __construct(Category $category, Product $product, ProductImage $productImage)
    {
        $this->categories = new CategoryController($category);
        $this->product = $product;
        $this->product_image = $productImage;
    }

    public function index()
    {
        return view('admin.product.index');
    }

    public function store(Request $request)
    {
        $dataProductInit = [
            'name' => $request->name,
            'price' => $request->price,
            'content' => $request->contents,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
        if(!empty($dataUploadFeatureImage)) {
            $dataProductInit['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataProductInit['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
        $product = $this->product->create($dataProductInit);

        if ($request->hasFile('image_path')) {
            foreach ($request->image_path as $fileItem) {
                $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product');
                $rawPayload = [
                    'image_path' => $dataProductImageDetail['file_path'],
                    'image_name' => $dataProductImageDetail['file_name'],
                ];
                $product->images()->create($rawPayload);
//                $this->product_image->create($rawPayload);
            }
        }
    }
    public function edit()
    {

    }

    public function delete()
    {

    }

    public function create()
    {
        $htmlOptions = $this->categories->getCategory();
        return view('admin.product.add', compact('htmlOptions'));
    }
}
