
setTimeout(function () {

	// chart 1
	var ctx1 = document.getElementById('chart1').getContext('2d');
	var myChart1 = new Chart(ctx1, {
		type: 'line',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
			datasets: [{
				label: 'New Visitor',
				data: [3, 3, 8, 5, 7, 4, 6, 4, 6, 3],
				backgroundColor: '#14abef',
				borderColor: "transparent",
				pointRadius :"0",
				borderWidth: 3
			}, {
				label: 'Old Visitor',
				data: [7, 5, 14, 7, 12, 6, 10, 6, 11, 5],
				backgroundColor: "rgba(20, 171, 239, .35)",
				borderColor: "transparent",
				pointRadius :"0",
				borderWidth: 1
			}]
		},
		options: {
			maintainAspectRatio: false,
			legend: {
				display: false,
				labels: {
					fontColor: '#585757',
					boxWidth:40
				}
			},
			tooltips: {
				displayColors:false
			},
			scales: {
				xAxes: [{
					ticks: {
						beginAtZero:true,
						fontColor: '#585757'
					},
					gridLines: {
						display: true ,
						color: "rgba(0, 0, 0, .05)"
					},
				}],
				yAxes: [{
					ticks: {
						beginAtZero:true,
						fontColor: '#585757'
					},
					gridLines: {
						display: true ,
						color: "rgba(0, 0, 0, .05)"
					},
				}]
			}

		}
	});


	// chart 2
	var ctx2 = document.getElementById("chart2").getContext('2d');
	var myChart2 = new Chart(ctx2, {
		type: 'doughnut',
		data: {
			labels: ["Direct", "Affiliate", "E-mail", "Other"],
			datasets: [{
				backgroundColor: [
					"#14abef",
					"#02ba5a",
					"#d13adf",
					"#fba540"
				],
				data: [5856, 2602, 1802, 1105],
				borderWidth: [0, 0, 0, 0]
			}]
		},
		options: {
			maintainAspectRatio: false,
			legend: {
				position :"bottom",
				display: false,
				labels: {
					fontColor: '#ddd',
					boxWidth:15
				}
			}
			,
			tooltips: {
				displayColors:false
			}
		}
	});

}, 1000)

// ***********************************btn search page search

const searchBtn = document.getElementById('searchBtn');
const searchWindow = document.getElementById('searchWindow');
const closeBtn = document.getElementById('closeBtn');// Close search window
// Open search window
searchBtn.addEventListener('click', () => {
    searchWindow.style.display = 'flex';
});

closeBtn.addEventListener('click', () => {
    searchWindow.style.display = 'none';
    searchResult.innerHTML = ''; // Clear results on close
});

 // Fonction d'exportation des données (format CSV)
 document.getElementById('exportBtn').addEventListener('click', () => {
            const rows = document.querySelectorAll('.result tr');
            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(row => {
                let cols = row.querySelectorAll('td, th');
                let rowData = Array.from(cols).map(col => col.innerText).join(",");
                csvContent += rowData + "\r\n";
            });

            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "exported_data.csv");
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
// *********************************************************************************************

document.addEventListener('DOMContentLoaded', function() {
	// Initialisation des dropdowns Bootstrap
	var dropdowns = document.querySelectorAll('.dropdown-toggle');
	dropdowns.forEach(function(dropdown) {
		new bootstrap.Dropdown(dropdown);
	});

	// Ajout d'une animation au hover (optionnel)
	const exportBtn = document.querySelector('#exportDropdown');
	if (exportBtn) {
		exportBtn.addEventListener('mouseover', function() {
			this.classList.add('shadow-sm');
		});
		exportBtn.addEventListener('mouseout', function() {
			this.classList.remove('shadow-sm');
		});
	}

	// Gestion du click sur les options d'export
	document.querySelectorAll('.dropdown-item').forEach(function(item) {
		item.addEventListener('click', function(e) {
			// Ajout d'un effet de chargement lors du clic
			const btn = document.querySelector('#exportDropdown');
			const originalText = btn.innerHTML;
			btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Exportation...';
			
			// Restauration du texte original après 2 secondes
			setTimeout(function() {
				btn.innerHTML = originalText;
			}, 2000);
		});
	});
});

// *************************************************************************************************************
// $(document).ready(function() {
// 	$('.view-details').on('click', function() {
// 		var id = $(this).data('id');

// 		$.ajax({
// 			url: '/search/' + id + '/details',
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
// 				$('#modalDetails').html('<p>Erreur de chargement des détails</p>');
// 			}
// 		});
// 	});
// });
// **********************************************btn edit and delete
function showOptions(userId) {
	document.getElementById(`optionsMenu${userId}`).style.display = 'block';
}

function openEditModal(userId) {
	// Récupérer les données de l'utilisateur
	fetch(`/actions/${userId}`)
		.then(response => response.json())
		.then(user => {
			document.getElementById('userId').value = user.id;
			document.getElementById('name').value = user.name;
			document.getElementById('country').value = user.country;
			document.getElementById('status').value = user.status;
			document.getElementById('operator').value = user.operator;
			
			// Afficher la modale
			document.getElementById('editModal').style.display = 'block';
		});
}

function closeEditModal() {
	document.getElementById('editModal').style.display = 'none';
}

function saveChanges() {
	const userId = document.getElementById('userId').value;
	const data = {
		_token: '{{ csrf_token() }}',
		name: document.getElementById('name').value,
		country: document.getElementById('country').value,
		status: document.getElementById('status').value,
		operator: document.getElementById('operator').value
	};

	fetch(`/actions/${userId}`, {
		method: 'PUT',
		headers: { 'Content-Type': 'application/json' },
		body: JSON.stringify(data)
	})
	.then(response => response.json())
	.then(data => {
		if (data.success) {
			alert("Mise à jour réussie !");
			closeEditModal();
			location.reload();
		} else {
			alert("Erreur lors de la mise à jour.");
		}
	});
}

function deleteUser(userId) {
	if (confirm("are you sure?")) {
		fetch(`/actions/${userId}`, {
			method: 'DELETE',
			headers: {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			}
		})
		.then(response => response.json())
		.then(data => {
			if (data.success) {
				alert("Sender deleted !");
				location.reload();
			} else {
				alert("Erreur lors de la suppression.");
			}
		});
	}
}
