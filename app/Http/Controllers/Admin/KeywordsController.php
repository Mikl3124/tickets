<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Keyword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class KeywordsController extends Controller
{
    public function store(Request $request)
    {
        $keyword = Keyword::create($request->all());
        $keyword->save();

        return back();
    }

    public function destroy(Keyword $keyword)
    {
        dd('coco');
        abort_if(Gate::denies('keyword_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keyword->delete();

        return back();
    }
}
