@extends('layout')
@section('icerik')
<div class="contents">


    <div class="atbd-page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Kiralanan Araçlar</h4>
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
                                    <i class="la la-plus"></i>Kiralanacak Araç Ekle</a>
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
                                                <th>Marka</th>
                                                <th>Model</th>
                                                <th>Üretim Yılı</th>
                                                <th>Alış Yeri</th>
                                                <th>Dönüş Yeri</th>
                                                <th>Alış Tarihi</th>
                                                <th>Dönüş Tarihi</th>
                                                <th>Kiralanan Fiyatı</th>
                                                <th>Fiyat Birimi</th>
                                                <th>Toplam Tutar</th>
                                                <th>Navigasyon</th>
                                                <th>Şoför Hizmeti</th>
                                                <th>Bebek Koltuğu</th>
                                                <th>Yol Haritası</th>
                                                <th>Müşteri Adı Soyadı</th>

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
                                                <td>
                                                    <a href="#" class="profile-image rounded-circle d-block m-0 wh-32" style="background-image:url {{ asset('img/tm6.png') }}; background-size: cover;"></a>
                                                            
                                                </td>
                                                <td>Dacia</td>
                                                <td>Sandero</td>
                                                <td>2016</td>
                                                <td>üçyol</td>
                                                <td>buca</td>
                                                <td>21.08.2023</td>
                                                <td>22.08.2023</td>
                                                <td>500</td>
                                                <td>tl</td>
                                                <td>1000 tl</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>Sinan Bedir</td>

                                            
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



                <h6 class="modal-title">Araç Ekleme</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span data-feather="x"></span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Kiralanacak Müşteri</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    <select name="musteri_id" id="musteri_id" class="form-control " style="width: 100%;">
                                        <option value="1">müşteri1</option>
                                        <option value="2">müşteri2</option>
                                        <option value="3">müşteri3</option>
                                        <option value="4">müşteri4</option>
                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>

                
                <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Alış Yeri</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    <select name="alis_yeri_id" id="alis_yeri_id" class="form-control " style="width: 100%;">
                                        <option value="1">üçyol</option>
                                        <option value="2">buca</option>
                                        <option value="3">basmane</option>
                                        <option value="4">balçova</option>
                                        <option value="5">urla</option>
                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Araçlar</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    <select name="arac_id " id="arac_id" class="form-control " style="width: 100%;">
                                        <option value="1">Dacia-sandero-stepway-2016</option>
                                        <option value="2">Renault-clio-2012</option>
                                        <option value="3">Ford-focus-2015</option>
                                        <option value="4">Nissan-amarok-2015</option>
                                        <option value="5">Tofaş-şahin-1989</option>
                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Para Birimi</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    <select name="para_birim_id" id="para_birim_id" class="form-control " style="width: 100%;">
                                        <option value="1">tl</option>
                                        <option value="2">euro</option>
                                        <option value="3">dolar</option>
                                        <option value="4">sterlin</option>
                                      
                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Dönüş Yeri</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    <select name="donus_yeri_id" id="donus_yeri_id" class="form-control " style="width: 100%;">
                                        <option value="1">üçyol</option>
                                        <option value="2">buca</option>
                                        <option value="3">basmane</option>
                                        <option value="4">balçova</option>
                                        <option value="5">urla</option>
                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Alış Tarihi</b></label>
                            <div class="atbd-select-list d-flex">
                                        <input name="alis_tarihi" id="alis_tarihi"  type="date" class="form-control form-control-default" >
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Dönüş Tarihi</b></label>
                            <div class="atbd-select-list d-flex">
                                        <input name="donus_tarihi" id="donus_tarihi"  type="date" class="form-control form-control-default" >
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Kiralanan Fiyat</b></label>
                            <div class="atbd-select-list d-flex">
                                        <input name="kiralanan_fiyat" id="kiralanan_fiyat"  type="text" class="form-control form-control-default" disapled>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Navigasyon Eklensin Mi?(fiyat=20tl)</b></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input col-sm-12" type="checkbox" id="navigasyon" name="navigasyon" checked="">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Şoför Hizmeti Eklensin Mi?(günlük fiyat = 100tl)</b></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input col-sm-12" type="checkbox" id="sofor_hizmeti" name="sofor_hizmeti" checked="">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Bebek Koltuğu Eklensin Mi?(fiyat=20tl)</b></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input col-sm-12" type="checkbox" id="bebek_koltugu" name="bebek_koltugu" checked="">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Yol Haritası Eklensin Mi?(fiyat=20tl)</b></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input col-sm-12" type="checkbox" id="yol_haritasi" name="yol_haritasi" checked="">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Toplam Tutar</b></label>
                            <div class="atbd-select-list d-flex">
                                        <input name="toplam_tutar" id="toplam_tutar"  type="text" class="form-control form-control-default" disabled>
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