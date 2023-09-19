@inject('genelService', 'App\Services\GenelService')
@extends('layout')
@section('icerik')
<div class="contents">
@if (Session::has('success'))
    <div class="alert alert-success" >
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif

    <div class="atbd-page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Kiralanan Araçlar</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                        
                            <!-- <div class="dropdown action-btn">
                                <button class="btn btn-sm btn-default btn-white dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="la la-download"></i> Dışa Aktar(Pdf-Excel)
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <span class="dropdown-item">Dışa Aktar</span>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">
                                        <i class="la la-file-pdf"></i> PDF</a>
                                    <a href="#" class="dropdown-item">
                                        <i class="la la-file-excel"></i> Excel (XLSX)</a>
                                
                                </div>
                            </div> -->
                        
                            <div class="action-btn">
                                <a href="#" onClick="ekleModal()" class="btn btn-sm btn-primary btn-add">
                                    <i class="la la-plus"></i>Kiralanacak Araç Ekle</a>
                            </div>
                        </div>
                    </div>

                </div>

                
                <div class="col-lg-12">
                    <div class="card mb-25">
                    
                        <div class="card-body pt-0 pb-0">
                            <div class="drag-drop-wrap">
                                <div class="drag-drop table-responsive-lg bg-white w-100 mb-30">
                                    <table id='datatable' class="table mb-0 table-basic table-responsive">
                                        <thead>
                                            <tr>
                                                
                                                <th>İşlem</th> 
                                                <th>Resim</th>
                                                <th>Arac</th>
                                                <th>Alış Yeri</th>
                                                <th>Dönüş Yeri</th>
                                                <th>Alış Tarihi</th>
                                                <th>Dönüş Tarihi</th>
                                                <th>Kiralanan Fiyatı</th>
                                                <th>Fiyat Birimi</th>
                                                <th>Toplam Tutar</th>
                                                <th>Navigasyon</th>
                                                <th>Şoför Hizmeti</th>
                                                <th>Bebek Koltuğu</th>
                                                <th>Yol Haritası</th>
                                                <th>Müşteri Adı Soyadı</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($aracVerileri as $arac)
                                            <tr >
                                                <td>
                                                <div class="table-actions">
                                                        <a href="#" onClick='guncelleModal({{ json_encode($arac) }})'>
                                                            <span data-feather="edit"></span>
                                                        </a>
                                                        <a href="#" onClick='silModal({{ json_encode($arac) }})'>
                                                            <span data-feather="trash-2"></span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                <img style='max-width: 100px;' src="{{ asset($arac->resim) }}" alt="svg">                                                              
                                                </td>
                                                <td>{{ $arac->arac_adi }}</td>
                                                <td>{{ $arac->alis_yeri }}</td>
                                                <td>{{ $arac->donus_yeri }}</td>
                                                <td>{{ $arac->alis_tarihi }}</td>
                                                <td>{{ $arac->donus_tarihi }}</td>
                                                <td>{{ $arac->arac_top_fiyat }}</td>
                                                <td>{{ $arac->para_birim }}</td>
                                                <td>
                                                    <?php
                                                    // İlk tarih
                                                        $toplamFiyat =$arac->arac_top_fiyat*$arac->gun_farki;
                                                        if ($arac->sofor_hizmeti)
                                                        {
                                                            $toplamFiyat+=$arac->sofor_hizmeti_fiyat*$arac->gun_farki;
                                                        }
                                                        if ($arac->navigasyon)
                                                        {
                                                            $toplamFiyat+=$arac->navigasyon_fiyat;
                                                        }
                                                        if ($arac->bebek_koltugu)
                                                        {
                                                            $toplamFiyat+=$arac->bebek_koltugu_fiyat;
                                                        }
                                                        if ($arac->yol_haritasi)
                                                        {
                                                            $toplamFiyat+=$arac->yol_haritasi_fiyat;
                                                        }
                                                        echo $toplamFiyat;
                                                    ?>
                                                   
                                                </td>


                                                <td>
                                                    @if ($arac->navigasyon)
                                                        <i style="color:green" class="fa fa-check"></i>
                                                    @else
                                                        <i style="color:red" class="fa fa-times"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($arac->sofor_hizmeti)
                                                        <i style="color:green" class="fa fa-check"></i>
                                                    @else
                                                        <i style="color:red" class="fa fa-times"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($arac->bebek_koltugu)
                                                        <i style="color:green" class="fa fa-check"></i>
                                                    @else
                                                        <i style="color:red" class="fa fa-times"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($arac->yol_haritasi)
                                                        <i style="color:green" class="fa fa-check"></i>
                                                    @else
                                                        <i style="color:red" class="fa fa-times"></i>
                                                    @endif
                                                </td>
                                                
                                                <td>{{ $arac->musteri_adi }}</td>

                                            
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ends: .card -->

                </div>
                <!-- ends: .col-lg-6 -->
            </div>
        </div>
    </div>


</div>

<!--modall-->
<div class="modal-basic modal fade show" id="ekleGüncelleModal" tabindex="-1" role="dialog" aria-hidden="true">


    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content modal-bg-white ">
            <div id='modal-header-back' class="modal-header  bg-success">



                <h6 class="modal-title" id='modalTitle'>Araç Ekleme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <form method="POST" action="{{ route('kiralananarac.create.update') }}" enctype="multipart/form-data">
                @csrf <!-- Cross-Site Request Forgery (CSRF) koruması -->
                <input name="id" id='id'  type="hidden" class="form-control form-control-default">
            <div class="modal-body">
                <div class="row">
                <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Kiralanacak Müşteri</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                   
                                    <select name="musteri_id" id='musteri_id'  class="form-control" style="width: 100%;">
                                        <option value="">Seçiniz</option>  
                                        @foreach ($genelService->musteri() as $musteri)
                                            <option value="{{$musteri->mus_id}}">{{$musteri->mus_adi.' '.$musteri->mus_soyadi}}</option>
                                        @endforeach 
                                            
                                        
                                        </select>

                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Araçlar</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    

                                    <select name="arac_id" id='arac_id'  class="form-control" style="width: 100%;">
                                        <option value="">Seçiniz</option>  
                                        @foreach ($genelService->arac() as $arac)
                                            <option value="{{$arac->a_id}}">{{$arac->aracadi}}</option>
                                        @endforeach 
                                            
                                        
                                        </select>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Para Birimi</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    <select name="para_birim_id" id="para_birim_id" class="form-control " style="width: 100%;">
                                    <option value="">Seçiniz</option>  
                                        @foreach ($genelService->paraBirimi() as $parabirim)
                                            <option value="{{$parabirim->para_birim_id}}">{{$parabirim->para_name}}</option>
                                        @endforeach 
                                            
                                      
                                    </select>

                                    

                                </div>

                            </div>
                        </div>
                    </div>

                
                <div class="col-md-12 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Alış Yeri</b></label>
                            <div class="atbd-select-list d-flex alisDonus">
                               <div class="col-md-4 mt-2">
                                    <div class="form-group mb-0">
                                
                                     
                                    <label for="" class="form-group mb-0"><b>İl</b></label>
                                       <div class="atbd-select-list d-flex">
                                          <div class="atbd-select " style="width: 100%;">
                                          <select name="il" id='il'  class="form-control" onChange="ilceSec(event.target.value)" style="width: 100%;">
                                           <option value="">Seçiniz</option>  
                                            @foreach ($genelService->il() as $key=>$il)
                                                <option value="{{$il->il_id}}">{{$il->il_name}}</option>
                                            @endforeach 
                                            
                                          </select>

                                          </div>

                                        </div>
                                    </div>  




                                </div>

                       
                         <div class="col-md-4 mt-2">
                            <div class="form-group mb-0">
                            <label for="" class="form-group mb-0"><b>İlçe</b></label> 
                               
                                <div class="atbd-select-list d-flex">
                                    <div class="atbd-select " style="width: 100%;">
                                        
                                      <select name="ilce" id="ilce-select" class="form-control" onChange="ofisSec(event.target.value)" style="width: 100%;">
                                        </select>

                                    </div>

                                </div>
                            </div>
                         </div>


                        <div class="col-md-4 mt-2">
                            <div class="form-group mb-0">
                                
                            <label for="" class="form-group mb-0"><b>Ofis</b></label>
                                <div class="atbd-select-list d-flex">
                                    <div class="atbd-select " style="width: 100%;">
                                    
                                        <select name="ofis_id"  id="ofis-select" class="form-control" style="width: 100%;">
                                        </select>

                                    </div>

                                </div>
                            </div>
                        </div>

                            </div>
                        </div>
                    </div>

                    


                    <div class="col-md-12 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Dönüş Yeri</b></label>
                            <div class="atbd-select-list d-flex alisDonus">
                            <div class="col-md-4 mt-2">
                            <div class="form-group mb-0">
                                
                            <label for="" class="form-group mb-0"><b>İl</b></label>
                                <div class="atbd-select-list d-flex">
                                    <div class="atbd-select " style="width: 100%;">
                                    
                                        <select name="il" id='d_il'  class="form-control" onChange="ilceeSec(event.target.value)" style="width: 100%;">
                                        
                                        <option value="">Seçiniz</option>  
                                            @foreach ($genelService->d_il() as $key=>$il)
                                                <option value="{{$il->il_id}}">{{$il->il_name}}</option>
                                            @endforeach 
                                            
                                        </select>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mt-2">
                            <div class="form-group mb-0">
                                
                            <label for="" class="form-group mb-0"><b>İlçe</b></label>
                                <div class="atbd-select-list d-flex">
                                    <div class="atbd-select " style="width: 100%;">
                                       
                                       
                                       <select name="ilce" id="ilcee-select" class="form-control" onChange="ofissSec(event.target.value)" style="width: 100%;">
                                        </select>

                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-4 mt-2">
                            <div class="form-group mb-0">
                            <label for="" class="form-group mb-0"><b>Ofis</b></label>
                                
                                <div class="atbd-select-list d-flex">
                                    <div class="atbd-select " style="width: 100%;">
                                      
                                    
                                       <select name="d_ofis_id"  id="ofiss-select" class="form-control" style="width: 100%;">
                                        </select>

                                    </div>

                                </div>
                            </div>
                        </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Alış Tarihi</b></label>
                            <div class="atbd-select-list d-flex">
                                        <input name="alis_tarihi" id="alis_tarihi" onchange="hesap()" type="date" class="form-control form-control-default" >
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Dönüş Tarihi</b></label>
                            <div class="atbd-select-list d-flex">
                                        <input name="donus_tarihi" id="donus_tarihi" onchange="hesap()" type="date" class="form-control form-control-default" >
                            </div>
                        </div>
                    </div>

                 


                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Kiralanan Fiyat</b></label>
                            <div class="atbd-select-list d-flex ">
                                        <input id="kiralanan_fiyat_1"   type="text" class="form-control form-control-default" readonly>
                                        <input name="kiralanan_fiyat" id="kiralanan_fiyat"   type="hidden" class="form-control form-control-default">
                           </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-4">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"> @foreach ($genelService->rezarvasyon() as $key=>$rez)
                                               
                                                <b>Navigasyon Eklensin Mi?(fiyat={{$rez->navigasyon}})</b>
                                            @endforeach </label>
                            <div class="form-check form-switch">
                                <input class="form-check-input col-sm-12" type="checkbox" onchange="hesap()" id="navigasyon" name="navigasyon" value='1'>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-4">
                        <div class="form-group mb-0">
                            
                        <label for="" class="form-group mb-0"> @foreach ($genelService->rezarvasyon() as $key=>$rez)
                        <b>Şoför Hizmeti Eklensin Mi?(günlük fiyat ={{$rez->sofor_hizmeti}} )</b>
                                               
                                           @endforeach </label>
                           
                            <div class="form-check form-switch">
                                <input class="form-check-input col-sm-12" type="checkbox" onchange="hesap()" id="sofor_hizmeti" name="sofor_hizmeti" value='1' >
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-4">
                        <div class="form-group mb-0">
                        <label for="" class="form-group mb-0"> @foreach ($genelService->rezarvasyon() as $key=>$rez)
                        <b>Bebek Koltugu Eklensin Mi?(fiyat ={{$rez->bebek_koltugu}} )</b>
                                               
                                           @endforeach </label>
                            
                            <div class="form-check form-switch">
                                <input class="form-check-input col-sm-12" type="checkbox" onchange="hesap()" id="bebek_koltugu" name="bebek_koltugu"  >
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-4">
                        <div class="form-group mb-0">
                        <label for="" class="form-group mb-0"> @foreach ($genelService->rezarvasyon() as $key=>$rez)
                        <b>Yol Haritası Eklensin Mi?(fiyat ={{$rez->yol_haritasi}} )</b>
                                               
                                           @endforeach </label>
                           
                            <div class="form-check form-switch">
                                <input class="form-check-input col-sm-12" type="checkbox" onchange="hesap()" id="yol_haritasi" name="yol_haritasi"  >
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-4">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Toplam Tutar</b></label>
                            <div class="atbd-select-list d-flex">
                                        <input id="toplam_tutar_1"  type="text" class="form-control form-control-default" readonly>
                                        <input name="toplam_tutar" id="toplam_tutar"  type="hidden" class="form-control form-control-default">
                          
                            </div>
                        </div>
                    </div>
                    <p id='hata' style='color:red;margin-top: 15px;'><p>

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm">Kaydet</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Kapat</button>
            </div>
                                                    </form>
        </div>
    </div>


</div>


<div class="modal-basic modal fade show" id="silModall" tabindex="-1" role="dialog" aria-hidden="true">


    <div class="modal-dialog" role="document">
        <div class="modal-content modal-bg-white ">
            <div class="modal-header  bg-danger">



                <h6 class="modal-title">Kiralık Araç Silme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <form method="POST" action="{{ route('kiralananarac.delete') }}" enctype="multipart/form-data">
                @csrf <!-- Cross-Site Request Forgery (CSRF) koruması -->
              
                <input name="arackira_id" id='arackira_id'  type="hidden" class="form-control form-control-default">
            <div class="modal-body">
                <div class="row">
                   Silmek istediğinize emin misiniz?

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm">Sil</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Kapat</button>
            </div>
             </form>

        </div>
    </div>


</div>


<style>
    .alisDonus{
        background: #dfdfdf;
    padding: 3px 3px 20px 3px;
    border-radius: 10px;
    }
</style>
<script>
  
    function ekleModal()
    {
        $('#hata').html("");
        
         $( "#modal-header-back" ).removeClass( "bg-warning" ).addClass("bg-success");
        $('#modalTitle').html('Kiralık Araç Ekleme'); 
        $('#musteri_id').val("");
        $('#arac_id').val("");
        $('#para_birim_id').val("");
        $('#alis_tarihi').val("");
        $('#donus_tarihi').val("");
        $('#kiralanan_fiyat').val("");
        $('#kiralanan_fiyat_1').val("");
        $('#navigasyon').val("");
        $('#sofor_hizmeti').val("");
        $('#bebek_koltugu').val("");
        $('#yol_haritasi').val("");
        // $('#model-select').val(arac.m_id);
        $('#il').val("");
        $('#ilce-select').val("");
        $('#ofis-select').val("");
        $('#d_il').val("");
        $('#ilcee-select').val("");
        $('#ofiss-select').val("");
        $('#toplam_tutar').val("");
        $('#toplam_tutar_1').val("");
        $('#id').val("");
        $('#ekleGüncelleModal').modal();
    }
    function guncelleModal(arac)
    {
        $('#hata').html("");
        $( "#modal-header-back" ).removeClass( "bg-success" ).addClass( "bg-warning" );
        $('#modalTitle').html('Kiralık Araç Güncelleme');
        $('#id').val(arac.id);
        $('#musteri_id').val(arac.musteri_id);
        $('#arac_id').val(arac.arac_id);
        $('#para_birim_id').val(arac.para_birim_id);
        $('#alis_tarihi').val(arac.alis_tarihi);
        $('#donus_tarihi').val(arac.donus_tarihi);
        $('#kiralanan_fiyat').val(arac.kiralanan_fiyat);
        $('#kiralanan_fiyat_1').val(arac.kiralanan_fiyat);
        $("#navigasyon").prop("checked", +arac.navigasyon===1?true:false);
        $("#sofor_hizmeti").prop("checked", +arac.sofor_hizmeti===1?true:false);
        $("#bebek_koltugu").prop("checked", +arac.bebek_koltugu===1?true:false);
        $("#yol_haritasi").prop("checked", +arac.yol_haritasi===1?true:false);
        $('#il').val(arac.il_id);
        $('#d_il').val(arac.il_id);
        ilceSec(arac.il_id,arac.ilce_id);
        ofisSec(arac.ilce_id,arac.alis_yeri_id);
        ilceeSec(arac.il_id,arac.ilce_id);
        ofissSec(arac.ilce_id,arac.donus_yeri_id);
        $('#toplam_tutar').val(arac.toplam_tutar);
        $('#toplam_tutar_1').val(arac.toplam_tutar);
       
        $('#ekleGüncelleModal').modal();
    }

    function silModal(arac)
    {  
        $('#arackira_id').val(arac.id);
        console.log(arac);
        $('#silModall').modal();
    }

    function hesap()
    {
        var arac_id=$('#arac_id').val();
        var alis_tarihi=$('#alis_tarihi').val();
        var donus_tarihi=$('#donus_tarihi').val();
        var para_birim=$('#para_birim_id').val();
        var navigasyon=$('#navigasyon').is(':checked');
        var sofor_hizmeti=$('#sofor_hizmeti').is(':checked');
        var bebek_koltugu=$('#bebek_koltugu').is(':checked');
        var yol_haritasi=$('#yol_haritasi').is(':checked');
        
        var jsonData = { 
            alis_tarihi: alis_tarihi
            ,donus_tarihi: donus_tarihi
            ,para_birim:para_birim
            ,navigasyon:navigasyon
            ,sofor_hizmeti:sofor_hizmeti
            ,bebek_koltugu:bebek_koltugu
            ,yol_haritasi:yol_haritasi
            ,arac_id:arac_id

        };
        var urlParams = new URLSearchParams(jsonData);

            fetch('genel/kiralama-ucret-hesap?' + urlParams.toString(), {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if(data.hata!==undefined)
                {
                    $('#hata').html(data.hata)
                }
                else
                {
                    $('#toplam_tutar').val(data.toplamFiyat);
                $('#toplam_tutar_1').val(data.toplamFiyat);
                $('#kiralanan_fiyat').val(data.kiralananFiyat);
                $('#kiralanan_fiyat_1').val(data.kiralananFiyat);
                $('#hata').html("");
                }
                
            })
            .catch(error => {
                console.error('Error:', error);
            });


    }


    function ilceSec(il,secilenİlce=0)
    {
                var jsonData = { il_id: il };
            var urlParams = new URLSearchParams(jsonData);

            fetch('genel/ilce?' + urlParams.toString(), {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                $('#ilce-select').html('');
                $('#ilce-select').append('<option value="">Seçiniz</option>');
                data.forEach(x=>{
                    $('#ilce-select').append('<option value="'+x.ilce_id+'">'+x.ilce_name+'</option>');
                })
                if(secilenİlce!==0)
                {
                    $('#ilce-select').val(secilenİlce);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function ofisSec(ilce,secilenOfis)
    {
                var jsonData = {ilce_id: ilce };
            var urlParams = new URLSearchParams(jsonData);

            fetch('genel/ofis?' + urlParams.toString(), {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                $('#ofis-select').html('');
                $('#ofis-select').append('<option value="">Seçiniz</option>');
                data.forEach(x=>{
                    $('#ofis-select').append('<option value="'+x.ofis_id+'">'+x.ofis_name+'</option>');
                })

                if(secilenOfis!==0)
                {
                    $('#ofis-select').val(secilenOfis);
                }
                
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }


    function ilceeSec(il,secilenİlce=0)
    {
                var jsonData = { il_id: il };
            var urlParams = new URLSearchParams(jsonData);

            fetch('genel/ilce?' + urlParams.toString(), {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                $('#ilcee-select').html('');
                $('#ilcee-select').append('<option value="">Seçiniz</option>');
                data.forEach(x=>{
                    $('#ilcee-select').append('<option value="'+x.ilce_id+'">'+x.ilce_name+'</option>');
                })
                if(secilenİlce!==0)
                {
                    $('#ilcee-select').val(secilenİlce);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function ofissSec(ilce,secilenOfis)
    {
                var jsonData = {ilce_id: ilce };
            var urlParams = new URLSearchParams(jsonData);

            fetch('genel/ofis?' + urlParams.toString(), {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                $('#ofiss-select').html('');
                $('#ofiss-select').append('<option value="">Seçiniz</option>');
                data.forEach(x=>{
                    $('#ofiss-select').append('<option value="'+x.ofis_id+'">'+x.ofis_name+'</option>');
                })

                if(secilenOfis!==0)
                {
                    $('#ofiss-select').val(secilenOfis);
                }
                
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    
</script>
@endsection