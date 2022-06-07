@extends('shared.layout')

@section('body')
<body>
    <section id="home" class="clearfix">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-fw fa-globe"></i> <strong>Manage User</strong>
                    <button type="button" class="float-right btn btn-dark btn-sm" style="background-color:#2b015b;" data-toggle="modal" data-target="#adduser"><i class="fa fa-fw fa-plus-circle"></i>Add User</button> 
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
                        <h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find User</h5>
                        <form id="frmsearchuser" name="frmsearchuser" action="{{ Route('searchUser') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text"  id="txtsearch" name="text" class="form-control" value="" placeholder="Search" required />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" name="btnsearch" value="search" id="btnsearch" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>
                                    <a href="{{ Route('userAdministration') }}" class="btn btn-danger"><i class="fa fa-remove"></i> Clear</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @isset($user_list)
                <div class="col-sm-12" style="margin: 30px 0; padding: 0;">
                    <table class="table table-striped table-bordered" >
                        <thead>
                            <tr class="bg-primary text-white" >
                                <th>Sr#</th>
                                <th>User Name</th>
                                <th>Surname</th>
                                <th>Email</th>
                                <th>Privilege</th>
                                <th>Active</th>
                                <th>Avatar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($idx = 0)
                            @foreach($user_list as $u)
                                <tr>
                                    <td>{{ ++$idx }}</td>
                                    <td>{{ $u->fname }}</td>
                                    <td>{{ $u->sname }}</td>
                                    <td>{{ $u->email }}</td>
                                    @if($u->priv == 3)
                                        <td>SuperAdmin</td>
                                    @elseif($u->priv == 2)
                                        <td>Admin</td>
                                    @else
                                        <td>User</td>
                                    @endif
                                    <td>{{ $u->active }}</td>
                                    <td><img src="{{ asset('storage/'.$u->avatar) }}" style="color:#2b015b;width:106px;height:106px;" alt="{{ $u->fname }}" /></td>
                                    @if(session('priv') == 2)
                                        <td></td>
                                    @else
                                        <td align="center">
                                            <a href="{{ route('editUser', ['userid' => $u->id]) }}" class="text-primary"><i class="fa fa-fw fa-edit"></i>Edit</a>
                                            <a href="{{ route('deleteUser', ['userid' => $u->id]) }}" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i>Delete</a> 
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endisset
        </div>
    </section>
</body>

<!----------------------- Modal Add User------------------------------------>
<div class="modal fade" id="adduser" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="margin-top:200px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body">
                <h6 style="text-align:center;color: #2b015b;font-weight: 700;">Add User</h6>
                <form id="frmadduser" method="post" action="{{ Route('addUser') }}"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" style="margin-bottom:20px;">
                        <input type="email" class="form-control" id="addemail" maxlength="255" name="email" placeholder="Your Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required/>
                    </div>
                    <div class="form-group" style="margin-bottom:20px;">
                        <input type="password" name="addPassword" id="addPassword" maxlength="255" class="form-control" placeholder="Password" required />
                    </div>
                    <div class="form-group" style="margin-bottom:20px;">
                        <input type="text" name="fname" id="addfirstname" class="form-control" maxlength="300" placeholder="First Name" required/>
                    </div>
                    <div class="form-group" style="margin-bottom:20px;">
                        <input type="text" name="sname" id="addsurname" class="form-control" maxlength="50" placeholder="Surname" required/>
                    </div>
                    <div class="form-group" style="margin-bottom:20px;">
                        <label for="addpriv" style="color: #2b015b;font-weight: 700;">Privilege</label>
                        <select class="form-control" name="priv" id="addpriv" required>
                            @if(session('priv') == 2)
                                <option value="1">User</option>
                                <option value="2">User Admin</option>
                            @elseif(session('priv') == 3)
                                <option value="1">User</option>
                                <option value="2">User Admin</option>
                                <option value="3">Super Admin</option>
                            @endif
                        </select>
                    </div> 
                    <div class="form-group">
                        <label class="form-group" style="color: #2b015b;font-weight: 700;">Active:</label>
                        <input type="radio" class="form-group" id="privyes" name="active" value="y" checked>
                        <label class="form-group" for="privyes">Yes</label>
                        <input type="radio" class="form-group" id="privno" name="active" value="n">
                        <label class="form-group" for="privno">No</label>
                    </div>
                    <div class="form-group" style=" margin-bottom:20px;">
                        <label for="addavatar" style="color: #2b015b;font-weight: 700;">Upload your Avatar:</label><br>
                        <input type="file" name="avatar" id="addavatar" required>
                    </div> 
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" name="btnUserSave" id="btnUserSave" value="Save" class="btn btn-primary" form="frmadduser">
            </div>
        </div>
    </div>
</div>
@endsection