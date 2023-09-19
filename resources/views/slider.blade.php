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
                        <h4 class="text-capitalize breadcrumb-title">Slider</h4>
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
                                    <i class="la la-plus"></i> Slider Ekle</a>
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
                                                <th>Başlık</th>
                                                <th>Açıklama</th>
                                                <th>Açıklama2</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sliderVerileri as $slider)
                                            <tr>
                                                <td>
                                                    <div class="table-actions">
                                                        <a href="#" onClick='guncelleModal({{ json_encode($slider) }})'>
                                                            <span data-feather="edit"></span>
                                                        </a>
                                                        <a href="#" onClick='silModal({{ json_encode($slider) }})'>
                                                            <span data-feather="trash-2"></span>
                                                        </a>

                                                    </div>
                                                </td>
                                                <td>
                                                @if ($slider->resim == "")
                                                    <img style='max-width: 100px;' src='/storage/img/resim-yok.png'>
                                                    @else
                                                    <img style='max-width: 100px;'
                                                        src="{{ asset($slider->resim) }}" alt="svg">
                                                    @endif
                                                   
                                                </td>
                                                <td>{{$slider->sli_baslik}}</td>
                                                <td>{{$slider->sli_aciklama}}</td>
                                                <td>{{$slider->sli_aciklama2}}</td>


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


                <h6 class="modal-title">Slider Ekleme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <form method="POST" action="{{ route('slider.create.update') }}" enctype="multipart/form-data">
                @csrf
                <!-- Cross-Site Request Forgery (CSRF) koruması -->
                <input name="sli_id" id='sli_id' type="hidden" class="form-control form-control-default">
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
                                            <input name="resim" id="resim" type="file"
                                                class="form-control form-control-default" placeholder="Resim Ekle">
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
                                            <label for="" class="form-group mb-0"><b>Başlık</b></label>
                                            <input name="sli_baslik" id="sli_baslik" type="text"
                                                class="form-control form-control-default"
                                                placeholder="Slider adını yazınız.">
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-12 mt-2">
                                    <div class="form-group mb-0">
                                        <div class="input-container icon-left position-relative">
                                            <label for="" class="form-group mb-0"><b>Açıklama</b></label>
                                            <textarea name="sli_aciklama" id="sli_aciklama"
                                                class="form-control form-control-default"> </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2">
                                    <div class="form-group mb-0">
                                        <div class="input-container icon-left position-relative">
                                            <label for="" class="form-group mb-0"><b>Açıklama 2</b></label>
                                            <textarea name="sli_aciklama2" id="sli_aciklama2"
                                                class="form-control form-control-default"> </textarea>
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



                <h6 class="modal-title">Slider Silme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <form method="POST" action="{{ route('slider.delete') }}" enctype="multipart/form-data">
                @csrf
                <!-- Cross-Site Request Forgery (CSRF) koruması -->

                <input name="s_id" id='s_id' type="hidden" class="form-control form-control-default">
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
    $('#modalTitle').html('Slider Ekleme');
    $('#sli_baslik').val("");
    $('#sli_aciklama').val("");
    $('#sli_aciklama2').val("");
    $('#sli_id').val("");
    $('#ekleGüncelleModal').modal();
}

function guncelleModal(slider) {
    $("#modal-header-back").removeClass("bg-success").addClass("bg-warning");
    $('#logom').html("<img style='max-width: 178px;' src='/" + (slider.resim==""?"storage/img/resim-yok.png":slider.resim) + "' >");

    console.log(slider)
    $('#modalTitle').html('Slider Güncelleme');
    $('#sli_baslik').val(slider.sli_baslik);
    $('#sli_aciklama').val(slider.sli_aciklama);
    $('#sli_aciklama2').val(slider.sli_aciklama2);
    $('#sli_id').val(slider.sli_id);
    $('#ekleGüncelleModal').modal();
}

function silModal(slider) {
    $('#s_id').val(slider.sli_id);
    console.log(slider);
    $('#silModal').modal();
}
</script>
@endsection