<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>W3Admin Dashboard - Free Dashboard for HTML5/w3css by W3MIX</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://smsrouter.letexto.com/css/prismjs.bundle.css" rel="stylesheet"  type="text/css" />
  <link href="https://smsrouter.letexto.com/css/plugins.bundle.css" rel="stylesheet"  type="text/css" />
  <link href="https://smsrouter.letexto.com/css/datatables.bundle.css" rel="stylesheet"  type="text/css" />
  <link href="https://smsrouter.letexto.com/css/style.bundle.css" rel="stylesheet"  type="text/css" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
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
              Aroli Sender </a>
          </h5>
        </div>
        <label for="sidebar-control" class="w3-button w3-large w3-opacity-min"><i class="fa fa-bars"></i></label>
        {{-- <div class="w3-container w3-display-container" style="width:15%">
          <div class="w3-display-right w3-padding-small w3-margin-right" onclick="this.parentNode.children[1].focus()">
            <i class="fa fa-search w3-opacity-max"></i>
          </div>
          <input type="text" class="w3-input w3-border w3-round w3-small w3-padding-small w3-gray-lighter w3-show-inline-block" placeholder="Enter keywords">
        </div> --}}
        {{-- <div class="w3-right">
          <button type="button" class="w3-button w3-large w3-opacity-min"><i class="fa fa-envelope-open"></i></button>
          <button type="button" class="w3-button w3-large w3-opacity-min"><i class="fa fa-bell"></i></button>
        </div> --}}
        {{-- <div class="text-right">
          <div class="w3-button">
            <div class="w3-circle w3-center w3-text-white w3-primary" style="width:38px; height:38px">
              <i class="fa fa-fw fa-user fa" style="margin-top:11px"></i>
            </div>
          </div>
        </div> --}}
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
        <a href="/search" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
          <i class="fa fa-fw fa-fire"></i>&nbsp; Senders</a>
          
          <a href="{{ route('form') }}" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
            <i class="fa fa-fw fa-edit"></i>&nbsp;Formulaire </a>
        
        <a href="/actions" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
          <i class="fa fa-fw fa-table"></i>&nbsp; Action </a>
        {{-- <a href="./accueil/profile.html" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
          <i class="fa fa-fw fa-user-circle"></i>&nbsp; Profile </a>
        <a href="./accueil/login.html" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
          <i class="fa fa-fw fa-lock"></i>&nbsp; Login </a>
        <a href="./accueil/register.html" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
          <i class="fa fa-fw fa-sign-in"></i>&nbsp; Registration </a> --}}
      </div>
    </nav>
  @yield('dashboard')
  @yield('formulaire')
  @yield('search')
  @yield('actions')
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script type="text/javascript" src="https://smsrouter.letexto.com/js/prismjs.bundle.js"></script>
    <script type="text/javascript" src="https://smsrouter.letexto.com/js/popper.min.js"></script>
    <script type="text/javascript" src="https://smsrouter.letexto.com/js/scripts.bundle.js"></script>
    <script type="text/javascript" src="https://smsrouter.letexto.com/js/plugins.bundle.js"></script>
    <script type="text/javascript" src="https://smsrouter.letexto.com/js/datatables.bundle.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
  <script src="./accueil/assets/plugins/chartjs/Chart.min.js"></script>
  <script src="./accueil/assets/plugins/chartjs/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <script>
    //les selects pour la vue form
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Search an operator",
            allowClear: true
        });
    });

    $(document).ready(function() {
        $('.select3').select2({
            placeholder: "Search a Country",
            allowClear: true
        });
    });
</script>
<script>
  $('#detailModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var registryId = button.data('registry-id');
    
    $.get('/registry/' + registryId, function(data) {
        // Remplir la modal avec les données
        $('#modalContent').html(...);
    });
});

//   $(document).ready(function() {
// 	$('.view-details').on('click', function() {
// 		var id = $(this).data('id');

// 		$.ajax({
// 			url: '/search' + id ,
// 			method: 'GET',
// 			success: function(data) {
// 				var formattedDate = new Date(data.created_at).toLocaleDateString('fr-FR', {
// 				year: 'numeric',
// 				month: 'long', 
// 				day: 'numeric',
// 				hour: '2-digit',
// 				minute: '2-digit'
// 			});
// 			var formatted= new Date(data.updated_at).toLocaleDateString('fr-FR', {
// 				year: 'numeric',
// 				month: 'long', 
// 				day: 'numeric',
// 				hour: '2-digit',
// 				minute: '2-digit'
// 			});
// 				var detailsHtml = `
// 					<table class="table">
			
// 						<tr>
// 							<th><strong>Name</strong></th>
// 							<td>${data.name}</td>
// 						</tr>
// 						<tr>
// 							<th><strong>Operator</strong></th>
// 							<td>${data.operator}</td>
// 						</tr>
// 						<tr>
// 							<th><strong>Status</strong></th>
// 							<td>${data.status}</td>
// 						</tr>
// 						<tr>
// 							<th><strong>Country</strong></th>
// 							<td>${data.country}</td>
// 						</tr>
// 						<tr>
// 							<th><strong>Created At</strong></th>
// 							<td>${formattedDate}</td>
// 						</tr>
// 						<tr>
// 							<th><strong>Commentaire</strong></th>
// 							<td>${data.commentaire}</td>
// 						</tr>
// 						<tr>
// 							<th><strong>Updated_At</strong></th>
// 							<td>${formatted}</td>
// 						</tr>
// 					</table>
// 				`;
				
// 				$('#modalDetails').html(detailsHtml);
// 			},
// 			error: function() {
// 				$('#modalDetails').html('<p style="color: red">Error loading details</p>');
// 			}
// 		});
// 	});
// });
</script>
<script>
  
  // function openEditModal(id) {
  //     // Récupérer les données de l'enregistrement via AJAX
  //     $.ajax({
  //         url: '/get-registry-details/' + id,
  //         method: 'GET',
  //         success: function(data) {
  //             // Remplir le formulaire modal avec les données
  //             $('#editRecordId').val(data.id);
  //             $('#editName').val(data.name);
  //             $('#editOperator').val(data.operator);
  //             $('#editCountry').val(data.country);
  //             $('#editStatus').val(data.status);
              
  //             // Afficher la modal
  //             new bootstrap.Modal(document.getElementById('editDeleteModal')).show();
  //         },
  //         error: function(xhr) {
  //             alert('Erreur lors de la récupération des données');
  //         }
  //     });
  // }
  


  // // Fonction de mise à jour
  // $('#updateButton').click(function() {
  //     var formData = $('#editForm').serialize();
      
  //     $.ajax({
  //         url: '/update-registry',
  //         method: 'POST',
  //         data: formData,
  //         success: function(response) {
  //             if(response.success) {
  //                 alert('Enregistrement mis à jour avec succès');
  //                 location.reload(); // Recharger la page pour voir les modifications
  //             } else {
  //                 alert('Erreur lors de la mise à jour');
  //             }
  //         },
  //         error: function(xhr) {
  //             alert('Erreur lors de la mise à jour');
  //         }
  //     });
  // });
  
  // // Fonction de suppression
  // $('#deleteButton').click(function() {
  //     var id = $('#editRecordId').val();
      
  //     if(confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) {
  //         $.ajax({
  //             url: '/delete-registry/' + id,
  //             method: 'DELETE',
  //             data: {
  //                 '_token': '{{ csrf_token() }}'
  //             },
  //             success: function(response) {
  //                 if(response.success) {
  //                     alert('Enregistrement supprimé avec succès');
  //                     location.reload(); // Recharger la page
  //                 } else {
  //                     alert('Erreur lors de la suppression');
  //                 }
  //             },
  //             error: function(xhr) {
  //                 alert('Erreur lors de la suppression');
  //             }
  //         });
  //     }
  // });
// ********************************************************************************************************
$(document).ready(function() {
        // Appliquer Select2 au champ select
        $('.select4').select2({
            dropdownParent: $('#editDeleteModal'), // Positionner le dropdown au dessus de la modale
            width: '100%' 
        });

        $('.select5').select2({
    
            dropdownParent: $('#editDeleteModal'), // Positionner le dropdown au dessus de la modale
            width: '100%' 
        });
        //  $('.select6').select2({
        //     dropdownParent: $('#searchWindow'), // Positionner le dropdown au dessus de la modale
        //     width: '100%' 
        // });
        $(document).ready(function() {
        $('.select7').select2({
            placeholder: "Search an operator",
            allowClear: true
        });
    });
        $(document).ready(function() {
        $('.select6').select2({
            placeholder: "Search a country",
            allowClear: true
        });
    });
        $('.select7').select2({
            dropdownParent: $('#searchWindow'), // Positionner le dropdown au dessus de la modale
            width: '100%' 
        });
    });

//   function openEditModal(id) {
//     // Récupérer les données de l'enregistrement via AJAX
//     $.ajax({
//         url: '/get-registry-details/' + id,
//         method: 'GET',
//         success: function(data) {
//             // Remplir le formulaire modal avec les données
//             $('#editRecordId').val(data.id);
//             $('#editName').val(data.name);
//             // $('#editOperator').val(data.operator);
//             // $('#editCountry').val(data.country);
//             $('#editStatus').val(data.status);
            
//             // Afficher la modal
//             new bootstrap.Modal(document.getElementById('editDeleteModal')).show();
//         },
//         error: function(xhr) {
//             Swal.fire({
//                 icon: 'error',
//                 title: 'Erreur',
//                 text: 'Erreur lors de la récupération des données'
//             });
//         }
//     });
// }

//*********************************************Edite modal actioncontroller**************************
    // function editSender(id) {
    //     $.ajax({
    //         url: `/senders/${id}/edit`,
    //         method: 'GET',
    //         success: function (data) {
    //             // Remplir les champs
    //             $('#sender_id').val(data.id);
    //             $('#name').val(data.name);
    //             $('#status').val(data.status);

    //             // Pré-remplir Select2 opérateur
    //             let operatorOption = new Option(data.operator.name, data.operator.id, true, true);
    //             $('#operator_id').append(operatorOption).trigger('change');

    //             // Pré-remplir Select2 pays
    //             let countryOption = new Option(data.country.name, data.country.id, true, true);
    //             $('#country_id').append(countryOption).trigger('change');

    //             // Afficher la modale
    //             $('#editSenderModal').modal('show');
    //         },
    //         error: function () {
    //             Swal.fire("Erreur", "Impossible de charger les données du sender.", "error");
    //         }
    //     });
    // }
//     let originalData = {}; // stocke les valeurs initiales

// function editSender(id) {
//     $.ajax({
//         url: `/senders/${id}`,
//         type: 'GET',
//         success: function (response) {
//             // Affiche la modale
//             $('#editSenderModal').modal('show');

//             // Remplit le formulaire
//             $('#sender_id').val(response.id);
//             $('#name').val(response.name);
//             $('#status').val(response.status);
//             $('#operator_id').val(response.operator.id).trigger('change');
//             $('#country_id').val(response.country.id).trigger('change');

//             // Stocke les données originales
//             originalData = {
//                 name: response.name,
//                 status: response.status,
//                 operator_id: response.operator.id,
//                 country_id: response.country.id
//             };
//         },
//         error: function () {
//             Swal.fire('Erreur', 'Impossible de charger les données de l’expéditeur.', 'error');
//         }
//     });
// }

//*************************************Initialisation JavaScript de Select2 AJAX actioncontroller********************

//**********************************************JS pour la soumission du formulaire actioncontroller**********************************
// $('#editSenderForm').on('submit', function (e) {
//     e.preventDefault();

//     let id = $('#sender_id').val();
//     let form = $(this);
//     let formData = {
//         name: $('#name').val(),
//         status: $('#status').val(),
//         operator_id: $('#operator_id').val(),
//         country_id: $('#country_id').val(),
//         _token: '{{ csrf_token() }}',
//         _method: 'PUT'
//     };

//     $.ajax({
//         url: `/senders/${id}`,
//         type: 'POST',
//         data: formData,
//         success: function (response) {
//             Swal.fire({
//                 icon: 'success',
//                 title: 'Succès',
//                 text: response.message,
//                 timer: 2000,
//                 showConfirmButton: false
//             });

//             $('#editSenderModal').modal('hide');

//             setTimeout(() => {
//                 location.reload(); // recharge la page après la mise à jour
//             }, 2000);
//         },
//         error: function (xhr) {
//             let msg = 'Erreur inconnue.';
//             if (xhr.responseJSON?.message) msg = xhr.responseJSON.message;

//             Swal.fire({
//                 icon: 'error',
//                 title: 'Erreur',
//                 text: msg
//             });
//         }
//     });
// });


// Configuration de select2 et gestion de la modale d'édition
$(document).ready(function() {
    // Ajouter le token CSRF à chaque requête AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Initialisation des select2
    $('#edit_operator_id').select2({
        dropdownParent: $('#editSenderModal'),
        placeholder: 'Sélectionnez un opérateur',
        allowClear: true,
        ajax: {
            url: '/operators/search',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    search: params.term,
                    page: params.page || 1
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            text: item.name,
                            id: item.id
                        };
                    }),
                    pagination: {
                        more: data.next_page_url !== null
                    }
                };
            },
            cache: true
        }
    });

    $('#edit_country_id').select2({
        dropdownParent: $('#editSenderModal'),
        placeholder: 'Sélectionnez un pays',
        allowClear: true,
        ajax: {
            url: '/countries/search',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    search: params.term,
                    page: params.page || 1
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            text: item.name,
                            id: item.id
                        };
                    }),
                    pagination: {
                        more: data.next_page_url !== null
                    }
                };
            },
            cache: true
        }
    });

    // Variables pour stocker les données originales du formulaire
    let originalFormData = {};

    // Fonction pour récupérer les données du formulaire actuel
    function getFormData() {
        return $('#editSenderForm').serialize();
    }

    // Fonction pour vérifier si le formulaire a été modifié
    function isFormModified() {
        return getFormData() !== originalFormData;
    }

    // Fonction pour charger les données de l'enregistrement dans la modale
    window.editSender = function(id) {
        // Réinitialiser le formulaire avant de charger les nouvelles données
        $('#editSenderForm')[0].reset();
        $('#edit_operator_id').empty();
        $('#edit_country_id').empty();

        // Charger les données de l'enregistrement
        $.ajax({
            url: `/actions/${id}/edit`,
            type: 'GET',
            success: function(response) {
                // Définir l'URL du formulaire pour la mise à jour
                $('#editSenderForm').attr('action', `/senders/${id}`);
                
                // Remplir les champs du formulaire
                $('#edit_sender_id').val(response.id);
                $('#edit_name').val(response.name);
                $('#edit_status').val(response.status);
                
                // Créer et sélectionner les options pour l'opérateur
                if (response.operator) {
                    const operatorOption = new Option(response.operator.name, response.operator.id, true, true);
                    $('#edit_operator_id').append(operatorOption).trigger('change');
                }
                
                // Créer et sélectionner les options pour le pays
                if (response.country) {
                    const countryOption = new Option(response.country.name, response.country.id, true, true);
                    $('#edit_country_id').append(countryOption).trigger('change');
                }

                // Stocker les données originales pour comparer plus tard
                originalFormData = getFormData();
                
                // Afficher la modale
                $('#editSenderModal').modal('show');
            },
            error: function(xhr) {
                console.error('Erreur de récupération:', xhr);
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: 'Impossible de récupérer les données de l\'enregistrement'
                });
            }
        });
    };

    // Gérer la soumission du formulaire
    $('#editSenderForm').on('submit', function(e) {
        e.preventDefault();
        
        // Vérifier si le formulaire a été modifié
        if (!isFormModified()) {
            // Aucune modification, fermer simplement la modale
            $('#editSenderModal').modal('hide');
            Swal.fire({
                icon: 'info',
                title: 'Information',
                text: 'Aucune modification n\'a été effectuée',
                timer: 1500,
                showConfirmButton: false
            });
            return;
        }
        
        // Obtenir l'URL du formulaire
        const url = $(this).attr('action');
        
        // Soumettre le formulaire via AJAX
        $.ajax({
            url: url,
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                // Fermer la modale
                $('#editSenderModal').modal('hide');
                
                // Afficher un message de succès
                Swal.fire({
                    icon: 'success',
                    title: 'Succès',
                    text: 'L\'enregistrement a été mis à jour avec succès',
                    timer: 1500,
                            showConfirmButton: false
                }).then(function() {
                    // Recharger la page pour afficher les modifications
                    window.location.reload();
                });
            },
            error: function(xhr) {
                // Afficher les erreurs de validation
                let errorMessage = 'Une erreur est survenue lors de la mise à jour';
                
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMessage = Object.values(xhr.responseJSON.errors).flat().join('<br>');
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    html: errorMessage
                });
                
                console.error(xhr.responseText);
            }
        });
    });
});
//*************************************************** Recherche auto pour mon formulaire d'enregistrement**********************************
// Initialisation des Select2 pour opérateurs et pays
$(document).ready(function() {
    // Ajout du token CSRF pour toutes les requêtes AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    // Initialisation du Select2 pour les opérateurs
    $('#operator_id').select2({
        placeholder: 'Sélectionnez un opérateur',
        allowClear: true,
        ajax: {
            url: '/operators/search',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    search: params.term,
                    page: params.page || 1
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            text: item.name,
                            id: item.id
                        };
                    }),
                    pagination: {
                        more: data.next_page_url !== null
                    }
                };
            },
            cache: true
        }
    });
    
    // Initialisation du Select2 pour les pays
    $('#country_id').select2({
        placeholder: 'Sélectionnez un pays',
        allowClear: true,
        ajax: {
            url: '/countries/search',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    search: params.term,
                    page: params.page || 1
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            text: item.name,
                            id: item.id
                        };
                    }),
                    pagination: {
                        more: data.next_page_url !== null
                    }
                };
            },
            cache: true
        }
    });
    
    // Gestion de la soumission du formulaire
    $('#createRegistryForm').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                // Affichage d'une alerte de succès
                Swal.fire({
                    icon: 'success',
                    title: 'Succès',
                    text: 'Enregistrement créé avec succès'
                }).then(function() {
                    // Redirection vers la liste des enregistrements ou réinitialisation du formulaire
                    // window.location.href = '/registries'; // Décommentez pour rediriger
                    $('#createRegistryForm')[0].reset();
                    $('#operator_id').val(null).trigger('change');
                    $('#country_id').val(null).trigger('change');
                });
            },
            error: function(xhr) {
                // Affichage des erreurs de validation
                let errorMessage = 'Une erreur est survenue lors de l\'enregistrement';
                
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMessage = Object.values(xhr.responseJSON.errors).flat().join('<br>');
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    html: errorMessage
                });
                
                console.error(xhr.responseText);
            }
        });
    });
});

//************************************************************************************************************************/

// ****************************************Configuration des Select2 pour le formulaire de recherche********************************
$(document).ready(function() {
    // Initialisation du select2 pour les opérateurs
    $('#operator').select2({
        placeholder: 'Sélectionnez un Opérateur',
        allowClear: true,
        ajax: {
            url: '{{ route("get.operators") }}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    
    // Initialisation du select2 pour les pays
    $('#country').select2({
        placeholder: 'Sélectionnez un Pays',
        allowClear: true,
        ajax: {
            url: '{{ route("get.countries") }}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
});
// $(document).ready(function() {
//     // Ajout du token CSRF pour toutes les requêtes AJAX
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
    
//     // Initialisation du Select2 pour les opérateurs
//     $('#operator_id').select2({
//         placeholder: 'Sélectionnez un opérateur',
//         allowClear: true,
//         ajax: {
//             url: '/operators/search',
//             dataType: 'json',
//             delay: 250,
//             data: function(params) {
//                 return {
//                     search: params.term,
//                     page: params.page || 1
//                 };
//             },
//             processResults: function(data) {
//                 return {
//                     results: $.map(data.data, function(item) {
//                         return {
//                             text: item.name,
//                             id: item.id
//                         };
//                     }),
//                     pagination: {
//                         more: data.next_page_url !== null
//                     }
//                 };
//             },
//             cache: true
//         }
//     });
    
//     // Initialisation du Select2 pour les pays
//     $('#country_id').select2({
//         placeholder: 'Sélectionnez un pays',
//         allowClear: true,
//         ajax: {
//             url: '/countries/search',
//             dataType: 'json',
//             delay: 250,
//             data: function(params) {
//                 return {
//                     search: params.term,
//                     page: params.page || 1
//                 };
//             },
//             processResults: function(data) {
//                 return {
//                     results: $.map(data.data, function(item) {
//                         return {
//                             text: item.name,
//                             id: item.id
//                         };
//                     }),
//                     pagination: {
//                         more: data.next_page_url !== null
//                     }
//                 };
//             },
//             cache: true
//         }
//     });
    
//     // Gestion du bouton Cancel
//     $('#closeBtn').on('click', function(e) {
//         e.preventDefault();
//         $('#searchWindow').hide();
//         // Ou autre action pour fermer la fenêtre selon votre UI
//     });
    
//     // Préselection des valeurs si elles existent dans l'URL (pour garder les filtres après recherche)
//     if (urlParams.has('operator_id')) {
//         $.ajax({
//             url: '/operators/' + urlParams.get('operator_id'),
//             type: 'GET',
//             dataType: 'json',
//             success: function(data) {
//                 // Créer l'option et la sélectionner
//                 var option = new Option(data.name, data.id, true, true);
//                 $('#operator_id').append(option).trigger('change');
//             }
//         });
//     }
    
//     if (urlParams.has('country_id')) {
//         $.ajax({
//             url: '/countries/' + urlParams.get('country_id'),
//             type: 'GET',
//             dataType: 'json',
//             success: function(data) {
//                 // Créer l'option et la sélectionner
//                 var option = new Option(data.name, data.id, true, true);
//                 $('#country_id').append(option).trigger('change');
//             }
//         });
//     }
// });

// Récupération des paramètres d'URL pour la préselection
// const urlParams = new URLSearchParams(window.location.search);

//************************************************************************************************************************************

// Fonction de mise à jour
$('#updateButton').click(function() {
    var formData = $('#editForm').serialize();
    
    $.ajax({
        url: '/update-registry',
        method: 'POST',
        data: formData,
        success: function(response) {
            if(response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Succès',
                    text: 'Enregistrement mis à jour avec succès'
                }).then(() => {
                    location.reload(); // Recharger la page pour voir les modifications
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: 'Erreur lors de la mise à jour'
                });
            }
        },
        error: function(xhr) {
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: 'Erreur lors de la mise à jour'
            });
        }
    });
});
//Supprimer un enregistrement
function deleteUser(id) {
        Swal.fire({
            title: 'Es-tu sûr ?',
            text: "Cette action est irréversible !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e3342f',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Oui, supprimer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/senders/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Supprimé !',
                            text: 'Le sender a bien été supprimé.',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            // Recharger la page après la suppression
                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Erreur',
                            'Une erreur est survenue lors de la suppression.',
                            'error'
                        );
                    }
                });
            }
        });
    }
// Fonction de suppression
$('#deleteButton').click(function() {
    var id = $('#editRecordId').val();
    
    Swal.fire({
        title: 'Êtes-vous sûr ?',
        text: 'Vous ne pourrez pas revenir en arrière !',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Oui, supprimer !'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/delete-registry/' + id,
                method: 'DELETE',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if(response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Succès',
                            text: 'Enregistrement supprimé avec succès'
                        }).then(() => {
                            location.reload(); // Recharger la page
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erreur',
                            text: 'Erreur lors de la suppression'
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur',
                        text: 'Erreur lors de la suppression'
                    });
                }
            });
        }
    });
});
// **********************************************************************************
  
  </script>
{{-- <script>
   $(document).ready(function() {
    $('#recordModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); 
            var recordId = button.data('id'); 
            
            // Charge les détails de l'enregistrement via AJAX
            $.get('/search/' + recordId + '/details', function(data) {
                $('#recordModal .modal-body').html(data);

            });
    });
        });
</script> --}}
<!-- Ajoutez ce script à la fin de votre vue, juste avant la fermeture de la balise body -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Éléments du DOM
    const toggleSearchBtn = document.getElementById('toggleSearchBtn');
    const closeSearchBtn = document.getElementById('closeSearchBtn');
    const searchForm = document.getElementById('searchForm');
    const recordSearchForm = document.getElementById('recordSearchForm');
    const resetSearchBtn = document.getElementById('resetSearchBtn');
    const resultsTable = document.getElementById('resultsTable');
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('tableBody');
    const rows = Array.from(tableBody.getElementsByTagName('tr'));

    searchInput.addEventListener('keyup', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });

    toggleSearchBtn.addEventListener('click', function() {
        searchForm.style.display = 'block';
        searchForm.style.opacity = '0';
        setTimeout(() => {
            searchForm.style.transition = 'opacity 0.3s ease-in-out';
            searchForm.style.opacity = '1';
        }, 10);
    });
            // Animation simple
            if (isHidden) {
                searchForm.style.opacity = '0';
                setTimeout(() => {
                    searchForm.style.transition = 'opacity 0.3s ease-in-out';
                    searchForm.style.opacity = '1';
                }, 10);
            }
        });

        // Fermer le formulaire
    closeSearchBtn.addEventListener('click', function() {
        searchForm.style.opacity = '0';
        setTimeout(() => {
            searchForm.style.display = 'none';
        }, 300);
    });
    
        // Réinitialisation du formulaire
        resetSearchBtn.addEventListener('click', function() {
        recordSearchForm.reset();
        // Optionnel : vider aussi les résultats
        resultsTable.innerHTML = '<div class="alert alert-info">Veuillez effectuer une recherche</div>';
    });


    recordSearchForm.addEventListener('submit', function(e) {
        e.preventDefault();
       
        // // Gestion de la soumission du formulaire
        // recordSearchForm.addEventListener('submit', function(e) {
        //     e.preventDefault();
        //     performSearch();
        // });
         // Récupérer uniquement les champs renseignés
         const formData = new FormData(recordSearchForm);
         const searchParams = new URLSearchParams();

         // Ne garder que les champs non vides
         for (const [key, value] of formData.entries()) {
            if (value.trim() !== '') {
                searchParams.append(key, value.trim());
            }
        }

        // Si aucun champ n'est renseigné, afficher une alerte
        if (searchParams.toString() === '') {
            alert('Veuillez renseigner au moins un critère de recherche');
            return;
        }

    
        // Fonction pour effectuer la recherche via AJAX
        function performSearch() {
            const formData = new FormData(recordSearchForm);
            const searchParams = new URLSearchParams(formData);
    
            // // Afficher un indicateur de chargement
            // resultsTable.innerHTML = '<div class="text-center"><div class="spinner-border" role="status"></div></div>';
            
              // Afficher le spinner pendant le chargement
              resultsTable.innerHTML = `
            <div class="d-flex justify-content-center my-5">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Chargement...</span>
                </div>
            </div>`;
            // Effectuer la requête AJAX
            fetch(`${window.location.pathname}/search?${searchParams.toString()}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                resultsTable.innerHTML = html;

                
                // Mettre à jour l'URL avec les paramètres de recherche
                window.history.pushState({}, '', `${window.location.pathname}?${searchParams.toString()}`);
            })
            .catch(error => {
                console.error('Erreur:', error);
                resultsTable.innerHTML = '<div class="alert alert-danger">Une erreur est survenue lors de la recherche.</div>';
            });
        }
       });

    </script>
</body>
</html>
