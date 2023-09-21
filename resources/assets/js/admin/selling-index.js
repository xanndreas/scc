'use strict';

$(function () {

    let dtOverrideGlobals = {
            processing: true,
            serverSide: true,
            retrieve: true,
            aaSorting: [],
            autoWidth: false,
            ajax: "/admin/sellings",
            columns: [
                {data: 'placeholder', name: 'placeholder'},
                {data: 'id', name: 'id'},
                {data: 'batch_code', name: 'batch_code'},
                {data: 'grand_total', name: 'grand_total'},
                {data: 'notes', name: 'notes'},
                {data: 'rounding_cost', name: 'rounding_cost'},
                {data: 'additional_cost', name: 'additional_cost'},
                {data: 'price_discounts', name: 'price_discounts'},
                {data: 'customer_name', name: 'customer.name'},
                {data: 'status', name: 'status'},
                {data: 'selling_detail', name: 'selling_details.subtotal'},
                {data: 'selling_transaction_number', name: 'selling_transaction_number'},
                {data: 'actions', name: 'Actions'}
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
                    className: 'btn btn-label-secondary dropdown-toggle mx-3',
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
                {
                    text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Create New</span>',
                    className: 'btn-create-new btn btn-primary',
                    attr: {
                        'data-bs-toggle': 'offcanvas',
                        'data-bs-target': '#offcanvasCreateNew'
                    }
                }
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
                }, {
                    searchable: false,
                    orderable: false,
                    targets: -1
                },
            ]

        },
        dataTableClass = $('.datatable-Selling'),
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
            .column(index)
            .search(value, strict)
            .draw()
    });

    table.on('column-visibility.dt', function (e, settings, column, state) {
        visibleColumnsIndexes = []
        table.columns(":visible").every(function (colIdx) {
            visibleColumnsIndexes.push(colIdx);
        });
    })

    let canvasSelector = document.getElementById('offcanvasCreateNew')
    $('.datatable-Selling tbody').on('click', 'td:not(:first-child, :last-child)', (event) => {
        let row = table.row(event.currentTarget).data();

        $('input[name="batch_code"]').val(row.batch_code);
        $('input[name="grand_total"]').val(row.grand_total);
        $('input[name="notes"]').val(row.notes);
        $('input[name="rounding_cost"]').val(row.rounding_cost);
        $('input[name="additional_cost"]').val(row.additional_cost);
        $('input[name="price_discounts"]').val(row.price_discounts);
        $('input[name="customer.name"]').val(row.customer_name);
        $('input[name="status"]').val(row.status);
        $('input[name="selling_details"]').val(row.selling_detail);
        $('input[name="selling_transaction_number"]').val(row.selling_transaction_number);


        if (row.id) {
            let createForms = $('#createNewForm');
            createForms.attr('action', "/admin/sellings/" + row.id);
            createForms.data('operation', 'update')
        }

        canvasSelector.addEventListener('hidden.bs.offcanvas', function () {
            $('#createNewForm')
                .trigger("reset");
        });
        let bsOffCanvasAddRequestCreditHelp = new bootstrap.Offcanvas(canvasSelector)
        bsOffCanvasAddRequestCreditHelp.show();
    });

    canvasSelector.addEventListener('shown.bs.offcanvas', function () {
        if ($('#createNewForm').data('operation') === 'store') $('input[name="_method"]').prop('disabled', true);
        else $('input[name="_method"]').prop('disabled', false);
    });
});
