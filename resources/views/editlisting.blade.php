@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard <a href="/dashboard" class="float-right btn btn-default btn-xs">Go Back</a></div>

                <div class="card-body">
                    <h3>Edit Listing</h3>
                    {!!Form::open(['action' => ['ListingsController@update',$listing->id],'method' => 'POST'])!!}
                        {{Form::bsText('name',$listing->name,['placeholder' => 'Company Name'])}}
                        {{Form::bsText('website',$listing->website,['placeholder' => 'Company Website'])}}
                        {{Form::bsText('email',$listing->email,['placeholder' => 'Contact Email'])}}
                        {{Form::bsText('phone',$listing->phone,['placeholder' => 'Contact Phone'])}}
                        {{Form::bsText('address',$listing->address,['placeholder' => 'Business Address'])}}
                        {{Form::bsTextArea('bio',$listing->bio,['placeholder' => 'About This Business'])}}
                        {{Form::hidden('_method','PATCH')}}
                        {{Form::bsSubmit('submit')}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
