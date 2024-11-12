@extends('espacemembre')
@section('search')
    


    <div class="w3-main" style="margin-top:54px">
      <div style="padding:16px 32px">
        <h3>Icons</h3>
        <section class="badge-dot " >
        <div class="w3-right card-toolbar" style="margin-right: 10px"> 
            <h4>
                <button type="button" class="btn btn-sm text-white w3-margin-top" id="addData" data-kt-menu-trigger="click" style="background-color: rgba(36, 83, 187, 1);">
                    <i class="fa fa-search "></i> </span>search</button>
            </h4>
        </div>
    </section>
        <div class="w3-white w3-round w3-margin-bottom w3-border" style="">
          <div class="w3-padding-large">
            <section class="badge-dot">
                <div class="card-toolbar">
                    <h4>
                        <button type="button" class="btn btn-sm text-white w3-margin-top" id="addData" data-kt-menu-trigger="click" style="background-color: rgb(6, 170, 14);">
                            <i class="ki-duotone ki-plus fs-5"><span class="path1"></span><span class="path2"></span></i> Add  
                        </button>
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
                                    
                                    <a href="/searchsender/{id}" class="btn btn-primary btn-sm view-details text-dark" data-toggle="modal" data-target="#recordModal" data-id="{{ $senders->id }}"><i class="fa fa-fw fa-eye"></i></span>View</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Aucun enregistrement trouvé</td>
                            </tr>
                        @endforelse
                    </table>
                    <!-- Modale pour afficher les détails -->
<div class="modal fade" id="recordModal" tabindex="-1" role="dialog" aria-labelledby="recordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="recordModalLabel">Détails de l'Enregistrement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Name : {{ $senders->name }}</h5>
<h5>Operator : {{ $senders->operator }}</h5>
<p><strong>Pays :</strong> {{ $senders->country }}</p>
<p><strong>Status :</strong> {{ $senders->status }}</p>
<p><strong>Date Sub :</strong> {{ \Carbon\Carbon::parse($senders->date_sub)->format('d/m/Y H:i') }}</p>
<p><strong>Date Valid :</strong> {{ \Carbon\Carbon::parse($senders->date_sub)->format('d/m/Y H:i')}}</p>
<p><strong>Commentaire :</strong> {{ $senders->commentaire }}</p>

                <!-- Contenu sera chargé ici avec AJAX -->
            </div>
        </div>
    </div>
</div>
                </div>
            </section>
            <section id="accessibility">
              <h4 class="w3-margin-top w3-border-bottom">Accessibility Icons</h4>
              <div class="w3-row">
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-american-sign-language-interpreting" aria-hidden="true"></i> <span class="sr-only">Example of </span>american-sign-language-interpreting</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-asl-interpreting" aria-hidden="true"></i> <span class="sr-only">Example of </span>asl-interpreting <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-assistive-listening-systems" aria-hidden="true"></i> <span class="sr-only">Example of </span>assistive-listening-systems</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-audio-description" aria-hidden="true"></i> <span class="sr-only">Example of </span>audio-description</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-blind" aria-hidden="true"></i> <span class="sr-only">Example of </span>blind</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-braille" aria-hidden="true"></i> <span class="sr-only">Example of </span>braille</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cc" aria-hidden="true"></i> <span class="sr-only">Example of </span>cc</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-deaf" aria-hidden="true"></i> <span class="sr-only">Example of </span>deaf</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-deafness" aria-hidden="true"></i> <span class="sr-only">Example of </span>deafness <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-hard-of-hearing" aria-hidden="true"></i> <span class="sr-only">Example of </span>hard-of-hearing <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-low-vision" aria-hidden="true"></i> <span class="sr-only">Example of </span>low-vision</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-question-circle-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>question-circle-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-sign-language" aria-hidden="true"></i> <span class="sr-only">Example of </span>sign-language</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-signing" aria-hidden="true"></i> <span class="sr-only">Example of </span>signing <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-tty" aria-hidden="true"></i> <span class="sr-only">Example of </span>tty</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-universal-access" aria-hidden="true"></i> <span class="sr-only">Example of </span>universal-access</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-volume-control-phone" aria-hidden="true"></i> <span class="sr-only">Example of </span>volume-control-phone</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-wheelchair" aria-hidden="true"></i> <span class="sr-only">Example of </span>wheelchair</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-wheelchair-alt" aria-hidden="true"></i> <span class="sr-only">Example of </span>wheelchair-alt</button></div>
              </div>
            </section>
            <section id="hand">
              <h4 class="w3-margin-top w3-border-bottom">Hand Icons</h4>
              <div class="w3-row">
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-hand-grab-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-grab-o <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-hand-lizard-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-lizard-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-hand-o-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-o-down</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-hand-o-left" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-o-left</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-hand-o-right" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-o-right</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-hand-o-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-o-up</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-hand-paper-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-paper-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-hand-peace-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-peace-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-hand-pointer-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-pointer-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-hand-rock-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-rock-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-hand-scissors-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-scissors-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-hand-spock-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-spock-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-hand-stop-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-stop-o <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-thumbs-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>thumbs-down</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-thumbs-o-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>thumbs-o-down</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-thumbs-o-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>thumbs-o-up</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-thumbs-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>thumbs-up</button></div>
              </div>
            </section>
            <section id="transportation">
              <h4 class="w3-margin-top w3-border-bottom">Transportation Icons</h4>
              <div class="w3-row">
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-ambulance" aria-hidden="true"></i> <span class="sr-only">Example of </span>ambulance</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-automobile" aria-hidden="true"></i> <span class="sr-only">Example of </span>automobile <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-bicycle" aria-hidden="true"></i> <span class="sr-only">Example of </span>bicycle</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-bus" aria-hidden="true"></i> <span class="sr-only">Example of </span>bus</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cab" aria-hidden="true"></i> <span class="sr-only">Example of </span>cab <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-car" aria-hidden="true"></i> <span class="sr-only">Example of </span>car</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-fighter-jet" aria-hidden="true"></i> <span class="sr-only">Example of </span>fighter-jet</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-motorcycle" aria-hidden="true"></i> <span class="sr-only">Example of </span>motorcycle</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-plane" aria-hidden="true"></i> <span class="sr-only">Example of </span>plane</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-rocket" aria-hidden="true"></i> <span class="sr-only">Example of </span>rocket</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-ship" aria-hidden="true"></i> <span class="sr-only">Example of </span>ship</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-space-shuttle" aria-hidden="true"></i> <span class="sr-only">Example of </span>space-shuttle</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-subway" aria-hidden="true"></i> <span class="sr-only">Example of </span>subway</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-taxi" aria-hidden="true"></i> <span class="sr-only">Example of </span>taxi</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-train" aria-hidden="true"></i> <span class="sr-only">Example of </span>train</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-truck" aria-hidden="true"></i> <span class="sr-only">Example of </span>truck</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-wheelchair" aria-hidden="true"></i> <span class="sr-only">Example of </span>wheelchair</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-wheelchair-alt" aria-hidden="true"></i> <span class="sr-only">Example of </span>wheelchair-alt</button></div>
              </div>
            </section>
            <section id="gender">
              <h4 class="w3-margin-top w3-border-bottom">Gender Icons</h4>
              <div class="w3-row">
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-genderless" aria-hidden="true"></i> <span class="sr-only">Example of </span>genderless</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-intersex" aria-hidden="true"></i> <span class="sr-only">Example of </span>intersex <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-mars" aria-hidden="true"></i> <span class="sr-only">Example of </span>mars</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-mars-double" aria-hidden="true"></i> <span class="sr-only">Example of </span>mars-double</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-mars-stroke" aria-hidden="true"></i> <span class="sr-only">Example of </span>mars-stroke</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-mars-stroke-h" aria-hidden="true"></i> <span class="sr-only">Example of </span>mars-stroke-h</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-mars-stroke-v" aria-hidden="true"></i> <span class="sr-only">Example of </span>mars-stroke-v</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-mercury" aria-hidden="true"></i> <span class="sr-only">Example of </span>mercury</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-neuter" aria-hidden="true"></i> <span class="sr-only">Example of </span>neuter</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-transgender" aria-hidden="true"></i> <span class="sr-only">Example of </span>transgender</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-transgender-alt" aria-hidden="true"></i> <span class="sr-only">Example of </span>transgender-alt</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-venus" aria-hidden="true"></i> <span class="sr-only">Example of </span>venus</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-venus-double" aria-hidden="true"></i> <span class="sr-only">Example of </span>venus-double</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-venus-mars" aria-hidden="true"></i> <span class="sr-only">Example of </span>venus-mars</button></div>
              </div>
            </section>
            <section id="file-type">
              <h4 class="w3-margin-top w3-border-bottom">File Type Icons</h4>
              <div class="w3-row">
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file" aria-hidden="true"></i> <span class="sr-only">Example of </span>file</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file-archive-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-archive-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file-audio-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-audio-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file-code-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-code-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file-excel-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-excel-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file-image-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-image-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file-movie-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-movie-o <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file-pdf-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-pdf-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file-photo-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-photo-o <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file-picture-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-picture-o <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file-powerpoint-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-powerpoint-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file-sound-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-sound-o <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file-text" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-text</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file-text-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-text-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file-video-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-video-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file-word-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-word-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file-zip-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-zip-o <span class="text-muted">(alias)</span></button></div>
              </div>
            </section>
            <section id="spinner">
              <h4 class="w3-margin-top w3-border-bottom">Spinner Icons</h4>
              <div class="w3-success w3-padding w3-round w3-margin-bottom">
                <i class="w3-margin-right fa fa-fw fa-info-circle fa-lg fa-li" aria-hidden="true"></i>
                <strong class="sr-only">Note:</strong> These icons work great with the <code class="w3-text-warning">fa-spin</code> class. Check out the <a href="https://fontawesome.com/v4.7.0/examples/#animated" target="_blank" class="w3-text-white w3-hover-opacity"><b>spinning icons example</b></a>.
              </div>
              <div class="w3-row">
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-circle-o-notch" aria-hidden="true"></i> <span class="sr-only">Example of </span>circle-o-notch</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cog" aria-hidden="true"></i> <span class="sr-only">Example of </span>cog</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-gear" aria-hidden="true"></i> <span class="sr-only">Example of </span>gear <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-refresh" aria-hidden="true"></i> <span class="sr-only">Example of </span>refresh</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-spinner" aria-hidden="true"></i> <span class="sr-only">Example of </span>spinner</button></div>
              </div>
            </section>
            <section id="form-control">
              <h4 class="w3-margin-top w3-border-bottom">Form Control Icons</h4>
              <div class="w3-row">
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-check-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>check-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-check-square-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>check-square-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-circle" aria-hidden="true"></i> <span class="sr-only">Example of </span>circle</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-circle-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>circle-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-dot-circle-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>dot-circle-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-minus-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>minus-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-minus-square-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>minus-square-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-plus-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>plus-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-plus-square-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>plus-square-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-square-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>square-o</button></div>
              </div>
            </section>
            <section id="payment">
              <h4 class="w3-margin-top w3-border-bottom">Payment Icons</h4>
              <div class="w3-row">
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cc-amex" aria-hidden="true"></i> <span class="sr-only">Example of </span>cc-amex</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cc-diners-club" aria-hidden="true"></i> <span class="sr-only">Example of </span>cc-diners-club</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cc-discover" aria-hidden="true"></i> <span class="sr-only">Example of </span>cc-discover</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cc-jcb" aria-hidden="true"></i> <span class="sr-only">Example of </span>cc-jcb</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cc-mastercard" aria-hidden="true"></i> <span class="sr-only">Example of </span>cc-mastercard</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cc-paypal" aria-hidden="true"></i> <span class="sr-only">Example of </span>cc-paypal</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cc-stripe" aria-hidden="true"></i> <span class="sr-only">Example of </span>cc-stripe</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cc-visa" aria-hidden="true"></i> <span class="sr-only">Example of </span>cc-visa</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-credit-card" aria-hidden="true"></i> <span class="sr-only">Example of </span>credit-card</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-credit-card-alt" aria-hidden="true"></i> <span class="sr-only">Example of </span>credit-card-alt</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-google-wallet" aria-hidden="true"></i> <span class="sr-only">Example of </span>google-wallet</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-paypal" aria-hidden="true"></i> <span class="sr-only">Example of </span>paypal</button></div>
              </div>
            </section>
            <section id="chart">
              <h4 class="w3-margin-top w3-border-bottom">Chart Icons</h4>
              <div class="w3-row">
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-area-chart" aria-hidden="true"></i> <span class="sr-only">Example of </span>area-chart</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-bar-chart" aria-hidden="true"></i> <span class="sr-only">Example of </span>bar-chart</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-bar-chart-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>bar-chart-o <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-line-chart" aria-hidden="true"></i> <span class="sr-only">Example of </span>line-chart</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-pie-chart" aria-hidden="true"></i> <span class="sr-only">Example of </span>pie-chart</button></div>
              </div>
            </section>
            <section id="currency">
              <h4 class="w3-margin-top w3-border-bottom">Currency Icons</h4>
              <div class="w3-row">
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-bitcoin" aria-hidden="true"></i> <span class="sr-only">Example of </span>bitcoin <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-btc" aria-hidden="true"></i> <span class="sr-only">Example of </span>btc</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cny" aria-hidden="true"></i> <span class="sr-only">Example of </span>cny <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-dollar" aria-hidden="true"></i> <span class="sr-only">Example of </span>dollar <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-eur" aria-hidden="true"></i> <span class="sr-only">Example of </span>eur</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-euro" aria-hidden="true"></i> <span class="sr-only">Example of </span>euro <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-gbp" aria-hidden="true"></i> <span class="sr-only">Example of </span>gbp</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-gg" aria-hidden="true"></i> <span class="sr-only">Example of </span>gg</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-gg-circle" aria-hidden="true"></i> <span class="sr-only">Example of </span>gg-circle</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-ils" aria-hidden="true"></i> <span class="sr-only">Example of </span>ils</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-inr" aria-hidden="true"></i> <span class="sr-only">Example of </span>inr</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-jpy" aria-hidden="true"></i> <span class="sr-only">Example of </span>jpy</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-krw" aria-hidden="true"></i> <span class="sr-only">Example of </span>krw</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-money" aria-hidden="true"></i> <span class="sr-only">Example of </span>money</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-rmb" aria-hidden="true"></i> <span class="sr-only">Example of </span>rmb <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-rouble" aria-hidden="true"></i> <span class="sr-only">Example of </span>rouble <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-rub" aria-hidden="true"></i> <span class="sr-only">Example of </span>rub</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-ruble" aria-hidden="true"></i> <span class="sr-only">Example of </span>ruble <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-rupee" aria-hidden="true"></i> <span class="sr-only">Example of </span>rupee <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-shekel" aria-hidden="true"></i> <span class="sr-only">Example of </span>shekel <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-sheqel" aria-hidden="true"></i> <span class="sr-only">Example of </span>sheqel <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-try" aria-hidden="true"></i> <span class="sr-only">Example of </span>try</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-turkish-lira" aria-hidden="true"></i> <span class="sr-only">Example of </span>turkish-lira <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-usd" aria-hidden="true"></i> <span class="sr-only">Example of </span>usd</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-viacoin" aria-hidden="true"></i> <span class="sr-only">Example of </span>viacoin</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-won" aria-hidden="true"></i> <span class="sr-only">Example of </span>won <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-yen" aria-hidden="true"></i> <span class="sr-only">Example of </span>yen <span class="text-muted">(alias)</span></button></div>
              </div>
            </section>
            <section id="text-editor">
              <h4 class="w3-margin-top w3-border-bottom">Text Editor Icons</h4>
              <div class="w3-row">
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-align-center" aria-hidden="true"></i> <span class="sr-only">Example of </span>align-center</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-align-justify" aria-hidden="true"></i> <span class="sr-only">Example of </span>align-justify</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-align-left" aria-hidden="true"></i> <span class="sr-only">Example of </span>align-left</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-align-right" aria-hidden="true"></i> <span class="sr-only">Example of </span>align-right</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-bold" aria-hidden="true"></i> <span class="sr-only">Example of </span>bold</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-chain" aria-hidden="true"></i> <span class="sr-only">Example of </span>chain <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-chain-broken" aria-hidden="true"></i> <span class="sr-only">Example of </span>chain-broken</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-clipboard" aria-hidden="true"></i> <span class="sr-only">Example of </span>clipboard</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-columns" aria-hidden="true"></i> <span class="sr-only">Example of </span>columns</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-copy" aria-hidden="true"></i> <span class="sr-only">Example of </span>copy <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cut" aria-hidden="true"></i> <span class="sr-only">Example of </span>cut <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-dedent" aria-hidden="true"></i> <span class="sr-only">Example of </span>dedent <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-eraser" aria-hidden="true"></i> <span class="sr-only">Example of </span>eraser</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file" aria-hidden="true"></i> <span class="sr-only">Example of </span>file</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file-text" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-text</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-file-text-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>file-text-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-files-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>files-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-floppy-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>floppy-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-font" aria-hidden="true"></i> <span class="sr-only">Example of </span>font</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-header" aria-hidden="true"></i> <span class="sr-only">Example of </span>header</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-indent" aria-hidden="true"></i> <span class="sr-only">Example of </span>indent</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-italic" aria-hidden="true"></i> <span class="sr-only">Example of </span>italic</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-link" aria-hidden="true"></i> <span class="sr-only">Example of </span>link</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-list" aria-hidden="true"></i> <span class="sr-only">Example of </span>list</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-list-alt" aria-hidden="true"></i> <span class="sr-only">Example of </span>list-alt</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-list-ol" aria-hidden="true"></i> <span class="sr-only">Example of </span>list-ol</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-list-ul" aria-hidden="true"></i> <span class="sr-only">Example of </span>list-ul</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-outdent" aria-hidden="true"></i> <span class="sr-only">Example of </span>outdent</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-paperclip" aria-hidden="true"></i> <span class="sr-only">Example of </span>paperclip</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-paragraph" aria-hidden="true"></i> <span class="sr-only">Example of </span>paragraph</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-paste" aria-hidden="true"></i> <span class="sr-only">Example of </span>paste <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-repeat" aria-hidden="true"></i> <span class="sr-only">Example of </span>repeat</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-rotate-left" aria-hidden="true"></i> <span class="sr-only">Example of </span>rotate-left <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-rotate-right" aria-hidden="true"></i> <span class="sr-only">Example of </span>rotate-right <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-save" aria-hidden="true"></i> <span class="sr-only">Example of </span>save <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-scissors" aria-hidden="true"></i> <span class="sr-only">Example of </span>scissors</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-strikethrough" aria-hidden="true"></i> <span class="sr-only">Example of </span>strikethrough</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-subscript" aria-hidden="true"></i> <span class="sr-only">Example of </span>subscript</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-superscript" aria-hidden="true"></i> <span class="sr-only">Example of </span>superscript</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-table" aria-hidden="true"></i> <span class="sr-only">Example of </span>table</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-text-height" aria-hidden="true"></i> <span class="sr-only">Example of </span>text-height</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-text-width" aria-hidden="true"></i> <span class="sr-only">Example of </span>text-width</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-th" aria-hidden="true"></i> <span class="sr-only">Example of </span>th</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-th-large" aria-hidden="true"></i> <span class="sr-only">Example of </span>th-large</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-th-list" aria-hidden="true"></i> <span class="sr-only">Example of </span>th-list</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-underline" aria-hidden="true"></i> <span class="sr-only">Example of </span>underline</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-undo" aria-hidden="true"></i> <span class="sr-only">Example of </span>undo</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-unlink" aria-hidden="true"></i> <span class="sr-only">Example of </span>unlink <span class="text-muted">(alias)</span></button></div>
              </div>
            </section>
            <section id="directional">
              <h4 class="w3-margin-top w3-border-bottom">Directional Icons</h4>
              <div class="w3-row">
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-angle-double-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>angle-double-down</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-angle-double-left" aria-hidden="true"></i> <span class="sr-only">Example of </span>angle-double-left</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-angle-double-right" aria-hidden="true"></i> <span class="sr-only">Example of </span>angle-double-right</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-angle-double-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>angle-double-up</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-angle-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>angle-down</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-angle-left" aria-hidden="true"></i> <span class="sr-only">Example of </span>angle-left</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-angle-right" aria-hidden="true"></i> <span class="sr-only">Example of </span>angle-right</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-angle-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>angle-up</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-arw3-row-circle-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>arw3-row-circle-down</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-arw3-row-circle-left" aria-hidden="true"></i> <span class="sr-only">Example of </span>arw3-row-circle-left</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-arw3-row-circle-o-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>arw3-row-circle-o-down</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-arw3-row-circle-o-left" aria-hidden="true"></i> <span class="sr-only">Example of </span>arw3-row-circle-o-left</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-arw3-row-circle-o-right" aria-hidden="true"></i> <span class="sr-only">Example of </span>arw3-row-circle-o-right</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-arw3-row-circle-o-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>arw3-row-circle-o-up</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-arw3-row-circle-right" aria-hidden="true"></i> <span class="sr-only">Example of </span>arw3-row-circle-right</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-arw3-row-circle-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>arw3-row-circle-up</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-arw3-row-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>arw3-row-down</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-arw3-row-left" aria-hidden="true"></i> <span class="sr-only">Example of </span>arw3-row-left</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-arw3-row-right" aria-hidden="true"></i> <span class="sr-only">Example of </span>arw3-row-right</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-arw3-row-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>arw3-row-up</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-arw3-rows" aria-hidden="true"></i> <span class="sr-only">Example of </span>arw3-rows</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-arw3-rows-alt" aria-hidden="true"></i> <span class="sr-only">Example of </span>arw3-rows-alt</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-arw3-rows-h" aria-hidden="true"></i> <span class="sr-only">Example of </span>arw3-rows-h</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-arw3-rows-v" aria-hidden="true"></i> <span class="sr-only">Example of </span>arw3-rows-v</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-caret-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>caret-down</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-caret-left" aria-hidden="true"></i> <span class="sr-only">Example of </span>caret-left</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-caret-right" aria-hidden="true"></i> <span class="sr-only">Example of </span>caret-right</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-caret-square-o-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>caret-square-o-down</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-caret-square-o-left" aria-hidden="true"></i> <span class="sr-only">Example of </span>caret-square-o-left</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-caret-square-o-right" aria-hidden="true"></i> <span class="sr-only">Example of </span>caret-square-o-right</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-caret-square-o-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>caret-square-o-up</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-caret-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>caret-up</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-chevron-circle-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>chevron-circle-down</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-chevron-circle-left" aria-hidden="true"></i> <span class="sr-only">Example of </span>chevron-circle-left</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-chevron-circle-right" aria-hidden="true"></i> <span class="sr-only">Example of </span>chevron-circle-right</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-chevron-circle-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>chevron-circle-up</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-chevron-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>chevron-down</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-chevron-left" aria-hidden="true"></i> <span class="sr-only">Example of </span>chevron-left</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-chevron-right" aria-hidden="true"></i> <span class="sr-only">Example of </span>chevron-right</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-chevron-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>chevron-up</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-exchange" aria-hidden="true"></i> <span class="sr-only">Example of </span>exchange</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-hand-o-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-o-down</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-hand-o-left" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-o-left</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-hand-o-right" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-o-right</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-hand-o-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>hand-o-up</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-long-arw3-row-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>long-arw3-row-down</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-long-arw3-row-left" aria-hidden="true"></i> <span class="sr-only">Example of </span>long-arw3-row-left</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-long-arw3-row-right" aria-hidden="true"></i> <span class="sr-only">Example of </span>long-arw3-row-right</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-long-arw3-row-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>long-arw3-row-up</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-toggle-down" aria-hidden="true"></i> <span class="sr-only">Example of </span>toggle-down <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-toggle-left" aria-hidden="true"></i> <span class="sr-only">Example of </span>toggle-left <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-toggle-right" aria-hidden="true"></i> <span class="sr-only">Example of </span>toggle-right <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-toggle-up" aria-hidden="true"></i> <span class="sr-only">Example of </span>toggle-up <span class="text-muted">(alias)</span></button></div>
              </div>
            </section>
            <section id="video-player">
              <h4 class="w3-margin-top w3-border-bottom">Video Player Icons</h4>
              <div class="w3-row">
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-arw3-rows-alt" aria-hidden="true"></i> <span class="sr-only">Example of </span>arw3-rows-alt</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-backward" aria-hidden="true"></i> <span class="sr-only">Example of </span>backward</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-compress" aria-hidden="true"></i> <span class="sr-only">Example of </span>compress</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-eject" aria-hidden="true"></i> <span class="sr-only">Example of </span>eject</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-expand" aria-hidden="true"></i> <span class="sr-only">Example of </span>expand</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-fast-backward" aria-hidden="true"></i> <span class="sr-only">Example of </span>fast-backward</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-fast-forward" aria-hidden="true"></i> <span class="sr-only">Example of </span>fast-forward</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-forward" aria-hidden="true"></i> <span class="sr-only">Example of </span>forward</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-pause" aria-hidden="true"></i> <span class="sr-only">Example of </span>pause</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-pause-circle" aria-hidden="true"></i> <span class="sr-only">Example of </span>pause-circle</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-pause-circle-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>pause-circle-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-play" aria-hidden="true"></i> <span class="sr-only">Example of </span>play</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-play-circle" aria-hidden="true"></i> <span class="sr-only">Example of </span>play-circle</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-play-circle-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>play-circle-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-random" aria-hidden="true"></i> <span class="sr-only">Example of </span>random</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-step-backward" aria-hidden="true"></i> <span class="sr-only">Example of </span>step-backward</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-step-forward" aria-hidden="true"></i> <span class="sr-only">Example of </span>step-forward</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-stop" aria-hidden="true"></i> <span class="sr-only">Example of </span>stop</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-stop-circle" aria-hidden="true"></i> <span class="sr-only">Example of </span>stop-circle</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-stop-circle-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>stop-circle-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-youtube-play" aria-hidden="true"></i> <span class="sr-only">Example of </span>youtube-play</button></div>
              </div>
            </section>
            <section id="brand">
              <h4 class="w3-margin-top w3-border-bottom">Brand Icons</h4>
              <div class="w3-row margin-bottom-lg">
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-500px" aria-hidden="true"></i> <span class="sr-only">Example of </span>500px</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-adn" aria-hidden="true"></i> <span class="sr-only">Example of </span>adn</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-amazon" aria-hidden="true"></i> <span class="sr-only">Example of </span>amazon</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-android" aria-hidden="true"></i> <span class="sr-only">Example of </span>android</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-angellist" aria-hidden="true"></i> <span class="sr-only">Example of </span>angellist</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-apple" aria-hidden="true"></i> <span class="sr-only">Example of </span>apple</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-bandcamp" aria-hidden="true"></i> <span class="sr-only">Example of </span>bandcamp</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-behance" aria-hidden="true"></i> <span class="sr-only">Example of </span>behance</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-behance-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>behance-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-bitbucket" aria-hidden="true"></i> <span class="sr-only">Example of </span>bitbucket</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-bitbucket-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>bitbucket-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-bitcoin" aria-hidden="true"></i> <span class="sr-only">Example of </span>bitcoin <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-black-tie" aria-hidden="true"></i> <span class="sr-only">Example of </span>black-tie</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-bluetooth" aria-hidden="true"></i> <span class="sr-only">Example of </span>bluetooth</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-bluetooth-b" aria-hidden="true"></i> <span class="sr-only">Example of </span>bluetooth-b</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-btc" aria-hidden="true"></i> <span class="sr-only">Example of </span>btc</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-buysellads" aria-hidden="true"></i> <span class="sr-only">Example of </span>buysellads</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cc-amex" aria-hidden="true"></i> <span class="sr-only">Example of </span>cc-amex</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cc-diners-club" aria-hidden="true"></i> <span class="sr-only">Example of </span>cc-diners-club</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cc-discover" aria-hidden="true"></i> <span class="sr-only">Example of </span>cc-discover</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cc-jcb" aria-hidden="true"></i> <span class="sr-only">Example of </span>cc-jcb</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cc-mastercard" aria-hidden="true"></i> <span class="sr-only">Example of </span>cc-mastercard</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cc-paypal" aria-hidden="true"></i> <span class="sr-only">Example of </span>cc-paypal</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cc-stripe" aria-hidden="true"></i> <span class="sr-only">Example of </span>cc-stripe</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-cc-visa" aria-hidden="true"></i> <span class="sr-only">Example of </span>cc-visa</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-chrome" aria-hidden="true"></i> <span class="sr-only">Example of </span>chrome</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-codepen" aria-hidden="true"></i> <span class="sr-only">Example of </span>codepen</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-codiepie" aria-hidden="true"></i> <span class="sr-only">Example of </span>codiepie</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-connectdevelop" aria-hidden="true"></i> <span class="sr-only">Example of </span>connectdevelop</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-contao" aria-hidden="true"></i> <span class="sr-only">Example of </span>contao</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-css3" aria-hidden="true"></i> <span class="sr-only">Example of </span>css3</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-dashcube" aria-hidden="true"></i> <span class="sr-only">Example of </span>dashcube</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-delicious" aria-hidden="true"></i> <span class="sr-only">Example of </span>delicious</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-deviantart" aria-hidden="true"></i> <span class="sr-only">Example of </span>deviantart</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-digg" aria-hidden="true"></i> <span class="sr-only">Example of </span>digg</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-dribbble" aria-hidden="true"></i> <span class="sr-only">Example of </span>dribbble</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-dropbox" aria-hidden="true"></i> <span class="sr-only">Example of </span>dropbox</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-drupal" aria-hidden="true"></i> <span class="sr-only">Example of </span>drupal</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-edge" aria-hidden="true"></i> <span class="sr-only">Example of </span>edge</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-eercast" aria-hidden="true"></i> <span class="sr-only">Example of </span>eercast</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-empire" aria-hidden="true"></i> <span class="sr-only">Example of </span>empire</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-envira" aria-hidden="true"></i> <span class="sr-only">Example of </span>envira</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-etsy" aria-hidden="true"></i> <span class="sr-only">Example of </span>etsy</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-expeditedssl" aria-hidden="true"></i> <span class="sr-only">Example of </span>expeditedssl</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-fa" aria-hidden="true"></i> <span class="sr-only">Example of </span>fa <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-facebook" aria-hidden="true"></i> <span class="sr-only">Example of </span>facebook</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-facebook-f" aria-hidden="true"></i> <span class="sr-only">Example of </span>facebook-f <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-facebook-official" aria-hidden="true"></i> <span class="sr-only">Example of </span>facebook-official</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-facebook-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>facebook-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-firefox" aria-hidden="true"></i> <span class="sr-only">Example of </span>firefox</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-first-order" aria-hidden="true"></i> <span class="sr-only">Example of </span>first-order</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-flickr" aria-hidden="true"></i> <span class="sr-only">Example of </span>flickr</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-font-awesome" aria-hidden="true"></i> <span class="sr-only">Example of </span>font-awesome</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-fonticons" aria-hidden="true"></i> <span class="sr-only">Example of </span>fonticons</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-fort-awesome" aria-hidden="true"></i> <span class="sr-only">Example of </span>fort-awesome</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-forumbee" aria-hidden="true"></i> <span class="sr-only">Example of </span>forumbee</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-foursquare" aria-hidden="true"></i> <span class="sr-only">Example of </span>foursquare</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-free-code-camp" aria-hidden="true"></i> <span class="sr-only">Example of </span>free-code-camp</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-ge" aria-hidden="true"></i> <span class="sr-only">Example of </span>ge <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-get-pocket" aria-hidden="true"></i> <span class="sr-only">Example of </span>get-pocket</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-gg" aria-hidden="true"></i> <span class="sr-only">Example of </span>gg</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-gg-circle" aria-hidden="true"></i> <span class="sr-only">Example of </span>gg-circle</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-git" aria-hidden="true"></i> <span class="sr-only">Example of </span>git</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-git-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>git-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-github" aria-hidden="true"></i> <span class="sr-only">Example of </span>github</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-github-alt" aria-hidden="true"></i> <span class="sr-only">Example of </span>github-alt</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-github-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>github-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-gitlab" aria-hidden="true"></i> <span class="sr-only">Example of </span>gitlab</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-gittip" aria-hidden="true"></i> <span class="sr-only">Example of </span>gittip <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-glide" aria-hidden="true"></i> <span class="sr-only">Example of </span>glide</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-glide-g" aria-hidden="true"></i> <span class="sr-only">Example of </span>glide-g</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-google" aria-hidden="true"></i> <span class="sr-only">Example of </span>google</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-google-plus" aria-hidden="true"></i> <span class="sr-only">Example of </span>google-plus</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-google-plus-circle" aria-hidden="true"></i> <span class="sr-only">Example of </span>google-plus-circle <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-google-plus-official" aria-hidden="true"></i> <span class="sr-only">Example of </span>google-plus-official</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-google-plus-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>google-plus-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-google-wallet" aria-hidden="true"></i> <span class="sr-only">Example of </span>google-wallet</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-gratipay" aria-hidden="true"></i> <span class="sr-only">Example of </span>gratipay</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-grav" aria-hidden="true"></i> <span class="sr-only">Example of </span>grav</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-hacker-news" aria-hidden="true"></i> <span class="sr-only">Example of </span>hacker-news</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-houzz" aria-hidden="true"></i> <span class="sr-only">Example of </span>houzz</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-html5" aria-hidden="true"></i> <span class="sr-only">Example of </span>html5</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-imdb" aria-hidden="true"></i> <span class="sr-only">Example of </span>imdb</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-instagram" aria-hidden="true"></i> <span class="sr-only">Example of </span>instagram</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-internet-explorer" aria-hidden="true"></i> <span class="sr-only">Example of </span>internet-explorer</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-ioxhost" aria-hidden="true"></i> <span class="sr-only">Example of </span>ioxhost</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-joomla" aria-hidden="true"></i> <span class="sr-only">Example of </span>joomla</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-jsfiddle" aria-hidden="true"></i> <span class="sr-only">Example of </span>jsfiddle</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-lastfm" aria-hidden="true"></i> <span class="sr-only">Example of </span>lastfm</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-lastfm-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>lastfm-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-leanpub" aria-hidden="true"></i> <span class="sr-only">Example of </span>leanpub</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-linkedin" aria-hidden="true"></i> <span class="sr-only">Example of </span>linkedin</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-linkedin-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>linkedin-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-linode" aria-hidden="true"></i> <span class="sr-only">Example of </span>linode</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-linux" aria-hidden="true"></i> <span class="sr-only">Example of </span>linux</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-maxcdn" aria-hidden="true"></i> <span class="sr-only">Example of </span>maxcdn</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-meanpath" aria-hidden="true"></i> <span class="sr-only">Example of </span>meanpath</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-medium" aria-hidden="true"></i> <span class="sr-only">Example of </span>medium</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-meetup" aria-hidden="true"></i> <span class="sr-only">Example of </span>meetup</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-mixcloud" aria-hidden="true"></i> <span class="sr-only">Example of </span>mixcloud</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-modx" aria-hidden="true"></i> <span class="sr-only">Example of </span>modx</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-odnoklassniki" aria-hidden="true"></i> <span class="sr-only">Example of </span>odnoklassniki</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-odnoklassniki-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>odnoklassniki-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-opencart" aria-hidden="true"></i> <span class="sr-only">Example of </span>opencart</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-openid" aria-hidden="true"></i> <span class="sr-only">Example of </span>openid</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-opera" aria-hidden="true"></i> <span class="sr-only">Example of </span>opera</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-optin-monster" aria-hidden="true"></i> <span class="sr-only">Example of </span>optin-monster</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-pagelines" aria-hidden="true"></i> <span class="sr-only">Example of </span>pagelines</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-paypal" aria-hidden="true"></i> <span class="sr-only">Example of </span>paypal</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-pied-piper" aria-hidden="true"></i> <span class="sr-only">Example of </span>pied-piper</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-pied-piper-alt" aria-hidden="true"></i> <span class="sr-only">Example of </span>pied-piper-alt</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-pied-piper-pp" aria-hidden="true"></i> <span class="sr-only">Example of </span>pied-piper-pp</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-pinterest" aria-hidden="true"></i> <span class="sr-only">Example of </span>pinterest</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-pinterest-p" aria-hidden="true"></i> <span class="sr-only">Example of </span>pinterest-p</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-pinterest-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>pinterest-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-product-hunt" aria-hidden="true"></i> <span class="sr-only">Example of </span>product-hunt</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-qq" aria-hidden="true"></i> <span class="sr-only">Example of </span>qq</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-quora" aria-hidden="true"></i> <span class="sr-only">Example of </span>quora</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-ra" aria-hidden="true"></i> <span class="sr-only">Example of </span>ra <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-ravelry" aria-hidden="true"></i> <span class="sr-only">Example of </span>ravelry</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-rebel" aria-hidden="true"></i> <span class="sr-only">Example of </span>rebel</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-reddit" aria-hidden="true"></i> <span class="sr-only">Example of </span>reddit</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-reddit-alien" aria-hidden="true"></i> <span class="sr-only">Example of </span>reddit-alien</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-reddit-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>reddit-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-renren" aria-hidden="true"></i> <span class="sr-only">Example of </span>renren</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-resistance" aria-hidden="true"></i> <span class="sr-only">Example of </span>resistance <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-safari" aria-hidden="true"></i> <span class="sr-only">Example of </span>safari</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-scribd" aria-hidden="true"></i> <span class="sr-only">Example of </span>scribd</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-sellsy" aria-hidden="true"></i> <span class="sr-only">Example of </span>sellsy</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-share-alt" aria-hidden="true"></i> <span class="sr-only">Example of </span>share-alt</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-share-alt-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>share-alt-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-shirtsinbulk" aria-hidden="true"></i> <span class="sr-only">Example of </span>shirtsinbulk</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-simplybuilt" aria-hidden="true"></i> <span class="sr-only">Example of </span>simplybuilt</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-skyatlas" aria-hidden="true"></i> <span class="sr-only">Example of </span>skyatlas</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-skype" aria-hidden="true"></i> <span class="sr-only">Example of </span>skype</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-slack" aria-hidden="true"></i> <span class="sr-only">Example of </span>slack</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-slideshare" aria-hidden="true"></i> <span class="sr-only">Example of </span>slideshare</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-snapchat" aria-hidden="true"></i> <span class="sr-only">Example of </span>snapchat</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-snapchat-ghost" aria-hidden="true"></i> <span class="sr-only">Example of </span>snapchat-ghost</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-snapchat-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>snapchat-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-soundcloud" aria-hidden="true"></i> <span class="sr-only">Example of </span>soundcloud</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-spotify" aria-hidden="true"></i> <span class="sr-only">Example of </span>spotify</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-stack-exchange" aria-hidden="true"></i> <span class="sr-only">Example of </span>stack-exchange</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-stack-overflow" aria-hidden="true"></i> <span class="sr-only">Example of </span>stack-overflow</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-steam" aria-hidden="true"></i> <span class="sr-only">Example of </span>steam</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-steam-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>steam-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-stumbleupon" aria-hidden="true"></i> <span class="sr-only">Example of </span>stumbleupon</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-stumbleupon-circle" aria-hidden="true"></i> <span class="sr-only">Example of </span>stumbleupon-circle</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-superpowers" aria-hidden="true"></i> <span class="sr-only">Example of </span>superpowers</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-telegram" aria-hidden="true"></i> <span class="sr-only">Example of </span>telegram</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-tencent-weibo" aria-hidden="true"></i> <span class="sr-only">Example of </span>tencent-weibo</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-themeisle" aria-hidden="true"></i> <span class="sr-only">Example of </span>themeisle</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-trello" aria-hidden="true"></i> <span class="sr-only">Example of </span>trello</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-tripadvisor" aria-hidden="true"></i> <span class="sr-only">Example of </span>tripadvisor</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-tumblr" aria-hidden="true"></i> <span class="sr-only">Example of </span>tumblr</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-tumblr-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>tumblr-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-twitch" aria-hidden="true"></i> <span class="sr-only">Example of </span>twitch</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-twitter" aria-hidden="true"></i> <span class="sr-only">Example of </span>twitter</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-twitter-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>twitter-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-usb" aria-hidden="true"></i> <span class="sr-only">Example of </span>usb</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-viacoin" aria-hidden="true"></i> <span class="sr-only">Example of </span>viacoin</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-viadeo" aria-hidden="true"></i> <span class="sr-only">Example of </span>viadeo</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-viadeo-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>viadeo-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-vimeo" aria-hidden="true"></i> <span class="sr-only">Example of </span>vimeo</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-vimeo-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>vimeo-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-vine" aria-hidden="true"></i> <span class="sr-only">Example of </span>vine</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-vk" aria-hidden="true"></i> <span class="sr-only">Example of </span>vk</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-wechat" aria-hidden="true"></i> <span class="sr-only">Example of </span>wechat <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-weibo" aria-hidden="true"></i> <span class="sr-only">Example of </span>weibo</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-weixin" aria-hidden="true"></i> <span class="sr-only">Example of </span>weixin</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-whatsapp" aria-hidden="true"></i> <span class="sr-only">Example of </span>whatsapp</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-wikipedia-w" aria-hidden="true"></i> <span class="sr-only">Example of </span>wikipedia-w</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-windows" aria-hidden="true"></i> <span class="sr-only">Example of </span>windows</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-wordpress" aria-hidden="true"></i> <span class="sr-only">Example of </span>wordpress</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-wpbeginner" aria-hidden="true"></i> <span class="sr-only">Example of </span>wpbeginner</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-wpexplorer" aria-hidden="true"></i> <span class="sr-only">Example of </span>wpexplorer</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-wpforms" aria-hidden="true"></i> <span class="sr-only">Example of </span>wpforms</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-xing" aria-hidden="true"></i> <span class="sr-only">Example of </span>xing</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-xing-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>xing-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-y-combinator" aria-hidden="true"></i> <span class="sr-only">Example of </span>y-combinator</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-y-combinator-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>y-combinator-square <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-yahoo" aria-hidden="true"></i> <span class="sr-only">Example of </span>yahoo</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-yc" aria-hidden="true"></i> <span class="sr-only">Example of </span>yc <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-yc-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>yc-square <span class="text-muted">(alias)</span></button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-yelp" aria-hidden="true"></i> <span class="sr-only">Example of </span>yelp</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-yoast" aria-hidden="true"></i> <span class="sr-only">Example of </span>yoast</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-youtube" aria-hidden="true"></i> <span class="sr-only">Example of </span>youtube</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-youtube-play" aria-hidden="true"></i> <span class="sr-only">Example of </span>youtube-play</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-youtube-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>youtube-square</button></div>
              </div>
            </section>
            <section id="medical">
              <h4 class="w3-margin-top w3-border-bottom">Medical Icons</h4>
              <div class="w3-row">
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-ambulance" aria-hidden="true"></i> <span class="sr-only">Example of </span>ambulance</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-h-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>h-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-heart" aria-hidden="true"></i> <span class="sr-only">Example of </span>heart</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-heart-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>heart-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-heartbeat" aria-hidden="true"></i> <span class="sr-only">Example of </span>heartbeat</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-hospital-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>hospital-o</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-medkit" aria-hidden="true"></i> <span class="sr-only">Example of </span>medkit</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-plus-square" aria-hidden="true"></i> <span class="sr-only">Example of </span>plus-square</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-stethoscope" aria-hidden="true"></i> <span class="sr-only">Example of </span>stethoscope</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-user-md" aria-hidden="true"></i> <span class="sr-only">Example of </span>user-md</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-wheelchair" aria-hidden="true"></i> <span class="sr-only">Example of </span>wheelchair</button></div>
                <div class="w3-col l3 s6"><button class="w3-button w3-block w3-left-align w3-hover-light"><i class="w3-margin-right fa fa-fw fa-wheelchair-alt" aria-hidden="true"></i> <span class="sr-only">Example of </span>wheelchair-alt</button></div>
              </div>
            </section>
          </div>
        </div>
      </div>
      <footer class="w3-padding w3-border-top w3-center w3-white w3-margin-top">
        <span class="w3-opacity">Powered with <span class="w3-text-red">♥</span> by <a href="https://w3mix.com" target="_blank"><strong>W3Mix.com</strong></a>.</span>
      </footer>
    </div>
  </div>
</body>

</html>
@endsection