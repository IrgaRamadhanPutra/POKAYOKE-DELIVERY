@extends('layouts.admin.app', ['title' => 'Dashboard'])
@section('judul')
    SCAN - TMMIN REGULER
@endsection(judul')
@section('content')
    <form id="form">
        @csrf
        <div class="form-outline mb-4 ">
            <label class="form-label" for="textAreaExample6"></label>
            <input type="text" class="form-control" id="input1" name="input1" placeholder="" value="" required="">
        </div>
        <div class="form-outline mb-4 ">
            <label class="form-label" for="textAreaExample6"></label>
            <input type="text" class="form-control" id="input2" name="input2" placeholder="" value=""
                required="">
        </div>

        <div class="form-group">
            <button type="button" class="btn btn-secondary" id="reset"
                data-dismiss="modal"style="float: left; font-size: 15px;" value="cancel">RESET</button>
        </div>
        <audio id="Audiosucces" src="{{ asset('audio\succes.mp3') }}"></audio>
        <audio id="Audioerror" src="{{ asset('audio\error.mp3') }}"></audio>
    </form>
    </div>
    @include('pokayoke.TOYOTA.SCAN-REGULER.ajax')
@endsection('content')
