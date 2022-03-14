<?php

namespace App\Http\Controllers;

use App\Repository\Category\CategoryRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Request;

class CategoriesController extends Controller
{
    /** @var CategoryRepositoryInterface $categoryRepository */
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(): View
    {
        $categories = $this->categoryRepository->all();

        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $message = 'An error occurred while trying to create category.';
        $alertClass = 'alert-danger';

        try {
            $request->validate([
                'nome_categoria' => 'required|string|max:150',
            ]);
        } catch (\Exception $e) {
            $message = 'Please input required fields.';
        }

        $category = $this->categoryRepository->create($request->toArray());

        if ($category !== null) {
            $message = 'Category saved with success!';
            $alertClass = 'alert-success';
        }

        Session::flash('message', $message);
        Session::flash('alert-class', $alertClass);

        return redirect("/categories");
    }

    public function update(Request $request): RedirectResponse
    {
        $message = 'An error occurred while updating category.';
        $alertClass = 'alert-danger';

        try {
            $request->validate([
                'id_categoria_planejamento' => 'required|integer',
                'nome_categoria' => 'required|string|max:150',
            ]);
        } catch (\Exception $e) {
            $message = 'Please input required fields.';
        }

        $categoryId = $request->get('id_categoria_planejamento');

        $category = $this->categoryRepository->findById($categoryId);

        if ($category !== null) {
            try {
                $payload = ["nome_categoria" => $request->get('nome_categoria')];
                $this->categoryRepository->update($categoryId, $payload);
                $message = 'Category edited with success!';
                $alertClass = 'alert-success';
            } catch (\Exception $e) {
            }
        }

        Session::flash('message', $message);
        Session::flash('alert-class', $alertClass);

        return redirect("/categories");
    }

    public function delete(Request $request): RedirectResponse
    {
        $message = 'An error occurred while deleting category.';
        $alertClass = 'alert-danger';

        $categoryIds = $request->get('id_categoria_planejamento');

        if (!empty($categoryIds)) {
            foreach (explode(',', $categoryIds[0]) as $key => $categoryId) {
                $category = $this->categoryRepository->findById((int)$categoryId);

                if ($category !== null) {
                    try {
                        $this->categoryRepository->delete($categoryId);
                        $message = 'Category deleted with success!';
                        $alertClass = 'alert-success';
                    } catch (\Exception $e) {
                    }
                }
            }
        }

        Session::flash('message', $message);
        Session::flash('alert-class', $alertClass);

        return redirect("/categories");
    }
}
