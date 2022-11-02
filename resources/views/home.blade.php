@extends('layouts.app')
<<<<<<< HEAD

=======
  
>>>>>>> 3323f0a92ac42d4884427ecf0bb7e0653922c6af
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
<<<<<<< HEAD

=======
  
>>>>>>> 3323f0a92ac42d4884427ecf0bb7e0653922c6af
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<<<<<<< HEAD

                    {{ __('You are logged in!') }}
=======
  
                    You are a User.
>>>>>>> 3323f0a92ac42d4884427ecf0bb7e0653922c6af
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 3323f0a92ac42d4884427ecf0bb7e0653922c6af
