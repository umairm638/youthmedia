<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Permissions;
use App\CategoriesModel;
use App\Http\Requests\CategoryRequest;

/**
 * Description of CategoriesController
 *
 * @author umair-malik
 */
class CategoriesController extends Controller {

    public $user;
    public $userName;
    public $userRoles;
    public $userImg;
    public $pageheader = 'Categories';

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->userName = $this->user['attributes']['name'];
            $this->userImg = $this->user['attributes']['profileImg'];
            $this->userRoles = Permissions::GetUserRole($this->user['attributes']['userRole']);
            return $next($request);
        });
    }

    public function index() {
        $categories = CategoriesModel::GetAllCategories();
        return view('admin.categories')->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
                        ->with('userRoles', $this->userRoles)->with('categories', $categories);
    }

    public function addCategory() {
        $category = '';
        return view('admin.addCategory')->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
                        ->with('userRoles', $this->userRoles)->with('category', $category);
    }

    public function getCategory($categoryId) {
        $data = array(
            'categoryId' => $categoryId
        );
        $category = CategoriesModel::GetSingleCategory($data);
        return view('admin.addCategory')->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
                        ->with('userRoles', $this->userRoles)->with('category', $category);
    }

    public function insertCategory(CategoryRequest $request) {
        $data = array(
            'categoryId' => $request->categoryId,
            'categoryName' => $request->categoryName
        );
        if ($request->categoryId == 'add') {
            $message = "Category Added Successfully";
            CategoriesModel::SaveCategory($data);
        } else {
            $message = "Category Updated Successfully";
            CategoriesModel::UpdateCategory($data);
        }
        \Session::flash('message', $message);
        return redirect()->route('categories');
    }

    public function deleteCategory(Request $request) {
        CategoriesModel::DeleteCategory($request->categoryId);
        if ($request->ajax()) {
            return response()->json([
                        'status' => 1, 'message' => 'Category Deleted'
            ]);
        }
    }

}
