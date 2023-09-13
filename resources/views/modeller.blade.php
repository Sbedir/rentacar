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
                        <h4 class="text-capitalize breadcrumb-title">Araç Modelleri</h4>
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
                                    <i class="la la-plus"></i> Model Ekle</a>
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
                                                <th>Marka</th>
                                                <th>Model</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($modelVerileri as $model)
                                            <tr >
                                                <td>
                                                <div class="table-actions">
                                                        <a href="#" onClick='guncelleModal({{ json_encode($model) }})'>
                                                            <span data-feather="edit"></span>
                                                        </a>
                                                        <a href="#" onClick='silModal({{ json_encode($model) }})'>
                                                            <span data-feather="trash-2"></span>
                                                        </a>
                                                    
                                                    </div>
                                                </td>
                                                <td>{{$model->marka}}</td>
                                                <td>{{$model->m_name}}</td>
                                               
                                            
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



                <h6 class="modal-title">Model Ekleme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            
            <form method="POST" action="{{ route('model.create.update') }}" enctype="multipart/form-data">
                @csrf <!-- Cross-Site Request Forgery (CSRF) koruması -->
                <input name="m_id" id='m_id'  type="hidden" class="form-control form-control-default">
            
            <div class="modal-body">
                <div class="row">
                  
                <div class="col-md-6 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Marka Adı</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                   
                                    <select name="mr_id" id='mr_id'  class="form-control" style="width: 100%;">
                                        <option value="">Seçiniz</option>  
                                        @foreach ($genelService->marka() as $marka)
                                            <option value="{{$marka->mr_id}}">{{$marka->mr_isim}}</option>
                                        @endforeach 
                                            
                                        
                                        </select>

                                </div>

                            </div>
                        </div>
                    </div>

                <div class="col-md-6 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Model Adı</b></label>
                                <input name="m_name" id="m_name" type="text" class="form-control form-control-default" placeholder="Arac modeli giriniz.">
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



                <h6 class="modal-title">Model Silme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <form method="POST" action="{{ route('model.delete') }}" enctype="multipart/form-data">
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
        $('#modalTitle').html('Model Ekleme');
        $('#m_name').val("");
        $('#mr_id').val("");
        $('#m_id').val("");
        $('#ekleGüncelleModal').modal();
    }
    function guncelleModal(model)
    {
        console.log(model)
        $( "#modal-header-back" ).removeClass( "bg-success" ).addClass( "bg-warning" );
        $('#modalTitle').html('Model Güncelleme');
        $('#m_name').val(model.m_name);
        $('#mr_id').val(model.mr_id);
        $('#m_id').val(model.m_id);
        $('#ekleGüncelleModal').modal();
    }
    function silModal(model)
    {

        $('#sil_id').val(model.m_id);
        console.log(model);
        $('#silModal').modal();
    }

   

    

   

    
</script>
@endsection