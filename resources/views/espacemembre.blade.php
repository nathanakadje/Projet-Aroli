<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>W3Admin Dashboard - Free Dashboard for HTML5/w3css by W3MIX</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://smsrouter.letexto.com/css/prismjs.bundle.css" rel="stylesheet"  type="text/css" />
  {{-- <link href="https://smsrouter.letexto.com/css/style.bundle.css" rel="stylesheet"  type="text/css" /> --}}
  <link href="https://smsrouter.letexto.com/css/plugins.bundle.css" rel="stylesheet"  type="text/css" />
  <link href="https://smsrouter.letexto.com/css/datatables.bundle.css" rel="stylesheet"  type="text/css" />
  <link href="https://smsrouter.letexto.com/css/style.bundle.css" rel="stylesheet"  type="text/css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
  <link rel="stylesheet" href="./accueil/assets/icons/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./accueil/assets/css/w3pro-4.13.css">
  <link rel="stylesheet" href="./accueil/assets/css/w3-theme.css">
  <link rel="stylesheet" href="./accueil/assets/css/admin-styles.css">
  <link rel="stylesheet" href="./accueil/assets/css/scrollbar.css">
 
    
</head>

<body class="w3-light-grey">
  <input id="sidebar-control" type="checkbox" class="w3-hide">
  <div id="app">
    <div class="w3-top w3-card" style="height:54px">
      <div class="w3-flex-bar w3-theme w3-left-align">
        <div class="admin-logo w3-bar-item w3-hide-medium w3-hide-small">
          <h5 class="" style="line-height:1; margin:0!important; font-weight:300">
            <a href="./accueil/index.html" class="w3-button w3-bold">
              <img src="./accueil/assets/admin-logo.png" alt="w3mix" class="w3-image" width="26"> Aroli Senders </a>
          </h5>
        </div>
        <label for="sidebar-control" class="w3-button w3-large w3-opacity-min"><i class="fa fa-bars"></i></label>
        <div class="w3-container w3-display-container" style="width:40%">
          <div class="w3-display-right w3-padding-small w3-margin-right" onclick="this.parentNode.children[1].focus()">
            <i class="fa fa-search w3-opacity-max"></i>
          </div>
          <input type="text" class="w3-input w3-border w3-round w3-small w3-padding-small w3-gray-lighter w3-show-inline-block" placeholder="Enter keywords">
        </div>
        <div class="w3-right">
          <button type="button" class="w3-button w3-large w3-opacity-min"><i class="fa fa-envelope-open"></i></button>
          <button type="button" class="w3-button w3-large w3-opacity-min"><i class="fa fa-bell"></i></button>
        </div>
        <div class="text-right">
          <div class="w3-button">
            <div class="w3-circle w3-center w3-text-white w3-primary" style="width:38px; height:38px">
              <i class="fa fa-fw fa-user fa" style="margin-top:11px"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav id="sidebar" class="w3-sidebar w3-top w3-bottom w3-collapse w3-white w3-border-right w3-border-top scrollbar" style="z-index:3;width:230px;height:auto;margin-top:54px;border-color:rgba(0, 0, 0, .1)!important" id="mySidebar">
      <div class="w3-bar-item w3-border-bottom w3-hide-large" style="padding:6px 0">
        <label for="sidebar-control" class="w3-left w3-button w3-large w3-opacity-min" style="background:white!important"><i class="fa fa-bars"></i></label>
        <h5 class="" style="line-height:1; margin:0!important; font-weight:300">
          <a href="./accueil/index.html" class="w3-button" style="background:white!important">
            <img src="./accueil/assets/admin-logo.png" alt="w3mix" class="w3-image"> &nbsp; W3Admin </a>
        </h5>
      </div>
      <div class="w3-bar-block">
        <span class="w3-bar-item w3-padding w3-small w3-opacity" style="margin-top:8px"> MAIN NAVIGATION </span>
        <a href="/dashboard" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
          <i class="fa fa-fw fa-bar-chart"></i>&nbsp; Dashboard </a>
        <a href="/searchsender" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
          <i class="fa fa-fw fa-fire"></i>&nbsp; UI Icons </a>
          
          <a href="{{ route('form') }}" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
            <i class="fa fa-fw fa-edit"></i>&nbsp;Forms </a>
        
        <a href="./accueil/tables.html" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
          <i class="fa fa-fw fa-table"></i>&nbsp; Tables </a>
        <a href="./accueil/profile.html" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
          <i class="fa fa-fw fa-user-circle"></i>&nbsp; Profile </a>
        <a href="./accueil/login.html" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
          <i class="fa fa-fw fa-lock"></i>&nbsp; Login </a>
        <a href="./accueil/register.html" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
          <i class="fa fa-fw fa-sign-in"></i>&nbsp; Registration </a>
        <span class="w3-bar-item w3-padding w3-small w3-opacity"> LABELS </span>
        <a href="#dashboard" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
          <i class="fa fa-fw fa-coffee w3-text-danger"></i>&nbsp; Important </a>
        <a href="#dashboard" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
          <i class="fa fa-fw fa-circle-o-notch w3-text-success"></i>&nbsp; Warning </a>
        <a href="#dashboard" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
          <i class="fa fa-fw fa-share-alt w3-text-info"></i>&nbsp; Information </a>
      </div>
    </nav>
  @yield('dashboard')
  @yield('formulaire')
  @yield('search')
  <script type="text/javascript" src="https://smsrouter.letexto.com/js/prismjs.bundle.js"></script>
    <script type="text/javascript" src="https://smsrouter.letexto.com/js/popper.min.js"></script>
    <script type="text/javascript" src="https://smsrouter.letexto.com/js/scripts.bundle.js"></script>
    <script type="text/javascript" src="https://smsrouter.letexto.com/js/plugins.bundle.js"></script>
    <script type="text/javascript" src="https://smsrouter.letexto.com/js/datatables.bundle.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./accueil/assets/plugins/chartjs/Chart.min.js"></script>
  <script src="./accueil/assets/plugins/chartjs/dashboard.js"></script>

  {{-- <script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.view-details').click(function() {
            const id = $(this).data('id');
            
            $.ajax({
                url: `/searchsender/{id}`,
                method: 'GET',
                success: function(response) {
                    $('#modal-created').text(response.created_at);
                    $('#modal-name').text(response..name);
                    $('#modal-country').text(response..country);
                    
                    let statusBadge;
                    switch(response.status) {
                        case 'close':
                            statusBadge = `<span class="badge bg-danger text-white">${response.status}</span>`;
                            break;
                        case 'pending':
                            statusBadge = `<span class="badge bg-warning text-dark">${response.status}</span>`;
                            break;
                        default:
                            statusBadge = `<span class="badge bg-success text-white">${response..status}</span>`;
                    }
                    $('#modal-status').html(statusBadge);
                    
                    $('#modal-date-sub').text(response.date_sub);
                    $('#modal-date-valid').text(response.date_valid || '-');
                    $('#modal-commentaire').text(response.sender.commentaire || 'Aucun commentaire');
                    
                    $('#detailsModal').modal('show');
                },
                error: function() {
                    alert('Une erreur est survenue lors du chargement des détails.');
                }
            });
        });
    });
    </script> --}}
<script>
$(document).ready(function() {
    $('#recordModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); 
        var recordId = button.data('id'); 
        
        // Charge les détails de l'enregistrement via AJAX
        $.get('/records/' + recordId, function(data) {
            $('#recordModal .modal-body').html(data);
        });
    });
});
</script>

  {{-- <script type="text/javascript"> --}}
    {{-- toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toastr-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "1800000",
        "extendedTimeOut": "600000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    function showSmppcEvent(item) {
        if(item.includes("Stopped")){
            toastr.error(item);
        }else{
            toastr.warning(item);
        }

    } --}}
{{-- </script>
  <script type="text/javascript">
    $(function () {
        $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });

        var table = $("#tabledatas").DataTable({
            ajax: "https://smsrouter.letexto.com/routings",
            columns: [
                { data: "DT_RowIndex", name: "DT_RowIndex", className: "text-center py-1" },
                { data: "routing_id", name: "routing_id", visible: false, className: "py-1"},
                { data: "routing_name", name: "routing_name", className: "py-1 text-nowrap"},
                { data: "country_name", name: "country_name", className: "py-1 text-nowrap",
                    render: function (data, type, row) {
                        if (row.network_name == null){
                            return data + ' (All)';
                        }else{
                            return row.network_name;
                        }
                    }
                },
                { data: "connector_name", name: "connector_name", className: "py-1 text-nowrap"},
                { data: "routing_rate", name: "routing_rate", className: "py-1 text-center"},
                { data: "routing_active", name: "routing_active", className: "py-1 text-center",
                    render: function (data, type, row) {
                        if (data == 'yes'){
                            return '<a href="javascript:void(0)" data-id="'+row.routing_id+'" class="disableRouting"><i class="fa-solid fa-toggle-on fs-5 text-success"></i></a>';
                        }else{
                            return '<a href="javascript:void(0)" data-id="'+row.routing_id+'" class="enableRouting"><i class="fa-solid fa-toggle-off fs-5 text-danger"></i></a>';
                        }
                    }
                },
                { data: "action", name: "action", className: "text-center text-nowrap py-1" },
            ],
            order: [[1, "asc"]],
            processing: false,
            serverSide: true,
            responsive: true,
            pageLength: 20,
            lengthChange: true,
            lengthMenu: [10, 20, 50, 100, 200, 500, 1000],
        });

        $('#routing_country_id').select2({
            dropdownParent: $('#entryModal')
        });

        $('#routing_network_id').select2({
            dropdownParent: $('#entryModal')
        });

        $('#routing_connector_id').select2({
            dropdownParent: $('#entryModal')
        });

        // Export
        const documentTitle = 'Default Routings';
        var buttons = new $.fn.dataTable.Buttons(table, {
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: documentTitle,
                    exportOptions: {
                        columns: [ 2, 3, 4, 5, 6 ]
                    }
                },
                {
                    extend: 'csvHtml5',
                    title: documentTitle,
                    exportOptions: {
                        columns: [ 2, 3, 4, 5, 6 ]
                    }
                },
            ]
        }).container().appendTo($('#tabledatas_buttons'));

        const exportButtons = document.querySelectorAll('#tabledatas_export_menu [data-kt-export]');
        exportButtons.forEach(exportButton => {
            exportButton.addEventListener('click', e => {
                e.preventDefault();

                const exportValue = e.target.getAttribute('data-kt-export');
                const target = document.querySelector('.dt-buttons .buttons-' + exportValue);

                target.click();
            });
        });

        $("#addData").click(function () {
            $("#entryModalTitle").html("Add Routing");
            $("#saveBtn").val("add-entry");
            $("#routing_id").val("");
            $("#entryForm").trigger("reset");
            $("#entryModal").modal("show");
            document.getElementById('network-field').style.display = 'none';
            $("#routing_connector_id").val('').trigger('change');
            $("#routing_network_id").val('').trigger('change');
            $("#routing_country_id").val('').trigger('change');
        });

        $("#saveBtn").click(function (e) {
            e.preventDefault(),
            $.ajax({
                data: $("#entryForm").serialize(),
                url: "https://smsrouter.letexto.com/routings",
                type: "POST",
                dataType: "json",
                success: function (response) {
                    $("#entryForm").trigger("reset");
                    $("#entryModal").modal("hide");
                    table.draw();
                    Swal.fire({
                        icon: "success",
                        title: "Saved",
                        text: response.success,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $("#routing_id").val("");
                },
                error: function (response) {
                    response = JSON.parse(response.responseText);
                    table.draw();
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: response.message
                    });
                }
            });
        });

        $("body").on("click", ".editData", function () {
            var id = $(this).data("id");
            document.getElementById('network-field').style.display = 'block';
            $.get("https://smsrouter.letexto.com/routings/" + id + "/edit", function (data) {
                $("#entryModalTitle").html("Edit Routing");
                $("#saveBtn").val("edit-entry");
                $("#entryModal").modal("show");
                $("#routing_id").val(data.routing_id);
                $("#routing_name").val(data.routing_name);
                $("#routing_connector_id").val(data.routing_connector_id).trigger('change');
                $("#routing_network_id").val(data.routing_network_id).trigger('change');
                $("#routing_country_id").val(data.routing_country_id).trigger('change');
                $("#routing_rate").val(data.routing_rate)
            });
        });

        $("body").on("click", ".deleteData", function () {
            var id = $(this).data("id");
            Swal.fire({
                title: "Are you sure?",
                text: "You will not be able to recover it!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }).then((result) =>{
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "https://smsrouter.letexto.com/routings/" + id,
                        success: function (response) {
                            table.draw();
                            Swal.fire({
                                icon: "success",
                                title: "Saved",
                                text: response.success,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        },
                        error: function (response) {
                            response = JSON.parse(response.responseText);
                            table.draw();
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: response.message
                            });
                        },
                    });
                }
            });
        });

        $("body").on("click", ".enableRouting", function () {
            var id = $(this).data("id");
            Swal.fire({
                title: "Are you sure?",
                text: "It will be enabled",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "",
                confirmButtonText: "Yes, enable it!"
            }).then((result) =>{
                if (result.isConfirmed) {
                    $.ajax({
                        data: {'routing_id': id},
                        url: "https://smsrouter.letexto.com/routing/enable",
                        type: "POST",
                        dataType: "json",
                        success: function (response) {
                            table.draw();
                            Swal.fire({
                                icon: "success",
                                title: "Saved",
                                text: response.success,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        },
                        error: function (response) {
                            response = JSON.parse(response.responseText);
                            table.draw();
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: response.message
                            });
                        },
                    });
                }
            });
        });

        $("body").on("click", ".disableRouting", function () {
            var id = $(this).data("id");
            Swal.fire({
                title: "Are you sure?",
                text: "It will be disabled",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, disable it!"
            }).then((result) =>{
                if (result.isConfirmed) {
                    $.ajax({
                        data: {'routing_id': id},
                        url: "https://smsrouter.letexto.com/routing/disable",
                        type: "POST",
                        dataType: "json",
                        success: function (response) {
                            table.draw();
                            Swal.fire({
                                icon: "success",
                                title: "Saved",
                                text: response.success,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        },
                        error: function (response) {
                            response = JSON.parse(response.responseText);
                            table.draw();
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: response.message
                            });
                        },
                    });
                }
            });
        });

        document.getElementById("routings").classList.add('active');
        document.getElementById("routing-default-routings").classList.add('active', 'fw-bold');
    });
</script> --}}
</body>
</html>
