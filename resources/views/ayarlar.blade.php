@extends('layout')
@section('icerik')
<div class="contents">


    <div class="atbd-page-content">
        <div class="container-fluid">
        <div class="card">
            <div class="card-header">



                <h6 class="card-title">Ayarlar</h6>
               
                    
            </div>  <form method="POST" action="{{ route('ayarlar.create.update') }}" enctype="multipart/form-data">
                @csrf <!-- Cross-Site Request Forgery (CSRF) koruması -->
                <input name="ayar_id" id='ayar_id'  type="hidden" class="form-control form-control-default">
              
            <div class="card-body">
                <div class="row">
                <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Adres</b></label>
                                <textarea name="adres" id="adres"  class="form-control form-control-default" >{{$ayarVerileri->adres}}</textarea>
                               
                            </div>
                        </div>
                    </div>


                <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Tel</b></label>
                               
                                <input name="tel" id="tel"  min="1000000000" max="9999999999" value="{{$ayarVerileri->tel}}" type="number" class="form-control form-control-default" placeholder="Telefon numasını giriniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Logo</b></label>
                               
                                <input name="logo" id="logo"   type="file" class="form-control form-control-default">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Eposta</b></label>
                                
                                <input name="e_posta" id="e_posta"  value="{{$ayarVerileri->e_posta}}"  type="text" class="form-control form-control-default" placeholder="Eposta adresini giriniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Harita</b></label>
                                <textarea name="maps" id="maps"  type="text" class="form-control form-control-default" >{{$ayarVerileri->maps}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Facebook</b></label>
                               
                                <input name="face" id="face"   type="text" value="{{$ayarVerileri->face}}" class="form-control form-control-default" placeholder="Facebook adresinizi giriniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Twitter</b></label>
                                
                                <input name="twitter" id="twitter"   type="text" value="{{$ayarVerileri->twitter}}" class="form-control form-control-default" placeholder="Twitter adresinizi giriniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Linkedin</b></label>
                                
                                <input name="linkedin"  id="linkedin"  type="text" value="{{$ayarVerileri->linkedin}}" class="form-control form-control-default" placeholder="Linkedin adresinizi giriniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Gmail</b></label>
                                
                                <input name="gmail" id="gmail"  type="text" value="{{$ayarVerileri->gmail}}" class="form-control form-control-default" placeholder="Gmail adresinizi giriniz.">
                            </div>
                        </div>
                    </div>

     
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" style="float: right;" class="btn btn-primary btn-sm">Kaydet</button>

            </div>
           </form>
        </div>
        </div>
    </div>


</div>




@endsection