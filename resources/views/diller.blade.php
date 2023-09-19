@extends('layout')
@section('icerik')
<div class="contents">
    @if (Session::has('success'))
    <div class="alert alert-success">
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
                        <h4 class="text-capitalize breadcrumb-title">Diller</h4>
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
                                    <i class="la la-plus"></i> Dil Ekle</a>
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
                                                <th>Logo</th>
                                                <th>Dil Adı</th>
                                                <th>Dil Kodu</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($DilVerileri as $Dil)
                                            <tr>
                                                <td>
                                                    <div class="table-actions">
                                                        <a href="#" onClick='guncelleModal({{ json_encode($Dil) }})'>
                                                            <span data-feather="edit"></span>
                                                        </a>
                                                        <a href="#" onClick='silModal({{ json_encode($Dil) }})'>
                                                            <span data-feather="trash-2"></span>
                                                        </a>

                                                    </div>
                                                </td>

                                                <td>
                                                @if ($Dil->resim == "")
                                                    <img style='max-width: 100px;' src='/storage/img/resim-yok.png'>
                                                    @else
                                                    <img style='max-width: 100px;'
                                                        src="{{ asset($Dil->resim) }}" alt="svg">
                                                    @endif
                                                 
                                                </td>
                                                <td>{{$Dil->lang_name}}</td>
                                                <td>{{$Dil->lang_kod}}</td>



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


                <h6 class="modal-title">Dil Ekleme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <form method="POST" action="{{ route('dil.create.update') }}" enctype="multipart/form-data">
                @csrf
                <!-- Cross-Site Request Forgery (CSRF) koruması -->
                <input name="language_id" id='language_id' type="hidden" class="form-control form-control-default">

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
                                            <label for="" class="form-group mb-0"><b>Logo Ekle</b></label>
                                            <input name="resim" type="file" class="form-control form-control-default"
                                                placeholder="Logo Ekle">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-9 mt-2">
                            <div class="row">

                              


                                <div class="col-md-12 mt-2">
                                    <div class="form-group mb-0">
                                        <div class="input-container icon-left position-relative">
                                            <label for="" class="form-group mb-0"><b>Dil Adı</b></label>
                                            <input name="lang_name" id="lang_name" type="text"
                                                class="form-control form-control-default"
                                                placeholder="Dil adı giriniz.">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="form-group mb-0">
                                        <div class="input-container icon-left position-relative">
                                            <label for="" class="form-group mb-0"><b>Dil Kodu</b></label>
                                            <input name="lang_kod" id="lang_kod" type="text"
                                                class="form-control form-control-default"
                                                placeholder="Dil kodu giriniz.">
                                        </div>
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



                <h6 class="modal-title">Dil Silme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <form method="POST" action="{{ route('dil.delete') }}" enctype="multipart/form-data">
                @csrf
                <!-- Cross-Site Request Forgery (CSRF) koruması -->

                <input name="sil_id" id='sil_id' type="hidden" class="form-control form-control-default">
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
function ekleModal() {
    $("#modal-header-back").removeClass("bg-warning").addClass("bg-success");
    $('#modalTitle').html('Dil Ekleme');
    $('#lang_name').val("");
    $('#lang_kod').val("");
    $('#language_id').val("");
    $('#logom').html("<img style='max-width: 178px;' src='../storage/img/resim-yok.png' >");
    $('#ekleGüncelleModal').modal();
}

function guncelleModal(dil) {
    console.log(dil)
    $('#modalTitle').html('Dil Güncelleme');
    $("#modal-header-back").removeClass("bg-success").addClass("bg-warning");
    $('#logom').html("<img style='max-width: 178px;' src='../" + (dil.resim==""?"storage/img/resim-yok.png":dil.resim) + "' >");
    $('#lang_name').val(dil.lang_name);
    $('#lang_kod').val(dil.lang_kod);
    $('#language_id').val(dil.language_id);
    $('#ekleGüncelleModal').modal();
}

function silModal(dil) {
    $('#sil_id').val(dil.language_id);
    console.log(dil);
    $('#silModal').modal();
}
</script>
@endsection