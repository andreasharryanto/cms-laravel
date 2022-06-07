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

<!----------------------- Modal Add Content ------------------------------------>
<div class="modal fade" id="addpage" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="margin-top:200px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body">
                <h6 style="text-align:center;color: #2b015b;font-weight: 700;">Add Page</h6>
                <form id="frmaddpage" method="post" action="{{ Route('addContent') }}"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" style="margin-bottom:20px;">
                        <input type="text" name="title" id="addtitle" class="form-control" maxlength="255" placeholder="Title" required>
                    </div>
                    <div class="form-group" style="margin-bottom:20px;">
                        <input type="text" name="h1" id="addheader" class="form-control" maxlength="255" placeholder="Header" required>
                    </div>
                    <div class="form-group" style="margin-bottom:20px;">
                        <label for="addcontent">Content:</label>
                        <textarea class="form-control" rows="6" id="addcontent" name="content"></textarea>
                    </div>
                    <div class="form-group" style="margin-bottom:20px;">
                        <input type="text" name="link" id="addlink" class="form-control" maxlength="255" placeholder="Link" required>
                    </div>
                    <div class="form-group" style="margin-bottom:20px;">
                        <input type="text" name="navBarText" id="addnavbartext" class="form-control" maxlength="100" placeholder="Navbar Text" required>
                    </div>
                    <div class="form-group" style="margin-bottom:20px;">
                        <input type="text" name="includes" id="addinclude" class="form-control" maxlength="255" placeholder="includes" required>
                    </div>
                    <div class="form-group" style="margin-bottom:20px;">
                        <label for="addprivpage" style="color: #2b015b;font-weight: 700;">Privileges:</label>
                        <select class="form-control" name="priv" id="addprivpage" required>
                            @if(session('priv') ==1)
                                <option value="1">User</option>
                            @elseif(session('priv') == 2)
                                <option value="1">User</option>
                                <option value="2">User Admin</option>
                            @elseif(session('priv') == 3)
                                <option value="1">User</option>
                                <option value="2">User Admin</option>
                                <option value="3">Super Admin</option>
                            @endif
                        </select>
                    </div> 
                    <div class="form-group" style="margin-bottom:20px;">
                        <label for="adddispage" style="color: #2b015b;font-weight: 700;">Display</label>
                        <select class="form-control" name="navBarDisplay" id="adddispage" required>
                            <option value="y">Display</option>
                            <option value="n">Hide</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-group" style="color: #2b015b;font-weight: 700;">Active:</label>
                        <input type="radio" class="form-group" id="privyes" name="active" value="y" checked>
                        <label class="form-group" for="privyes">Yes</label>
                        <input type="radio" class="form-group" id="privno" name="active" value="n">
                        <label class="form-group" for="privno">No</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" name="btnPageSave" id="btnPageSave" value="Save" class="btn btn-primary" form="frmaddpage">
            </div>
        </div>
    </div>
</div>
@endsection