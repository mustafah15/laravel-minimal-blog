<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/25/17
 * Time: 3:30 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.homepage');
    }
}