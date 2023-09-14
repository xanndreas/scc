<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyContactRequest;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('contact_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Contact::with(['user'])->select(sprintf('%s.*', (new Contact)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'contact_show';
                $editGate      = 'contact_edit';
                $deleteGate    = 'contact_delete';
                $crudRoutePart = 'contacts';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('address_2', function ($row) {
                return $row->address_2 ? $row->address_2 : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? Contact::TYPE_SELECT[$row->type] : '';
            });
            $table->editColumn('pos_code', function ($row) {
                return $row->pos_code ? $row->pos_code : '';
            });
            $table->editColumn('enterprises', function ($row) {
                return $row->enterprises ? Contact::ENTERPRISES_SELECT[$row->enterprises] : '';
            });
            $table->editColumn('identity_image', function ($row) {
                if ($photo = $row->identity_image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('self_image', function ($row) {
                if ($photo = $row->self_image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('npwp', function ($row) {
                return $row->npwp ? $row->npwp : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'identity_image', 'self_image']);

            return $table->make(true);
        }

        $users = User::get();

        return view('admin.contacts.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('contact_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.contacts.create', compact('users'));
    }

    public function store(StoreContactRequest $request)
    {
        $contact = Contact::create($request->all());

        if ($request->input('identity_image', false)) {
            $contact->addMedia(storage_path('tmp/uploads/' . basename($request->input('identity_image'))))->toMediaCollection('identity_image');
        }

        if ($request->input('self_image', false)) {
            $contact->addMedia(storage_path('tmp/uploads/' . basename($request->input('self_image'))))->toMediaCollection('self_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $contact->id]);
        }

        return redirect()->route('admin.contacts.index');
    }

    public function edit(Contact $contact)
    {
        abort_if(Gate::denies('contact_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contact->load('user');

        return view('admin.contacts.edit', compact('contact', 'users'));
    }

    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $contact->update($request->all());

        if ($request->input('identity_image', false)) {
            if (! $contact->identity_image || $request->input('identity_image') !== $contact->identity_image->file_name) {
                if ($contact->identity_image) {
                    $contact->identity_image->delete();
                }
                $contact->addMedia(storage_path('tmp/uploads/' . basename($request->input('identity_image'))))->toMediaCollection('identity_image');
            }
        } elseif ($contact->identity_image) {
            $contact->identity_image->delete();
        }

        if ($request->input('self_image', false)) {
            if (! $contact->self_image || $request->input('self_image') !== $contact->self_image->file_name) {
                if ($contact->self_image) {
                    $contact->self_image->delete();
                }
                $contact->addMedia(storage_path('tmp/uploads/' . basename($request->input('self_image'))))->toMediaCollection('self_image');
            }
        } elseif ($contact->self_image) {
            $contact->self_image->delete();
        }

        return redirect()->route('admin.contacts.index');
    }

    public function show(Contact $contact)
    {
        abort_if(Gate::denies('contact_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contact->load('user');

        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        abort_if(Gate::denies('contact_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contact->delete();

        return back();
    }

    public function massDestroy(MassDestroyContactRequest $request)
    {
        $contacts = Contact::find(request('ids'));

        foreach ($contacts as $contact) {
            $contact->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('contact_create') && Gate::denies('contact_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Contact();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
