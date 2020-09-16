@extends('layouts.admin')

@section('title')
    <title>Settings</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'Settings','key'=>'Edit'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action = "{{ route('settings.update', ['id' => $setting->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Config Key</label>
                                <input type="text"
                                       class="form-control"
                                       name="config_key"
                                       value="{{ $setting->config_key }}">
                            </div>

                            @if(request()->type === 'Text')
                                <div class="form-group">
                                    <label>Config Value</label>
                                    <input type="text"
                                           class="form-control"
                                           name="config_value"
                                           value="{{ $setting->config_value }}">
                                </div>
                            @elseif(request()->type === 'Textarea')
                                <div class="form-group">
                                    <label>Config Value</label>
                                    <textarea rows="5"
                                              class="form-control"
                                              name="config_value">{{ $setting->config_value }}</textarea>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
