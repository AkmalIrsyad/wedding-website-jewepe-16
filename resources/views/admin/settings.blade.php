@extends('layouts.skydash')

@section('contentadm')
    <div class="main-panel">
          <div class="content-wrapper">
            {{-- Pesan sukses --}}
          @if(session('success'))
           <div class="alert alert-success">
            {{ session('success') }}
           </div>
          @endif
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Settings Landing Page</h4>
                    <p class="card-description"> Form Setting Landing Page </p>
                    <form class="forms-sample" action="{{ url('/admin/settings') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                      <div class="form-group">
                        <label for="website_name">Website Name</label>
                        <input type="text" class="form-control" id="website_name" placeholder="Website Name" name="website_name" value="{{ old('website_name', $setting->website_name ?? '') }}">
                         @error('website_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="phone_number1">phone number</label>
                        <input type="number" class="form-control" id="phone_number1" placeholder="phone number 1" name="phone_number1" value="{{ old('phone_number1', $setting->phone_number1 ?? '') }}">
                         @error('phone_number1')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="phone_number2">phone number</label>
                        <input type="number" class="form-control" id="phone_number2" placeholder="phone number 2" name="phone_number2" value="{{ old('phone_number2', $setting->phone_number2 ?? '') }}">
                      @error('phone_number2')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="email1">Email address</label>
                        <input type="email" class="form-control" id="email1" placeholder="Email 1" name="email1" value="{{ old('email1', $setting->email1 ?? '') }}">
                        @error('email1')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="email2">Email address</label>
                        <input type="email" class="form-control" id="email2" placeholder="Email 2" name="email2" value="{{ old('email2', $setting->email2 ?? '') }}">
                     @error('email2')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" rows="4" name="address">{{ old('maps', $setting->maps ?? '') }}</textarea>
                     @error('address')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                       <div class="form-group">
                        <label for="facebook_url">Facebook URL</label>
                        <input type="text" class="form-control" id="facebook_url" placeholder="facebook URL" name="Facebook_url" value="{{ old('Facebook_url', $setting->Facebook_url ?? '') }}">
                     @error('Facebook_url')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="instagram_url">Instagram URL</label>
                        <input type="text" class="form-control" id="instagram_url" placeholder="instagram URL" name="Instagram_url" value="{{ old('Instagram_url', $setting->Instagram_url ?? '') }}">
                       @error('Instagram_url')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                       <div class="form-group">
                        <label for="youtube_url">Youtube URL</label>
                        <input type="text" class="form-control" id="youtube_url" placeholder="Youtube URL" name="Youtube_url" value="{{ old('Youtube_url', $setting->Youtube_url ?? '') }}">
                     @error('Youtube_url')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="maps">Google Maps Iframe</label>
                        <textarea name="maps" class="form-control" rows="4">{{ old('maps', $setting->maps ?? '') }}</textarea>
                         @error('maps')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        @if(!empty($setting->maps))
                        <div class="mt-2">{!! $setting->maps !!}</div>
                        @endif
                      </div>
                       <div class="form-group">
                        <label for="Header_bussines_hour">Header bussines hour</label>
                        <input type="text" class="form-control" id="Header_bussines_hour" placeholder="Header bussines hour" name="Header_bussines_hour" value="{{ old('Header_bussines_hour', $setting->Header_bussines_hour ?? '') }}">
                         @error('Header_bussines_hour')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Time_bussines_hour">Time bussines hour</label>
                        <input type="text" class="form-control" id="Time_bussines_hour" placeholder="Time bussines hour" name="Time_bussines_hour" value="{{ old('Time_bussines_hour', $setting->Time_bussines_hour ?? '') }}">
                         @error('Time_bussines_hour')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label>File upload Logo</label>
                        <input type="file" name="logo" class="form-control">
                         @error('logo')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                         @if(!empty($setting->logo))
                         <img src="{{ asset($setting->logo) }}" alt="Logo" height="80" class="mt-2">
                       @endif
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
@endsection
