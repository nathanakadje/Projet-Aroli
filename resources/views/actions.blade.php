@extends('espacemembre')
@section('actions')

    <div class="w3-main" style="margin-top:54px">
    
        
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
        {{-- <div>
        <h3 class="w3-left card-toolbar mb-3" style="margin-left: 15px">
            <!-- Bouton d'export avec menu déroulant -->
            
            <div class="dropdown">
                <!-- Bouton principal avec une icône et un libellé -->
                <button class="btn btn-sm btn-success dropdown-toggle text-white w3-margin-top"  type="button" id="exportCsvBtn" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-download"></i> Exporter
                </button>
            
                <!-- Menu déroulant contenant les options d'exportation -->
                <ul class="dropdown-menu" aria-labelledby="exportCsvBtn">
                    <li>
                        <a class="dropdown-item" href="{{ route('actions.exported', ['type' => 'excel'] + request()->query()) }}">
                            <i class="fas fa-file-excel"></i> Export Excel
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('actions.exported', ['type' => 'csv'] + request()->query()) }}">
                            <i class="fas fa-file-csv"></i> Export CSV
                        </a>
      
                    </li>
                </ul>
            </div>
        </h3>
        </div>  --}}
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
                                    <a href="#" onclick="openEditModal({{ $senders->id }})"><i class="fa fa-edit text-primary me-3 edit-btn"></i><span style="color: rgba(161, 1, 1, 0.822)">Edit</span></a>
                                    {{-- <a href="#" onclick="deleteUser({{ $senders->id }})"><i class="fa fa-trash text-danger me-3 "></i><span style="color: rgba(243, 10, 10, 0.801)">Delete</span></a> --}}
                               
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
    

                            <div class="modal fade" id="editDeleteModal" tabindex="-1" aria-labelledby="editDeleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editDeleteModalLabel">Edit/Delete Record</h5>
                                            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                        </div>
                                        <div class="modal-body">
                                            <form id="editForm">
                                                @csrf
                                                <input type="hidden" id="editRecordId" name="id">
                                                
                                                <div class="mb-3">
                                                    <label for="editName" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="editName" name="name" required maxlength="11" >
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="editOperator" class="form-label">Operator</label>
                                                    <select class="w3-input w3-border w3-round form-control select5" id="editOperator" name="operator"  required style="width: 100%;">
                                                        <option value=""></option>
                                                        <option value="Algeria Djezzy">Algeria Djezzy</option>
                                                        <option value="Algeria Mobilis">Algeria Mobilis</option>
                                                        <option value="Algeria Ooredoo">Algeria Ooredoo</option>
                                                        <option value="Angola Africell">Angola Africell</option>
                                                        <option value="Angola Movicel">Angola Movicel</option>
                                                        <option value="Angola Unitel">Angola Unitel</option>
                                                        <option value="Botswana Btc Mobile">Botswana Btc Mobile</option>
                                                        <option value="Botswana Mascom">Botswana Mascom</option>
                                                        <option value="Botswana Orange">Botswana Orange</option>
                                                        <option value="Burkina Faso Moov">Burkina Faso Moov</option>
                                                        <option value="Burkina Faso Orange">Burkina Faso Orange</option>
                                                        <option value="Burkina Faso Telecel">Burkina Faso Telecel</option>
                                                        <option value="Burundi Econet Leo">Burundi Econet Leo</option>
                                                        <option value="Burundi Lacell">Burundi Lacell</option>
                                                        <option value="Burundi Lumitel">Burundi Lumitel</option>
                                                        <option value="Burundi Onamob">Burundi Onamob</option>
                                                        <option value="Cameroon Camtel">Cameroon Camtel</option>
                                                        <option value="Cameroon Mtn">Cameroon Mtn</option>
                                                        <option value="Cameroon Nextel">Cameroon Nextel</option>
                                                        <option value="Cameroon Orange">Cameroon Orange</option>
                                                        <option value="Cape Verde CVMovel">Cape Verde CVMovel</option>
                                                        <option value="Cape Verde Unitel T+">Cape Verde Unitel T+</option>
                                                        <option value="Central African Rep. Moov">Central African Rep. Moov</option>
                                                        <option value="Central African Rep. NationLink">Central African Rep. NationLink</option>
                                                        <option value="Central African Rep. Orange">Central African Rep. Orange</option>
                                                        <option value="Central African Rep. Telecel">Central African Rep. Telecel</option>
                                                        <option value="Chad Airtel">Chad Airtel</option>
                                                        <option value="Chad Moov Africa">Chad Moov Africa</option>
                                                        <option value="Comores Telecom">Comores Telecom</option>
                                                        <option value="Comores Telco">Comores Telco</option>
                                                        <option value="CIV Moov">CIV Moov</option>
                                                        <option value="CIV Mtn">CIV Mtn</option>
                                                        <option value="CIV Orange">CIV Orange</option>
                                                        <option value="Congo DR Africell">Congo DR Africell</option>
                                                        <option value="Congo DR Airtel">Congo DR Airtel</option>
                                                        <option value="Congo DR Orange">Congo DR Orange</option>
                                                        <option value="Congo DR Vodacom">Congo DR Vodacom</option>
                                                        <option value="Djibouti Evatis">Djibouti Evatis</option>
                                                        <option value="Egypt Etisalat">Egypt Etisalat</option>
                                                        <option value="Egypt Orange">Egypt Orange</option>
                                                        <option value="Egypt TE">Egypt TE</option>
                                                        <option value="Egypt Vodafone">Egypt Vodafone</option>
                                                        <option value="Equa. Guinea Hits-GE">Equa. Guinea Hits-GE</option>
                                                        <option value="Equa. Guinea Orange">Equa. Guinea Orange</option>
                                                        <option value="Eritrea EriTel">Eritrea EriTel</option>
                                                        <option value="Eswatini SPTC">Eswatini SPTC</option>
                                                        <option value="Eswatini Swazi Mobile">Eswatini Swazi Mobile</option>
                                                        <option value="Eswatini Mtn">Eswatini Mtn</option>
                                                        <option value="Ethiopia Ethio Telecom">Ethiopia Ethio Telecom</option>
                                                        <option value="Ethiopia Safaricom">Ethiopia Safaricom</option>
                                                        <option value="Gabon Airtel">Gabon Airtel</option>
                                                        <option value="Gabon Libertis">Gabon Libertis</option>
                                                        <option value="Gabon Moov">Gabon Moov</option>
                                                        <option value="Gambia Africell">Gambia Africell</option>
                                                        <option value="Gambia Comium">Gambia Comium</option>
                                                        <option value="Gambia Gamcel">Gambia Gamcel</option>
                                                        <option value="Gambia QCell">Gambia QCell</option>
                                                        <option value="Ghana AirtelTigo">Ghana AirtelTigo</option>
                                                        <option value="Ghana Expresso">Ghana Expresso</option>
                                                        <option value="Ghana Mtn">Ghana Mtn</option>
                                                        <option value="Ghana Glo">Ghana Glo</option>
                                                        <option value="Ghana Vodafone">Ghana Vodafone</option>
                                                        <option value="Guinea-Bissau Guinetel">Guinea-Bissau Guinetel</option>
                                                        <option value="Guinea-Bissau Orange">Guinea-Bissau Orange</option>
                                                        <option value="Guinea-Bissau Spacetel">Guinea-Bissau Spacetel</option>
                                                        <option value="Guinea Mtn">Guinea Mtn</option>
                                                        <option value="Guinea Cellcom">Guinea Cellcom</option>
                                                        <option value="Guinea Intercel">Guinea Intercel</option>
                                                        <option value="Guinea Orange">Guinea Orange</option>
                                                        <option value="Guinea SotelGui">Guinea SotelGui</option>
                                                        <option value="Kenya Airtel">Kenya Airtel</option>
                                                        <option value="Kenya Safaricom">Kenya Safaricom</option>
                                                        <option value="Liban">Liban</option>
                                                        <option value="Kenya Telkom">Kenya Telkom</option>
                                                        <option value="Lesotho Econet">Lesotho Econet</option>
                                                        <option value="Lesotho Vodacom">Lesotho Vodacom</option>
                                                        <option value="Lesotho Telecom">Lesotho Telecom</option>
                                                        <option value="80">Liberia LTC Mobile</option>
                                                        <option value="Liberia LTC Mobile">Liberia Mtn</option>
                                                        <option value="Liberia Orange">Liberia Orange</option>
                                                        <option value="Libya Al-Madar">Libya Al-Madar</option>
                                                        <option value="Libya LTT">Libya LTT</option>
                                                        <option value="Libya Libyana">Libya Libyana</option>
                                                        <option value="Madagascar Airtel">Madagascar Airtel</option>
                                                        <option value="Madagascar Bip">Madagascar Bip</option>
                                                        <option value="Madagascar Orange">Madagascar Orange</option>
                                                        <option value="Madagascar Telma">Madagascar Telma</option>
                                                        <option value="Malawi Airtel">Malawi Airtel</option>
                                                        <option value="Malawi Telekom">Malawi Telekom</option>
                                                        <option value="Mali Malitel">Mali Malitel</option>
                                                        <option value="Mali Telecel">Mali Telecel</option>
                                                        <option value="Mali Orange">Mali Orange</option>
                                                        <option value="Mauritania Chinguitel">Mauritania Chinguitel</option>
                                                        <option value="Mauritania Mattel">Mauritania Mattel</option>
                                                        <option value="Mauritania Mauritel">Mauritania Mauritel</option>
                                                        <option value="Mauritius Cellplus">Mauritius Cellplus</option>
                                                        <option value="Mauritius Emtel">Mauritius Emtel</option>
                                                        <option value="Mauritius MTML">Mauritius MTML</option>
                                                        <option value="Morocco Inwi">Morocco Inwi</option>
                                                        <option value="Morocco Maroc Telecom">Morocco Maroc Telecom</option>
                                                        <option value="Morocco Orange">Morocco Orange</option>
                                                        <option value="Mozambique Mcell">Mozambique Mcell</option>
                                                        <option value="Mozambique Movitel">Mozambique Movitel</option>
                                                        <option value="Mozambique Vodacom">Mozambique Vodacom</option>
                                                        <option value="Namibia MTC">Namibia MTC</option>
                                                        <option value="Namibia Mtn">Namibia Mtn</option>
                                                        <option value="Namibia Telecom">Namibia Telecom</option>
                                                        <option value="Namibia TN Mobile">Namibia TN Mobile</option>
                                                        <option value="Niger Airtel">Niger Airtel</option>
                                                        <option value="Niger Moov Africa">Niger Moov Africa</option>
                                                        <option value="Niger Sahelcom">Niger Sahelcom</option>
                                                        <option value="Niger Orange">Niger Orange</option>
                                                        <option value="Nigeria Airtel">Nigeria Airtel</option>
                                                        <option value="Nigeria 9Mobile">Nigeria 9Mobile</option>
                                                        <option value="Nigeria Glo">Nigeria Glo</option>
                                                        <option value="Congo Airtel">Congo Airtel</option>
                                                        <option value="Congo Azur">Congo Azur</option>
                                                        <option value="Congo Mtn">Congo Mtn</option>
                                                        <option value="Rwanda Airtel-Tigo">Rwanda Airtel-Tigo</option>
                                                        <option value="Rwanda Mtn">Rwanda Mtn</option>
                                                        <option value="Sao Tome and Principe CSTmovel">Sao Tome and Principe CSTmovel</option>
                                                        <option value="Sao Tome and Principe Unitel">Sao Tome and Principe Unitel</option>
                                                        <option value="Senegal Expresso">Senegal Expresso</option>
                                                        <option value="Senegal Free">Senegal Free</option>
                                                        <option value="Senegal Orange">Senegal Orange</option>
                                                        <option value="Seychelles Airtel">Seychelles Airtel</option>
                                                        <option value="Seychelles CWS">Seychelles CWS</option>
                                                        <option value="Seychelles Intelvision">Seychelles Intelvision</option>
                                                        <option value="Sierra Leone Africell">Sierra Leone Africell</option>
                                                        <option value="Sierra Leone Orange">Sierra Leone Orange</option>
                                                        <option value="Sierra Leone Qcell">Sierra Leone Qcell</option>
                                                        <option value="Sierra Leone Sierratel">Sierra Leone Sierratel</option>
                                                        <option value="Somalia AirSom">Somalia AirSom</option>
                                                        <option value="Somalia Amtel">Somalia Amtel</option>
                                                        <option value="Somalia Golis Telecom">Somalia Golis Telecom</option>
                                                        <option value="Somalia Hormuud">Somalia Hormuud</option>
                                                        <option value="Somalia Nationlink">Somalia Nationlink</option>
                                                        <option value="Somalia SomLink">Somalia SomLink</option>
                                                        <option value="Somalia SomNet">Somalia SomNet</option>
                                                        <option value="Somalia Somtel">Somalia Somtel</option>
                                                        <option value="Somalia STG">Somalia STG</option>
                                                        <option value="Somalia Telesom">Somalia Telesom</option>
                                                        <option value="South Africa CELL C">South Africa CELL C</option>
                                                        <option value="South Africa Mtn">South Africa Mtn</option>
                                                        <option value="South Africa Telkom">South Africa Telkom</option>
                                                        <option value="South Africa Vodacom">South Africa Vodacom</option>
                                                        <option value="South Sudan Digitel">South Sudan Digitel</option>
                                                        <option value="South Sudan Gemtel">South Sudan Gemtel</option>
                                                        <option value="South Sudan Mtn">South Sudan Mtn</option>
                                                        <option value="South Sudan Vivacel">South Sudan Vivacel</option>
                                                        <option value="South Sudan Zain">South Sudan Zain</option>
                                                        <option value="Sudan Mtn">Sudan Mtn</option>
                                                        <option value="Sudan Vivacel">Sudan Vivacel</option>
                                                        <option value="Sudan Zain">Sudan Zain</option>
                                                        <option value="Tanzania Airtel">Tanzania Airtel</option>
                                                        <option value="Tanzania Smart">Tanzania Smart</option>
                                                        <option value="Tanzania Smile">Tanzania Smile</option>
                                                        <option value="Tanzania TTCL Mobile">Tanzania TTCL Mobile</option>
                                                        <option value="Tanzania Tigo">Tanzania Tigo</option>
                                                        <option value="Tanzania Viettel">Tanzania Viettel</option>
                                                        <option value="Tanzania Vodacom">Tanzania Vodacom</option>
                                                        <option value="Tanzania Zantel">Tanzania Zantel</option>
                                                        <option value="Togo Moov">Togo Moov</option>
                                                        <option value="Togo Togocel">Togo Togocel</option>
                                                        <option value="Tunisia Ooredoo">Tunisia Ooredoo</option>
                                                        <option value="Tunisia Orange">Tunisia Orange</option>
                                                        <option value="Tunisia Telecom">Tunisia Telecom</option>
                                                        <option value="Uganda Airtel">Uganda Airtel</option>
                                                        <option value="Uganda Hamilton Telecom">Uganda Hamilton Telecom</option>
                                                        <option value="Uganda Mtn">Uganda Mtn</option>
                                                        <option value="Uganda Smile">Uganda Smile</option>
                                                        <option value="Uganda Lycamobile">Uganda Lycamobile</option>
                                                        <option value="Uganda UTL">Uganda UTL</option>
                                                        <option value="Zambia Airtel">Zambia Airtel</option>
                                                        <option value="Zambia Beeline Telecoms">Zambia Beeline Telecoms</option>
                                                        <option value="Zambia Mtn">Zambia Mtn</option>
                                                        <option value="Zambia Zamtel">Zambia Zamtel</option>
                                                        <option value="Zimbabwe Econet">Zimbabwe Econet</option>
                                                        <option value="Zimbabwe NetOne">Zimbabwe NetOne</option>
                                                        <option value="Zimbabwe Telecel">Zimbabwe Telecel</option>
                                                        <option value="Benin Mtn">Benin Mtn</option>
                                                        <option value="Nigeria Mtn">Nigeria Mtn</option>
                                                        <option value="Benin Moov">Benin Moov</option>
                                                        <option value="Benin Sbin">Benin Sbin</option>  
                                                    </select>     
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="editCountry" class="form-label">Country</label>
                                                    
                                                    <select class="w3-input w3-border w3-round form-control select4" id="editCountry" name="country"  required style="width: 100%;">
                                                        <option value=""></option>
                                                        <option value="ALGERIA">ALGERIA</option>
                                                        <option value="ANGOLA">ANGOLA</option>
                                                        <option value="BENIN">BENIN</option>
                                                        <option value="BOTSWANA">BOTSWANA</option>
                                                        <option value="BURKINA FASO">BURKINA FASO</option>
                                                        <option value="BURUNDI">BURUNDI</option>
                                                        <option value="CAPE VERDE">CAPE VERDE</option>
                                                        <option value="CAMEROON">CAMEROON</option>
                                                        <option value="CENTRAL AFRICAN REPUBLIC">CENTRAL AFRICAN REPUBLIC</option>
                                                        <option value="CHAD">CHAD</option>
                                                        <option value="COMOROS">COMOROS</option>
                                                        <option value="CONGO">CONGO</option>
                                                        <option value="CONGO DR">CONGO DR</option>
                                                        <option value="DJIBOUTI">DJIBOUTI</option>
                                                        <option value="EGYPT">EGYPT</option>
                                                        <option value="EQUATORIAL GUINEA">EQUATORIAL GUINEA</option>
                                                        <option value="ERITREA">ERITREA</option>
                                                        <option value="ESWATINI">ESWATINI</option>
                                                        <option value="ETHIOPIA">ETHIOPIA</option>
                                                        <option value="GABON">GABON</option>
                                                        <option value="GAMBIA">GAMBIA</option>
                                                        <option value="GHANA">GHANA</option>
                                                        <option value="GUINEA">GUINEA</option>
                                                        <option value="GUINEA-BISSAU">GUINEA-BISSAU</option>
                                                        <option value="CÔTE D'IVOIRE">CÔTE D'IVOIRE</option>
                                                        <option value="KENYA">KENYA</option>
                                                        <option value="LESOTHO">LESOTHO</option>
                                                        <option value="LIBERIA">LIBERIA</option>
                                                        <option value="LIBYA">LIBYA</option>
                                                        <option value="MADAGASCAR">MADAGASCAR</option>
                                                        <option value="MALAWI">MALAWI</option>
                                                        <option value="MALI">MALI</option>
                                                        <option value="MAURITANIA">MAURITANIA</option>
                                                        <option value="MAURITIUS">MAURITIUS</option>
                                                        <option value="MOROCCO">MOROCCO</option>
                                                        <option value="MOZAMBIQUE">MOZAMBIQUE</option>
                                                        <option value="NAMIBIA">NAMIBIA</option>
                                                        <option value="NIGER">NIGER</option>
                                                        <option value="NIGERIA">NIGERIA</option>
                                                        <option value="RWANDA">RWANDA</option>
                                                        <option value="SAO TOME AND PRINCIPE">SAO TOME AND PRINCIPE</option>
                                                        <option value="SENEGAL">SENEGAL</option>
                                                        <option value="SEYCHELLES">SEYCHELLES</option>
                                                        <option value="SIERRA LEONE">SIERRA LEONE</option>
                                                        <option value="SOMALIA">SOMALIA</option>
                                                        <option value="SOUTH AFRICA">SOUTH AFRICA</option>
                                                        <option value="SOUTH SUDAN">SOUTH SUDAN</option>
                                                        <option value="SUDAN">SUDAN</option>
                                                        <option value="TANZANIA">TANZANIA</option>
                                                        <option value="TOGO">TOGO</option>
                                                        <option value="TUNISIA">TUNISIA</option>
                                                        <option value="UGANDA">UGANDA</option>
                                                        <option value="ZAMBIA">ZAMBIA</option>
                                                        <option value="ZIMBABWE">ZIMBABWE</option>
                                                        <option value="AFGHANISTAN">AFGHANISTAN</option>
                                                        <option value="ALBANIA">ALBANIA</option>
                                                        <option value="ANDORRA">ANDORRA</option>
                                                        <option value="ANTIGUA AND BARBUDA">ANTIGUA AND BARBUDA</option>
                                                        <option value="ARGENTINA">ARGENTINA</option>
                                                        <option value="ARMENIA">ARMENIA</option>
                                                        <option value="AUSTRALIA">AUSTRALIA</option>
                                                        <option value="AUSTRIA">AUSTRIA</option>
                                                        <option value="AZERBAIJAN">AZERBAIJAN</option>
                                                        <option value="BAHAMAS">BAHAMAS</option>
                                                        <option value="BANGLADESH">BANGLADESH</option>
                                                        <option value="BARBADOS">BARBADOS</option>
                                                        <option value="BELARUS">BELARUS</option>
                                                        <option value="BELGIUM">BELGIUM</option>
                                                        <option value="BELIZE">BELIZE</option>
                                                        <option value="BHUTAN">BHUTAN</option>
                                                        <option value="BOLIVIA">BOLIVIA</option>
                                                        <option value="BOSNIA AND HERZEGOVINA">BOSNIA AND HERZEGOVINA</option>
                                                        <option value="BRAZIL">BRAZIL</option>
                                                        <option value="BRUNEI">BRUNEI</option>
                                                        <option value="BULGARIA">BULGARIA</option>
                                                        <option value="CANADA">CANADA</option>
                                                        <option value="CHILE">CHILE</option>
                                                        <option value="CHINA">CHINA</option>
                                                        <option value="COLOMBIA">COLOMBIA</option>
                                                        <option value="COSTA RICA">COSTA RICA</option>
                                                        <option value="CROATIA">CROATIA</option>
                                                        <option value="CUBA">CUBA</option>
                                                        <option value="CYPRUS">CYPRUS</option>
                                                        <option value="CZECHIA">CZECHIA</option>
                                                        <option value="DENMARK">DENMARK</option>
                                                        <option value="DOMINICA">DOMINICA</option>
                                                        <option value="DOMINICAN REPUBLIC">DOMINICAN REPUBLIC</option>
                                                        <option value="ECUADOR">ECUADOR</option>
                                                        <option value="EL SALVADOR">EL SALVADOR</option>
                                                        <option value="ESTONIA">ESTONIA</option>
                                                        <option value="FIJI">FIJI</option>
                                                        <option value="FINLAND">FINLAND</option>
                                                        <option value="FRANCE">FRANCE</option>
                                                        <option value="GEORGIA">GEORGIA</option>
                                                        <option value="GERMANY">GERMANY</option>
                                                        <option value="GREECE">GREECE</option>
                                                        <option value="GRENADA">GRENADA</option>
                                                        <option value="GUATEMALA">GUATEMALA</option>
                                                        <option value="GUYANA">GUYANA</option>
                                                        <option value="HAITI">HAITI</option>
                                                        <option value="HONDURAS">HONDURAS</option>
                                                        <option value="HUNGARY">HUNGARY</option>
                                                        <option value="ICELAND">ICELAND</option>
                                                        <option value="INDIA">INDIA</option>
                                                        <option value="INDONESIA">INDONESIA</option>
                                                        <option value="IRAN">IRAN</option>
                                                        <option value="IRAQ">IRAQ</option>
                                                        <option value="IRELAND">IRELAND</option>
                                                        <option value="ISRAEL">ISRAEL</option>
                                                        <option value="ITALY">ITALY</option>
                                                        <option value="JAMAICA">JAMAICA</option>
                                                        <option value="JAPAN">JAPAN</option>
                                                        <option value="JORDAN">JORDAN</option>
                                                        <option value="KAZAKHSTAN">KAZAKHSTAN</option>
                                                        <option value="KUWAIT">KUWAIT</option>
                                                        <option value="KYRGYZSTAN">KYRGYZSTAN</option>
                                                        <option value="LAOS">LAOS</option>
                                                        <option value="LATVIA">LATVIA</option>
                                                        <option value="LEBANON">LEBANON</option>
                                                        <option value="LIECHTENSTEIN">LIECHTENSTEIN</option>
                                                        <option value="LITHUANIA">LITHUANIA</option>
                                                        <option value="LUXEMBOURG">LUXEMBOURG</option>
                                                        <option value="MALAYSIA">MALAYSIA</option>
                                                        <option value="MALDIVES">MALDIVES</option>
                                                        <option value="MEXICO">MEXICO</option>
                                                        <option value="MOLDOVA">MOLDOVA</option>
                                                        <option value="MONACO">MONACO</option>
                                                        <option value="MONGOLIA">MONGOLIA</option>
                                                        <option value="MONTENEGRO">MONTENEGRO</option>
                                                        <option value="MYANMAR">MYANMAR</option>
                                                        <option value="NEPAL">NEPAL</option>
                                                        <option value="NETHERLANDS">NETHERLANDS</option>
                                                        <option value="NEW ZEALAND">NEW ZEALAND</option>
                                                        <option value="NICARAGUA">NICARAGUA</option>
                                                        <option value="NORTH KOREA">NORTH KOREA</option>
                                                        <option value="NORTH MACEDONIA">NORTH MACEDONIA</option>
                                                        <option value="NORWAY">NORWAY</option>
                                                        <option value="OMAN">OMAN</option>
                                                        <option value="PAKISTAN">PAKISTAN</option>
                                                        <option value="PANAMA">PANAMA</option>
                                                        <option value="PARAGUAY">PARAGUAY</option>
                                                        <option value="PERU">PERU</option>
                                                        <option value="PHILIPPINES">PHILIPPINES</option>
                                                        <option value="POLAND">POLAND</option>
                                                        <option value="PORTUGAL">PORTUGAL</option>
                                                        <option value="QATAR">QATAR</option>
                                                        <option value="ROMANIA">ROMANIA</option>
                                                        <option value="RUSSIA">RUSSIA</option>
                                                        <option value="SAUDI ARABIA">SAUDI ARABIA</option>
                                                        <option value="SERBIA">SERBIA</option>
                                                        <option value="SINGAPORE">SINGAPORE</option>
                                                        <option value="SLOVAKIA">SLOVAKIA</option>
                                                        <option value="SLOVENIA">SLOVENIA</option>
                                                        <option value="SOUTH KOREA">SOUTH KOREA</option>
                                                        <option value="SPAIN">SPAIN</option>
                                                        <option value="SRI LANKA">SRI LANKA</option>
                                                        <option value="SURINAME">SURINAME</option>
                                                        <option value="SWEDEN">SWEDEN</option>
                                                        <option value="SWITZERLAND">SWITZERLAND</option>
                                                        <option value="SYRIA">SYRIA</option>
                                                        <option value="TAIWAN">TAIWAN</option>
                                                        <option value="TAJIKISTAN">TAJIKISTAN</option>
                                                        <option value="THAILAND">THAILAND</option>
                                                        <option value="TURKEY">TURKEY</option>
                                                        <option value="TURKMENISTAN">TURKMENISTAN</option>
                                                        <option value="UKRAINE">UKRAINE</option>
                                                        <option value="UNITED ARAB EMIRATES">UNITED ARAB EMIRATES</option>
                                                        <option value="UNITED KINGDOM">UNITED KINGDOM</option>
                                                        <option value="UNITED STATES">UNITED STATES</option>
                                                        <option value="URUGUAY">URUGUAY</option>
                                                        <option value="UZBEKISTAN">UZBEKISTAN</option>
                                                        <option value="VATICAN CITY">VATICAN CITY</option>
                                                        <option value="VENEZUELA">VENEZUELA</option>
                                                        <option value="VIETNAM">VIETNAM</option>
                                                        <option value="YEMEN">YEMEN</option>
                                                        <option value="ZAMBIA">ZAMBIA</option>
                                                        <option value="ZIMBABWE">ZIMBABWE</option>      
                                                    </select>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="editStatus" class="form-label">Status</label>
                                                    <select class="form-select" id="editStatus" name="status" required>
                                                        <option value="pending">Pending</option>
                                                        <option value="valide">Valide</option>
                                                        <option value="close">Rejeté</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger btn-sm " id="deleteButton">Delete</button>
                                            <button type="button" class="btn btn-primary btn-sm" id="updateButton">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                   <!-- Fenêtre modale pour l'édition -->
{{-- <div class="modal" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong></strong>Editing sender</strong></h5>
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
</div> --}}

</div>
</div>        
  </div>
        </div>
        </div>
   
@endsection

