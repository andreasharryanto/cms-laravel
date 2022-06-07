@extends('shared.layout')

@section('body')
<body>
    <section id="home" class="clearfix">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-fw fa-globe"></i> <strong>Manage Pages</strong>
                    <button type="button" class="float-right btn btn-dark btn-sm" style="background-color:#2b015b;" data-toggle="modal" data-target="#addpage"><i class="fa fa-fw fa-plus-circle"></i>Add Page</button> 
                </div>
                <div class="card-body">
                    @isset($successMessage)
                        <div class="alert alert-success"><i class="fa fa-thumbs-up"></i>
                            <span style="color:green;font-size:14px;">
                                {{ $successMessage }}
                            </span>
                        </div>
                    @endisset
                    <div class="col-sm-12">
                        <h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find Page</h5>
                        <form id="frmsearchpage" name="frmsearchpage" action="{{ Route('searchContent') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text"  id="txtsearchpage" name="text" class="form-control" value="" placeholder="Search Page" required />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" name="btnsearchpage" value="Search Page" id="btnsearchpage" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search Page</button>
                                    <a href="{{ isset($page->id) ? Route('pageManagement', ['cid' => $page->id]) : Route('pageAdministration') }}" class="btn btn-danger"><i class="fa fa-remove"></i> Clear</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @isset($content_list)
                <div class="col-sm-12" style="margin: 30px 0; padding: 0;">
                    <table class="table table-striped table-bordered" >
                        <thead>
                            <tr class="bg-primary text-white" >
                                <th>Sr#</th>
                                <th>Title</th>
                                <th>Header</th>
                                <th>Content</th>
                                <th>You can see</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($idx = 0)
                            @foreach($content_list as $c)
                                <tr>
                                    <td>{{ ++$idx }}</td>
                                    <td>{{ $c->title }}</td>
                                    <td>{{ $c->h1 }}</td>
                                    <td>{{ $c->content }}</td>
                                    @if($c->priv == 3)
                                        <td>SuperAdmin</td>
                                    @elseif($c->priv == 2)
                                        <td>Admin</td>
                                    @else
                                        <td>User</td>
                                    @endif
                                    <td align="center">
                                        <a href="{{ Route('editContent', ['cid' => $c->id]) }}" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                        <a href="{{ Route('deleteContent', ['cid' => $c->id]) }}" class="text-danger"onClick="return confirm('Are you sure to delete this page?');"><i class="fa fa-fw fa-trash"></i> Delete</a> 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endisset
        </div>
    </section>

    <section class="aboutpage" id="aboutpage" >
        <div class="container" >
            <div class="row">
                <div class="col-md-8 col-sm-8"  style="background-color:#efb42f" >
                    <h4 style="color:#2b015b;font-size:26px;text-align:justify;font-weight:600;margin:20px 20px;">{{ isset($page->h1) ? $page->h1 : 'Manage Pages' }}</h4>
                    <p style="color:black;font-size:17px;text-align:justify;font-weight:600;">{{ isset($page->content) ? $page->content : 'You can add,edit and delete pages on this page.' }}</p>
                </div>
                <div class="col-md-4 col-sm-4"  style="background-color:#b8d2e3" >
                    <p style="color:black;font-size:17px;text-align:justify;font-weight:600;margin:20px 20px;">{{ isset($page->content) ? $page->content : 'You can add,edit and delete pages on this page.' }}</p>
                </div>
                <div class="col-md-12 col-sm-12"  style="background-color:#2b015b;font-weight:600;" >
                    <p style="color:white;font-size:20px;text-align:center;margin:20px 20px;">Welcome to {{ isset($page->navBarText) ? $page->navBarText : 'Manage' }}&nbsp;Page </p>
                </div>
            </div>
        </div>
    </section>
</body>
@endsection