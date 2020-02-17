@extends('layouts.master')
@section('sheets')
    @parent
    <link rel="stylesheet" href="/assets/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/assets/plugins/jquery-minicolors/jquery.minicolors.css">
    <link rel="stylesheet" href="/assets/plugins/datedropper/datedropper.min.css">
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.alert.response')
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Log a Ticket</h4>
                        </div>
                        <div class="content">
                            <form action="{{route('store.log')}}" method="post" class="forms-sample">

                                <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                                <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Select Department</label>
                                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                                <option selected disabled value="">-- Select Department--</option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                                @error('category_id')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control map-input @error('address_address') is-invalid @enderror" id="address-input" name="address_address" id="exampleInputPassword4"  placeholder="address">
                                            @error('address_address')
                                            <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="hidden" id="address-map-container" style="width:100%;height:400px; ">
                                            <div style="width: 100%; height: 100%" id="address-map"></div>
                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Comment</label>
                                            <textarea rows="5" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Here can be your description" ></textarea>
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    @parent
    <script src="/assets/plugins/datedropper/datedropper.min.js"></script>
    <script src="/assets/js/form-picker.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYA-M8i6uWAA4w4KiDsPfD6xgqVXMbqw8&libraries=places&callback=initialize" async defer></script>
    <script src="/js/mapInput.js"></script>

@endsection