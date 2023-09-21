<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traits\CsvImportTrait;
use App\Http\Controllers\traits\MediaUploadingTrait;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Product::with(['category'])->select(sprintf('%s.*', (new Product)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'product_show';
                $editGate = 'product_edit';
                $deleteGate = 'product_delete';
                $crudRoutePart = 'products';
                $otherCan = true;

                return view('_partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'otherCan',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? Product::TYPE_SELECT[$row->type] : '';
            });
            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->editColumn('stock_minimum', function ($row) {
                return $row->stock_minimum ? $row->stock_minimum : '';
            });
            $table->editColumn('price_buy', function ($row) {
                return $row->price_buy ? $row->price_buy : '';
            });
            $table->editColumn('price_sell', function ($row) {
                return $row->price_sell ? $row->price_sell : '';
            });
            $table->editColumn('packaging_unit', function ($row) {
                return $row->packaging_unit ? Product::PACKAGING_UNIT_SELECT[$row->packaging_unit] : '';
            });
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });
            $table->editColumn('featured_image', function ($row) {
                if (!$row->featured_image) {
                    return '';
                }
                $links = [];
                foreach ($row->featured_image as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->editColumn('product_code', function ($row) {
                return $row->product_code ? $row->product_code : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'category', 'featured_image']);

            return $table->make(true);
        }

        $categories = Category::get();

        return view('content.admin.products.index', compact('categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('content.admin.products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create(array_merge($request->except(['slug']), ['slug' => Str::slug($request->name)]));

        foreach ($request->input('featured_image', []) as $file) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('featured_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $product->id]);
        }

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product->load('category');

        return view('content.admin.products.edit', compact('categories', 'product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update(array_merge($request->except(['slug']), ['slug' => Str::slug($request->name)]));

        if (count($product->featured_image) > 0) {
            foreach ($product->featured_image as $media) {
                if (!in_array($media->file_name, $request->input('featured_image', []))) {
                    $media->delete();
                }
            }
        }
        $media = $product->featured_image->pluck('file_name')->toArray();
        foreach ($request->input('featured_image', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $product->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('featured_image');
            }
        }

        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->load('category', 'productPurchasingDetails');

        return view('content.admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        $products = Product::find(request('ids'));

        foreach ($products as $product) {
            $product->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('product_create') && Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Product();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
