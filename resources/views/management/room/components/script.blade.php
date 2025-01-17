<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>

    //////////////////////////////////////////////////////////////////////////////////////////////////

    const months = [
        'Ocak',
        'Şubat',
        'Mart',
        'Nisan',
        'Mayıs',
        'Haziran',
        'Temmuz',
        'Ağustos',
        'Eylül',
        'Ekim',
        'Kasım',
        'Aralık',
    ];

    //////////////////////////////////////////////////////////////////////////////////////////////////

    var reservationCustomers = $('#reservationCustomers').DataTable({
        language: {
            info: "_TOTAL_ Kayıttan _START_ - _END_ Arasındaki Kayıtlar Gösteriliyor.",
            infoEmpty: "Gösterilecek Hiç Kayıt Yok.",
            loadingRecords: "Kayıtlar Yükleniyor.",
            zeroRecords: "Tablo Boş",
            search: "Arama:",
            infoFiltered: "(Toplam _MAX_ Kayıttan Filtrelenenler)",
            lengthMenu: "Sayfa Başı _MENU_ Kayıt Göster",
            sProcessing: "Yükleniyor...",
            paginate: {
                first: "İlk",
                previous: "Önceki",
                next: "Sonraki",
                last: "Son"
            },
            select: {
                rows: {
                    "_": "%d kayıt seçildi",
                    "0": "",
                    "1": "1 kayıt seçildi"
                }
            },
            buttons: {
                print: {
                    title: 'Yazdır'
                }
            }
        },

        dom: 'rt',

        responsive: true,
        select: 'single'
    });

    var reservationEditCustomers = $('#reservationEditCustomers').DataTable({
        language: {
            info: "_TOTAL_ Kayıttan _START_ - _END_ Arasındaki Kayıtlar Gösteriliyor.",
            infoEmpty: "Gösterilecek Hiç Kayıt Yok.",
            loadingRecords: "Kayıtlar Yükleniyor.",
            zeroRecords: "Tablo Boş",
            search: "Arama:",
            infoFiltered: "(Toplam _MAX_ Kayıttan Filtrelenenler)",
            lengthMenu: "Sayfa Başı _MENU_ Kayıt Göster",
            sProcessing: "Yükleniyor...",
            paginate: {
                first: "İlk",
                previous: "Önceki",
                next: "Sonraki",
                last: "Son"
            },
            select: {
                rows: {
                    "_": "%d kayıt seçildi",
                    "0": "",
                    "1": "1 kayıt seçildi"
                }
            },
            buttons: {
                print: {
                    title: 'Yazdır'
                }
            }
        },

        dom: 'rt',

        responsive: true,
        select: 'single'
    });

    var reservationSafeActivities = $('#reservationSafeActivities').DataTable({
        language: {
            info: "_TOTAL_ Kayıttan _START_ - _END_ Arasındaki Kayıtlar Gösteriliyor.",
            infoEmpty: "Gösterilecek Hiç Kayıt Yok.",
            loadingRecords: "Kayıtlar Yükleniyor.",
            zeroRecords: "Tablo Boş",
            search: "Arama:",
            infoFiltered: "(Toplam _MAX_ Kayıttan Filtrelenenler)",
            lengthMenu: "Sayfa Başı _MENU_ Kayıt Göster",
            sProcessing: "Yükleniyor...",
            paginate: {
                first: "İlk",
                previous: "Önceki",
                next: "Sonraki",
                last: "Son"
            },
            select: {
                rows: {
                    "_": "%d kayıt seçildi",
                    "0": "",
                    "1": "1 kayıt seçildi"
                }
            },
            buttons: {
                print: {
                    title: 'Yazdır'
                }
            }
        },

        dom: 'prt',

        columnDefs: [
            {
                targets: 0,
                width: "3%"
            },
            {
                targets: 1,
                width: "10%"
            },
            {
                targets: 2,
                width: "20%"
            },
            {
                targets: 3,
                width: "12%"
            },
            {
                targets: 4,
                width: "10%"
            },
            {
                targets: 5,
                width: "10%"
            }
        ],

        responsive: true,
        select: 'single'
    });

    var createReservationSelectCustomerTable = $('#createReservationSelectCustomerTable').DataTable({
        language: {
            info: "_TOTAL_ Kayıttan _START_ - _END_ Arasındaki Kayıtlar Gösteriliyor.",
            infoEmpty: "Gösterilecek Hiç Kayıt Yok.",
            loadingRecords: "Kayıtlar Yükleniyor.",
            zeroRecords: "Tablo Boş",
            search: "Arama:",
            infoFiltered: "(Toplam _MAX_ Kayıttan Filtrelenenler)",
            lengthMenu: "Sayfa Başı _MENU_ Kayıt Göster",
            sProcessing: "Yükleniyor...",
            paginate: {
                first: "İlk",
                previous: "Önceki",
                next: "Sonraki",
                last: "Son"
            },
            select: {
                rows: {
                    "_": "%d kayıt seçildi",
                    "0": "",
                    "1": "1 kayıt seçildi"
                }
            },
            buttons: {
                print: {
                    title: 'Yazdır'
                }
            }
        },

        dom: 'rtp',

        initComplete: function () {
            var r = $('#createReservationSelectCustomerTable tfoot tr');
            $('#createReservationSelectCustomerTable thead').append(r);
            this.api().columns().every(function (index) {
                var column = this;
                var input = document.createElement('input');
                input.className = 'form-control';
                $(input).appendTo($(column.footer()).empty())
                    .on('change', function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
            });
        },

        processing: true,
        serverSide: true,
        ajax: '{!! route('ajax.customers.index') !!}',
        columns: [
            {data: 'id', name: 'id', width: "3%"},
            {data: 'name', name: 'name'},
            {data: 'surname', name: 'surname'},
            {data: 'phone_number', name: 'phone_number'},
            {data: 'title', name: 'title'},
            {data: 'identity_number', name: 'identity_number'},
            {data: 'gender', name: 'gender'}
        ],

        responsive: true,
        select: 'single'
    });

    var editReservationSelectCustomerTable = $('#editReservationSelectCustomerTable').DataTable({
        language: {
            info: "_TOTAL_ Kayıttan _START_ - _END_ Arasındaki Kayıtlar Gösteriliyor.",
            infoEmpty: "Gösterilecek Hiç Kayıt Yok.",
            loadingRecords: "Kayıtlar Yükleniyor.",
            zeroRecords: "Tablo Boş",
            search: "Arama:",
            infoFiltered: "(Toplam _MAX_ Kayıttan Filtrelenenler)",
            lengthMenu: "Sayfa Başı _MENU_ Kayıt Göster",
            sProcessing: "Yükleniyor...",
            paginate: {
                first: "İlk",
                previous: "Önceki",
                next: "Sonraki",
                last: "Son"
            },
            select: {
                rows: {
                    "_": "%d kayıt seçildi",
                    "0": "",
                    "1": "1 kayıt seçildi"
                }
            },
            buttons: {
                print: {
                    title: 'Yazdır'
                }
            }
        },

        dom: 'rtp',

        initComplete: function () {
            var r = $('#editReservationSelectCustomerTable tfoot tr');
            $('#editReservationSelectCustomerTable thead').append(r);
            this.api().columns().every(function (index) {
                var column = this;
                var input = document.createElement('input');
                input.className = 'form-control';
                $(input).appendTo($(column.footer()).empty())
                    .on('change', function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
            });
        },

        processing: true,
        serverSide: true,
        ajax: '{!! route('ajax.customers.index') !!}',
        columns: [
            {data: 'id', name: 'id', width: "3%"},
            {data: 'name', name: 'name'},
            {data: 'surname', name: 'surname'},
            {data: 'phone_number', name: 'phone_number'},
            {data: 'title', name: 'title'},
            {data: 'identity_number', name: 'identity_number'},
            {data: 'gender', name: 'gender'}
        ],

        responsive: true,
        select: 'single'
    });

    //////////////////////////////////////////////////////////////////////////////////////////////////

    var roomStatusOptions = $('.roomStatusOption');

    var reservationEditCustomersDeleteRowButton = $("#reservationEditCustomersDeleteRowButton");
    var customersDeleteRowButton = $("#customersDeleteRowButton");
    var editReservationCreateCustomerButton = $("#editReservationCreateCustomerButton");
    var updateReservationButton = $("#updateReservationButton");
    var editReservationSelectCustomerButton = $("#editReservationSelectCustomerButton");
    var roomTypeEditSelector = $("#room_type_id_edit");
    var panTypeEditSelector = $("#pan_type_id_edit");
    var roomEditSelector = $("#room_id_edit");
    var addExtraReservationButton = $("#addExtraReservationButton");
    var startDateEditSelector = $("#start_date_edit");
    var endDateEditSelector = $("#end_date_edit");
    var createReservationButton = $("#createReservationButton");
    var createCustomerButton = $("#createCustomerButton");
    var createReservationSelectCustomerButton = $("#createReservationSelectCustomerButton");
    var roomTypeSelector = $("#room_type_id_create");
    var panTypeSelector = $("#pan_type_id_create");
    var roomSelector = $("#room_id_create");
    var startDateCreateSelector = $("#start_date_create");
    var endDateCreateSelector = $("#end_date_create");
    var getPaymentButton = $("#getPaymentButton");
    var setRoomPriceCollectiveButton = $("#setRoomPriceCollectiveButton");
    var setRoomStatusCollectiveButton = $("#setRoomStatusCollectiveButton");
    var transferExtrasAndSafeActivitiesButton = $("#transferExtrasAndSafeActivitiesButton");
    var transferToSelector = $("#transfer_to");
    var transferSafeActivitiesSelector = $("#transfer_safe_activities");
    var refundButton = $("#refundButton");
    var discountButton = $("#discountButton");
    var endWithWaitingPaymentButton = $("#endWithWaitingPaymentButton");
    var roomStatusFilterer = $("#roomStatusFilterer");

    //////////////////////////////////////////////////////////////////////////////////////////////////

    var CreateReservationRightBar = function () {
        // Private properties
        var _element;
        var _offcanvasObject;

        // Private functions
        var _init = function () {
            var header = KTUtil.find(_element, '.offcanvas-header');
            var content = KTUtil.find(_element, '.offcanvas-content');

            _offcanvasObject = new KTOffcanvas(_element, {
                overlay: true,
                baseClass: 'offcanvas',
                placement: 'right',
                closeBy: 'create_reservation_rightbar_close',
                toggleBy: 'create_reservation_rightbar_toggle'
            });

            KTUtil.scrollInit(content, {
                disableForMobile: true,
                resetHeightOnDestroy: true,
                handleWindowResize: true,
                height: function () {
                    var height = parseInt(KTUtil.getViewPort().height);

                    if (header) {
                        height = height - parseInt(KTUtil.actualHeight(header));
                        height = height - parseInt(KTUtil.css(header, 'marginTop'));
                        height = height - parseInt(KTUtil.css(header, 'marginBottom'));
                    }

                    if (content) {
                        height = height - parseInt(KTUtil.css(content, 'marginTop'));
                        height = height - parseInt(KTUtil.css(content, 'marginBottom'));
                    }

                    height = height - parseInt(KTUtil.css(_element, 'paddingTop'));
                    height = height - parseInt(KTUtil.css(_element, 'paddingBottom'));

                    height = height - 2;

                    return height;
                }
            });
        }

        // Public methods
        return {
            init: function () {
                _element = KTUtil.getById('create_reservation_rightbar');

                if (!_element) {
                    return;
                }

                // Initialize
                _init();
            },

            getElement: function () {
                return _element;
            }
        };
    }();
    CreateReservationRightBar.init();

    var EditReservationRightBar = function () {
        // Private properties
        var _element;
        var _offcanvasObject;

        // Private functions
        var _init = function () {
            var header = KTUtil.find(_element, '.offcanvas-header');
            var content = KTUtil.find(_element, '.offcanvas-content');

            _offcanvasObject = new KTOffcanvas(_element, {
                overlay: true,
                baseClass: 'offcanvas',
                placement: 'right',
                closeBy: 'edit_reservation_rightbar_close',
                toggleBy: 'edit_reservation_rightbar_toggle'
            });

            KTUtil.scrollInit(content, {
                disableForMobile: true,
                resetHeightOnDestroy: true,
                handleWindowResize: true,
                height: function () {
                    var height = parseInt(KTUtil.getViewPort().height);

                    if (header) {
                        height = height - parseInt(KTUtil.actualHeight(header));
                        height = height - parseInt(KTUtil.css(header, 'marginTop'));
                        height = height - parseInt(KTUtil.css(header, 'marginBottom'));
                    }

                    if (content) {
                        height = height - parseInt(KTUtil.css(content, 'marginTop'));
                        height = height - parseInt(KTUtil.css(content, 'marginBottom'));
                    }

                    height = height - parseInt(KTUtil.css(_element, 'paddingTop'));
                    height = height - parseInt(KTUtil.css(_element, 'paddingBottom'));

                    height = height - 2;

                    return height;
                }
            });
        }

        // Public methods
        return {
            init: function () {
                _element = KTUtil.getById('edit_reservation_rightbar');

                if (!_element) {
                    return;
                }

                // Initialize
                _init();
            },

            getElement: function () {
                return _element;
            }
        };
    }();
    EditReservationRightBar.init();

    var ReservationSafeActivitiesRightBar = function () {
        // Private properties
        var _element;
        var _offcanvasObject;

        // Private functions
        var _init = function () {
            var header = KTUtil.find(_element, '.offcanvas-header');
            var content = KTUtil.find(_element, '.offcanvas-content');

            _offcanvasObject = new KTOffcanvas(_element, {
                overlay: true,
                baseClass: 'offcanvas',
                placement: 'right',
                closeBy: 'reservation_safe_activities_rightbar_close',
                toggleBy: 'reservation_safe_activities_rightbar_toggle'
            });

            KTUtil.scrollInit(content, {
                disableForMobile: true,
                resetHeightOnDestroy: true,
                handleWindowResize: true,
                height: function () {
                    var height = parseInt(KTUtil.getViewPort().height);

                    if (header) {
                        height = height - parseInt(KTUtil.actualHeight(header));
                        height = height - parseInt(KTUtil.css(header, 'marginTop'));
                        height = height - parseInt(KTUtil.css(header, 'marginBottom'));
                    }

                    if (content) {
                        height = height - parseInt(KTUtil.css(content, 'marginTop'));
                        height = height - parseInt(KTUtil.css(content, 'marginBottom'));
                    }

                    height = height - parseInt(KTUtil.css(_element, 'paddingTop'));
                    height = height - parseInt(KTUtil.css(_element, 'paddingBottom'));

                    height = height - 2;

                    return height;
                }
            });
        }

        // Public methods
        return {
            init: function () {
                _element = KTUtil.getById('reservation_safe_activities_rightbar');

                if (!_element) {
                    return;
                }

                // Initialize
                _init();
            },

            getElement: function () {
                return _element;
            }
        };
    }();
    ReservationSafeActivitiesRightBar.init();

    //////////////////////////////////////////////////////////////////////////////////////////////////

    reservationEditCustomersDeleteRowButton.hide();
    customersDeleteRowButton.hide();

    //////////////////////////////////////////////////////////////////////////////////////////////////

    reservationEditCustomers.on('select deselect', function (e, dt, type, indexes) {
        var selectedRows = reservationEditCustomers.rows({selected: true});
        if (selectedRows.count() > 0) {
            reservationEditCustomersDeleteRowButton.show();
            if (type == 'row') {
                var data = reservationEditCustomers.rows(indexes).data()[0]['DT_RowId'].replace('customer_id_', '');
                $("#editing_reservation_deleting_customer_id").val(data);
            }
        } else {
            reservationEditCustomersDeleteRowButton.hide();
            $("#editing_reservation_deleting_customer_id").val(null);
        }
    });

    reservationEditCustomersDeleteRowButton.click(function () {
        var customer_id = $("#editing_reservation_deleting_customer_id").val();
        reservationEditCustomers.row('#customer_id_' + customer_id).remove().draw();
        reservationEditCustomersDeleteRowButton.hide();
    });

    editReservationSelectCustomerTable.on('select deselect', function (e, dt, type, indexes) {
        var selectedRows = editReservationSelectCustomerTable.rows({selected: true});
        if (selectedRows.count() > 0) {
            editReservationSelectCustomerButton.show();
            if (type == 'row') {
                var data = editReservationSelectCustomerTable.rows(indexes).data()[0]['id'];
                $("#edit_reservation_selected_customer_id").val(data);
            }
        } else {
            editReservationSelectCustomerButton.hide();
            $("#edit_reservation_selected_customer_id").val(null);
        }
    });

    editReservationSelectCustomerButton.click(function () {
        var customer_id = $("#edit_reservation_selected_customer_id").val();

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.customers.edit') }}',
            data: {
                customer_id: customer_id
            },
            success: function (customer) {
                var newCustomer = $.parseHTML(`` +
                    `<tr id="customer_id_${customer.id}">` +
                    `<td>${customer.name}</td>` +
                    `<td>${customer.surname}</td>` +
                    `<td>${customer.title ?? ''}</td>` +
                    `<td>${customer.nationality.name}</td>` +
                    `<td>${customer.gender == 1 ? 'Erkek' : 'Kadın'}</td>` +
                    `</tr>` +
                    ``)[0];

                reservationEditCustomers.row.add(newCustomer);
                reservationEditCustomers.draw(false);

                $("#EditReservationSelectCustomerModal").modal('hide');
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    editReservationCreateCustomerButton.click(function () {
        var name = $("#edit_reservation_customer_create_name").val();
        var surname = $("#edit_reservation_customer_create_surname").val();
        var phone_number = $("#edit_reservation_customer_create_phone_number").val();
        var gender = $("#edit_reservation_customer_create_gender").val();
        var title = $("#edit_reservation_customer_create_title").val();
        var nationality_id = $("#edit_reservation_customer_create_nationality_id").val();
        var marriage = $("#edit_reservation_customer_create_marriage").val();
        var identity_type_id = $("#edit_reservation_customer_create_identity_type_id").val();
        var identity_number = $("#edit_reservation_customer_create_identity_number").val();
        var identity_expiration_date = $("#edit_reservation_customer_create_identity_expiration_date").val();
        var birth_date = $("#edit_reservation_customer_create_birth_date").val();
        var birth_place = $("#edit_reservation_customer_create_birth_place").val();
        var mother_name = $("#edit_reservation_customer_create_mother_name").val();
        var father_name = $("#edit_reservation_customer_create_father_name").val();

        if (name == '' || name == null) {
            toastr.warning('Ad Boş Olamaz');
        } else if (surname == '' || surname == null) {
            toastr.warning('Soyad Boş Olamaz');
        } else if (gender == '' || gender == null) {
            toastr.warning('Cinsiyet Seçmediniz!');
        } else if (phone_number == '' || phone_number == null) {
            toastr.warning('Telefon Numarası Boş Olamaz!');
        } else if (nationality_id == '' || nationality_id == null) {
            toastr.warning('Uyruk Seçmediniz!');
        } else if (identity_type_id == '' || identity_type_id == null) {
            toastr.warning('Kimlik Türü Seçmediniz!');
        } else if (identity_number == '' || identity_number == null) {
            toastr.warning('Kimlik Numarası Olamaz');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('ajax.customers.save') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    name: name,
                    surname: surname,
                    phone_number: phone_number,
                    gender: gender,
                    title: title,
                    nationality_id: nationality_id,
                    marriage: marriage,
                    identity_type_id: identity_type_id,
                    identity_number: identity_number,
                    identity_expiration_date: identity_expiration_date,
                    birth_date: birth_date,
                    birth_place: birth_place,
                    mother_name: mother_name,
                    father_name: father_name
                },
                success: function (customer) {
                    var newCustomer = $.parseHTML(`` +
                        `<tr id="customer_id_${customer.id}">` +
                        `<td>${customer.name}</td>` +
                        `<td>${customer.surname}</td>` +
                        `<td>${customer.title ?? ''}</td>` +
                        `<td>${customer.nationality.name}</td>` +
                        `<td>${customer.gender == 1 ? 'Erkek' : 'Kadın'}</td>` +
                        `</tr>` +
                        ``)[0];

                    reservationEditCustomers.row.add(newCustomer);
                    reservationEditCustomers.draw(false);

                    $("#editReservationCreateCustomerForm").trigger('reset');
                    $("#EditReservationCreateCustomerModal").modal('hide');
                },
                error: function (error) {
                    console.log(error)
                }
            });
        }
    });

    updateReservationButton.click(function () {
        $("#loader").fadeIn(250);
        $("#edit_reservation_rightbar_toggle").click();
        var reservation_id = $("#selected_reservation_id").val();
        var company_id = $("#company_id_edit").val();
        var customer_name = $("#customer_name_edit").val();
        var start_date = $("#start_date_edit").val();
        var end_date = $("#end_date_edit").val();
        var room_type_id = $("#room_type_id_edit").val();
        var pan_type_id = $("#pan_type_id_edit").val();
        var room_id = $("#room_id_edit").val();
        var room_use_type_id = $("#room_use_type_id_edit").val();
        var status_id = $("#selected_reservation_status_id").val();
        var price = $("#price_edit").val();
        var description = $("#description_edit").val();

        if (reservation_id == '' || reservation_id == null) {
            toastr.error('Reservasyon Seçiminde Hata Oluştu. Sayfayı Yenilemeyi Deneyin');
        } else if (customer_name == null || customer_name == '') {
            toastr.warning('Rezervasyonu Yaptıran Müşteri Adını Giriniz!');
        } else if (start_date == null || start_date == '') {
            toastr.warning('Geliş Tarihini Seçmediniz!');
        } else if (end_date == null || end_date == '') {
            toastr.warning('Gidiş Tarihini Seçmediniz!');
        } else if (room_type_id == null || room_type_id == '') {
            toastr.warning('Oda Tipini Seçmediniz!');
        } else if (pan_type_id == null || pan_type_id == '') {
            toastr.warning('Pan Tipini Seçmediniz!');
        } else if (room_id == null || room_id == '') {
            toastr.warning('Oda Seçimi Yapmadınız!');
        } else if (room_use_type_id == null || room_use_type_id == '') {
            toastr.warning('Oda Kullanım Tipini Seçmediniz!');
        } else if (price == null || price == '') {
            toastr.warning('Oda Ücretini Girmediniz!');
        } else {
            customerList = reservationEditCustomers.rows().data();
            customerListArray = [];

            $.each(customerList, function (index) {
                customerListArray.push(customerList[index]['DT_RowId'].replace('customer_id_', ''));
            });

            var data = {
                _token: '{{ csrf_token() }}',
                reservation_id: reservation_id,
                customer_name: customer_name,
                company_id: company_id,
                start_date: start_date,
                end_date: end_date,
                room_type_id: room_type_id,
                pan_type_id: pan_type_id,
                room_id: room_id,
                room_use_type_id: room_use_type_id,
                status_id: status_id,
                price: price,
                description: description,
                customers: customerListArray
            }

            $.ajax({
                type: 'post',
                url: '{{ route('ajax.reservations.save') }}',
                data: data,
                success: function () {
                    location.reload();
                },
                error: function (error) {
                    $("#loader").fadeOut(250);
                    toastr.error('Bir Hata Oluştu!');
                    console.log(error)
                }
            });
        }
    });

    addExtraReservationButton.click(function () {
        var safe_id = 1;
        var reservation_id = $("#selected_reservation_id").val();
        var extra_id = $("#create_extra_extra_id").val();
        var direction = 1;
        var price = $("#create_extra_price").val();
        var description = $("#create_extra_description").val();
        var date = $("#create_extra_date").val();
        var safe_activity_control = $("#create_extra_safe_activity_control").val();
        var safe_activity_direction = $("#create_extra_safe_activity_direction").val();

        if (reservation_id == '' || reservation_id == null) {
            toastr.error('Rezervasyon Seçiminde Hata Oluştu. Sayfayı Yenilemeyi Deneyin!');
        } else if (extra_id == '' || extra_id == null) {
            toastr.warning('Ekstra Seçimi Yapmadınız!');
        } else if (price == '' || price == null) {
            toastr.warning('Ücret Girmediniz!');
        } else if (date == '' || date == null) {
            toastr.warning('Tarih Seçmediniz!');
        } else if (description == '' || description == null) {
            toastr.warning('Açıklama Boş Olamaz!');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('ajax.safe-activities.create') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    user_id: '{{ auth()->user()->id() }}',
                    safe_id: safe_id,
                    reservation_id: reservation_id,
                    extra_id: extra_id,
                    direction: direction,
                    price: price,
                    description: description,
                    date: date,
                    safe_activity_control: safe_activity_control,
                    safe_activity_direction: safe_activity_direction,
                },
                success: function () {
                    toastr.success('Ekstra Başarıyla Eklendi');
                    $("#AddExtraReservationModal").modal('hide');
                    $("#AddExtraReservationForm").trigger('reset');

                    $.ajax({
                        type: 'get',
                        url: '{{ route('ajax.reservations.debtControl') }}',
                        data: {
                            reservation_id: reservation_id
                        },
                        success: function (response) {
                            $("#reservationCheckout_" + reservation_id).html(parseFloat(response.outgoing - response.incoming).toFixed(2) + " TL");
                        },
                        error: function (error) {
                            console.log(error)
                        }
                    });
                },
                error: function (error) {
                    console.log(error)
                }
            });
        }
    });

    getPaymentButton.click(function () {
        var reservation_id = $("#selected_reservation_id").val();
        var checkouts = [];

        var paymentTypes = $('select.paymentTypeSelector');
        var prices = $('input.priceSelector');
        var descriptions = $('input.descriptionSelector');

        paymentTypesControl = 1;
        pricesControl = 1;

        if (paymentTypes.length === 0) {
            toastr.warning('Hiç Ödeme Eklemediniz!');
        } else {
            $.each(paymentTypes, function (index) {
                if ($(this).val() == null || $(this).val() == '') {
                    paymentTypesControl = 0;
                    return;
                }
                checkouts[index] = {
                    payment_type_id: $(this).val()
                }
            });

            if (paymentTypesControl == 1) {
                $.each(prices, function (index) {
                    if ($(this).val() == null || $(this).val() == '') {
                        pricesControl = 0;
                        return;
                    }
                    checkouts[index] = {
                        payment_type_id: checkouts[index].payment_type_id,
                        price: $(this).val()
                    };
                });
            }

            if (paymentTypesControl == 1 && pricesControl == 1) {
                $.each(descriptions, function (index) {
                    checkouts[index] = {
                        payment_type_id: checkouts[index].payment_type_id,
                        price: checkouts[index].price,
                        description: $(this).val()
                    };
                });
            }

            if (paymentTypesControl == 0) {
                toastr.warning('Boş Ödeme Türü Alanı Var');
            } else if (pricesControl == 0) {
                toastr.warning('Boş Fiyat Alanı Var');
            } else {
                $("#GetPaymentModal").modal('hide');
                $("#GetPaymentForm").trigger('reset');
                $("#loader").fadeIn(250);
                toastr.info('İşlem Yapılıyor Lütfen Bekleyin!');
                $.ajax({
                    type: 'post',
                    url: '{{ route('ajax.safe-activities.getPayment') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        reservation_id: reservation_id,
                        checkouts: checkouts
                    },
                    success: function () {
                        $("#loader").fadeOut(250);
                        toastr.success('Ödeme Başarıyla Alındı');

                        $.ajax({
                            type: 'get',
                            url: '{{ route('ajax.reservations.debtControl') }}',
                            data: {
                                reservation_id: reservation_id
                            },
                            success: function (response) {
                                $("#reservationCheckout_" + reservation_id).html(parseFloat(response.outgoing - response.incoming).toFixed(2) + " TL");
                            },
                            error: function (error) {
                                console.log(error)
                            }
                        });
                    },
                    error: function (error) {
                        toastr.error('Ödeme Alınırken Sistemsel Bir Hata Oluştu!');
                        console.log(error)
                    }
                });
            }
        }
    });

    refundButton.click(function () {
        var reservation_id = $("#refund_reservation_id").val();
        var price = $("#refund_price").val();
        var description = $("#refund_description").val();

        if (reservation_id == null || reservation_id === '') {
            toastr.error('Rezervasyon Seçiminde Hata Oluştu! Sayfayı Yenilemeyi Deneyin.');
        } else if (price == null || price === '') {
            toastr.warning('İade Edilecek Tutarı Girmediniz!');
        } else if (description == null || description === '') {
            toastr.warning('Açıklama Boş Olamaz!');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('ajax.safe-activities.refund') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    reservation_id: reservation_id,
                    price: price,
                    description: description,
                },
                success: function () {
                    toastr.success('İade Başarıyla Yapıldı');
                    $("#RefundModal").modal('hide');
                    $("#RefundForm").trigger('reset');

                    $.ajax({
                        type: 'get',
                        url: '{{ route('ajax.reservations.debtControl') }}',
                        data: {
                            reservation_id: reservation_id
                        },
                        success: function (response) {
                            $("#reservationCheckout_" + reservation_id).html(parseFloat(response.outgoing - response.incoming).toFixed(2) + " TL");
                        },
                        error: function (error) {
                            console.log(error)
                        }
                    });
                },
                error: function (error) {
                    console.log(error)
                }
            });
        }
    });

    discountButton.click(function () {
        var reservation_id = $("#discount_reservation_id").val();
        var price = $("#discount_price").val();
        var description = $("#discount_description").val();

        if (reservation_id == null || reservation_id === '') {
            toastr.error('Rezervasyon Seçiminde Hata Oluştu! Sayfayı Yenilemeyi Deneyin.');
        } else if (price == null || price === '') {
            toastr.warning('İndirim Yapılacak Tutarı Girmediniz!');
        } else if (description == null || description === '') {
            toastr.warning('Açıklama Boş Olamaz!');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('ajax.safe-activities.discount') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    reservation_id: reservation_id,
                    price: price,
                    description: description,
                },
                success: function () {
                    toastr.success('İndirim Başarıyla Uygulandı!');
                    $("#DiscountModal").modal('hide');
                    $("#DiscountForm").trigger('reset');

                    $.ajax({
                        type: 'get',
                        url: '{{ route('ajax.reservations.debtControl') }}',
                        data: {
                            reservation_id: reservation_id
                        },
                        success: function (response) {
                            $("#reservationCheckout_" + reservation_id).html(parseFloat(response.outgoing - response.incoming).toFixed(2) + " TL");
                        },
                        error: function (error) {
                            console.log(error)
                        }
                    });
                },
                error: function (error) {
                    console.log(error)
                }
            });
        }
    });

    //////////////////////////////////////////////////////////////////////////////////////////////////

    reservationCustomers.on('select deselect', function (e, dt, type, indexes) {
        var selectedRows = reservationCustomers.rows({selected: true});
        if (selectedRows.count() > 0) {
            customersDeleteRowButton.show();
            if (type == 'row') {
                var data = reservationCustomers.rows(indexes).data()[0]['DT_RowId'].replace('customer_id_', '');
                $("#create_reservation_deleting_customer_id").val(data);
            }
        } else {
            customersDeleteRowButton.hide();
            $("#create_reservation_deleting_customer_id").val(null);
        }
    });

    createCustomerButton.click(function () {
        var name = $("#customer_create_name").val();
        var surname = $("#customer_create_surname").val();
        var phone_number = $("#customer_create_phone_number").val();
        var gender = $("#customer_create_gender").val();
        var title = $("#customer_create_title").val();
        var nationality_id = $("#customer_create_nationality_id").val();
        var marriage = $("#customer_create_marriage").val();
        var identity_type_id = $("#customer_create_identity_type_id").val();
        var identity_number = $("#customer_create_identity_number").val();
        var identity_expiration_date = $("#customer_create_identity_expiration_date").val();
        var birth_date = $("#customer_create_birth_date").val();
        var birth_place = $("#customer_create_birth_place").val();
        var mother_name = $("#customer_create_mother_name").val();
        var father_name = $("#customer_create_father_name").val();

        if (name == '' || name == null) {
            toastr.warning('Ad Boş Olamaz');
        } else if (surname == '' || surname == null) {
            toastr.warning('Soyad Boş Olamaz');
        } else if (phone_number == '' || phone_number == null) {
            toastr.warning('Telefon Numarası Boş Olamaz!');
        } else if (gender == '' || gender == null) {
            toastr.warning('Cinsiyet Seçmediniz!');
        } else if (nationality_id == '' || nationality_id == null) {
            toastr.warning('Uyruk Seçmediniz!');
        } else if (identity_type_id == '' || identity_type_id == null) {
            toastr.warning('Kimlik Türü Seçmediniz!');
        } else if (identity_number == '' || identity_number == null) {
            toastr.warning('Kimlik Numarası Olamaz');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('ajax.customers.save') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    name: name,
                    surname: surname,
                    phone_number: phone_number,
                    gender: gender,
                    title: title,
                    nationality_id: nationality_id,
                    marriage: marriage,
                    identity_type_id: identity_type_id,
                    identity_number: identity_number,
                    identity_expiration_date: identity_expiration_date,
                    birth_date: birth_date,
                    birth_place: birth_place,
                    mother_name: mother_name,
                    father_name: father_name
                },
                success: function (customer) {
                    var newCustomer = $.parseHTML(`` +
                        `<tr id="customer_id_${customer.id}">` +
                        `<td>${customer.name}</td>` +
                        `<td>${customer.surname}</td>` +
                        `<td>${customer.title ?? ''}</td>` +
                        `<td>${customer.nationality.name}</td>` +
                        `<td>${customer.gender == 1 ? 'Erkek' : 'Kadın'}</td>` +
                        `</tr>` +
                        ``)[0];

                    reservationCustomers.row.add(newCustomer);
                    reservationCustomers.draw(false);

                    $("#createCustomerForm").trigger('reset');
                    $("#CreateCustomerModal").modal('hide');
                },
                error: function (error) {
                    console.log(error)
                }
            });
        }
    });

    customersDeleteRowButton.click(function () {
        var customer_id = $("#create_reservation_deleting_customer_id").val();
        reservationCustomers.row('#customer_id_' + customer_id).remove().draw();
    });

    createReservationSelectCustomerTable.on('select deselect', function (e, dt, type, indexes) {
        var selectedRows = createReservationSelectCustomerTable.rows({selected: true});
        if (selectedRows.count() > 0) {
            createReservationSelectCustomerButton.show();
            if (type == 'row') {
                var data = createReservationSelectCustomerTable.rows(indexes).data()[0]['id'];
                $("#create_reservation_selected_customer_id").val(data);
            }
        } else {
            createReservationSelectCustomerButton.hide();
            $("#create_reservation_selected_customer_id").val(null);
        }
    });

    createReservationSelectCustomerButton.click(function () {
        var customer_id = $("#create_reservation_selected_customer_id").val();

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.customers.edit') }}',
            data: {
                customer_id: customer_id
            },
            success: function (customer) {
                var newCustomer = $.parseHTML(`` +
                    `<tr id="customer_id_${customer.id}">` +
                    `<td>${customer.name}</td>` +
                    `<td>${customer.surname}</td>` +
                    `<td>${customer.title ?? ''}</td>` +
                    `<td>${customer.nationality.name}</td>` +
                    `<td>${customer.gender == 1 ? 'Erkek' : 'Kadın'}</td>` +
                    `</tr>` +
                    ``)[0];

                reservationCustomers.row.add(newCustomer);
                reservationCustomers.draw(false);

                $("#CreateReservationSelectCustomerModal").modal('hide');
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    createReservationButton.click(function () {
        $("#loader").fadeIn(250);
        $("#create_reservation_rightbar_toggle").click();
        var company_id = $("#company_id_create").val();
        var customer_name = $("#customer_name_create").val();
        var start_date = $("#start_date_create").val();
        var end_date = $("#end_date_create").val();
        var room_type_id = $("#room_type_id_create").val();
        var pan_type_id = $("#pan_type_id_create").val();
        var room_id = $("#room_id_create").val();
        var room_use_type_id = $("#room_use_type_id_create").val();
        var price = $("#price_create").val();
        var description = $("#description_create").val();

        if (customer_name == null || customer_name == '') {
            toastr.warning('Rezervasyonu Yaptıran Müşteri Adını Giriniz!');
        } else if (start_date == null || start_date == '') {
            toastr.warning('Geliş Tarihini Seçmediniz!');
        } else if (end_date == null || end_date == '') {
            toastr.warning('Gidiş Tarihini Seçmediniz!');
        } else if (room_type_id == null || room_type_id == '') {
            toastr.warning('Oda Tipini Seçmediniz!');
        } else if (pan_type_id == null || pan_type_id == '') {
            toastr.warning('Pan Tipini Seçmediniz!');
        } else if (room_id == null || room_id == '') {
            toastr.warning('Oda Seçimi Yapmadınız!');
        } else if (room_use_type_id == null || room_use_type_id == '') {
            toastr.warning('Oda Kullanım Tipini Seçmediniz!');
        } else if (price == null || price == '') {
            toastr.warning('Oda Ücretini Girmediniz!');
        } else {
            customerList = reservationCustomers.rows().data();
            customerListArray = [];

            $.each(customerList, function (index) {
                customerListArray.push(customerList[index]['DT_RowId'].replace('customer_id_', ''));
            });

            var data = {
                _token: '{{ csrf_token() }}',
                company_id: company_id,
                customer_name: customer_name,
                start_date: start_date,
                end_date: end_date,
                room_type_id: room_type_id,
                pan_type_id: pan_type_id,
                room_id: room_id,
                room_use_type_id: room_use_type_id,
                price: price,
                description: description,
                status_id: new Date(start_date) <= new Date() ? 4 : 1,
                customers: customerListArray
            }

            $.ajax({
                type: 'post',
                url: '{{ route('ajax.reservations.save') }}',
                data: data,
                success: function () {
                    toastr.success('Yeni Rezervazyon Başarıyla Oluşturuldu');
                    location.reload();
                },
                error: function (error) {
                    console.log(error)
                }
            });
        }
    });

    //////////////////////////////////////////////////////////////////////////////////////////////////

    function dateReCreator(getDate) {
        var date = new Date(getDate);
        return `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}T${String(date.getHours()).padStart(2, '0')}:${String(date.getMinutes()).padStart(2, '0')}`
    }

    function reformatDate(date) {
        var formattedDate = new Date(date);
        return String(formattedDate.getDate()).padStart(2, '0') + ' ' +
            months[formattedDate.getMonth()] + ' ' +
            formattedDate.getFullYear() + ', ' +
            String(formattedDate.getHours()).padStart(2, '0') + ':' +
            String(formattedDate.getMinutes()).padStart(2, '0') + ' ';
    }

    function getRoomStatuses() {
        $.ajax({
            async: false,
            type: 'get',
            url: '{{ route('ajax.room-statuses.index') }}',
            data: {},
            success: function (roomStatuses) {
                allRoomStatuses = roomStatuses;
            },
            error: function () {

            }
        });
    }

    function getRooms(id) {
        var room_type_id = roomTypeSelector.val();
        var pan_type_id = panTypeSelector.val();
        var start_date = startDateCreateSelector.val();
        var end_date = endDateCreateSelector.val();

        if (room_type_id != null && pan_type_id != null) {
            $.ajax({
                type: 'get',
                url: '{{ route('ajax.rooms.getRoomsByParameters') }}',
                data: {
                    room_type_id: room_type_id,
                    pan_type_id: pan_type_id,
                    start_date: start_date,
                    end_date: end_date
                },
                success: function (rooms) {
                    roomSelector.html('').selectpicker('refresh');
                    roomSelector.append(`<option selected hidden disabled></option>`);
                    $.each(rooms, function (index) {
                        roomSelector.append(`<option ${rooms[index].id == id ? 'selected' : null} value="${rooms[index].id}">${rooms[index].number}</option>`);
                    });
                    roomSelector.selectpicker('refresh');
                },
                error: function (error) {
                    console.log(error)
                }
            });
        }
    }

    function getRoomsEdit(id, reservation_id) {
        var room_type_id = roomTypeEditSelector.val();
        var pan_type_id = panTypeEditSelector.val();
        var start_date = startDateEditSelector.val();
        var end_date = endDateEditSelector.val();

        if (room_type_id != null && pan_type_id != null) {
            $.ajax({
                type: 'get',
                url: '{{ route('ajax.rooms.getRoomsByParameters') }}',
                data: {
                    room_type_id: room_type_id,
                    pan_type_id: pan_type_id,
                    start_date: start_date,
                    end_date: end_date,
                    reservation_id: reservation_id
                },
                success: function (rooms) {
                    roomEditSelector.html('').selectpicker('refresh');
                    roomEditSelector.append(`<option selected hidden disabled></option>`);
                    $.each(rooms, function (index) {
                        roomEditSelector.append(`<option ${rooms[index].id == id ? 'selected' : null} value="${rooms[index].id}">${rooms[index].number}</option>`);
                    });
                    roomEditSelector.selectpicker('refresh');
                },
                error: function (error) {
                    console.log(error)
                }
            });
        }
    }

    function openAddExtraModal(reservation_id) {
        $("#selected_reservation_id").val(reservation_id);
        $("#AddExtraReservationModal").modal('show');
    }

    function showReservation(reservation_id) {
        if (reservation_id) {
            $("#selected_reservation_id").val(reservation_id);
            reservationEditCustomersDeleteRowButton.hide();
            $.ajax({
                type: 'get',
                url: '{{ route('ajax.reservations.edit') }}',
                data: {
                    reservation_id: reservation_id
                },
                success: function (reservation) {
                    $("#customer_name_edit").val(reservation.customer_name);
                    $("#start_date_edit").val(dateReCreator(reservation.start_date));
                    $("#end_date_edit").val(dateReCreator(reservation.end_date));
                    $("#selected_reservation_status_id").val(reservation.status_id);
                    $("#selected_reservation_room_id").val(reservation.room_id);
                    $("#company_id_edit").val(reservation.company_id).selectpicker('refresh');
                    $("#price_edit").val(reservation.price);
                    $("#description_edit").val(reservation.description);

                    roomTypeEditSelector.val(reservation.room_type.id).selectpicker('refresh');
                    panTypeEditSelector.val(reservation.pan_type.id).selectpicker('refresh');

                    getRoomsEdit(reservation.room_id, reservation.id);

                    $("#room_use_type_id_edit").val(reservation.use_type_id).selectpicker('refresh');

                    reservationEditCustomers.clear().draw();
                    $.each(reservation.customers, function (index) {
                        var customer = $.parseHTML(`` +
                            `<tr id="customer_id_${reservation.customers[index].id}">` +
                            `<td>${reservation.customers[index].name}</td>` +
                            `<td>${reservation.customers[index].surname}</td>` +
                            `<td>${reservation.customers[index].title ?? ''}</td>` +
                            `<td>${reservation.customers[index].nationality.name}</td>` +
                            `<td>${reservation.customers[index].gender == 1 ? 'Erkek' : 'Kadın'}</td>` +
                            `</tr>` +
                            ``)[0];

                        reservationEditCustomers.row.add(customer);
                        reservationEditCustomers.draw(false);
                    });
                    $("#edit_reservation_rightbar_toggle").click();
                },
                error: function (error) {
                    console.log(error)
                }
            });
        }
    }

    function getReservationExtras(reservation_id) {
        $.ajax({
            async: false,
            type: 'get',
            url: '{{ route('ajax.reservations.safeActivities') }}',
            data: {
                reservation_id: reservation_id
            },
            success: function (safeActivities) {
                reservationSafeActivities.clear().draw();
                $.each(safeActivities, function (index) {
                    reservationSafeActivities.row.add([
                        safeActivities[index].id,
                        `<span class="btn btn-pill btn-sm btn-${safeActivities[index].direction == 1 ? 'danger' : 'success'}" style="font-size: 11px; height: 20px; padding-top: 2px">${safeActivities[index].direction == 1 ? 'Gider' : 'Gelir'}</span>`,
                        `${safeActivities[index].date ? reformatDate(safeActivities[index].date) : reformatDate(safeActivities[index].created_at)}`,
                        `${parseFloat(safeActivities[index].price).toFixed(2)} TL`,
                        `${safeActivities[index].payment_type_id ? safeActivities[index].payment_type.name : (safeActivities[index].direction == 1 ? 'Kasadan' : '')}`,
                        `${safeActivities[index].direction == 1 ? (safeActivities[index].extra ? safeActivities[index].extra.name : 'Oda Ücreti') : ''}`,
                        `${safeActivities[index].user ? safeActivities[index].user.name : ''}`,
                        `${safeActivities[index].description ?? ''}`
                    ]).draw();
                });
                $("#reservation_safe_activities_rightbar_toggle").click();
            },
            error: function (error) {
                console.log(error)
            }
        });
    }

    function getPaymentModal(reservation_id) {
        $('.checkoutRepeaterList').remove();
        $("#selected_reservation_id").val(reservation_id);
        $("#GetPaymentModal").modal('show');
    }

    function endReservation(reservation_id) {
        $("#loader").fadeIn(250);
        $.ajax({
            type: 'post',
            url: '{{ route('ajax.reservations.setStatus') }}',
            data: {
                _token: '{{ csrf_token() }}',
                reservations: [reservation_id],
                status_id: 5,
                ending: 1
            },
            success: function () {
                location.reload();
            },
            error: function (error) {
                console.log(error)
            }
        });
    }

    function endWithWaitingPayment(reservation_id) {
        $("#EndWithWaitingPaymentModal").modal('show');
        $("#end_with_waiting_payment_reservation_id").val(reservation_id);
    }

    endWithWaitingPaymentButton.click(function () {
        $("#loader").fadeIn(250);
        $("#EndWithWaitingPaymentModal").modal('hide');

        var reservation_id = $("#end_with_waiting_payment_reservation_id").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.reservations.endWithWaitingPayment') }}',
            data: {
                _token: '{{ csrf_token() }}',
                reservation_id: reservation_id
            },
            success: function (response) {
                location.reload();
            },
            error: function (error) {
                $("#loader").fadeOut(250);
                console.log(error)
            }
        });
    });

    function transfer(reservation_id) {
        $("#TransferExtrasAndSafeActivitiesModal").modal('show');
        $("#transfer_from").val(reservation_id);

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.reservations.exceptIndex') }}',
            data: {
                id: reservation_id
            },
            success: function (reservations) {
                var safeActivities = [];
                $.ajax({
                    async: false,
                    type: 'get',
                    url: '{{ route('ajax.reservations.safeActivities') }}',
                    data: {
                        reservation_id: reservation_id
                    },
                    success: function (response) {
                        safeActivities = response;
                    },
                    error: function (error) {
                        toastr.error('Rezervasyon Kalemleri Alınırken Bir Hata Oluştu');
                        console.log(error);
                    }
                });

                transferToSelector.empty();
                $.each(reservations, function (index) {
                    transferToSelector.append(`<option value="${reservations[index].id}">${reservations[index].room.number} - ${reservations[index].customer_name}</option>`);
                });
                transferToSelector.selectpicker('refresh');

                transferSafeActivitiesSelector.empty();
                $.each(safeActivities, function (index) {
                    transferSafeActivitiesSelector.append(`<option value="${safeActivities[index].id}">${safeActivities[index].direction == 1 ? '(Gider)' : '(Gelir)'} (${safeActivities[index].price} TL) -> ${safeActivities[index].direction == 1 ? (safeActivities[index].extra ? safeActivities[index].extra.name : 'Oda Ücreti') : ''}${safeActivities[index].description ? ' -> ' + safeActivities[index].description : ''}</option>`);
                });
                transferSafeActivitiesSelector.selectpicker('refresh');
            },
            error: function (error) {
                console.log(error)
            }
        });
    }

    function refund(reservation_id) {
        $("#RefundModal").modal('show');
        $("#refund_reservation_id").val(reservation_id);
    }

    function discount(reservation_id) {
        $("#DiscountModal").modal('show');
        $("#discount_reservation_id").val(reservation_id);
    }

    function setDailyRoomPrice(reservation_id) {
        $.ajax({
            type: 'post',
            url: '{{ route('ajax.safe-activities.setDailyRoomPrice') }}',
            data: {
                _token: '{{ csrf_token() }}',
                reservation_id: reservation_id
            },
            success: function () {
                toastr.success('Ücret Yansıtıldı');
                $.ajax({
                    type: 'get',
                    url: '{{ route('ajax.reservations.debtControl') }}',
                    data: {
                        reservation_id: reservation_id
                    },
                    success: function (response) {
                        $("#reservationCheckout_" + reservation_id).html(parseFloat(response.outgoing - response.incoming).toFixed(2) + " TL");
                    },
                    error: function (error) {
                        console.log(error)
                    }
                });
            },
            error: function () {

            }
        });
    }

    transferExtrasAndSafeActivitiesButton.click(function () {
        var from = $("#transfer_from").val();
        var to = $("#transfer_to").val();
        var safe_activities = transferSafeActivitiesSelector.val();

        if (to == null || to === '') {
            toastr.warning('Transfer Edilecek Oda Seçilmedi!');
        } else {
            $("#TransferExtrasAndSafeActivitiesModal").modal('hide');
            // $("#loader").fadeIn(250);
            $.ajax({
                type: 'post',
                url: '{{ route('ajax.reservations.transferExtrasAndSafeActivities') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    from: from,
                    to: to,
                    safe_activities: safe_activities
                },
                success: function (response) {
                    console.log(response)

                    $.ajax({
                        async: false,
                        type: 'get',
                        url: '{{ route('ajax.reservations.debtControl') }}',
                        data: {
                            reservation_id: from
                        },
                        success: function (response) {
                            $("#reservationCheckout_" + from).html(parseFloat(response.outgoing - response.incoming).toFixed(2) + " TL");
                        },
                        error: function (error) {
                            console.log(error)
                        }
                    });

                    $.ajax({
                        async: false,
                        type: 'get',
                        url: '{{ route('ajax.reservations.debtControl') }}',
                        data: {
                            reservation_id: to
                        },
                        success: function (response) {
                            $("#reservationCheckout_" + to).html(parseFloat(response.outgoing - response.incoming).toFixed(2) + " TL");
                        },
                        error: function (error) {
                            console.log(error)
                        }
                    });
                    // location.reload();
                },
                error: function (error) {
                    toastr.error('Sistemsel Bir Hata Oluştu!');
                    console.log(error)
                    $("#loader").fadeOut(250);
                }
            });
        }
    });

    //////////////////////////////////////////////////////////////////////////////////////////////////

    $('.decimal').on("copy cut paste drop", function () {
        return false;
    }).keyup(function () {
        var val = $(this).val();
        if (isNaN(val)) {
            val = val.replace(/[^0-9\.]/g, '');
            if (val.split('.').length > 2)
                val = val.replace(/\.+$/, "");
        }
        $(this).val(val);
    });

    $('body').on('contextmenu', function (e) {
        var list = [];

        $(".roomChecker:checked").each(function () {
            list.push($(this).data('id'));
        });

        if (list.length > 0) {
            var top = e.pageY - 10;
            var left = e.pageX - 10;

            $("#context-menu").css({
                display: "block",
                top: top,
                left: left
            });
        }
        return false;
    }).on("click", function () {
        $("#context-menu").hide();
    }).on('focusout', function () {
        $("#context-menu").hide();
    });

    $("#context-menu a").on("click", function () {
        $(this).parent().hide();
    });

    $('.roomPlusIcon').click(function () {
        var room_id = $(this).data('id');
        $("#roomDropdownList_" + room_id).hide();

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.rooms.show') }}',
            data: {
                room_id: room_id
            },
            success: function (room) {
                if (parseInt(room.room_status_id) === 1 || parseInt(room.room_status_id) === 2) {
                    if (parseInt(room.room_status_id) === 2 && room.activeReservation != null) {
                        $.ajax({
                            async: false,
                            type: 'get',
                            url: '{{ route('ajax.reservations.debtControl') }}',
                            data: {
                                reservation_id: room.activeReservation.id
                            },
                            success: function (response) {
                                if ((response.outgoing - response.incoming) > 0) {
                                    $("#endReservationDropdown_" + response.reservation.id).hide();
                                    $("#endWithWaitingPaymentReservationDropdown_" + response.reservation.id).fadeIn(250);
                                } else {
                                    $("#endReservationDropdown_" + response.reservation.id).fadeIn(250);
                                    $("#endWithWaitingPaymentReservationDropdown_" + response.reservation.id).hide();
                                }
                            },
                            error: function (error) {
                                console.log(error)
                            }
                        });
                    }
                    $("#roomDropdownList_" + room.id).show();
                }
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    $('.reservationCreator').click(function () {
        var room_id = $(this).data('room-id');

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.rooms.show') }}',
            data: {
                room_id: room_id
            },
            success: function (room) {
                $("#room_type_id_create").val(room.room_type_id).selectpicker('refresh');
                $("#pan_type_id_create").val(room.pan_type_id).selectpicker('refresh');
                $("#start_date_create").val('{{ date('Y-m-d') . 'T08:00' }}');
                $("#end_date_create").val('{{ date('Y-m-d', strtotime('+1 days')) . 'T12:00' }}');

                getRooms(room.id)
            },
            error: function (error) {
                console.log(error)
            }
        });

        $("#create_reservation_rightbar_toggle").click();
    });

    $(document).delegate('.roomStatusSelector', 'click', function () {
        room_id = $(this).data('id');
        status_id = $(this).data('status-id');

        var roomSpanSelector = $("#room_span_id_" + room_id);
        var roomNumberSelector = $("#room_number_selector_" + room_id);

        var list = $(this).parent().parent().find('.dropdown_icon_selector');

        $.ajax({
            async: false,
            type: 'post',
            url: '{{ route('ajax.rooms.setRoomStatus') }}',
            data: {
                _token: '{{ csrf_token() }}',
                room_id: room_id,
                status_id: status_id
            },
            success: function (room) {
                roomSpanSelector.removeClass().addClass('btn btn-pill btn-sm btn-' + room.status.color).text(room.status.name).attr('data-status-id', room.room_status_id);
                roomNumberSelector.removeClass().addClass('cursor-pointer text-' + room.status.color);

                $.each(list, function (index) {
                    $(this).removeClass();
                    if (status_id === (index + 1)) {
                        $(this).addClass('dropdown_icon_selector fa fa-check-circle text-success');
                    } else {
                        $(this).addClass(' dropdown_icon_selector fa fa-check-circle ');
                    }
                });
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    //////////////////////////////////////////////////////////////////////////////////////////////////

    setRoomPriceCollectiveButton.click(function () {
        var price = $("#set_room_price").val();

        var list = [];
        $(".roomChecker:checked").each(function () {
            list.push($(this).data('id'));
        });

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.rooms.setRoomPriceCollective') }}',
            data: {
                _token: '{{ csrf_token() }}',
                rooms: list,
                price: price
            },
            success: function (response) {
                toastr.success('Fiyatlar Başarıyla Güncellendi');
                $("#setRoomPriceForm").trigger('reset');
                $("#SetRoomPriceModal").modal('hide');
                $(".roomChecker:checked").each(function () {
                    $(this).prop('checked', false)
                });
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    setRoomStatusCollectiveButton.click(function () {
        var status = $("#set_room_status").val();

        var list = [];
        $(".roomChecker:checked").each(function () {
            list.push($(this).data('id'));
        });

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.rooms.setRoomStatusCollective') }}',
            data: {
                _token: '{{ csrf_token() }}',
                rooms: list,
                status: status
            },
            success: function (response) {
                toastr.success('Oda Durumları Başarıyla Güncellendi');
                location.reload();
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    $('#checkoutRepeater').repeater({
        initEmpty: false,

        defaultValues: {
            'text-input': '--'
        },

        show: function () {
            $(this).slideDown();
        },

        hide: function (deleteElement) {
            $(this).slideUp(deleteElement);
        }
    });

    $(document).ready(function () {
        var list = $('.checkoutRepeaterList');
        $.each(list, function (index) {
            if (index !== 0) {
                $(this).remove();
            }
        });
    });

    roomStatusFilterer.change(function (e) {
        e.preventDefault();
        var status_id = $(this).val();
        if (status_id == 0) {
            $(".roomNumberOption").fadeIn(250);
        } else {
            $(".roomNumberOption").fadeOut(250);
            $.each(roomStatusOptions, function (index) {
                if ($(this).attr('data-status-id') == status_id) {
                    $("#roomNumberCard" + $(this).data('room-number')).fadeIn(250);
                }
            });
        }
    });

    $(document).delegate('.roomStatusOption', 'click', function() {
        console.log($(this).data('status-id'))
    });
</script>
