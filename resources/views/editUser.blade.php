@extends('shared.layout')

@section('body')
<body>
    <section id="home" class="clearfix">
        <div class="container">
            <h4 style="text-align:center;color: #2b015b;font-weight: 700;">Edit User</h4>
            <form id="frmedituser" method="post" action="{{ Route('submitEditUser') }}"  enctype="multipart/form-data" style="width: 50%;margin: 50px auto;text-align: left;padding: 20px;border: 1px solid #bbbbbb;border-radius: 5px;">
                @csrf
                <div class="form-group" style="margin-bottom:20px;color:black;font-weight:700;">
                    <input type="email" value="{{ $user->email }}" class="form-control" id="editemail" maxlength="255" name="email" placeholder="Your Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                </div>
                <div class="form-group" style="margin-bottom:20px;">
                    <input type="password" name="password" id="editPassword" maxlength="255" class="form-control" placeholder="Enter new Password" required />
                </div>
                <div class="form-group" style="margin-bottom:20px;">
                    <input type="text"  value="{{ $user->fname }}" name="fname" id="editfirstname" class="form-control" maxlength="300" placeholder="First Name" required>
                </div>
                <div class="form-group" style="margin-bottom:20px;">
                    <input type="text" value="{{ $user->sname }}" name="sname" id="editsurname" class="form-control" maxlength="50" placeholder="Surname" required>
                </div>
                <div class="form-group" style="margin-bottom:20px;">
                    <label for="editpriv" style="color: #2b015b;font-weight: 700;">Select Your Privilege</label>
                    <select class="form-control" name="priv" id="editpriv" required>
                        @if(session('priv') == 2)
                            <option value="1" selected="{{ $user->priv == 1 ? true : false }}">User</option>
                            <option value="2" selected="{{ $user->priv == 2 ? true : false }}">User Admin</option>
                        @elseif(session('priv') == 3)
                            <option value="1" selected="{{ $user->priv == 1 ? true : false }}">User</option>
                            <option value="2" selected="{{ $user->priv == 2 ? true : false }}">User Admin</option>
                            <option value="3" selected="{{ $user->priv == 3 ? true : false }}">Super Admin</option>
                        @endif
                    </select>
                </div> 
                <div class="form-group">
                    @if($user->active == 'y')
                        <label class="form-group" style="color: #2b015b;font-weight: 700;">Active:</label>
                        <input type="radio" class="form-group" id="editprivyes" name="active" value="y" checked>
                        <label class="form-group" for="privyes">Yes</label>
                        <input type="radio" class="form-group" id="editprivno" name="active" value="n">
                        <label class="form-group" for="privno">No</label>
                    @else
                        <label class="form-group" style="color: #2b015b;font-weight: 700;">Active:</label>
                        <input type="radio" class="form-group" id="editprivyes" name="active" value="y">
                        <label class="form-group" for="privyes">Yes</label>
                        <input type="radio" class="form-group" id="editprivno" name="active" value="n" checked>
                        <label class="form-group" for="privno">No</label>
                    @endif
                </div>
                <div class="form-group">
                    <label for="editavatar" style="color: #2b015b;font-weight: 700;">Your Avatar:</label><br>
                    <img src="{{ asset('storage/'.$user->avatar) }}" style="color:#2b015b;width:106px;height:106px;" alt="{{ $user->fname }}" />
                </div>
                <div class="form-group" style=" margin-bottom:20px;">
                    <label for="editavatar" style="color: #2b015b;font-weight: 700;">Edit your Avatar:</label><br>
                    <input type="file" name="avatar" id="editavatar" required >
                </div> 
                <input type="hidden" id="userid" name="id" value="{{ $user->id }}">
                <input type="submit" name="btneditSave" id="btneditSave" value="Save" class="btn btn-primary btn-lg" form="frmedituser"> 
            </form>
        </div>
    </section>
</body>
@endsection