@extends('layout')
@section('icerik')
<div class="contents">


    <div class="atbd-page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Araçlar</h4>
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
                                    <i class="la la-plus"></i> Araç Ekle</a>
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
                                                <th>Araç Müsaitlik Durumu</th>
                                                <th>Kiralık Durum</th>
                                                <th>Yolcu Kapasitesi</th>
                                                <th>Bagaj Kapasitesi</th>
                                                <th>Yakıt Türü</th>
                                                <th>Vites Türü</th>
                                                <th>Araç Kategorisi</th>
                                                <th>Klima Türü</th>
                                                <th>Bulunduğu Ofis</th>
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
                                                <td>Müsait</td>
                                                <td>Uygun</td>
                                                <td>5</td>
                                                <td>200kg</td>
                                                <td>Dizel</td>
                                                <td>Manuel</td>
                                                <td>Ekonomik</td>
                                                <td>Otamatik</td>
                                                <td>İzmir-Merkez Ofis</td>
                                            
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
                            <div class="input-container icon-left position-relative">
                                <label for="" class="form-group mb-0"><b>Resim Ekle</b></label>
                                <input name="a_resim" type="file" class="form-control form-control-default" placeholder="Resim Ekle">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Marka</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    <select name="mr_id" id="select-search" class="form-control " style="width: 100%;">
                                        <option value="1">Dacia</option>
                                        <option value="2">Renault</option>
                                        <option value="3">Ford</option>
                                        <option value="4">Nissan</option>
                                        <option value="5">Tofaş</option>
                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Model</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    <select name="m_id" id="select-search" class="form-control " style="width: 100%;">
                                        <option value="1">Sandero</option>
                                        <option value="2">Clio</option>
                                        <option value="3">Fiesta</option>
                                        <option value="4">Qasqai</option>
                                        <option value="5">Murat 135</option>
                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <label for="" class="form-group mb-0"><b>Üretim Yılı</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    
                                    <select name="uretim_yili" id="select-search" class="form-control " style="width: 100%;">
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2009">2009</option>
                                        <option value="2007">2007</option>
                                        <option value="1978">1978</option>
                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Araç Kategorisi</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    <select name="a_kategori" id="select-search" class="form-control " style="width: 100%;">
                                        <option value="1">Ekonomik</option>
                                        <option value="2">Orta Sınıf</option>
                                        <option value="3">Üst Sınıf</option>
                                        <option value="4">Vip</option>
                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Klima Türü</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    <select name="klima_tur" id="select-search" class="form-control " style="width: 100%;">
                                        <option value="1">Otamatik</option>
                                        <option value="2">Manuel</option>
                                        
                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Yakıt Türü</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    <select name="yakit_tur" id="select-search" class="form-control " style="width: 100%;">
                                        <option value="1">Benzin</option>
                                        <option value="2">Lpg</option>
                                        <option value="3">Benzin/Lpg</option>
                                        <option value="4">Dizel</option>
                                        <option value="5">Elektrik</option>
                                        <option value="6">Hybrid</option>
                                        
                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Vites Türü</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    <select name="vites_tur" id="select-search" class="form-control " style="width: 100%;">
                                        <option value="1">Manuel</option>
                                        <option value="2">Yarı Otamatik</option>
                                        <option value="3">Otamatik</option>
                                        <option value="4">Triptonik</option>

                                        
                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Şehirler</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    <select name="" id="select-search" class="form-control " style="width: 100%;">
                                        <option value="1">İzmir</option>
                                        <option value="2">Denizli</option>
                                        <option value="3">Ankara</option>
                                        <option value="4">İstanbul</option>

                                        
                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Ofis</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    <select name="ofis_id" id="select-search" class="form-control " style="width: 100%;">
                                        <option value="1">Merkez</option>
                                        <option value="2">Konak</option>
                                        <option value="3">Balçova</option>
                                        <option value="4">Üçyol</option>

                                        
                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            
                            <label for="" class="form-group mb-0"><b>Müsaitlik Durumu</b></label>
                            <div class="atbd-select-list d-flex">
                                <div class="atbd-select " style="width: 100%;">
                                    <select name="a_musait" id="select-search" class="form-control " style="width: 100%;">
                                        <option value="1">Müsait</option>
                                        <option value="2">Müsait Değil</option>

                                        
                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Yolcu Kapasitesi</b></label>
                                <input name="yolcu_kapasite" min="2" type="number" class="form-control form-control-default" placeholder="Yolcu kapasitesini minimum 2 olacak Şekilde ekleyiniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Bagaj Kapasitesi</b></label>
                                <input name="bagaj_kapasitesi" min="0" type="number" class="form-control form-control-default" placeholder="Bagaj kapasitesini kg cinsinden yazınız.">
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