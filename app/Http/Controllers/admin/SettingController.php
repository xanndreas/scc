<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use App\Models\Permission;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\traits\MediaUploadingTrait;

class SettingController extends Controller
{
    use MediaUploadingTrait;

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

        $setting = Setting::first();
        if (!$setting) {
            $setting = Setting::create([
                'whatsapp_link' => ''
            ]);
        }

        return view('content.admin.settings.index', compact('permissionParsed', 'contact', 'setting'));
    }

    public function update(Request $request)
    {
        $settings = Setting::first();
        if ($settings) {
            $settings->update($request->all());

            if ($request->input('home_cover', false)) {
                if (!$settings->home_cover || $request->input('home_cover') !== $settings->home_cover->file_name) {
                    if ($settings->home_cover) {
                        $settings->home_cover->delete();
                    }
                    $settings->addMedia(storage_path('tmp/uploads/' . basename($request->input('home_cover'))))->toMediaCollection('home_cover');
                }
            } elseif ($settings->home_cover) {
                $settings->home_cover->delete();
            }

            if ($request->input('home_logo_main', false)) {
                if (!$settings->home_logo_main || $request->input('home_logo_main') !== $settings->home_logo_main->file_name) {
                    if ($settings->home_logo_main) {
                        $settings->home_logo_main->delete();
                    }
                    $settings->addMedia(storage_path('tmp/uploads/' . basename($request->input('home_logo_main'))))->toMediaCollection('home_logo_main');
                }
            } elseif ($settings->home_logo_main) {
                $settings->home_logo_main->delete();
            }

            if ($request->input('home_logo_one', false)) {
                if (!$settings->home_logo_one || $request->input('home_logo_one') !== $settings->home_logo_one->file_name) {
                    if ($settings->home_logo_one) {
                        $settings->home_logo_one->delete();
                    }
                    $settings->addMedia(storage_path('tmp/uploads/' . basename($request->input('home_logo_one'))))->toMediaCollection('home_logo_one');
                }
            } elseif ($settings->home_logo_one) {
                $settings->home_logo_one->delete();
            }

            if ($request->input('home_logo_two', false)) {
                if (!$settings->home_logo_two || $request->input('home_logo_two') !== $settings->home_logo_two->file_name) {
                    if ($settings->home_logo_two) {
                        $settings->home_logo_two->delete();
                    }
                    $settings->addMedia(storage_path('tmp/uploads/' . basename($request->input('home_logo_two'))))->toMediaCollection('home_logo_two');
                }
            } elseif ($settings->home_logo_two) {
                $settings->home_logo_two->delete();
            }

            if ($request->input('home_logo_three', false)) {
                if (!$settings->home_logo_three || $request->input('home_logo_three') !== $settings->home_logo_three->file_name) {
                    if ($settings->home_logo_three) {
                        $settings->home_logo_three->delete();
                    }
                    $settings->addMedia(storage_path('tmp/uploads/' . basename($request->input('home_logo_three'))))->toMediaCollection('home_logo_three');
                }
            } elseif ($settings->home_logo_three) {
                $settings->home_logo_three->delete();
            }
            
            if ($request->input('logo_macros', false)) {
                if (!$settings->logo_macros || $request->input('logo_macros') !== $settings->logo_macros->file_name) {
                    if ($settings->logo_macros) {
                        $settings->logo_macros->delete();
                    }
                    $settings->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo_macros'))))->toMediaCollection('logo_macros');
                }
            } elseif ($settings->logo_macros) {
                $settings->logo_macros->delete();
            }

            return redirect()->route('admin.settings.index');
        }


        return response(null, Response::HTTP_NO_CONTENT);
    }
}