<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use Artisan;
use Auth;

class AdminController extends Controller
{
    protected $data = []; // the information we send to the view

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title

        return view('backpack::dashboard', $this->data);
    }

    /**
     * Redirect to the dashboard.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        $modules = [
          'news' => Permission::PERMISSION_NEWS,
          'cars' => Permission::PERMISSION_CARS
        ];

        $first_available_module_slug = null;
        foreach ($modules as $slug => $permissions) { 
            if (Auth::user()->hasPermissionTo((array) $permissions)) {
                $first_available_module_slug = $slug;
                break;
            }
        }
         
        return redirect(config('backpack.base.route_prefix').'/'.($first_available_module_slug ?: 'edit-account-info'));
    }

    public function fetchUpdatedData()
    {
        Artisan::call('cache:clear');

        Artisan::call('api:fetch-all');
        Artisan::call('fetch:all');

        Alert::success('Данные обновлены')->flash();

        return redirect()->back();
    }
}
