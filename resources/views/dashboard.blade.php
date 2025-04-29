@extends('espacemembre')

@section('dashboard')

<div class="w3-main" style="margin-top:54px">
    <div style="padding:16px 32px">
      <div class="w3-white w3-round w3-margin-bottom w3-border" style="">
        <div class="w3-row status-statistics">
          <div class="w3-col l3 w3-container w3-border-right ">
            <div class="w3-padding status-stats" >
              <h4>{{ $stats['total']['count'] }} <span class="w3-right"><i aria-hidden="true"></i></i></span></h4> 
                <div class="progress w3-light" style="height:3px;">
                    <div class="progress-bar w3-info" style="width:100%;height:3px;"></div>
                </div>
                <p>Total <span class="w3-right"></span></p>
            </div>
          </div>
          <div class="w3-col l3 w3-container w3-border-right">
            <div class="w3-padding">
              <h4>{{ $stats['valide']['count'] }} <span class="w3-right"><i class="fa fa-fw fa-check-circle"></i></span></h4>
                <div class="progress w3-light" style="height:3px;">
                    <div class="progress-bar w3-success" style="width:{{ $stats['valide']['percentage'] }}%;height:3px;"></div>
                </div>
                <p>Validated <span class="w3-right">{{ $stats['valide']['percentage'] }}%</span></p>
            </div>
          </div>
          <div class="w3-col l3 w3-container w3-border-right">
            <div class="w3-padding">
              <h4>{{ $stats['pending']['count'] }} <span class="w3-right"><i class="fa fa-fw fa-clock"></i></span></h4>
                <div class="progress w3-light" style="height:3px;">
                    <div class="progress-bar w3-warning" style="width:{{ $stats['pending']['percentage'] }}%;height:3px;"></div>
                </div>
                <p>Pending  <span class="w3-right">{{ $stats['pending']['percentage'] }}%</span></p>
            </div>
          </div>
          <div class="w3-col l3 w3-container">
            <div class="w3-padding">
              <h4>{{ $stats['close']['count'] }} <span class="w3-right"><i class="fa fa-fw fa-times-circle"></i></span></h4>
                <div class="progress w3-light" style="height:3px;">
                    <div class="progress-bar w3-danger" style="width:{{ $stats['close']['percentage'] }}%;height:3px;"></div>
                </div>
                <p>Rejected<span class="w3-right">{{ $stats['close']['percentage'] }}%</span></p>
            </div>
          </div>
        </div>
      </div>
      <div class="w3-row-padding w3-stretch">
        <div class="w3-col l8">
          <div class="w3-white w3-round w3-margin-bottom w3-border" style="">
            <header class="w3-padding-large w3-large w3-border-bottom" style="font-weight: 500">Sender Traffic</header>
            <div class="w3-bar w3-padding">
              <div class="w3-bar-item w3-text-dark w3-padding-small"><i class="fa fa-circle" style="color: #f5de0f"></i> </div>
              <div class="w3-bar-item w3-text-dark w3-padding-small"><i class="fa fa-circle" style="color: #56d80b"></i></div>
              <div class="w3-bar-item w3-text-dark w3-padding-small"><i class="fa fa-circle" style="color: #e6438f"></i></div>
            </div>
            <div class="w3-padding-large" style="height: 256px;position:relative">
              <div style="width: 80%; margin: 50px auto;">
                <canvas id="statusChart"></canvas>
            </div>
            </div>
          </div>
        </div>
        <div class="w3-col l4">
          <div class="w3-white w3-round w3-margin-bottom w3-border" style="">
            <header class="w3-padding-large w3-large w3-border-bottom" style="font-weight: 500">Sender Statistics</header>
            <div class="w3-padding-large" style="height: 200px;position:relative">
              {{-- <canvas id="chart2"></canvas> --}}
              <canvas id="statusDoughnutChart"></canvas>
              
            </div>
            <table class="w3-table w3-bordered w3-border-top">
              <tr>
                <td><i class="fa fa-circle mr-2" style="color: #fba540"></i>  Pending </td>
                
              </tr>
              <tr>
                <td><i class="fa fa-circle mr-2" style="color: #02ba5a"></i>  Validate</td>
               
              </tr>
              <tr>
                <td><i class="fa fa-circle mr-2" style="color: #e036a7"></i>  Rejecte</td>
                
              </tr>
              
            </table>
          </div>
        </div>
      </div>

      <div class="w3-white w3-round w3-margin-bottom w3-border" style="">
        <header class="w3-padding-large w3-large w3-border-bottom" style="font-weight: 500">Newly registered sender</header>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
         @endif
        <div class="w3-responsive">
          <table class="w3-table w3-bordered table table-striped table-bordered">
          <thead class="table-white">
            <tr>
              <th>Create_at</th>
              <th>Name</th>
              <th>Country</th>
              <th>Status</th>
              <th>Submission Date</th>
            </tr>
          </thead>
          <tbody>
          @forelse ($sender as $senders)
          <tr>
              {{-- <td>{{ $senders->created_at->format('d/m/Y H:i') }}</td> --}}
              <td>{{  \Carbon\Carbon::parse($senders->created_at)->format('d/m/Y H:i') }}</td>
              <td>{{ $senders->name }}</td>
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
          </tr>
          @empty
          <tr>
              <td colspan="5" class="text-center">Aucun enregistrement trouvé</td>
          </tr>
      @endforelse
    </tbody> 
  </table>
  </div>  
  </div>
            
  </div>
</div>

@endsection