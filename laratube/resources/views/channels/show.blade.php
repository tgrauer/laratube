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
                    @if($channel->editable())
                        <form id="update_channel_form" action="{{route('channels.update', $channel->id)}}" method="POST" class="form" enctype="multipart/form-data">

                            @csrf

                            @method('PATCH')
                    @endif

                            <div class="form-group row justify-content-center">
                                
                                <div class="channel-avatar">

                                    @if($channel->editable())
                                        <div onclick="document.getElementById('image').click()" class="channel-avatar-overlay"><i class="fas fa-camera"></i></div>
                                    @endif

                                    <img src="{{env('APP_URL')}}{{ $channel->image() }}" alt="">
                                </div>
                            </div>

                            <div class="form-group">
                                <h4 class="text-center">{{$channel->name}}</h4>
                                <p class="text-center">{{$channel->description}}</p>
                            </div>

                            <div class="text-center">
                                <subscribe-button :subscriptions="{{ $channel->subscriptions}}" inline-template >
                                    <button @click="toggleSubscription"  class="btn btn-danger">Subscribe</button>

                                </subscribe-button>
                            </div>
                            
                            @if($channel->editable())
                                <input onchange="document.getElementById('update_channel_form').submit()" style="display: none;" type="file" name="image" id="image">                        

                                <div class="form-group">
                                    <label for="name" class="form-control-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$channel->name}}">
                                </div>

                                <div class="form-group">
                                    <label for="description" class="form-control-label">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{$channel->description}}</textarea>
                                </div>
                                
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </div>
                                @endif

                                <button class="btn btn-info" type="submit">Update Channel</button>
                            @endif
                    @if($channel->editable())
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
