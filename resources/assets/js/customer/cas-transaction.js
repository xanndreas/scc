'use strict';

$(function () {

    let dtOverrideGlobals = {
            processing: true,
            serverSide: true,
            retrieve: true,
            aaSorting: [],
            autoWidth: false,
            ajax: "/cas/transaction",
            columns: [
                {data: 'placeholder', name: 'placeholder'},
                {data: 'batch_code', name: 'batch_code'},
                {data: 'created_at', name: 'created_at'},
                {data: 'grand_total', name: 'grand_total'},
                {data: 'status', name: 'status'},
                {data: 'selling_transaction_number', name: 'selling_transaction_number'},
                {data: 'actions', name: 'actions'},
            ],
            orderCellsTop: true,
            order: [[2, 'desc']],
            pageLength: 10,
            dom: '<"row me-2"' +
                '<"col-md-2"<"me-3"l>>' +
                '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +
                '>t' +
                '<"row mx-2"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return 'Details';
                        }
                    }),
                    type: 'column',
                    renderer: function (api, rowIdx, columns) {
                        var data = $.map(columns, function (col, i) {
                            return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                                ? '<tr data-dt-row="' +
                                col.rowIndex +
                                '" data-dt-column="' +
                                col.columnIndex +
                                '">' +
                                '<td>' +
                                col.title +
                                ':' +
                                '</td> ' +
                                '<td>' +
                                col.data +
                                '</td>' +
                                '</tr>'
                                : '';
                        }).join('');

                        return data ? $('<table class="table"/><tbody />').append(data) : false;
                    }
                }
            },
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-label-secondary dropdown-toggle ms-2',
                    text: '<i class="ti ti-screen-share me-1 ti-xs"></i>Export',
                    buttons: [
                        {
                            extend: 'print',
                            text: '<i class="ti ti-printer me-2" ></i>Print',
                            className: 'dropdown-item',
                            customize: function (win) {
                                //customize print view for dark
                                $(win.document.body)
                                    .css('color', headingColor)
                                    .css('border-color', borderColor)
                                    .css('background-color', bodyBg);
                                $(win.document.body)
                                    .find('table')
                                    .addClass('compact')
                                    .css('color', 'inherit')
                                    .css('border-color', 'inherit')
                                    .css('background-color', 'inherit');
                            }
                        },
                        {
                            extend: 'csv',
                            text: '<i class="ti ti-file-text me-2" ></i>Csv',
                            className: 'dropdown-item',
                        },
                        {
                            extend: 'excel',
                            text: '<i class="ti ti-file-spreadsheet me-2"></i>Excel',
                            className: 'dropdown-item',
                        },
                        {
                            extend: 'pdf',
                            text: '<i class="ti ti-file-code-2 me-2"></i>Pdf',
                            className: 'dropdown-item',
                        },
                        {
                            extend: 'copy',
                            text: '<i class="ti ti-copy me-2" ></i>Copy',
                            className: 'dropdown-item',
                        }
                    ]
                },
            ],

            columnDefs: [
                {
                    className: 'control',
                    searchable: false,
                    orderable: false,
                    responsivePriority: 2,
                    targets: 0,
                    render: function (data, type, full, meta) {
                        return '';
                    }
                },
            ]
        },

        dataTableClass = $('.datatable-CasTransaction'),
        table = dataTableClass.DataTable(dtOverrideGlobals);

    $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });

    let $control = $('.control');
    $control.onClassChange(function (el, newClass) {
        let $placeholdersHeader = $control.parent().parent()
            .find('tr').eq(1)
            .find('td').eq(0);

        if (newClass === 'control sorting_disabled') $placeholdersHeader.removeClass('d-none');
        else $placeholdersHeader.addClass('d-none')
    });


    let visibleColumnsIndexes = null;
    $('.datatable thead').on('input', '.search', function () {
        let strict = $(this).attr('strict') || false
        let value = strict && this.value ? "^" + this.value + "$" : this.value

        let index = $(this).parent().index()
        if (visibleColumnsIndexes !== null) {
            index = visibleColumnsIndexes[index]
        }

        table
            .column(index + 1)
            .search(value, strict)
            .draw()
    });

    table.on('column-visibility.dt', function (e, settings, column, state) {
        visibleColumnsIndexes = []
        table.columns(":visible").every(function (colIdx) {
            visibleColumnsIndexes.push(colIdx);
        });
    })

    let transactionDetailModalSelector = $('#transaction-detail-modal'),
        transactionDetailModalContent = $('.transaction-container');

    if (transactionDetailModalSelector.length) {
        let transactionDetailModal = new bootstrap.Modal(document.getElementById('transaction-detail-modal'), {});
        $('.datatable-CasTransaction tbody').on('click', 'td:not(:last-child)', (event) => {
            let row = table.row(event.currentTarget).data();

            $.ajax({
                url: '/cas/transaction/' + row.id,
                datatype: 'html',
                type: 'get',

                beforeSend: function () {
                    transactionDetailModalContent.html('');
                }
            }).done(async function (response) {
                if (response.html === '') {
                    return;
                }

                transactionDetailModalContent.append(response.html);
                transactionDetailModal.show()
            }).fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occur');
            });
        });
    }
});
