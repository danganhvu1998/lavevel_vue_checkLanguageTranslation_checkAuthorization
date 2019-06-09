@extends('layouts.app')

@section('content')
    <user-login v-on:save-user="saveUser"></user-login>
    <hr><hr><hr>
    <user-register v-on:save-user="saveUser"></user-register>
@endsection
