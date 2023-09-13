@extends('layout')
@section('icerik')
@inject('genelService', 'App\Services\GenelService')
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
                        <h4 class="text-capitalize breadcrumb-title">Transfer Ücretleri</h4>
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
                                    <i class="la la-plus"></i> Transfer Ücreti Ekle</a>
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
                                                <th>Alış Yeri</th>
                                                <th>Dönüş Yeri</th>
                                                <th>Mesafe</th>
                                                <th>Minimum Kişi Sayısı</th>
                                                <th>Maximum Kişi Sayısı</th>
                                                <th>Fiyat</th>
                                                <th>Para Birimi</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($transferVerileri as $transfer)
                                            <tr >
                                                <td>
                                                <div class="table-actions">
                                                        <a href="#" onClick='guncelleModal({{ json_encode($transfer) }})'>
                                                            <span data-feather="edit"></span>
                                                        </a>
                                                        <a href="#" onClick='silModal({{ json_encode($transfer) }})'>
                                                            <span data-feather="trash-2"></span>
                                                        </a>
                                                    
                                                    </div>
                                                </td>
                                               
                                                <td>{{$transfer->alis_yeri}}</td>
                                                <td>{{$transfer->donus_yeri}}</td>
                                                <td>{{$transfer->mesafe}}</td>
                                                <td>{{$transfer->kisi_baslangic}}</td>
                                                <td>{{$transfer->kisi_bitis}}</td>
                                                <td>{{$transfer->fiyat}}</td>
                                                <td>{{$transfer->para_birim}}</td>
                                            
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


                <h6 class="modal-title">Transfer Ücreti Ekleme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <form method="POST" action="{{ route('transfer.create.update') }}" enctype="multipart/form-data">
                @csrf <!-- Cross-Site Request Forgery (CSRF) koruması -->
                <input name="t_id" id='t_id'  type="hidden" class="form-control form-control-default">
            <div class="modal-body">
                <div class="row">
                    

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Alış İl</b></label>
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
                            
                            <label for="" class="form-group mb-0"><b>Alış İlçe</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                <select name="a_ilce" id="ilce-select" class="form-control"  style="width: 100%;">
                                        </select>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Dönüş İl</b></label>
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
                            
                            <label for="" class="form-group mb-0"><b>Dönüş İlçe</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                <select name="d_ilce" id="ilcee-select" class="form-control"  style="width: 100%;">
                                        </select>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Mesafe</b></label>
                                <input name="mesafe" id="mesafe" min="0" type="number" class="form-control form-control-default" placeholder="Mesafeyi km cinsinden yazınız.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Kişi Başlangıç</b></label>
                                <input name="kisi_baslangic" id="kisi_baslangic" min="0" type="number" class="form-control form-control-default" placeholder="Min kişi sayısı yazınız.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Kişi Bitiş</b></label>
                                <input name="kisi_bitis" id="kisi_bitis" min="0" type="number" class="form-control form-control-default" placeholder="Max kişi sayısı yazınız.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Fiyat</b></label>
                                <input name="fiyat" id="fiyat" min="0" type="number" class="form-control form-control-default" placeholder=" Fiyat tutarını giriniz.">
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
<div class="modal-basic modal fade show" id="silModal" tabindex="-1" role="dialog" aria-hidden="true">


    <div class="modal-dialog" role="document">
        <div class="modal-content modal-bg-white ">
            <div class="modal-header bg-danger">



                <h6 class="modal-title">Transfer Silme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <form method="POST" action="{{ route('transfer.delete') }}" enctype="multipart/form-data">
                @csrf <!-- Cross-Site Request Forgery (CSRF) koruması -->
              
                <input name="sil_id" id='sil_id'  type="hidden" class="form-control form-control-default">
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
        $('#modalTitle').html('Kiralık Araç Ekleme'); 
        $('#t_id').val("");
        $('#para_birim_id').val("");
        $('#fiyat').val("");
        $('#il').val("");
        $('#mesafe').val("");
        $('#kisi_baslangic').val("");
        $('#kisi_bitis').val("");
        $('#ilce-select').val("");
        $('#d_il').val("");
        $('#ilcee-select').val("");
        $('#id').val("");
        $('#ekleGüncelleModal').modal();
    }
    function guncelleModal(transfer)
    {
        console.log(transfer)
        $( "#modal-header-back" ).removeClass( "bg-success" ).addClass( "bg-warning" );
        $('#modalTitle').html('Kiralık Araç Güncelleme');
        $('#t_id').val(transfer.t_id);
        $('#mesafe').val(transfer.mesafe);
        $('#kisi_baslangic').val(transfer.kisi_baslangic);
        $('#kisi_bitis').val(transfer.kisi_bitis);
        $('#para_birim_id').val(transfer.para_birim_id);
        $('#fiyat').val(transfer.fiyat);
        $('#il').val(transfer.il_id);
        $('#d_il').val(transfer.il_id);
        ilceSec(transfer.il_id,transfer.ilce_id);
        ilceeSec(transfer.il_id,transfer.ilce_id);
    
 
       
        $('#ekleGüncelleModal').modal();
    }
    function silModal(transfer)
    {
        $('#sil_id').val(transfer.t_id);
        console.log(transfer);
        $('#silModal').modal();
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

 

    
</script>
@endsection