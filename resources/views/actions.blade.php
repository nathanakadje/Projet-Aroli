@extends('espacemembre')
@section('search')
    


    <div class="w3-main" style="margin-top:54px">
      {{-- <div style="padding:16px 32px"> --}}
        
        <section class="badge-dot " >
        <div class="w3-right card-toolbar" style="margin-right: 10px"> 
            <h4>
                <div class="card-header">
                    <div class="row mb-3">
                        <div class="col-md-9">
                            <input type="text" 
                                   id="searchInput" 
                                   class="form-control" 
                                   placeholder="Enter keywords">
                        </div>
                    </div>
                </div>
            </h4>
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
                                {{-- <th  data-searchable="false">Create_at</th> --}}
                                <th  data-searchable="true">Name</th>
                                <th  data-searchable="true">Operator</th>
                                <th  data-searchable="true">Country</th>
                                <th  data-searchable="true">Status</th>
                                {{-- <th  data-searchable="false">Sub Date</th> --}}
                                <th  data-searchable="false">Udpdate</th>
                                <th  data-searchable="false">Action</th>                              
                              </tr>
                            </thead>
                               
                        <tbody id="tableBody">
                        @forelse ($user as $senders)
                        <tr>
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
                            <td>{{ $senders->updated_at->format('d/m/Y H:i') }}</td>
                                {{-- <td>{{ \Carbon\Carbon::parse($senders->date_sub)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($senders->date_valid)->format('d/m/Y') }}</td> --}}
                        
                                <td>
                                    <a href="#" onclick="openEditModal({{ $senders->id }})"><i class="fa fa-edit text-primary me-3 edit-btn"></i>Edit</a>
                                    <a href="#" onclick="deleteUser({{ $senders->id }})"><i class="fa fa-trash text-danger me-3 "></i><span style="color: rgba(243, 10, 10, 0.801)">Delete</span></a>
                               
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Aucun enregistrement trouvé</td>
                            </tr>
                            
                        @endforelse
                        
                    </table>
                    <div class="pagination">
                        {{ $user->links() }}
                    </div>
                            <!-- Pagination -->
    
                   <!-- Fenêtre modale pour l'édition -->
<div class="modal" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier l'utilisateur</h5>
                <button type="button" class="close" onclick="closeEditModal()">&times;</button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    @csrf
                    <input type="hidden" id="userId">
                    
                    <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" id="name" name="name" class="form-control" maxlength="11" >
                    </div>
                    
                    <div class="form-group save">
                        <label for="country">Operator :</label>
                        <input type="text" id="country" name="country" class="form-control">
                    </div>
                    
                    <div class="form-group save" >
                        <label for="status">Status :</label>
                    
                        <select id="status" class="w3-input w3-border w3-round form-control @error('status') is-invalid @enderror" name="status"  id="status" >                  
                            <option value="">Sélectionnez un status</option>
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="valide" {{ old('status') == 'valide' ? 'selected' : '' }}>Valide</option>
                            <option value="close" {{ old('status') == 'close' ? 'selected' : '' }}>Close</option>
                          </select>
                    </div>
                    
                    <div class="form-group"  >
                        <label for="operator">Opérateur :</label>
                        <input type="text" id="operator" name="operator" class="form-control">
                    </div>
                    <div class="save">
                    <button type="button" class="btn btn-primary btn-sm"  onclick="saveChanges()">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
</div>        
  </div>

</body>

</html>
@endsection
