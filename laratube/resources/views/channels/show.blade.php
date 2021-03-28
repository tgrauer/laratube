@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{$channel->name}}
                </div>

                <div class="card-body">
                    <form id="update_channel_form" action="{{route('channels.update', $channel->id)}}" method="POST" class="form" enctype="multipart/form-data">

                        @csrf

                        @method('PATCH')

                        <div class="form-group row justify-content-center">
                            <div class="channel-avatar">
                                <div onclick="document.getElementById('image').click()" class="channel-avatar-overlay"><i class="fas fa-camera"></i></div>
                            </div>
                        </div>
                        
                        <input onchange="document.getElementById('update_channel_form').submit()" style="display: none;" type="file" name="image" id="image">                        

                        <div class="form-group">
                            <label for="name" class="form-control-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$channel->name}}">
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-control-label">Description</label>
                            <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{$channel->description}}</textarea>
                        </div>
                        
                        <button class="btn btn-info" type="submit">Update Channel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
