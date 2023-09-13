<div class="message-wrapper">
    @php
        $flashDataType = session()->get('success') ? 'success' : (session()->get('errors') ?
        'errors' : (session()->get('info') ? 'info': null))
    @endphp

    <input class="message-global-text" type="hidden"
           value="{{ $flashDataType ? session()->get($flashDataType) : null }}"
           data-type="{{ $flashDataType }}">
</div>

@isset($pageConfigs)
    {!! Helper::updatePageConfig($pageConfigs) !!}
@endisset
@php
    $configData = Helper::appClasses();
@endphp

@isset($configData["layout"])
    @include(
        (( $configData["layout"] === 'horizontal') ? 'layouts.horizontalLayout' :
        (( $configData["layout"] === 'blank') ? 'layouts.blankLayout' :
        (( $configData["layout"] === 'customer') ? 'layouts.customerLayout':
        'layouts.contentNavbarLayout')))
    )
@endisset
