@extends('general-layout')
@section('title','Corexc')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
@endpush
@section('body')
<div class="buttons w-50 m-auto vh-100">
    <a href="show/repos"><button type="button" class="btn btn-primary w-75 m-5 py-3">Git Repos</button></a>
    <a href="posts/all"><button type="button" class="btn btn-secondary w-75 m-5 py-3">Deal With Database</button></a>
</div>
@endsection