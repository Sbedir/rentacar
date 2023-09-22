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
                        <h4 class="text-capitalize breadcrumb-title">Sayfalar</h4>
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
                                    <i class="la la-plus"></i> Sayfa Ekle</a>
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
                                                <th>Sayfa Başlığı</th>
                                                <th>İçerik</th>
                                                <th>(seo)Kısa Açıklama</th>
                                                <th>(seo)Anahtar Kelimeler</th>
                                                <th>(seo)Başlık</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($sayfaVerileri as $sayfa)
                                            <tr >
                                                <td>
                                                <div class="table-actions">
                                                        <a href="#" onClick='guncelleModal({{ json_encode($sayfa) }})'>
                                                            <span data-feather="edit"></span>
                                                        </a>
                                                        <a href="#" onClick='silModal({{ json_encode($sayfa) }})'>
                                                            <span data-feather="trash-2"></span>
                                                        </a>
                                                    
                                                    </div>
                                                </td>
                                             
                                                <td>{{$sayfa->sayfa_baslik}}</td>
                                                <td>{{$sayfa->icerik}}</td>
                                                <td>{{$sayfa->description}}</td>
                                                <td>{{$sayfa->keywords}}</td>
                                                <td>{{$sayfa->title}}</td>
                                            @endforeach
                                            
                                            </tr>

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


                <h6 class="modal-title">Sayfa Ekleme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>

            <form method="POST" action="{{ route('sayfa.create.update') }}" enctype="multipart/form-data">
                @csrf <!-- Cross-Site Request Forgery (CSRF) koruması -->
                <input name="sayfa_id" id='sayfa_id'  type="hidden" class="form-control form-control-default">
            <div class="modal-body">
                <div class="row">
                   

                <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Sayfa Adı</b></label>
                                <input name="sayfa_baslik" id="sayfa_baslik" type="text" class="form-control form-control-default" placeholder="Sayfa adını yazınız.">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>(seo)Anahtar Kelimeler</b></label>
                                <input name="keywords" id="keywords" type="text" class="form-control form-control-default" placeholder="Sayfa adını yazınız.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>(seo)Başlık</b></label>
                                <input name="title" id="title" type="text" class="form-control form-control-default" placeholder="Sayfa adını yazınız.">
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-md-6 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>İçerik</b></label>
                                <textarea name="icerik" id="icerik" class="form-control form-control-default"> </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>(seo)Kısa Açıklama</b></label>
                                <textarea name="description" id="description" class="form-control form-control-default"> </textarea>
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



                <h6 class="modal-title">Sayfa Silme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <form method="POST" action="{{ route('sayfa.delete') }}" enctype="multipart/form-data">
                @csrf <!-- Cross-Site Request Forgery (CSRF) koruması -->
              
                <input name="s_id" id='s_id'  type="hidden" class="form-control form-control-default">
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
        tinymce.init({
        selector: 'textarea', // Bu tüm textarea elementlerine TinyMCE uygular
        plugins: 'autolink lists link image',
        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        menubar: false
    });

        $( "#modal-header-back" ).removeClass( "bg-warning" ).addClass("bg-success");
        $('#modalTitle').html('Sayfa Ekleme');
        $('#sayfa_baslik').val("");
        $('#icerik').val("");
        $('#description').val("");
        $('#keywords').val("");
        $('#title').val("");
        $('#sayfa_id').val("");
        $('#ekleGüncelleModal').modal();
    }
    function guncelleModal(sayfa)
    {
        tinymce.init({
        selector: 'textarea', // Bu tüm textarea elementlerine TinyMCE uygular
        plugins: 'autolink lists link image',
        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        menubar: false
    });
        console.log(sayfa)
        $( "#modal-header-back" ).removeClass( "bg-success" ).addClass( "bg-warning" );
        $('#modalTitle').html('Sayfa Güncelleme');
        $('#sayfa_baslik').val(sayfa.sayfa_baslik);
        $('#icerik').val(sayfa.icerik);
        $('#description').val(sayfa.description);
        $('#keywords').val(sayfa.keywords);
        $('#title').val(sayfa.title);
        $('#sayfa_id').val(sayfa.sayfa_id);
        $('#ekleGüncelleModal').modal();
    }
    function silModal(sayfa)
    { $('#s_id').val(sayfa.sayfa_id);
        console.log(sayfa);
        $('#silModal').modal();
    }

   

    

   

    
</script>
@endsection