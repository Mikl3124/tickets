<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Role;
use App\Site;
use App\User;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Requests\MassDestroyRoleRequest;
use Symfony\Component\HttpFoundation\Response;

class SitesController extends Controller
{
  public function index()
  {

      abort_if(Gate::denies('site_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      $sites = Site::orderBy('name')->get();

      return view('admin.sites.index', compact('sites'));
  }

  public function create()
  {
      abort_if(Gate::denies('site_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      $users = User::all();

      return view('admin.sites.create', compact('users'));
  }

  public function store(StoreUserRequest $request)
  {

    $site = Site::create($request->all());
    
    $site->users()->sync($request->input('users', []));

    return redirect()->route('admin.sites.index');
  }

  public function destroy(Site $site)
  {
    abort_if(Gate::denies('site_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $site->delete();

    return back();
  }

  public function massDestroy(Request $request)
  {
    Site::whereIn('id', request('ids'))->delete();

    return response(null, Response::HTTP_NO_CONTENT);
  }
}
