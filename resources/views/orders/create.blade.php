@extends('layouts.app')

@section('content')
<div class="w-full m-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-body">
                    @livewire('products')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
