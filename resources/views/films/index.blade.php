@extends('layouts.app')

<style>
    img {
        border: 1px solid #ddd; /* Gray border */
        border-radius: 4px;  /* Rounded border */
        padding: 5px; /* Some padding */
        width: 150px; /* Set a small width */
    }

    /* Add a hover effect (blue shadow) */
    img:hover {
        box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
    }

    .btn-info {
        color: #fff !important;
        background-color: #5bc0de;
        border-color: #46b8da;
    }

    p.genres{
        line-height: 1px;
        font-size: 13px;
        font-weight: bold;
        color: red;
        display: block;
    }
    p.description{
        display: block;
        padding-top: 14px;
    }
    .card-img-top {
        width: 100%;
        height: 26vw;
        object-fit: cover;
    }
</style>
 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('films.create') }}"> Create New Film</a>
            </div>
        </div>
        <div class="col-md-12">
            
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="">
                            <div class=""><h2>{{ __('Films Listing') }}</h2></div>
                        </div>
                    </div>
                </div>
   
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="row">
                    @if(!$films->isEmpty())
                        @foreach ($films as $film)
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">Release Date: <b>{{ $film->release_date }}</b></div>

                                <a class="" href="{{ route('films.show',$film->slug) }}">
                                    <div class="bg-image hover-zoom">
                                        {!! Html::image($film->photo, $film->name, array('class' => 'card-img-top w-100')) !!}
                                    </div>
                                </a>
                
                                <div class="card-body">
                                <h5 class="card-title">{{ $film->name }}</h5>
                                <div class="pull-right">
                                </div>
                                <p class="genres">{{ \Illuminate\Support\Str::limit($film->genres->pluck('genre')->implode(', '), 32, $end='...') }}</p>
                                <p class="card-text description">
                                {{ \Illuminate\Support\Str::limit($film->description, 32, $end='...') }}
                                </p>
                                <span class="pull-right">Ticket Price: <b>${{ $film->ticket_price }}</b></span>
                                <span class="pull-left">Rating: <b>{{ $film->rating }}</b></span>
                                </div>
                                <div class="card-footer text-muted"><a class="btn btn-outline-info btn-md btn-block" href="{{ route('films.show',$film->slug) }}">Visit</a></div>
                                {{-- <form action="{{ route('films.destroy',$film->id) }}" method="POST">
                    
                                    <a class="btn btn-info" href="{{ route('films.show',$film->slug) }}">Show</a>
                    
                                    <a class="btn btn-primary" href="{{ route('films.edit',$film->id) }}">Edit</a>
                
                                    @csrf
                                    @method('DELETE')
                    
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form> --}}
                            </div>
                        
                        </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center"><h2>No record found!</h2></div>
                    @endif
                </div>

                {!! $films->links() !!}
            
        </div>
    </div>
</div>

@endsection