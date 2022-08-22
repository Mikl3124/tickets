<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Role;
use App\Site;
use App\User;
use App\Keyword;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Requests\MassDestroyRoleRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\MediaUploadingTrait;

class SitesController extends Controller
{
  use MediaUploadingTrait;

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

  public function store(Request $request)
  {

    $site = Site::create($request->all());
    $site->users()->sync($request->input('users', []));

    foreach ($request->input('attachments', []) as $file) {
      $site->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachments');
  }

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

  public function edit(Site $site)
  {
      abort_if(Gate::denies('site_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      $users = User::all()->sortBy('firstname');

      $site->load('users');

      $keywords= Keyword::where('site_id', $site->id)->get();

      return view('admin.sites.edit', compact('users', 'site', 'keywords'));
  }

  public function update(Request $request, Site $site)
  {

      $site->update($request->all());
      $site->users()->sync($request->input('users', []));
      $site->updated_by = Auth::user()->id;
      $site->save();

      return redirect()->route('admin.sites.index');
  }

}
