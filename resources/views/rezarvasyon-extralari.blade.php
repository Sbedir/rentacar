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
                        <h4 class="text-capitalize breadcrumb-title">Rezarvasyon Extraları</h4>
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
                                    <i class="la la-plus"></i>Rezarvasyon Extraları Ekle</a>
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
                                                <th>Navigasyon</th>
                                                <th>Şoför Hizmeti</th>
                                                <th>Bebek Koltuğu</th>
                                                <th>Yol Haritası</th>
                                                <th>Para Birimi</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($rezVerileri as $rezervasyon)
                                            <tr >
                                                <td>
                                                <div class="table-actions">
                                                        <a href="#" onClick='guncelleModal({{ json_encode($rezervasyon) }})'>
                                                            <span data-feather="edit"></span>
                                                        </a>
                                                        <a href="#" onClick='silModal({{ json_encode($rezervasyon) }})'>
                                                            <span data-feather="trash-2"></span>
                                                        </a>
                                                    
                                                    </div>
                                                </td>
                                               
                                                <td>{{$rezervasyon->navigasyon}}</td>
                                                <td>{{$rezervasyon->sofor_hizmeti}}</td>
                                                <td>{{$rezervasyon->bebek_koltugu}}</td>
                                                <td>{{$rezervasyon->yol_haritasi}}</td>
                                                <td>{{$rezervasyon->para_birim}}</td>
                                               
                                            
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


                <h6 class="modal-title">Rezarvasyon Extraları Ekleme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <form method="POST" action="{{ route('rezarvasyon.create.update') }}" enctype="multipart/form-data">
                @csrf <!-- Cross-Site Request Forgery (CSRF) koruması -->
                <input name="rez_id" id='rez_id'  type="hidden" class="form-control form-control-default">
            
            <div class="modal-body">
                <div class="row">
                  

                <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Navigasyon</b></label>
                                <input name="navigasyon" id='navigasyon' type="number" class="form-control form-control-default" placeholder="Navigasyon ücreti giriniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Şoför Hizmeti</b></label>
                                <input name="sofor_hizmeti" id='sofor_hizmeti' type="number" class="form-control form-control-default" placeholder="Şoför ücreti giriniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Bebek Koltuğu</b></label>
                                <input name="bebek_koltugu" id='bebek_koltugu' type="number" class="form-control form-control-default" placeholder="Bebek koltuğu ücreti giriniz.">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Yol Haritası </b></label>
                                <input name="yol_haritasi" id='yol_haritasi' type="number" class="form-control form-control-default" placeholder="Yol haritası ücreti giriniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-2">
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



                <h6 class="modal-title">Rezarvasyon Extrası Silme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <form method="POST" action="{{ route('rezarvasyon.delete') }}" enctype="multipart/form-data">
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
        $('#modalTitle').html('Rezarvasyon Extrası Ekleme'); 
        $('#rez_id').val("");
        $('#para_birim_id').val("");
        $('#navigasyon').val("");
        $('#sofor_hizmeti').val("");
        $('#bebek_koltugu').val("");
        $('#yol_haritasi').val("");
        $('#ekleGüncelleModal').modal();
    }
    function guncelleModal(reazarvasyonExtra)
    {
        console.log(reazarvasyonExtra)
        $( "#modal-header-back" ).removeClass( "bg-success" ).addClass( "bg-warning" );
        $('#modalTitle').html('Rezarvasyon Extrası Güncelleme');
        $('#rez_id').val(reazarvasyonExtra.rez_id);
        $('#sofor_hizmeti').val(reazarvasyonExtra.sofor_hizmeti);
        $('#bebek_koltugu').val(reazarvasyonExtra.bebek_koltugu);
        $('#yol_haritasi').val(reazarvasyonExtra.yol_haritasi);
        $('#para_birim_id').val(reazarvasyonExtra.para_birim_id);
        $('#navigasyon').val(reazarvasyonExtra.navigasyon);     
        $('#ekleGüncelleModal').modal();
    }
    function silModal(reazarvasyonExtra)
    {
        $('#sil_id').val(reazarvasyonExtra.rez_id);

        console.log(reazarvasyonExtra);
        $('#silModal').modal();
    }

   


  

 

    
</script>
@endsection