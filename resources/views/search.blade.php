@extends('espacemembre')
@section('search')
    
<div class="w3-main" style="margin-top:54px">
      <div style="padding:16px 32px">
        
        <section class="badge-dot " >
        <div class="w3-right card-toolbar mb-3"style="margin-right: 15px"> 
          <h4>
            <button type="button" class="btn btn-sm text-white w3-margin-top w3-round" id="searchBtn" style="background-color: rgba(36, 83, 187, 1);">
             search</button>
          </h4>
        </div>

        <div>
          <h3 class="w3-left card-toolbar mb-3" style="margin-left: 15px">
      @if(!$results->isEmpty())
      <!-- Bouton d'export avec menu déroulant -->
      
      <div class="dropdown">
          <!-- Bouton principal avec une icône et un libellé -->
          <button class="btn btn-sm btn-success dropdown-toggle text-white w3-margin-top" type="button" id="exportCsvBtn" data-bs-toggle="dropdown" aria-expanded="false">
             Exporter
          </button>
      
          <!-- Menu déroulant contenant les options d'exportation -->
          <ul class="dropdown-menu" aria-labelledby="exportCsvBtn">
              <li>
                  <a class="dropdown-item" href="{{ route('search.export', ['type' => 'excel'] + request()->query()) }}">
                      <i class="fas fa-file-excel"></i> Export Excel
                  </a>
              </li>
              <li>
                  <a class="dropdown-item" href="{{ route('search.export', ['type' => 'csv'] + request()->query()) }}">
                      <i class="fas fa-file-csv"></i> Export CSV
                  </a>

              </li>
              
          </ul>
      </div>
      
      @endif
  </h3>
  </div>

{{-- //**************************************************************Formulaire de recherche*********************************** --}}
  <div id="searchWindow" class="search-window">
    <form action="{{ route('search.searchs') }}" method="POST">
        @csrf
        <div class="search-box">
            <input type="text" name="name" class="form-control" placeholder="Name">
            
            <div class="mb-3">
                <select class="form-control select2" id="operator" name="operator" style="width: 100%;">
                    <option value="">Sélectionnez un Opérateur</option>
                </select>     
            </div>
            
            <div class="mb-3">
                <select class="form-control select2" id="country" name="country" style="width: 100%;">
                    <option value="">Sélectionnez un Pays</option>
                </select>
            </div>
            
            <select name="status" class="form-control">
                <option value="">Select Status</option>
                <option value="pending">Pending</option>
                <option value="valide">Valide</option>
                <option value="close">Rejeté</option>
            </select>
            
            <input type="date" name="start_date" class="form-control" placeholder="Date Debut">
            <input type="date" name="end_date" class="form-control" placeholder="Date Fin">
            
            <button type="submit" class="btn btn-primary mt-3">Search</button>
            <button id="closeBtn" class="close-btn" type="button">Cancel</button>
        </div>
    </form>
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
                            <th>Created At</th>
                            <th>Name</th>
                            <th>Operator</th>
                            <th>Country</th>
                            <th>Status</th>
                            <th>Sub Date</th>
                            <th>Valid Date</th>
                            <th>Commentaire</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if($noResults)
                      <tr>
                          <td colspan="6">Aucune donnée trouvée</td>
                      </tr>
                  @else
                  
                      @foreach($results as $result)
                      <tr>
                          <td>{{ $result->created_at }}</td>
                          <td>{{ $result->name }}</td>
                          <td>{{ $result->operator_name }}</td> <!-- Nom de l'opérateur -->
                          <td>{{ $result->country_name }}</td> <!-- Nom du pays -->
                          {{-- <td>{{ $result->operator }}</td>
                          <td>{{ $result->country }}</td> --}}
                          <td>
                              @switch($result->status)
                                  @case('close')
                                      <span class="badge bg-danger ">{{ $result->status }}</span>
                                      @break
                                  @case('pending')
                                      <span class="badge bg-warning text-dark">{{ $result->status }}</span>
                                      @break
                                  @default
                                      <span class="badge bg-success ">{{ $result->status }}</span> 
                              @endswitch
                          </td>
                          <td>{{ \Carbon\Carbon::parse($result->date_sub)->format('d/m/Y') }}</td>
                          <td>{{ \Carbon\Carbon::parse($result->date_valid)->format('d/m/Y') }}</td>
                          <td>
                              <button type="button" data-toggle="modal" class="btn-sm custom-btn" data-target="#detailModal{{ $result->id }}"><i class="fa fa-fw fa-eye" style="color: rgb(158, 22, 4);"></i><span style="color: rgb(8, 8, 59)">View</span></button> 
                          </td>
      
                      </tr>
                      <div class="modal fade" id="detailModal{{ $result->id }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="color: rgb(44, 55, 204);">Registration details #{{ $result->id }}</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Affichez les détails spécifiques à cet enregistrement -->
                                    <p><strong>Name : </strong> {{ $result->name }}</p>
                                    <p><strong>Operator :</strong>  {{ $result->operator_name }}</p>
                                    <p><strong>Country : </strong> {{ $result->country_name }}</p>
                                    <p><strong>Updated Date :</strong> {{ \Carbon\Carbon::parse($result->updated_at)->format('d/m/Y H:i')}}</p>
                                    <p><strong>Commentaire :</strong>  {{ $result->commentaire }}</p>
                                    <!-- Ajoutez d'autres champs selon vos besoins -->
                                </div>
                            </div>
                        </div>
                    </div>
                      @endforeach
                  @endif
                 
              </tbody>
              </table>
                     <div>
                        {{ $results->links() }}
                  </div> 
                     </div>
                    </div>
                    </section>
            
        </div>
      </div>
      </div>
</div>
@endsection