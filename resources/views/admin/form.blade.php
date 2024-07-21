@extends('layout.header')
@section('title', 'Form Dashboard')
@section('content')
@if (session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">USER SECTION</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        USER FORM
                    </div>
                    <div class="panel-body">
                        <form role="form" action="{{route('admin.updateUser')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Enter Name</label>
                                <input class="form-control" id="name" name="name" type="text" value="{{$userInfo->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Enter Surname</label>
                                <input class="form-control" id="surname" name="surname" type="text" value="{{$userInfo->surname}}" />
                            </div>
                            <div class="form-group">
                                <label>Enter Email</label>
                                <input class="form-control" id="email" name="email" type="email" value="{{$userInfo->email}}" />
                            </div>
                            <div class="form-group">
                                <label>Enter Age</label>
                                <input class="form-control" id="age" name="age" type="number" value="{{$userInfo->age}}" />
                            </div>
                            <div class="form-group">
                                <select name="gender" class="form-control">
                                    <option value="" selected disabled>Select Gender</option>
                                    @foreach($genders as $gender)
                                        <option value="{{$gender}}" {{$userInfo->gender == $gender ? 'selected' : ''}}>{{$gender}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="language" class="form-control">
                                    <option value="" selected disabled>Select Language</option>
                                    @foreach($languages as $language)
                                    <option value="{{$language}}" {{$userInfo->languages == $language ? 'selected' : ''}} >{{$language}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Enter Phone</label>
                                <input class="form-control" id="phone" name="phone" type="number" value="{{$userInfo->phone}}" />
                            </div>
                            <div class="form-group">
                                <label>Enter Address</label>
                                <input class="form-control" id="addres" name="addres" type="text" value="{{$userInfo->addres}}" />
                            </div>
                            <button type="submit" class="btn btn-info">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">POST SECTION</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        POST FORM
                    </div>
                    <div class="panel-body">
                        <form enctype="multipart/form-data" action="{{route('admin.createPost')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Choose File</label>
                                <input class="form-control" id="image" name="image" type="file" value="" />
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Provide Link</label>
                                <input class="form-control" id="links" name="links" type="text" value="" />
                                @error('links')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" id="name" name="name" type="text" value="" />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if(count($userInfo->posts) > 0)
            <div class="col-md-12 post_update_section_click">
                <h4 class="header-line">UPDATE POST SECTION</h4>
            </div>
        @endif
        <div class="post_update_section hide">
            @foreach($userInfo->posts as $post)
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                UPDATE POST
                                <form action="{{route('admin.deletePost')}}" method="post" role="form">
                                    @csrf @method('delete')
                                    <input type="hidden" name="id" value="{{$post->id}}" />
                                    <input type="hidden" name="path" value="{{$post->image_full_path}}" />
                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                            <div class="panel-body">
                                <form enctype="multipart/form-data" action="{{route('admin.updatePost')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$post->id}}" />
                                    <div class="form-group">
                                        <img style="width: 100px; height: 100px;" src="{{ asset('storage/assets/images/'.$post->image_pate) }}" alt="{{$post->image_name}}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Choose File</label>
                                        <input class="form-control" id="image" name="image" type="file" value="{{$post->image_name}}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Provide Link</label>
                                        <input class="form-control" id="links" name="links" type="text" value="{{$post->links}}" />
                                        @error('links')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" id="name" name="name" type="text" value="{{$post->name}}" />
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-info">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <div class="col-md-12">
                <h4 class="header-line">EDUCATION</h4>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            EDUCATION FORM
                        </div>
                        <div class="panel-body">
                            <form enctype="multipart/form-data" action="{{route('admin.createEducation')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" id="name" name="name" type="text" value="" />
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" id="description" name="description" type="description"></textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-info">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if(count($userInfo->educations) > 0)
                <div class="col-md-12 ed_click">
                    <h4 class="header-line">UPDATE EDUCATION SECTION</h4>
                </div>
            @endif
            <div class="education_update_section hide">
                @foreach($userInfo->educations as $education)
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                UPDATE EDUCATION
                                <form action="{{route('admin.deleteEducation')}}" method="post" role="form">
                                    @csrf @method('delete')
                                    <input type="hidden" name="id" value="{{$education->id}}" />
                                    <input type="hidden" name="path" value="{{$education->name}}" />
                                    <input type="hidden" name="path" value="{{$education->description}}" />
                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                            <div class="panel-body">
                                <form enctype="multipart/form-data" action="{{route('admin.updateEducation')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$education->id}}" />
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" id="name" name="name" type="text" value="{{$education->name}}" />
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" id="description" name="description" type="text">{{$education->description}}</textarea>
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-info">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-line">SKILLS</h4>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        SKILL FORM
                    </div>
                    <div class="panel-body">
                        <form enctype="multipart/form-data" action="{{route('admin.createSkill')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Choose File</label>
                                <input class="form-control" id="image" name="image" type="file" value="" />
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" id="name" name="name" type="text" value="" />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" id="description" name="description" type="text"></textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if(count($userInfo->skills) > 0)
            <div class="col-md-12 skill_click">
                <h4 class="header-line">UPDATE SKILL SECTION</h4>
            </div>
        @endif
        <div class="skill_update_section hide">
            @foreach($userInfo->skills as $skill)
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                UPDATE SKILL
                                <form action="{{route('admin.deleteSkill')}}" method="post" role="form">
                                    @csrf @method('delete')
                                    <input type="hidden" name="id" value="{{$skill->id}}" />
                                    <input type="hidden" name="path" value="{{$skill->image_full_path}}" />
                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                            <div class="panel-body">
                                <form enctype="multipart/form-data" action="{{route('admin.updateSkill')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$skill->id}}" />
                                    <div class="form-group">
                                        <img style="width: 100px; height: 100px;" src="{{ asset('storage/assets/images/'.$skill->image_path) }}" alt="{{$skill->image_name}}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Choose File</label>
                                        <input class="form-control" id="image" name="image" type="file" value="{{$skill->image_name}}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" id="name" name="name" type="text" value="{{$skill->name}}" />
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" id="description" name="description" type="text">{{$skill->description}}</textarea>
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-info">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        @if(empty($userInfo->information))
            <div class="col-md-12">
                <h4 class="header-line">CREATE INFORMATION</h4>
            </div>
        @endif
        @if(empty($userInfo->information))
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            INFORMATION FORM
                        </div>
                        <div class="panel-body">
                            <form enctype="multipart/form-data" action="{{route('admin.createInfo')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" id="name" name="name" type="text" value="" />
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea class="form-control" id="content" name="content"></textarea>
                                    @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-info">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-md-12 info_click">
                <h4 class="header-line">UPDATE INFORMATION SECTION</h4>
            </div>
            <div class="info_update_section">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                UPDATE INFORMATION
                                <form action="{{route('admin.deleteInfo')}}" method="post" role="form">
                                    @csrf @method('delete')
                                    <input type="hidden" name="id" value="{{$userInfo->information->id}}" />
                                    <input type="hidden" name="name" value="{{$userInfo->information->name}}" />
                                    <input type="hidden" name="content" value="{{$userInfo->information->content}}" />
                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                            <div class="panel-body">
                                <form enctype="multipart/form-data" action="{{route('admin.updateInfo')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$userInfo->information->id}}" />
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" id="name" name="name" type="text" value="{{$userInfo->information->name}}" />
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea class="form-control" id="content" name="content">{{$userInfo->information->content}}</textarea>
                                        @error('content')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-info">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="container">
        <div class="col-md-12">
            <h4 class="header-line">CREATE NEWS</h4>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        NEWS FORM
                    </div>
                    <div class="panel-body">
                        <form enctype="multipart/form-data" action="{{route('admin.createNews')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" id="content" name="content"></textarea>
                                @error('content')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if(count($userInfo->news) > 0)
            <div class="col-md-12 news_click">
                <h4 class="header-line">UPDATE NEWS SECTION</h4>
            </div>
        @endif
            <div class="news_update_section hide">
                @foreach($userInfo->news as $new)
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    UPDATE NEWS
                                    <form action="{{route('admin.deleteNews')}}" method="post" role="form">
                                        @csrf @method('delete')
                                        <input type="hidden" name="id" value="{{$new->id}}" />
                                        <input type="hidden" name="content" value="{{$new->content}}" />
                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                                <div class="panel-body">
                                    <form enctype="multipart/form-data" action="{{route('admin.updateNews')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$new->id}}" />
                                        <div class="form-group">
                                            <label>Content</label>
                                            <textarea class="form-control" id="content" name="content">{{$new->content}}</textarea>
                                            @error('content')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-info">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container">
        @if(empty($myImg))
            <div class="row">
                <div class="col-md-12">
                    <h4 class="header-line">IMAGE FLOW</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            IMAGE FLOW FORM
                        </div>
                        <div class="panel-body">
                            <form enctype="multipart/form-data" action="{{route('admin.createImg')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Choose File</label>
                                    <input class="form-control" id="image" name="image" type="file" value="" />
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-info">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-md-12">
                <h4 class="header-line">UPDATE IMAGE FLOW SECTION</h4>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            UPDATE IMAGE FLOW
                            <form action="{{route('admin.deleteImg')}}" method="post" role="form">
                                @csrf @method('delete')
                                <input type="hidden" name="id" value="{{$myImg->id}}" />
                                <input type="hidden" name="path" value="{{$myImg->image_full_path}}" />
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </div>
                        <div class="panel-body">
                            <form enctype="multipart/form-data" action="{{route('admin.updateImg')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$myImg->id}}" />
                                <div class="form-group">
                                    <img style="width: 100px; height: 100px;" src="{{ asset('storage/assets/images/'.$myImg->image_path) }}" alt="{{$myImg->image_name}}" />
                                </div>
                                <div class="form-group">
                                    <label>Choose File</label>
                                    <input class="form-control" id="image" name="image" type="file" value="{{$myImg->image_name}}" />
                                </div>
                                <button type="submit" class="btn btn-info">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="container">
        @if(empty($settings))
            <div class="row">
                <div class="col-md-12">
                    <h4 class="header-line">SETTINGS</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            SETTINGS FORM
                        </div>
                        <div class="panel-body">
                            <form enctype="multipart/form-data" action="{{route('admin.createSettings')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>TAB 1</label>
                                    <input class="form-control" id="tab_1" name="tab_1" type="text" value="" />
                                    @error('tab_1')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>TAB 2</label>
                                    <input class="form-control" id="tab_2" name="tab_2" type="text" value="" />
                                    @error('tab_2')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>TAB 3</label>
                                    <input class="form-control" id="tab_3" name="tab_3" type="text" value="" />
                                    @error('tab_3')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>TAB 4</label>
                                    <input class="form-control" id="tab_4" name="tab_4" type="text" value="" />
                                    @error('tab_4')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>FACEBOOK</label>
                                    <input class="form-control" id="facebook" name="facebook" type="text" value="" />
                                    @error('facebook')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>INSTAGRAM</label>
                                    <input class="form-control" id="instagram" name="instagram" type="text" value="" />
                                    @error('instagram')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>TWITTER</label>
                                    <input class="form-control" id="twitter" name="twitter" type="text" value="" />
                                    @error('twitter')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>LINKEDIN</label>
                                    <input class="form-control" id="linkedin" name="linkedin" type="text" value="" />
                                    @error('linkedin')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>MAP LINK</label>
                                    <input class="form-control" id="map_link" name="map_link" type="text" value="" />
                                    @error('map_link')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">
                                        Create
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
        <div class="row">
                <div class="col-md-12">
                    <h4 class="header-line">SETTINGS</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            UPDATE SETTINGS FORM
                            <form enctype="multipart/form-data" action="{{route('admin.deleteSettings')}}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{$settings->id}}" />
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="panel-body">
                            <form enctype="multipart/form-data" action="{{route('admin.updateSettings')}}" method="POST">
                                @csrf
                                <input  type="hidden" name="id" value="{{$settings->id}}">
                                <div class="form-group">
                                    <label>TAB 1</label>
                                    <input class="form-control" id="tab_1" name="tab_1" type="text" value="{{$settings->tab_1}}" />
                                    @error('tab_1')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>TAB 2</label>
                                    <input class="form-control" id="tab_2" name="tab_2" type="text" value="{{$settings->tab_2}}" />
                                    @error('tab_2')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>TAB 3</label>
                                    <input class="form-control" id="tab_3" name="tab_3" type="text" value="{{$settings->tab_3}}" />
                                    @error('tab_3')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>TAB 4</label>
                                    <input class="form-control" id="tab_4" name="tab_4" type="text" value="{{$settings->tab_4}}" />
                                    @error('tab_4')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>FACEBOOK</label>
                                    <input class="form-control" id="facebook" name="facebook" type="text" value="{{$settings->facebook}}" />
                                    @error('facebook')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>INSTAGRAM</label>
                                    <input class="form-control" id="instagram" name="instagram" type="text" value="{{$settings->instagram}}" />
                                    @error('instagram')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>TWITTER</label>
                                    <input class="form-control" id="twitter" name="twitter" type="text" value="{{$settings->twitter}}" />
                                    @error('twitter')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>LINKEDIN</label>
                                    <input class="form-control" id="linkedin" name="linkedin" type="text" value="{{$settings->linkedin}}" />
                                    @error('linkedin')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>MAP LINK</label>
                                    <input class="form-control" id="map_link" name="map_link" type="text" value="{{$settings->map_link}}" />
                                    @error('map_link')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
