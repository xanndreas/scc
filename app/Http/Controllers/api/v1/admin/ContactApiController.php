<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traits\MediaUploadingTrait;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Resources\admin\ContactResource;
use App\Models\Contact;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('contact_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContactResource(Contact::with(['user'])->get());
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

        return (new ContactResource($contact))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Contact $contact)
    {
        abort_if(Gate::denies('contact_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContactResource($contact->load(['user']));
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

        return (new ContactResource($contact))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Contact $contact)
    {
        abort_if(Gate::denies('contact_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contact->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
