@extends('layouts.app')
  
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('films.index') }}"> Back</a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="">
                            <div class="card-header">{{ __('Add New Film') }}</div>
                        </div>
                    </div>
                </div>
   
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="card-body">
                    <form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Country:</strong>
                                    <select id="country" name="country" class="form-control">
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>rating:</strong>
                                    <select class="form-control" name="rating">
                                        <option value="1" {{ (old("rating") == 1 ? "selected":"") }}>1</option>
                                        <option value="2" {{ (old("rating") == 2 ? "selected":"") }}>2</option>
                                        <option value="3" {{ (old("rating") == 3 ? "selected":"") }}>3</option>
                                        <option value="4" {{ (old("rating") == 4 ? "selected":"") }}>4</option>
                                        <option value="4" {{ (old("rating") == 5 ? "selected":"") }}>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Ticket Price:</strong>
                                    <input type="text" name="ticket_price" class="form-control" placeholder="95" value="{{ old('ticket_price') }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Release Date:</strong>
                                    <div class='input-group date' id='datepicker'>
                                    <input name="release_date" type='text' class="form-control" value="{{ old('release_date') }}" />
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            @if($genres)
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Select Genres(you can choose multiple generes):</strong>
                                        <select name="genres[]" multiple="multiple">
                                            @foreach ($genres as $genre)
                                                <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Description:</strong>
                                    <textarea class="form-control" style="height:150px" name="description" placeholder="Detail">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Image:</strong>
                                    <input type="file" name="photo" id="">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8"><br />
                                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                        {{-- <div class="pull-right"> --}}
                                            <a class="btn btn-lg btn-danger" href="{{ route('films.index') }}"> Cancel</a>
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#datepicker').datepicker({  
       format: 'yyyy-mm-dd'
     });  
</script> 
@endsection


