<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Role;
use App\Site;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Requests\MassDestroyRoleRequest;
use Symfony\Component\HttpFoundation\Response;

class SitesController extends Controller
{
  public function index()
  {

      abort_if(Gate::denies('site_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      $sites = Site::all();

      return view('admin.sites.index', compact('sites'));
  }

  public function create()
  {
      abort_if(Gate::denies('site_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      $sites = Site::all()->pluck('title', 'id');

      return view('admin.sites.create', compact('sites'));
  }
}
