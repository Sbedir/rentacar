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
                        <h4 class="text-capitalize breadcrumb-title">Müşteriler</h4>
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
                                    <i class="la la-plus"></i> Müşteri Ekle</a>
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
                                                <th>Adı Soyadı</th>
                                                <th>Doğum Tarihi</th>
                                                <th>Cep Telefonu</th>
                                                <th>Uçuş Notları</th>
                                                <th>Eposta</th>
                                                <th>Özel Notlar</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($musteriVerileri as $musteri)
                                            <tr >
                                                <td>
                                                <div class="table-actions">
                                                        <a href="#" onClick='guncelleModal({{ json_encode($musteri) }})'>
                                                            <span data-feather="edit"></span>
                                                        </a>
                                                        <a href="#" onClick='silModal({{ json_encode($musteri) }})'>
                                                            <span data-feather="trash-2"></span>
                                                        </a>
                                                    
                                                    </div>
                                                </td>
                                               
                                                <td>{{$musteri->mus_adi," ",$musteri->mus_soyadi}}</td>
                                                <td>{{$musteri->d_tarih}}</td>
                                                <td>{{$musteri->cep_tel}}</td>
                                                <td>{{$musteri->ucus_notlari}}</td>
                                                <td>{{$musteri->e_posta}}</td>
                                                <td>{{$musteri->ozel_notlar}}</td>
                                                
                                            
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


                <h6 class="modal-title" id='modalTitle'>Müşteri Ekleme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <form method="POST" action="{{ route('musteri.create.update') }}" enctype="multipart/form-data">
                @csrf <!-- Cross-Site Request Forgery (CSRF) koruması -->
                <input name="musteri_id" id='musteri_id'  type="hidden" class="form-control form-control-default">
            <div class="modal-body">
                <div class="row">
                  
                <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Ad</b></label>
                                <input name="mus_adi" id='mus_adi' type="text" class="form-control form-control-default" placeholder="Adınızı giriniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Soyad</b></label>
                                <input name="mus_soyadi" id='mus_soyadi' type="text" class="form-control form-control-default" placeholder="Soyadınızı giriniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Doğum Tarihi</b></label>
                                <input name="d_tarih" id='d_tarih' type="date" class="form-control form-control-default" >
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Cep Telefonu</b></label>
                                <input name="cep_tel" id='cep_tel'  type="number" max="99999999999" class="form-control form-control-default" placeholder="Telefon numaranızı giriniz.">
                            </div>
                        </div>
                    </div>

                  

                    <div class="col-md-6 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Eposta</b></label>
                                <input name="e_posta" id='e_posta' type="eposta" class="form-control form-control-default" placeholder="Epostanızı giriniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Uçuş Notları</b></label>
                                <textarea  name="ucus_notlari" id='ucus_notlari'  class="form-control form-control-default" placeholder="Uçuş notunuzu giriniz.">   </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Özel Notlar</b></label>
                                <textarea  name="ozel_notlar" id='ozel_notlar'  class="form-control form-control-default" placeholder="Özel notunuzu giriniz.">   </textarea>
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



                <h6 class="modal-title">Müşteri Silme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <form method="POST" action="{{ route('musteri.delete') }}" enctype="multipart/form-data">
                @csrf <!-- Cross-Site Request Forgery (CSRF) koruması -->
              
                <input name="musterisil_id" id='musterisil_id'  type="hidden" class="form-control form-control-default">
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
        $('#modalTitle').html('Müşteri Ekleme');
        $('#mus_adi').val("");
        $('#mus_soyadi').val("");
        $('#d_tarih').val("");
        $('#cep_tel').val("");
        $('#e_posta').val("");
        $('#ucus_notlari').val("");
        $('#ozel_notlar').val("");
        $('#musteri_id').val("");
        $('#ekleGüncelleModal').modal();
    }
    function guncelleModal(musteri)
    {
        console.log(musteri)
        $( "#modal-header-back" ).removeClass( "bg-success" ).addClass( "bg-warning" );
        $('#modalTitle').html('Müşteri Güncelleme');
        $('#mus_adi').val(musteri.mus_adi);
        $('#mus_soyadi').val(musteri.mus_soyadi);
        $('#d_tarih').val(musteri.d_tarih);
        $('#cep_tel').val(musteri.cep_tel);
        $('#e_posta').val(musteri.e_posta);
        $('#ucus_notlari').val(musteri.ucus_notlari);
        $('#ozel_notlar').val(musteri.ozel_notlar);
        $('#musteri_id').val(musteri.mus_id);
        $('#ekleGüncelleModal').modal();
    }
    function silModal(musteri)
    {  $('#musterisil_id').val(musteri.mus_id);
        console.log(musteri);
        $('#silModal').modal();
    }

   

    

   

    
</script>
@endsection