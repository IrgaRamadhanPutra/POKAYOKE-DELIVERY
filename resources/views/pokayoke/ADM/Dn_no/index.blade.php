@extends('layouts.admin.app', ['title' => 'Dashboard'])
@section('judul')
    CHECK DN - ADM
@endsection(judul')
@section('content')
    <form id="form">
        @csrf
        <div class="form-outline mb-4 ">
            {{-- <textarea class="form-control" id="input1" rows="3"></textarea> --}}
            <label class="form-label" for="textAreaExample6"></label>
            <input type="text" class="form-control" id="input" name="input" placeholder="" value="" required="">
        </div>
        <input type="hidden" name="input2" id="input2">

        <div class="datatable datatable-default">
            <table class="table table-responsive text-sm">
                <table id="myTable" class="table table-bordered table-striped  table-hover">
                    <thead class="text-center">
                        <tr class="text-center table-hover">
                            {{-- <th>No.</th> --}}
                            <th style="width: 1%; font-size: 10px; background-color:rgb(135, 206, 250)" class="text-dark">
                                PART_NO</th>
                            <th style="display: none; width: 1%; font-size: 7px;" class="text-dark">QTY_DEL</th>
                            <th style="display: none; width: 1%; font-size: 7px;" class="text-dark">QTY_SCAN</th>
                            <th style="width: 1%; font-size: 10px;background-color: rgb(152, 251, 153)" class="text-dark">
                                BALANCE</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
        </div>
        </div>
        </table>
        <audio id="Audiosucces" src="{{ asset('audio\succes.mp3') }}"></audio>
        <audio id="Audioerror" src="{{ asset('audio\error.mp3') }}"></audio>
        </div>
    </form>

    </div>
    <!-- General JS Scripts -->
    </body>

    </html>
    @include('pokayoke.ADM.Dn_no.ajax')
@endsection('content')
