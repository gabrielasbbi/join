<?php

namespace App\Http\Controllers;

use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Product\ProductRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ProductsController extends Controller
{
    /** @var ProductRepositoryInterface $productRepository */
    private ProductRepositoryInterface $productRepository;

    /** @var CategoryRepositoryInterface $categoryRepository */
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(
        ProductRepositoryInterface  $productRepository,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index(): View
    {
        $products = $this->productRepository->allWithCategories();
        $categories = $this->categoryRepository->all();

        return view('products.index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function store(\Symfony\Component\HttpFoundation\Request $request): RedirectResponse
    {
        $message = 'An error occurred while trying to create Product.';
        $alertClass = 'alert-danger';

        try {
            $request->validate([
                'id_categoria_produto' => 'required|integer',
                'nome_produto' => 'required|string|max:150',
                'valor_produto' => 'required|integer',
            ]);
        } catch (\Exception $e) {
            $message = 'Please input required fields.';
        }

        $payload = [
            "id_categoria_produto" => $request->get('id_categoria_produto'),
            "nome_produto" => $request->get('nome_produto'),
            "valor_produto" => (double)str_replace('.', '', str_replace(',', '.', $request->get('valor_produto'))),
            "data_cadastro" => new \DateTime('now'),
        ];

        $product = $this->productRepository->create($payload);

        if ($product !== null) {
            $message = 'Product saved with success!';
            $alertClass = 'alert-success';
        }

        Session::flash('message', $message);
        Session::flash('alert-class', $alertClass);

        return redirect("/products");
    }

    public function update(Request $request): RedirectResponse
    {
        $message = 'An error occurred while updating Product.';
        $alertClass = 'alert-danger';

        try {
            $request->validate([
                'id_produti' => 'required|integer',
                'id_categoria_produto' => 'required|integer',
                'nome_produto' => 'required|string|max:150',
                'valor_produto' => 'required|string|max:150',
            ]);
        } catch (\Exception $e) {
            $message = 'Please input required fields.';
        }

        $productId = $request->get('id_produto');

        $product = $this->productRepository->findById($productId);

        if ($product !== null) {
            try {
                $payload = [
                    "id_categoria_produto" => $request->get('id_categoria_produto'),
                    "nome_produto" => $request->get('nome_produto'),
                    "valor_produto" => (double)str_replace('.', '', str_replace(',', '.', $request->get('valor_produto'))),
                    "data_cadastro" => new \DateTime('now'),
                ];
                $this->productRepository->update($productId, $payload);
                $message = 'Product edited with success!';
                $alertClass = 'alert-success';
            } catch (\Exception $e) {
                dd($e);
            }
        }

        Session::flash('message', $message);
        Session::flash('alert-class', $alertClass);

        return redirect("/products");
    }

    public function delete(Request $request): RedirectResponse
    {
        $message = 'An error occurred while deleting Product.';
        $alertClass = 'alert-danger';

        $productIds = $request->get('id_produto');

        if (!empty($productIds)) {
            foreach (explode(',', $productIds[0]) as $key => $productId) {
                $product = $this->productRepository->findById((int)$productId);

                if ($product !== null) {
                    try {
                        $this->productRepository->delete($productId);
                        $message = 'Product deleted with success!';
                        $alertClass = 'alert-success';
                    } catch (\Exception $e) {
                    }
                }
            }
        }

        Session::flash('message', $message);
        Session::flash('alert-class', $alertClass);

        return redirect("/products");
    }
}
