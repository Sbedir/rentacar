@extends('layout')
@section('icerik')
<div class="contents">


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

                                            <tr >
                                                <td>
                                                    <div class="table-actions">
                                                        <a href="#">
                                                            <span data-feather="edit"></span>
                                                        </a>
                                                        <a href="#">
                                                            <span data-feather="trash-2"></span>
                                                        </a>
                                                    </div>
                                                </td>
                                               
                                                <td>İzmir/Buca</td>
                                                <td>İzmir/Konak</td>
                                                <td>7km</td>
                                                <td>1</td>
                                                <td>3</td>
                                                <td>500</td>
                                                <td>Tl</td>
                                            
                                            </tr>
                                            <tr >
                                                <td>
                                                    <div class="table-actions">
                                                        <a href="#">
                                                            <span data-feather="edit"></span>
                                                        </a>
                                                        <a href="#">
                                                            <span data-feather="trash-2"></span>
                                                        </a>
                                                    </div>
                                                </td>
                                               
                                                <td>İzmir/Buca</td>
                                                <td>İzmir/Konak</td>
                                                <td>7km</td>
                                                <td>4</td>
                                                <td>7</td>
                                                <td>1000</td>
                                                <td>Tl</td>
                                            
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
            <div class="modal-header">



                <h6 class="modal-title">Transfer Ücreti Ekleme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Alış İl</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    <select name="alis_il" id="select-search" class="form-control " style="width: 100%;">
                                        <option value="1">izmir</option>
                                        <option value="2">Denizli</option>
                                        
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
                                    <select name="alis_yeri" id="select-search" class="form-control " style="width: 100%;">
                                        <option value="1">Buca</option>
                                        <option value="2">Konak</option>
                                        
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
                                    <select name="dönüs_il" id="select-search" class="form-control " style="width: 100%;">
                                        <option value="1">izmir</option>
                                        <option value="2">Denizli</option>
                                        
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
                                    <select name="dönüs_yeri" id="select-search" class="form-control " style="width: 100%;">
                                        <option value="1">Buca</option>
                                        <option value="2">Konak</option>
                                        
                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Mesafe</b></label>
                                <input name="mesafe" min="0" type="number" class="form-control form-control-default" placeholder="Mesafeyi km cinsinden yazınız.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Kişi Başlangıç</b></label>
                                <input name="kisi_baslangic" min="0" type="number" class="form-control form-control-default" placeholder="Min kişi sayısı yazınız.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Kişi Bitiş</b></label>
                                <input name="kisi_bitis" min="0" type="number" class="form-control form-control-default" placeholder="Max kişi sayısı yazınız.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Fiyat</b></label>
                                <input name="fiyat" min="0" type="number" class="form-control form-control-default" placeholder=" Fiyat tutarını giriniz.">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Para Birimi</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    <select name="m_id" id="select-search" class="form-control " style="width: 100%;">
                                        <option value="1">Tl</option>
                                        <option value="2">Dolar</option>
                                        <option value="3">Sterlin</option>
                                     
                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm">Kaydet</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>


</div>
@endsection