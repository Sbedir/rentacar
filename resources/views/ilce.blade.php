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
                        <h4 class="text-capitalize breadcrumb-title">İlceler</h4>
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
                                    <i class="la la-plus"></i> İlçe Ekle</a>
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
                                                <th>İl</th>
                                                <th>İlçe</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($ilceVerileri as $ilce)
                                            <tr >
                                                <td>
                                                <div class="table-actions">
                                                        <a href="#" onClick='guncelleModal({{ json_encode($ilce) }})'>
                                                            <span data-feather="edit"></span>
                                                        </a>
                                                        <a href="#" onClick='silModal({{ json_encode($ilce) }})'>
                                                            <span data-feather="trash-2"></span>
                                                        </a>
                                                    
                                                    </div>
                                                </td>
                                               
                                                <td>{{$ilce->il}}</td>
                                                <td>{{$ilce->ilce_name}}</td>
                                            
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


    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-bg-white ">
        <div id='modal-header-back' class="modal-header  bg-success">



                <h6 class="modal-title">İlce Ekleme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>

            <form method="POST" action="{{ route('ilce.create.update') }}" enctype="multipart/form-data">
                @csrf <!-- Cross-Site Request Forgery (CSRF) koruması -->
                <input name="ilce_id" id='ilce_id'  type="hidden" class="form-control form-control-default">
            <div class="modal-body">
                <div class="row">
                  
                    <div class="col-md-12 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>İlçe</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                   
                                    <select name="il_id" id='il_id'  class="form-control" style="width: 100%;">
                                        <option value="">Seçiniz</option>  
                                        @foreach ($genelService->il() as $il)
                                            <option value="{{$il->il_id}}">{{$il->il_name}}</option>
                                        @endforeach 
                                            
                                        
                                        </select>

                                </div>

                            </div>
                        </div>
                    </div>


                <div class="col-md-12 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>İlce Adı</b></label>
                                <input name="ilce_name" id="ilce_name" type="text" class="form-control form-control-default" placeholder="İl adı giriniz.">
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



                <h6 class="modal-title">İlçe Silme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <form method="POST" action="{{ route('ilce.delete') }}" enctype="multipart/form-data">
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
        $('#modalTitle').html('İlçe Ekleme');
        $( "#modal-header-back" ).removeClass( "bg-warning" ).addClass("bg-success");
        $('#ilce_name').val("");
        $('#İL_id').val("");
        $('#ilce_id').val("");
        $('#ekleGüncelleModal').modal();
    }
    function guncelleModal(ilce)
    {
        $( "#modal-header-back" ).removeClass( "bg-success" ).addClass( "bg-warning" );
        console.log(ilce)
        $('#modalTitle').html('İlçe Güncelleme');
        $('#ilce_name').val(ilce.ilce_name);
        $('#ilce_id').val(ilce.ilce_id);
        $('#il_id').val(ilce.il_id);
        $('#ekleGüncelleModal').modal();
    }
    function silModal(ilce)
    {
        $('#sil_id').val(ilce.ilce_id);
        console.log(ilce);
        $('#silModal').modal();
    }

   

    

   

    
</script>
@endsection