@extends('espacemembre')

@section('dashboard')

<div class="w3-main" style="margin-top:54px">
    <div style="padding:16px 32px">
      <div class="w3-white w3-round w3-margin-bottom w3-border" style="">
        <div class="w3-row">
          <div class="w3-col l3 w3-container w3-border-right">
            <div class="w3-padding">
              <h5>9526 <span class="w3-right"><i class="fa fa-fw fa-shopping-cart"></i></span></h5>
              <div class="progress w3-light" style="height:3px;">
                <div class="progress-bar w3-info" style="width:55%;height:3px;"></div>
              </div>
              <p>Total Orders <span class="w3-right">+4.2% ↑</span></p>
            </div>
          </div>
          <div class="w3-col l3 w3-container w3-border-right">
            <div class="w3-padding">
              <h5>8323 <span class="w3-right"><i class="fa fa-fw fa-usd"></i></span></h5>
              <div class="progress w3-light" style="height:3px;">
                <div class="progress-bar w3-success" style="width:55%;height:3px;"></div>
              </div>
              <p>Total Revenue <span class="w3-right">+1.2% ↑</span></p>
            </div>
          </div>
          <div class="w3-col l3 w3-container w3-border-right">
            <div class="w3-padding">
              <h5>6200 <span class="w3-right"><i class="fa fa-fw fa-eye"></i></span></h5>
              <div class="progress w3-light" style="height:3px;">
                <div class="progress-bar w3-warning" style="width:55%;height:3px;"></div>
              </div>
              <p>Visitors <span class="w3-right">+5.2% ↑</span></p>
            </div>
          </div>
          <div class="w3-col l3 w3-container">
            <div class="w3-padding">
              <h5>5630 <span class="w3-right"><i class="fa fa-fw fa-envira"></i></span></h5>
              <div class="progress w3-light" style="height:3px;">
                <div class="progress-bar w3-danger" style="width:55%;height:3px;"></div>
              </div>
              <p>Messages <span class="w3-right">+2.2% ↑</span></p>
            </div>
          </div>
        </div>
      </div>
      <div class="w3-row-padding w3-stretch">
        <div class="w3-col l8">
          <div class="w3-white w3-round w3-margin-bottom w3-border" style="">
            <header class="w3-padding-large w3-large w3-border-bottom" style="font-weight: 500">Site Traffic</header>
            <div class="w3-bar w3-padding">
              <div class="w3-bar-item w3-text-dark w3-padding-small"><i class="fa fa-circle" style="color: #14abef"></i> New Visitor</div>
              <div class="w3-bar-item w3-text-dark w3-padding-small"><i class="fa fa-circle" style="color: #ade2f9"></i> Old Visitor</div>
            </div>
            <div class="w3-padding-large" style="height: 256px;position:relative">
              <canvas id="chart1"></canvas>
            </div>
            <div class="w3-row w3-center w3-border-top">
              <div class="w3-col s4">
                <div class="w3-padding-large">
                  <h5 style="margin:0">45.87M</h5>
                  <small class="w3-opacity-min">Overall Visitor <span> <i class="fa fa-arrow-up"></i> 2.43%</span></small>
                </div>
              </div>
              <div class="w3-col s4">
                <div class="w3-padding-large">
                  <h5 style="margin:0">15:48</h5>
                  <small class="w3-opacity-min">Visitor Duration <span> <i class="fa fa-arrow-up"></i> 12.65%</span></small>
                </div>
              </div>
              <div class="w3-col s4">
                <div class="w3-padding-large">
                  <h5 style="margin:0">245.65</h5>
                  <small class="w3-opacity-min">Pages/Visit <span> <i class="fa fa-arrow-up"></i> 5.62%</span></small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="w3-col l4">
          <div class="w3-white w3-round w3-margin-bottom w3-border" style="">
            <header class="w3-padding-large w3-large w3-border-bottom" style="font-weight: 500">Weekly sales</header>
            <div class="w3-padding-large" style="height: 188px;position:relative">
              <canvas id="chart2"></canvas>
            </div>
            <table class="w3-table w3-bordered w3-border-top">
              <tr>
                <td><i class="fa fa-circle mr-2" style="color: #14abef"></i> Direct</td>
                <td>$5856</td>
                <td>+55%</td>
              </tr>
              <tr>
                <td><i class="fa fa-circle mr-2" style="color: #02ba5a"></i> Affiliate</td>
                <td>$2602</td>
                <td>+25%</td>
              </tr>
              <tr>
                <td><i class="fa fa-circle mr-2" style="color: #d13adf"></i> E-mail</td>
                <td>$1802</td>
                <td>+15%</td>
              </tr>
              <tr>
                <td><i class="fa fa-circle mr-2" style="color: #fba540"></i> Other</td>
                <td>$1105</td>
                <td>+5%</td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <div class="w3-white w3-round w3-margin-bottom w3-border" style="">
        <header class="w3-padding-large w3-large w3-border-bottom" style="font-weight: 500">Recent Order Tables</header>
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
              <td>{{ $senders->created_at->format('d/m/Y H:i') }}</td>
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
            {{-- <tr> --}}
              {{-- <td>
                <i class="fa fa-image w3-opacity w3-margin-left"></i>
              </td>
              <td>Headphone GL</td>
              <td>$1,840 USD</td>
              <td>
                <span class="badge-dot">
                  <i class="w3-danger"></i> pending </span>
              </td>
              <td>10 July 2018</td>
            </tr>
            <tr>
              <td>
                <i class="fa fa-image w3-opacity w3-margin-left"></i>
              </td>
              <td>Clasic Shoes</td>
              <td>$1,520 USD</td>
              <td>
                <span class="badge-dot">
                  <i class="w3-success"></i> completed </span>
              </td>
              <td>12 July 2018</td>
            </tr>
            <tr>
              <td>
                <i class="fa fa-image w3-opacity w3-margin-left"></i>
              </td>
              <td>Hand Watch</td>
              <td>$1,620 USD</td>
              <td>
                <span class="badge-dot">
                  <i class="w3-warning"></i> delayed </span>
              </td>
              <td>14 July 2018</td>
            </tr>
            <tr>
              <td>
                <i class="fa fa-image w3-opacity w3-margin-left"></i>
              </td>
              <td>Hand Camera</td>
              <td>$2,220 USD</td>
              <td>
                <span class="badge-dot">
                  <i class="w3-info"></i> on schedule </span>
              </td>
              <td>16 July 2018</td>
            </tr>
            <tr>
              <td>
                <i class="fa fa-image w3-opacity w3-margin-left"></i>
              </td>
              <td>Iphone-X Pro</td>
              <td>$9,890 USD</td>
              <td>
                <span class="badge-dot">
                  <i class="w3-success"></i> completed </span>
              </td>
              <td>17 July 2018</td>
            </tr>
            <tr>
              <td>
                <i class="fa fa-image w3-opacity w3-margin-left"></i>
              </td>
              <td>Ladies Purse</td>
              <td>$3,420 USD</td>
              <td>
                <span class="badge-dot">
                  <i class="w3-danger"></i> pending </span>
              </td>
              <td>18 July 2018</td>
            </tr>

          </table>
        </div>
      </div>
    </div> --}}

    <footer class="w3-padding w3-border-top w3-center w3-white w3-margin-top">
      <span class="w3-opacity">Make By Aroli<span class="w3-text-red"></span> .</span>
    </footer>
  </div>
</div>

@endsection