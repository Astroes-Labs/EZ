@extends('layouts.dashboard')
@section('title', 'Dashboard | ' . config('app.name'))

@section('content')
@include('livewire.dashboard.partials.index')

@endsection
