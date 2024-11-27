@extends('espacemembre')
@section('searcher')
    
<div class="w3-main" style="margin-top:54px">
      <div style="padding:16px 32px">
        <h3>Search sender</h3>
        <section class="badge-dot " >
        <div class="w3-right card-toolbar mb-3"style="margin-right: 10px"> 
            <h4>
                <button type="button" class="btn btn-sm text-white w3-margin-top" id="toggleSearchBtn" style="background-color: rgba(36, 83, 187, 1);">
                    <i class="fa fa-search text-white"></i>search</button>
            </h4>
        </div>

<div id="searchForm" class="card mb-4" style="display: none;">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h5 class="card-title">Recherche avancée</h5>

      <form id="recordSearchForm" method="GET">
          <div class="row">
              <div class="col-md-3 mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name"  maxlength="11">
              </div>

              <div class="col-md-3 mb-3">
                <label for="operator" class="form-label">Operator</label>
                <input type="text" class="form-control" id="operator" name="operator" maxlength="20">
            </div>

              <div class="col-md-3 mb-3">
                  <label for="country" class="form-label">Country</label>
                  <input type="text" class="form-control" id="country" name="country"  maxlength="20">
              </div>

              <div class="col-md-3 mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" class="w3-input w3-border w3-round form-control @error('status') is-invalid @enderror" name="status"  id="status" >                  
                  <option value="">Sélectionnez un status</option>
                  <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                  <option value="valide" {{ old('status') == 'valide' ? 'selected' : '' }}>Valide</option>
                  <option value="close" {{ old('status') == 'close' ? 'selected' : '' }}>Close</option>
                </select>
              </div>

              <div class="col-md-3 mb-3">
                  <label for="created_at" class="form-label">Date debut</label>
                  <input type="date" class="form-control" id="created_at" name="created_at" >
              </div>
              
             <div class="col-md-3 mb-3">
              <label for="date_to" class="form-label">Date fin</label>
                <input type="date" name="date_to" class="form-control"  id="date_to">
         
          
          <div class="text-end">
              <button type="button" class="btn btn-secondary me-2"  id="closeSearchBtn">Cancel</button>
              <button type="button" class="btn btn-secondary me-2" id="resetSearchBtn">Réinitialiser</button>
              <button type="submit" class="btn btn-primary">Rechercher</button>
          </div>
        </div>
      </form>
  </div>
</div>
<div id="resultsTable">
  @include('searchsender')
</div>

</div>
</section>

        <div class="w3-white w3-round w3-margin-bottom w3-border" style="">
          <div class="w3-padding-large">
            <section class="badge-dot">
                <div class="card-toolbar">
                    <h4>
                      <br>
                      <br>
                    </h4>
                </div>
            </section>
            <section id="web-application">
               
            </section>
            <section id="web-application">
              <h4 class="w3-margin-top w3-border-bottom"></h4>
              <div class="w3-row">
                <div class="card-body py-0">
                    <table class="table table-sm table-hover  w3-table w3-bordered  table-striped table-bordered" id="tabledatas" > 
                            <thead>
                              <tr>
                                <th  data-searchable="false">Create_at</th>
                                <th  data-searchable="true">Name</th>
                                <th  data-searchable="true">Operator</th>
                                <th  data-searchable="true">Country</th>
                                <th  data-searchable="true">Status</th>
                                <th  data-searchable="false">Sub Date</th>
                                <th  data-searchable="false">Valid Date</th>
                                <th  data-searchable="false">Comment</th>
                              </tr>
                            </thead>
                               
                        <tbody>
                        
                        @forelse ($sender as $senders)
                        <tr>
                            <td>{{ $senders->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $senders->name }}</td>
                            <td>{{ $senders->operator }}</td>
                            <td>{{ $senders->country }}</td>
                                <td>
                                    @switch($senders->status)
                                        @case('close')
                                            <span class="badge bg-danger ">{{ $senders->status }}</span>
                                            @break
                                        @case('pending')
                                            <span class="badge bg-warning text-dark">{{ $senders->status }}</span>
                                            @break
                                        @default
                                            <span class="badge bg-success ">{{ $senders->status }}</span> 
                                    @endswitch
                                </td>
                                <td>{{ \Carbon\Carbon::parse($senders->date_sub)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($senders->date_valid)->format('d/m/Y') }}</td>
                                <td>
                                    <a href="#" class="view-details text-dark" data-toggle="modal" data-target="#recordModal" data-id="{{ $senders->id }}"><i class="fa fa-fw fa-eye" style="color: rgb(158, 22, 4);"></i><span style="color: rgb(8, 8, 59)">View</span></a>
                                </td>
                                {{-- <td>
                                  <a href="#" data-id="{{ $senders->id }}"><i class="fa fa-trash text-danger me-2"></i></span></a>
                                  <a href="#" id="editModal" data-id="{{ $senders->id }}"><i class="fa fa-edit text-primary me-2 edit-btn"></i></span></a>
                                </td> --}}
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Aucun enregistrement trouvé</td>
                            </tr>
                        @endforelse
                    </table>
                    <div class="pagination">
                      {{ $sender->links() }}
                  </div>
                          
                    <!-- Modale pour afficher les détails -->
                    <div class="modal fade" id="recordModal" tabindex="-1" role="dialog" aria-labelledby="recordModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="recordModalLabel">Registration details</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                    
                                <div class="modal-body">
                                    <!-- Contenu sera chargé ici avec AJAX -->
                                </div>
                         </div>
                      </div>

                       </div>        
   
                     </div>


                    </section>
            
        </div>
      </div>
      </div>
</div>
@endsection