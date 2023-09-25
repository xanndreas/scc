<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('selling_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissionParsed = null;
        foreach (Permission::all() as $item) {
            $explodes = explode('_', $item->title);
            $permissionGroup = array_slice($explodes, 0, -1);

            $permissionParsed[ucwords(implode(" ", $permissionGroup))][] = [
                'key' => $item->id,
                'value' => ucwords(end($explodes))
            ];
        }

        $user = User::with('userContacts')
            ->where('id', Auth::id())
            ->first();

        $contact = null;
        if ($user->userContacts->count() > 0) {
            $contact = $user->userContacts->filter(function ($item) {
                return $item->type == '1';
            })->first();
        }

        return view('content.admin.settings.index', compact('permissionParsed', 'contact'));
    }
}
