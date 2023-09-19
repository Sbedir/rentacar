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
                        <h4 class="text-capitalize breadcrumb-title">Haberler</h4>
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
                                    <i class="la la-plus"></i> Haber Ekle</a>
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
                                                <th>Adı</th>
                                                <th>İçerik</th>
                                                <th>Yayın Tarihi</th>
                                                <th>Beğenme Sayısı</th>
                                            </tr>
                                        </thead>
                                        <tbody>





                                            @foreach ($haberVerileri as $haber)
                                            <tr>
                                                <td>

                                                    <div class="table-actions">
                                                        <a href="#" onClick='guncelleModal({{ json_encode($haber) }})'>
                                                            <span data-feather="edit"></span>
                                                        </a>
                                                        <a href="#" onClick='silModal({{ json_encode($haber) }})'>
                                                            <span data-feather="trash-2"></span>
                                                        </a>

                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($haber->haber_resim == "")
                                                    <img style='max-width: 100px;' src='/storage/img/resim-yok.png'>
                                                    @else
                                                    <img style='max-width: 100px;'
                                                        src="{{ asset($haber->haber_resim) }}" alt="svg">
                                                    @endif


                                                </td>
                                                <td>{{ $haber->haber_adi }}</td>
                                                <td>{{ $haber->haber_icerik }}</td>
                                                <td>{{ $haber->yayin_tarihi }}</td>
                                                <td>{{ $haber->begen }}</td>
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


                <h6 class="modal-title" id='modalTitle'>Haber Ekleme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <form method="POST" action="{{ route('haber.create.update') }}" enctype="multipart/form-data">
                @csrf
                <!-- Cross-Site Request Forgery (CSRF) koruması -->
                <input name="haber_id" id='haber_id' type="hidden" class="form-control form-control-default">
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
                                            <input name="haber_resim" id="haber_resim" type="file"
                                                class="form-control form-control-default" placeholder="Resim Ekle">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-9 mt-2">
                            <div class="row">


                                <div class="col-md-8 mt-2">
                                    <div class="form-group mb-0">
                                        <div class="input-container icon-left position-relative">
                                            <label for="" class="form-group mb-0"><b>Haber Adı</b></label>
                                            <input name="haber_adi" id="haber_adi" type="text"
                                                class="form-control form-control-default"
                                                placeholder="Haber adı giriniz.">
                                        </div>
                                    </div>
                                </div>





                                <div class="col-md-4 mt-2">
                                    <div class="form-group mb-0">
                                        <div class="input-container icon-left position-relative">
                                            <label for="" class="form-group mb-0"><b>Yayın Tarihi</b></label>
                                            <input name="yayin_tarihi" id="yayin_tarihi" type="date"
                                                class="form-control form-control-default"
                                                placeholder="Yayın tarihi giriniz.">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2">
                                    <div class="form-group mb-0">
                                        <div class="input-container icon-left position-relative">
                                            <label for="" class="form-group mb-0"><b>Haber İçeriği</b></label>
                                            <textarea name="haber_icerik" id="haber_icerik"
                                                class="form-control form-control-default"></textarea>
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



                <h6 class="modal-title">Haber Silme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <form method="POST" action="{{ route('haber.delete') }}" enctype="multipart/form-data">
                @csrf
                <!-- Cross-Site Request Forgery (CSRF) koruması -->

                <input name="haber_id" id='h_id' type="hidden" class="form-control form-control-default">
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
    $('#logom').html("<img style='max-width: 178px;' src='/storage/img/resim-yok.png' >");
    $('#modalTitle').html('Haber Ekleme');
    $('#haber_adi').val("");
    $('#begen').val("");
    $('#haber_icerik').val("");
    $('#yayin_tarihi').val("");
    $('#haber_id').val("");
    $('#ekleGüncelleModal').modal();
}

function guncelleModal(haber) {
    console.log(haber)
    $('#modalTitle').html('Haber Güncelleme');
    $('#logom').html("<img style='max-width: 178px;' src='/" + (haber.haber_resim==""?"storage/img/resim-yok.png":haber.haber_resim) + "' >");
    $("#modal-header-back").removeClass("bg-success").addClass("bg-warning");
    $('#haber_adi').val(haber.haber_adi);
    $('#begen').val(haber.begen);
    $('#haber_icerik').val(haber.haber_icerik);
    $('#yayin_tarihi').val(haber.yayin_tarihi);
    $('#haber_id').val(haber.haber_id);
    $('#ekleGüncelleModal').modal();
}

function silModal(haber) {
    $('#h_id').val(haber.haber_id);
    console.log(haber);
    $('#silModal').modal();
}
</script>
@endsection