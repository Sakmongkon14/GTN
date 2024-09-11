@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" class="text text-center">GTN</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/blog" class="btn btn-primary">ข้อมูลทั้งหมด</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
