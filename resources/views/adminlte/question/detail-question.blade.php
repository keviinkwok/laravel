@extends('adminlte/master')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <strong>Question Details</strong>
                        </div>
                        <div class="float-right">
                            <a href="{{ url('question') }}" class="btn btn-danger btn-sm">
                                Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <h1>{{ $question->judul }}</h1>
                        <p>{{ $question->isi }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
