<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('selling_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('content.admin.settings.index');
    }
}
