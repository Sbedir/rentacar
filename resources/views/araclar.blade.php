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
                        <h4 class="text-capitalize breadcrumb-title">Araçlar</h4>
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
                                    <i class="la la-plus"></i> Araç Ekle</a>
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
                                                <th>Marka</th>
                                                <th>Model</th>
                                                <th>Üretim Yılı</th>
                                                <th>Araç Müsaitlik Durumu</th>
                                                <th>Kiralık Durum</th>
                                                <th>Yolcu Kapasitesi</th>
                                                <th>Bagaj Kapasitesi</th>
                                                <th>Yakıt Türü</th>
                                                <th>Vites Türü</th>
                                                <th>Araç Kategorisi</th>
                                                <th>Klima Türü</th>
                                                <th>Bulunduğu Ofis</th>
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
                                                @if ($arac->a_resim == "")
                                                    <img style='max-width: 100px;' src='/storage/img/resim-yok.png'>
                                                    @else
                                                    <img style='max-width: 100px;'
                                                        src="{{ asset($arac->a_resim) }}" alt="svg">
                                                    @endif
                                                         
                                                </td>
                                                <td>{{ $arac->marka_name }}</td>
                                                <td>{{ $arac->model_name }}</td>
                                                <td>{{ $arac->uretim_yili }}</td>
                                                <td>{{ $arac->arac_musait }}</td>
                                                <td><?= $arac->kiralik==1?"<p style='color:red'>Bugün kiralanmış.</p>":"<p style='color:green'>Kiralanabilir.</p>"; ?></td>
                                                <td>{{ $arac->yolcu_kapasite }}</td>
                                                <td>{{ $arac->bagaj_kapasitesi }} kg</td>
                                                <td>{{ $arac->yakit_tur_adi }}</td>
                                                <td>{{ $arac->vites_tur_name }}</td>
                                                <td>{{ $arac->kategori_name }}</td>
                                                <td>{{ $arac->klima_tur_name }}</td>
                                                <td>{{ $arac->ofis_adi }}</td>
                                            
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
            <form method="POST" action="{{ route('arac.create.update') }}" enctype="multipart/form-data">
                @csrf <!-- Cross-Site Request Forgery (CSRF) koruması -->
                <input name="a_id" id='a_id'  type="hidden" class="form-control form-control-default">
                            
                            
                <div class="modal-body">
                <div class="row">
                        <div class="col-md-3 mt-2">
                            <div class="row">
                                <div class="col-md-12 mt-2">
                                    <div class="form-group mb-0" id="logom" style='text-align: center;'>

                                       

                                    </div>
                                </div>
                                 <div class="col-md-12 mt-2">
                                    <div class="form-group mb-0">
                                        <div class="input-container icon-left position-relative">
                                            <label for="" class="form-group mb-0"><b>Resim Ekle</b></label>
                                            <input name="a_resim" type="file" class="form-control form-control-default"
                                                placeholder="Resim Ekle">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-9 mt-2">
                    <div class="row">
                       

                        <div class="col-md-4 mt-2">
                            <div class="form-group mb-0">
                                
                                <label for="" class="form-group mb-0"><b>Marka</b></label>
                                <div class="atbd-select-list d-flex">
                                    <div class="atbd-select " style="width: 100%;">
                                        <select name="mr_id" id='mr_id'  class="form-control" onChange="markaSec(event.target.value)" style="width: 100%;">
                                        <option value="">Seçiniz</option>
                                        @foreach ($genelService->marka() as $marka)
                                            <option value="{{$marka->mr_id}}">{{$marka->mr_isim}}</option>
                                        @endforeach 
                                        </select>

                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-4 mt-2">
                            <div class="form-group mb-0">
                                
                                <label for="" class="form-group mb-0"><b>Model</b></label>
                                <div class="atbd-select-list d-flex">
                                    <div class="atbd-select " style="width: 100%;">
                                        <select name="m_id" id="model-select" class="form-control" style="width: 100%;">
                                        </select>

                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-4 mt-2">
                            <div class="form-group mb-0">
                                <label for="" class="form-group mb-0"><b>Üretim Yılı</b></label>
                                <div class="atbd-select-list d-flex">
                                    <div class="atbd-select " style="width: 100%;">
                                        
                                        <select name="uretim_yili" id='uretim_yili'  class="form-control" style="width: 100%;">
                                        <option value="">Seçiniz</option>  
                                        @foreach ($genelService->year() as $year)
                                                <option value="{{$year}}">{{$year}}</option>
                                            @endforeach 
                                        </select>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mt-2">
                            <div class="form-group mb-0">
                                
                                <label for="" class="form-group mb-0"><b>Araç Kategorisi</b></label>
                                <div class="atbd-select-list d-flex">
                                    <div class="atbd-select " style="width: 100%;">
                                        <select name="a_kategori" id='a_kategori'  class="form-control" style="width: 100%;">
                                        <option value="">Seçiniz</option>  
                                            @foreach ($genelService->kategori() as $key=>$kategori)
                                                <option value="{{$key}}">{{$kategori}}</option>
                                            @endforeach 
                                        </select>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mt-2">
                            <div class="form-group mb-0">
                                
                                <label for="" class="form-group mb-0"><b>Klima Türü</b></label>
                                <div class="atbd-select-list d-flex">
                                    <div class="atbd-select " style="width: 100%;">
                                        <select name="klima_tur" id='klima_tur'  class="form-control" style="width: 100%;">
                                        <option value="">Seçiniz</option>  
                                        @foreach ($genelService->klimaTur() as $key=>$klimaTur)
                                                <option value="{{$key}}">{{$klimaTur}}</option>
                                            @endforeach 
                                            
                                        </select>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mt-2">
                            <div class="form-group mb-0">
                                
                                <label for="" class="form-group mb-0"><b>Yakıt Türü</b></label>
                                <div class="atbd-select-list d-flex">
                                    <div class="atbd-select " style="width: 100%;">
                                        <select name="yakit_tur" id='yakit_tur'  class="form-control" style="width: 100%;">
                                        <option value="">Seçiniz</option>  
                                        @foreach ($genelService->yakitTur() as $key=>$yakitTur)
                                                <option value="{{$key}}">{{$yakitTur}}</option>
                                            @endforeach 
                                            
                                        </select>

                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="col-md-4 mt-2">
                            <div class="form-group mb-0">
                                
                                <label for="" class="form-group mb-0"><b>Vites Türü</b></label>
                                <div class="atbd-select-list d-flex">
                                    <div class="atbd-select " style="width: 100%;">
                                        <select name="vites_tur"  id='vites_tur'   class="form-control" style="width: 100%;">
                                        <option value="">Seçiniz</option>  
                                        @foreach ($genelService->vitesTur() as $key=>$vitesTur)
                                                <option value="{{$key}}">{{$vitesTur}}</option>
                                            @endforeach 

                                            
                                        </select>

                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-4 mt-2">
                            <div class="form-group mb-0">
                                
                                <label for="" class="form-group mb-0"><b>İl</b></label>
                                <div class="atbd-select-list d-flex">
                                    <div class="atbd-select " style="width: 100%;">
                                        <select name="" id='il'  class="form-control" onChange="ilceSec(event.target.value)" style="width: 100%;">
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
                                        <select name="" id="ilce-select" class="form-control" onChange="ofisSec(event.target.value)" style="width: 100%;">
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

                        <div class="col-md-4 mt-2">
                            <div class="form-group mb-0">
                                
                                <label for="" class="form-group mb-0"><b>Müsaitlik Durumu</b></label>
                                <div class="atbd-select-list d-flex">
                                    <div class="atbd-select " style="width: 100%;">
                                        <select name="a_musait" id='a_musait'  class="form-control" style="width: 100%;">
                                            <option value="">Seçiniz</option>  
                                            @foreach ($genelService->musaitlikDurumu() as $key=>$musaitlikDurumu)
                                                <option value="{{$key}}">{{$musaitlikDurumu}}</option>
                                            @endforeach 
                                            
                                        </select>

                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-4 mt-2">
                            <div class="form-group mb-0">
                                <div class="input-container icon-left position-relative">
                                    <label for=""  class="form-group mb-0"><b>Yolcu Kapasitesi</b></label>
                                    <input name="yolcu_kapasite" id='yolcu_kapasite'  min="2" type="number" class="form-control form-control-default" placeholder="Yolcu kapasitesini minimum 2 olacak Şekilde ekleyiniz.">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mt-2">
                            <div class="form-group mb-0">
                                <div class="input-container icon-left position-relative">
                                    <label for=""  class="form-group mb-0"><b>Bagaj Kapasitesi</b></label>
                                    <input name="bagaj_kapasitesi" id='bagaj_kapasitesi'  min="0" type="number" class="form-control form-control-default" placeholder="Bagaj kapasitesini kg cinsinden yazınız.">
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button  type="submit" class="btn btn-primary btn-sm">Kaydet</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Kapat</button>
                </div>
            </form>

            </div>
    </div>
        </div>
    </div>


</div>





<div class="modal-basic modal fade show" id="silModal" tabindex="-1" role="dialog" aria-hidden="true">


    <div class="modal-dialog" role="document">
        <div class="modal-content modal-bg-white ">
            <div class="modal-header bg-danger">



                <h6 class="modal-title">Araç Silme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <form method="POST" action="{{ route('arac.delete') }}" enctype="multipart/form-data">
                @csrf <!-- Cross-Site Request Forgery (CSRF) koruması -->
              
                <input name="a_id" id='arac_id'  type="hidden" class="form-control form-control-default">
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



<script>
    
    function ekleModal()
    {
        
        $( "#modal-header-back" ).removeClass( "bg-warning" ).addClass("bg-success");
        $('#modalTitle').html('Araç Ekleme');
        $('#mr_id').val("");
        $('#logom').html("<img style='max-width: 178px;' src='/storage/img/resim-yok.png' >");
        $('#model-select').val("");
        // $('#model-select').val(arac.m_id);
        $('#uretim_yili').val("");
        $('#a_kategori').val("");
        $('#klima_tur').val("");
        $('#yakit_tur').val("");
        $('#vites_tur').val("");
        $('#il').val("");
        $('#ilce-select').val("");
        $('#ofis-select').val("");
        $('#a_musait').val("");
        $('#yolcu_kapasite').val("");
        $('#bagaj_kapasitesi').val("");
        $('#a_id').val("");
        $('#ekleGüncelleModal').modal();
    }
    function guncelleModal(arac)
    {
        $( "#modal-header-back" ).removeClass( "bg-success" ).addClass( "bg-warning" );
        console.log(arac)
        $('#modalTitle').html('Araç Güncelleme');
        $('#logom').html("<img style='max-width: 178px;' src='/" + (arac.a_resim==""?"storage/img/resim-yok.png":arac.a_resim) + "' >");

        $('#mr_id').val(arac.mr_id);
        markaSec(arac.mr_id,arac.m_id);
        // $('#model-select').val(arac.m_id);
        $('#uretim_yili').val(arac.uretim_yili);
        $('#a_kategori').val(arac.a_kategori);
        $('#klima_tur').val(arac.klima_tur);
        $('#yakit_tur').val(arac.yakit_tur);
        $('#vites_tur').val(arac.vites_tur);
        $('#il').val(arac.il_id);
        ilceSec(arac.il_id,arac.ilce_id);
        ofisSec(arac.ilce_id,arac.ofis_id);
        $('#a_musait').val(arac.a_musait);
        $('#yolcu_kapasite').val(arac.yolcu_kapasite);
        $('#bagaj_kapasitesi').val(arac.bagaj_kapasitesi);
        $('#a_id').val(arac.a_id);
        $('#ekleGüncelleModal').modal();
    }
    function silModal(arac)
    {  
        $('#arac_id').val(arac.a_id);
        console.log(arac);
        $('#silModal').modal();
     
        
    }

    function markaSec(marka,secilen=0)
    {
                var jsonData = { marka_id: marka };
            var urlParams = new URLSearchParams(jsonData);

            fetch('genel/model?' + urlParams.toString(), {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                $('#model-select').html('');
                $('#model-select').append('<option value="">Seçiniz</option>');
                data.forEach(x=>{
                    $('#model-select').append('<option value="'+x.m_id+'">'+x.m_name+'</option>');
                })
                if(secilen!==0)
                {
                    
                    $('#model-select').val(secilen);
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

    
</script>
@endsection