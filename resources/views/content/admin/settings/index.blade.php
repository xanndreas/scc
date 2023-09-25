@extends('layouts/layoutMaster')

@section('title', trans('cruds.setting.title_singular'))

@section('vendor-style')
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet"/>
@endsection

@section('vendor-script')
    <script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@endsection

@section('page-script')
    <script src="{{asset('assets/js/admin/setting-index.js')}}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h6 class="text-muted">{{ trans('cruds.setting.title_singular') }}</h6>
            <div class="nav-align-top mb-4">
                <ul class="nav nav-pills mb-3" role="tablist">
                    @can('audit_log_access')
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-audit-logs" aria-controls="navs-pills-audit-logs"
                                    aria-selected="false">Audit Logs
                            </button>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-top-roles" aria-controls="navs-pills-top-roles"
                                    aria-selected="false">Roles
                            </button>
                        </li>
                    @endcan
                </ul>
                <div class="tab-content">
                    @can('audit_log_access')
                        <div class="tab-pane fade show active" id="navs-pills-audit-logs" role="tabpanel">
                            <div class="card-header border-bottom">
                                <h5 class="card-title mb-3">Audit Logs</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table border-top table-hover datatable-AuditLog">
                                    <thead>
                                    <tr>
                                        <th width="10">
                                        </th>
                                        <th>
                                            {{ trans('cruds.auditLog.fields.id') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.auditLog.fields.description') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.auditLog.fields.subject_id') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.auditLog.fields.subject_type') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.auditLog.fields.user_id') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.auditLog.fields.host') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.auditLog.fields.created_at') }}
                                        </th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    @endcan

                    @can('role_access')
                        <div class="tab-pane fade" id="navs-pills-top-roles" role="tabpanel">
                            <div class="card-header border-bottom">
                                <h5 class="card-title mb-3">Roles</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="datatables-users table border-top table-hover datatable-Role">
                                    <thead>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.role.fields.id') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.role.fields.title') }}
                                        </th>
                                        <th>
                                            {{ trans('global.actions') }}
                                        </th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>

                            @include('content.admin.settings.roles.show')
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection



