@extends('admin.layouts.app')
@section('title', trans('local.admins'))
@section('content')
<div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">{{ trans('local.admins') }}</h2>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('local.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('administrators.index')}}">{{ trans('local.admins') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('local.admins') }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-b-12">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="fname" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" id="email-id-vertical" class="form-control" name="email-id" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="contact-info-vertical">Mobile</label>
                                            <input type="number" id="contact-info-vertical" class="form-control" name="contact" placeholder="Mobile">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password-vertical">Password</label>
                                            <input type="password" id="password-vertical" class="form-control" name="contact" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <fieldset class="checkbox">
                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                <input type="checkbox">
                                                <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                </span>
                                                <span class="">Remember me</span>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                        <button type="button" class="btn btn-outline-warning mr-1 mb-1" onclick="location.href='{{route('administrators.index')}}';">
                                            {{ trans('local.back') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
