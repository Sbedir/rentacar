@extends('layout')
@section('icerik')
<div class="contents">


    <div class="atbd-page-content">
        <div class="container-fluid">
        <div class="card">
            <div class="card-header">



                <h6 class="card-title">Ayarlar</h6>
               
                    
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Adres</b></label>
                                <textarea name="adres"   class="form-control form-control-default" ></textarea>
                               
                            </div>
                        </div>
                    </div>


                <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Tel</b></label>
                               
                                <input name="tel" min="1000000000" max="9999999999" type="number" class="form-control form-control-default" placeholder="Telefon numasını giriniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Logo</b></label>
                               
                                <input name="logo"  type="file" class="form-control form-control-default">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Eposta</b></label>
                                
                                <input name="e_posta"  type="text" class="form-control form-control-default" placeholder="Eposta adresini giriniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Harita</b></label>
                                <textarea name="mabs"  type="text" class="form-control form-control-default" ></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Facebook</b></label>
                               
                                <input name="face"  type="text" class="form-control form-control-default" placeholder="Facebook adresinizi giriniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Twitter</b></label>
                                
                                <input name="twitter"  type="text" class="form-control form-control-default" placeholder="Twitter adresinizi giriniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Linkedin</b></label>
                                
                                <input name="linkedin"  type="text" class="form-control form-control-default" placeholder="Linkedin adresinizi giriniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Gmail</b></label>
                                
                                <input name="gmail"  type="text" class="form-control form-control-default" placeholder="Gmail adresinizi giriniz.">
                            </div>
                        </div>
                    </div>

     
                </div>
            </div>
            <div class="card-footer">
                <button type="button" style="float: right;" class="btn btn-primary btn-sm">Kaydet</button>

            </div>
        </div>
        </div>
    </div>


</div>


@endsection