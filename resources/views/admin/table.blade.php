@extends('layout.header')
@section('title', 'Admin Dashboard')
@section('content')
        <div class="content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h4 class="header-line">ALL TABLES</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                USER TABLE
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Surname</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Age</th>
                                                <th>Gender</th>
                                                <th>Languages</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
                                                <td>{{$userInfo->name}}</td>
                                                <td>{{$userInfo->surname}}</td>
                                                <td>{{$userInfo->email}}</td>
                                                <td>{{$userInfo->password}}</td>
                                                <td>{{$userInfo->address}}</td>
                                                <td>{{$userInfo->phone}}</td>
                                                <td>{{$userInfo->age}}</td>
                                                <td>{{$userInfo->lender}}</td>
                                                <td>{{$userInfo->languages}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                POST TABLE
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Image Name</th>
                                                <th>Name</th>
                                                <th>Provide Link</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($userInfo->posts as $post)
                                            <tr class="odd gradeX">
                                                <td>{{$post->image_name}}</td>
                                                <td>{{$post->name}}</td>
                                                <td>{{$post->links}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                EDUCATION TABLE
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($userInfo->educations as $education)
                                            <tr class="odd gradeX">
                                                <td>{{$education->name}}</td>
                                                <td>{{$education->description}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                SKILL TABLE
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Image Name</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($userInfo->skills as $skill)
                                            <tr class="odd gradeX">
                                                <td>{{$skill->image_name}}</td>
                                                <td>{{$skill->name}}</td>
                                                <td>{{$skill->description}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                INFORMATION TABLE
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Content</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
                                                <td>{{$userInfo->information->name}}</td>
                                                <td>{{$userInfo->information->content}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                NEWS TABLE
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Content</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($userInfo->news as $new)
                                            <tr class="odd gradeX">
                                                <td>{{$new->content}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                NOTIFICATIONS TABLE
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Message</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($notif as $notification)
                                            <tr class="odd gradeX">
                                                <td>{{$notification->name}}</td>
                                                <td>{{$notification->email}}</td>
                                                <td>{{$notification->phone}}</td>
                                                <td>{{$notification->message}}</td>
                                                <td>{{$notification->status}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                <div class="panel-heading">
                SETTINGS TABLE
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th class="col">TAB 1</th>
                                <th class="col">TAB 2</th>
                                <th class="col">TAB 3</th>
                                <th class="col">TAB 4</th>
                                <th class="col">Facebook</th>
                                <th class="col">Instagram</th>
                                <th class="col">Twitter</th>
                                <th class="col">Linkedin</th>
                                <th class="col">map_link</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX">
                                <td class="col">{{$settings->tab_1 ?? ''}}</td>
                                <td class="col">{{$settings->tab_2 ?? ''}}</td>
                                <td class="col">{{$settings->tab_3 ?? ''}}</td>
                                <td class="col">{{$settings->tab_4 ?? ''}}</td>
                                <td class="col">{{$settings->facebook}}</td>
                                <td class="col">
                                    <span class="toggle-text" data-full-text="{{$settings->instagram}}">
                                        {{ substr($settings->instagram, 0, 5) }}...
                                    </span>
                                </td>
                                <td class="col">{{$settings->twitter}}</td>
                                <td class="col">{{$settings->linkedin}}</td>
                                <td class="col">
                                    <div class="toggle-container">
                                        <span class="toggle-text" data-full-text="{{$settings->map_link}}">
                                            {{ substr($settings->map_link, 0, 5) }}...
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .toggle-container {
        overflow: hidden;
        max-height: 20px; 
        transition: max-height 0.3s ease;
    }
    .toggle-container.expanded {
        max-height: 100px; 
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleTexts = document.querySelectorAll('.toggle-text');
        toggleTexts.forEach(function (element) {
            element.addEventListener('click', function () {
                const fullText = element.getAttribute('data-full-text');
                const truncatedText = fullText.substring(0, 5) + '...';
                const container = element.parentElement;

                if (element.textContent === fullText) {
                    element.textContent = truncatedText;
                    container.classList.remove('expanded');
                } else {
                    element.textContent = fullText;
                    container.classList.add('expanded');
                }
            });
        });
    });
</script>
    </div>

    </div>
    </div>
      
        @endsection