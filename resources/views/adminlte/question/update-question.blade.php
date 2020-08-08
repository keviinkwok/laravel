@extends('adminlte.master')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <strong>Update Question</strong>
                </div>
                <div class="float-right">
                    <a href="{{ url('question') }}"
                        class="btn btn-danger btn-sm">
                        Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="{{ url('question/'.$question->id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label>Question ID</label>
                                <input type="text" name="id" class="form-control @error('id') 
                                 is-invalid @enderror" value="{{ $question->id }}" readonly>

                                @error('id')
                                    <div class="invalid-feedback"> {{$message}} </div>
                                @enderror
                                
                            </div>

                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control @error('judul') 
                                 is-invalid @enderror" value="{{ old('judul',$question->judul) }}" autofocus autocomplete="off">

                                @error('judul')
                                    <div class="invalid-feedback"> {{$message}} </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Isi</label>
                                <textarea name="isi" class="form-control @error('isi')
                                 is-invalid @enderror" autocomplete="off"> {{ old('isi',$question->isi) }} </textarea>

                                @error('isi')
                                    <div class="invalid-feedback"> {{$message}} </div>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div><!-- .content -->
@endsection