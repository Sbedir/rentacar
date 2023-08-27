@extends('layout')
@section('icerik')
<div class="contents">


    <div class="atbd-page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Araç Fiyatları</h4>
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
                                    <i class="la la-plus"></i> Araç Fiyatı Ekle</a>
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
                                                <th>Araç</th>
                                                <th>Kira Başlama Günü</th>
                                                <th>Kira Bitiş Günü</th>
                                                <th>Fiyat</th>
                                                <th>Fiyat Para Birimi</th>
                                              
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
                                              
                                                <td>Dacia/Sandero/2016</td>
                                                <td>1</td>
                                                <td>3</td>
                                                <td>2000</td>
                                                <td>tl</td>
                                               
                                            
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
                                              
                                                <td>Dacia/Duster/2016</td>
                                                <td>4</td>
                                                <td>7</td>
                                                <td>1500</td>
                                                <td>tl</td>
                                               
                                            
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



                <h6 class="modal-title">Araç Fiyat Ekleme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <div class="modal-body">
                <div class="row">
               
                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Araç</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    <select name="arac_id" id="select-search" class="form-control " style="width: 100%;">
                                        <option  value="1">Dacia/Sandero/2016</option>
                                        <option value="2">Dacia/Duster/2016</option>
                                      
                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Kira Gün Başlama</b></label>
                                <input name="gun_baslangic" min="0" type="number" class="form-control form-control-default" placeholder="Başlama gün sayısını ekleyiniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Kira Gün Bitiş</b></label>
                                <input name="gun_bitis" min="0" type="number" class="form-control form-control-default" placeholder="Bitiş gün sayısını ekleyiniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Kira Fiyatı</b></label>
                                <input name="fiyat" min="0" type="number" class="form-control form-control-default" placeholder="Kira fiyatını ekleyiniz.">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Para Birimi</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    <select name="para_birim_id" id="select-search" class="form-control " style="width: 100%;">
                                        <option value="1">tl</option>
                                        <option value="2">dolar</option>
                                        <option value="3">euro</option>
                                      
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