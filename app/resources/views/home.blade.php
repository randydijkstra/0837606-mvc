@extends('base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default panel-post">
                {{-- <div class="panel-heading">Dashboard</div> --}}

                {{-- <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p style="color: hotpink;">You are logged in!</p>

                </div> --}}

                <p style="color: hotpink;">You are logged in!</p>

            </div>
        </div>
    </div>
</div>
@endsection
