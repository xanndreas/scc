'use strict';

(function () {
    let direction = 'ltr',
        isRTL = false,
        btnCart = $('.btn-cart');

    if ($('html').data('textdirection') === 'rtl') {
        direction = 'rtl';
    }

    if (direction === 'rtl') {
        isRTL = true;
    }

    const messageWrapper = document.querySelector('.message-global-text');
    if (messageWrapper) {
        if (messageWrapper.value && messageWrapper.dataset.type) {
            let msgType = messageWrapper.dataset.type;
            if (msgType === 'errors') msgType = 'error';

            toastr[msgType]('', messageWrapper.value, {
                closeButton: true,
                tapToDismiss: false,
                rtl: isRTL
            });
        }
    }
})();

