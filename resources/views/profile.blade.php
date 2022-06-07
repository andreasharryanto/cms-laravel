@extends('shared.layout')

@section('body')
<body>
    <section id="home" class="clearfix">
        <div class="container">
            <div class="main" id="section2">
                <h2 style="text-align: center;font-weight:700;color:#efb42f;">Your Profile</h2>   
                <table style="width: 50%;margin: 10px auto;border-collapse: collapse;text-align: left;">
                    <tbody>
                        <tr style="border-bottom: 1px solid #cbcbcb;">
                            <td style="border: none;height: 30px;padding: 15px 5px;color:#2b015b;font-weight:700;"><h3 style="text-align: center;">Hi {{ $user->fname." ".$user->sname }}</h3></td>
                        </tr>
                        <tr style="border-bottom: 1px solid #cbcbcb;">
                            <td style="border: none;height: 30px;padding: 15px 5px;">Avatar
                                <div style="align-items: center;text-align: center;margin-bottom: 20px;">
                                    <img style="vertical-align: middle;width: 250px;height: 250px;border-radius: 50%;background: #888;border: 2px solid #bbbbbb;" alt="{{ $user->avatar }}" name="imgProf" id="imgProf" src="{{ asset('storage/'.$user->avatar) }}">
                                </div>
                            </td>
                        </tr>
                        <tr style="border-bottom: 1px solid #cbcbcb;">
                            <td style="border: none;height: 30px;padding: 15px 5px;">Email / Username : &nbsp;{{ $user->email }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #cbcbcb;">
                            <td style="border: none;height: 30px;padding: 15px 5px;">Given Name : &nbsp;{{ $user->fname }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #cbcbcb;">
                            <td style="border: none;height: 30px;padding: 15px 5px;">Surname : &nbsp;{{ $user->sname }}</td>
                        </tr>
                    </tbody>
                </table>
                <div style="text-align: center;margin-top:20px;">
                    <button type="button"  style="background-color:#2b015b;align-items: center;color:white;width: 500px;" data-toggle="modal" data-target="#editprofile"><i class="fa fa-fw fa-plus-circle"></i>Modify Profile</button> 
                </div>
        </div>
                
        </div>
    </section>
</body>

<!-- Modal Edit Profile -->
<div class="modal fade" id="editprofile" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:200px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body">
                <h6 style="text-align:center;color: #2b015b;font-weight: 700;">Edit Profile</h6>
                <form id="frmeditprofileuser" method="post" action="{{ Route('editProfile') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" style="margin-bottom:20px;color:black;font-weight:700;">
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="profileemail" maxlength="255" placeholder="Your Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                    </div>
                    <div class="form-group" style="margin-bottom:20px;">
                        <input type="password" name="password" id="profilePassword" maxlength="255" class="form-control" placeholder="Enter new Password" required />
                    </div>
                    <div class="form-group" style="margin-bottom:20px;">
                        <input type="text" name="fname" value="{{ $user->fname }}" id="profilefirstname" class="form-control" maxlength="300" placeholder="First Name" required>
                    </div>
                    <div class="form-group" style="margin-bottom:20px;">
                        <input type="text" name="sname" value="{{ $user->sname }}" id="profilesurname" class="form-control" maxlength="50" placeholder="Surname" required>
                    </div>
                    <div class="form-group">
                        <label for="profileavatar" style="color: #2b015b;font-weight: 700;">Your Avatar:</label><br>
                        <img src="{{ asset('storage/'.$user->avatar) }}" style="color:#2b015b;width:106px;height:106px;" alt="{{ $user->avatar }}" />
                    </div>
                    <div class="form-group" style="margin-bottom:20px;">
                        <label for="profileavatar" style="color: #2b015b;font-weight: 700;">Edit your Avatar:</label><br>
                        <input type="file" name="avatar" id="profileavatar" required>
                    </div> 
                
                    <input type="hidden" id="userid" name="id" value="{{ $user->id }}">
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" name="btnUserSave" id="btnUserSave" value="Save" class="btn btn-primary" form="frmeditprofileuser">
            </div>
        </div>
    </div>
</div>
@endsection