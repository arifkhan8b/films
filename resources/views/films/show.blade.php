@extends('layouts.app')
  
@section('content')

<style>
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
        height: 30vw;
        object-fit: cover;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('films.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Released: <b>{{ $film->release_date }}</b></span>
                    <span class="pull-right">Country: <b>{{ $film->country }}</b></span>
                </div>

                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    {!! Html::image($film->photo, $film->name, array('class' => 'card-img-top')) !!}
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">{{ $film->name }}</h5>
                  <div class="pull-right">
                  </div>
                  <p class="genres">{{ $film->genres->pluck('genre')->implode(', ') }}</p>
                  <p class="card-text description">
                  {{ \Illuminate\Support\Str::limit($film->description, 200, $end='...') }}
                  </p>
                  <span class="pull-right">Ticket Price: <b>${{ $film->ticket_price }}</b></span>
                  <span class="pull-left">Rating: <b>{{ $film->rating }}</b></span>
                </div>
            </div>

            <div class="card">
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
                  {{-- <h5 class="card-title">Display Comments</h5> --}}
                  <p class="card-text">
                    @include('films.comments', ['comments' => $film->comments, 'film_id' => $film->id])
                  </p>
                  
                  <h4>Add comment</h4>
                  <form method="post" action="{{ route('comments.store') }}">
                      @csrf
                      <div class="form-group">
                          <input class="form-control" type="text" name="name" placeholder="name">
                      </div>
                      <div class="form-group">
                          <textarea class="form-control" name="comments"></textarea>
                          <input type="hidden" name="film_id" value="{{ $film->id }}" />
                      </div>
                      <div class="form-group">
                          <input type="submit" class="btn btn-success" value="Add Comment" />
                      </div>
                  </form>
                </div>
              </div>
        </div>
    </div>
</div>
   
 
@endsection