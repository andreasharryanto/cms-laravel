@extends('shared.layout')

@section('body')
<body>
    <section id="intro" class="clearfix">
        <div class="container">
            <div style="margin: auto;width: 50%;border: 1px solid grey;padding: 10px;border-radius:20px;">

                <form action="{{Route('login')}}" method="post" class="form-inline" name="frmlogin" id="frmlogin">
                    @csrf
                    <div class="form-group mr-2">
                        <input type="email" class="form-control" name="email" id="txtemail" maxlength="255" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Your Email" required  />
                    </div>

                    <div class="form-group mr-2">
                        <input type="password" name="password" id="txtPassword" maxlength="255" class="form-control" placeholder="Password" required />
                    </div>
                
                    <input type="submit" class="btn btn-primary" name="btnlogin" id="btnlogin" form="frmlogin">
                    
                </form>
            </div>
            <div class="intro-info">
                <h2 >Content Management System</h2>
                <h6 style="font-weight:700;font-size:21px;color:black;">s319817 / Kenzie Chandra / Assessment II / WEBDEV II</h6>
            <div>
        </div>
    </section>

    <section class="about" id="about" >
        <div class="container">
            <div class="row">
            @isset($page)
                <div class="col-md-8 col-sm-8"  style="background-color:#efb42f" >
                    <h4 style="color:#2b015b;font-size:26px;text-align:justify;font-weight:600;margin:20px 20px;">{{ $page->h1 }}</h4>
                    <p style="color:black;font-size:17px;text-align:justify;font-weight:600;">{{ $page->content }}</p>
                </div>
                <div class="col-md-4 col-sm-4"  style="background-color:#b8d2e3" >
                    <p style="color:black;font-size:17px;text-align:justify;font-weight:600;margin:20px 20px;">{{ $page->content }}</p>
                </div>
                <div class="col-md-12 col-sm-12"  style="background-color:#2b015b;font-weight:600;" >
                    <p style="color:white;font-size:20px;text-align:center;margin:20px 20px;">Welcome to {{ $page->navBarText }} Page</p>
                </div>
            @else
                <div class="col-md-8 col-sm-8"  style="background-color:#efb42f" >
                    <h4 style="color:#2b015b;font-size:26px;text-align:justify;font-weight:600;margin:20px 20px;">Home</h4>
                    <p style="color:black;font-size:17px;text-align:justify;font-weight:600;">Kenzie Chandra Website</p>
                </div>
                <div class="col-md-4 col-sm-4"  style="background-color:#b8d2e3" >
                    <p style="color:black;font-size:17px;text-align:justify;font-weight:600;margin:20px 20px;">Kenzie Chandra Website</p>
                </div>
                <div class="col-md-12 col-sm-12"  style="background-color:#2b015b;font-weight:600;" >
                    <p style="color:white;font-size:20px;text-align:center;margin:20px 20px;">Welcome to Home Page </p>
                </div>
            @endisset
        </div>
    </section>
</body>
@endsection