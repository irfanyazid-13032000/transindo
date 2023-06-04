@extends('layouts.app')

@section('title', 'Tambah Data User')

@section('content')
<div>
    {!! $genderChart->container() !!}
    {!! $genderChart->script() !!}
</div>

<div>
    {!! $educationLevelChart->container() !!}
    {!! $educationLevelChart->script() !!}
</div>
@endsectionx