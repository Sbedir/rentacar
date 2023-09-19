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
        <div class="card">
            <div class="card-header">



                <h6 class="card-title">Profil Güncelle</h6>
               
                    
            </div>  <form method="POST" action="{{ route('user.create.update') }}" enctype="multipart/form-data">
                @csrf <!-- Cross-Site Request Forgery (CSRF) koruması -->
                <input name="id" id='id'  type="hidden" class="form-control form-control-default">
              
            <div class="card-body">
                <div class="row">


                   <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Ad Soyad</b></label>
                               
                                <input name="ad_soyad" id="ad_soyad"   value="{{$UserVerileri->ad_soyad}}" type="text" class="form-control form-control-default" placeholder="Adınızı ve soyadınızı giriniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Kullanıcı Adı</b></label>
                               
                                <input name="kullanici_adi" id="kullanici_adi"   type="text" value="{{$UserVerileri->kullanici_adi}}" class="form-control form-control-default" placeholder="Kullanıcı adınızı giriniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Eposta</b></label>
                                
                                <input name="e_posta" id="e_posta"  value="{{$UserVerileri->e_posta}}"  type="email" class="form-control form-control-default" placeholder="Eposta adresini giriniz.">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <label for=""  class="form-group mb-0"><b>Şifre</b></label>
                                <input name="sifre" id="sifre"  type="password" class="form-control form-control-default" placeholder="........">
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