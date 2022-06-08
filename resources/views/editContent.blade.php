@extends('shared.layout')

@section('body')
<body>
    <section id="home" class="clearfix">
        <div class="container">
            <h4 style="text-align:center;color: #2b015b;font-weight: 700;">Edit Page</h4>
            <form id="frmeditpage" method="post" action="{{ Route('submitEditContent') }}"  enctype="multipart/form-data" style="width: 50%;margin: 50px auto;text-align: left;padding: 20px;border: 1px solid #bbbbbb;border-radius: 5px;">
                @csrf
                <div class="form-group" style="margin-bottom:20px;">
                    <label for="edittitle">Title:</label>
                    <input type="text" name="title" id="edittitle" value="{{ $content->title }}"  class="form-control" maxlength="255" placeholder="Title" required>
                </div>
                <div class="form-group" style="margin-bottom:20px;">
                    <label for="editheader">Header:</label>
                    <input type="text" name="h1" id="editheader" value="{{ $content->h1 }}"  class="form-control" maxlength="255" placeholder="Header" required>
                </div>
                <div class="form-group" style="margin-bottom:20px;">
                    <label for="editcontent">Content:</label>
                    <input type="text" class="form-control"  id="editcontent"  value="{{ $content->content }}" name="content" required>
                </div>
                <div class="form-group" style="margin-bottom:20px;">
                    <label for="editlink">Link:</label>
                    <input type="text" name="link" id="editlink"  value="{{ $content->link }}" class="form-control" maxlength="255" placeholder="Link" required>
                </div>
                <div class="form-group" style="margin-bottom:20px;">
                    <label for="editnavbartext">Navbar Text:</label>
                    <input type="text" name="navBarText" id="editnavbartext" value="{{ $content->navBarText }}"  class="form-control" maxlength="100" placeholder="Navbar Text" required>
                </div>
                <div class="form-group" style="margin-bottom:20px;">
                    <label for="editinclude">Include:</label>
                    <input type="text" name="includes" id="editinclude"  value="{{ $content->includes }}"  class="form-control" maxlength="255" placeholder="includes" required>
                </div>

                <div class="form-group" style="margin-bottom:20px;">
                    <label for="editprivpage" style="color: #2b015b;font-weight: 700;">Privileges:</label>
                    <select class="form-control" name="priv" id="editprivpage"  required>
                        @if(session('priv') ==1)
                            <option value="1" selected="{{ $content->priv == 1 ? true : false }}">User</option>
                        @elseif(session('priv') == 2)
                            <option value="1" selected="{{ $content->priv == 1 ? true : false }}">User</option>
                            <option value="2" selected="{{ $content->priv == 2 ? true : false }}">User Admin</option>
                        @elseif(session('priv') == 3)
                            <option value="1" selected="{{ $content->priv == 1 ? true : false }}">User</option>
                            <option value="2" selected="{{ $content->priv == 2 ? true : false }}">User Admin</option>
                            <option value="3" selected="{{ $content->priv == 3 ? true : false }}">Super Admin</option>
                        @endif
                    </select>
                </div>
                
                <div class="form-group" style="margin-bottom:20px;">
                    <label for="editdispage" style="color: #2b015b;font-weight: 700;">Display</label>
                    @if($content->navBarDisplay == 'y')
                        <select class="form-control" name="navBarDisplay" id="editdispage"  required>
                            <option value="y" selected>Display</option>
                            <option value="n">Hide</option>
                        </select>
                    @else
                        <select class="form-control" name="navBarDisplay" id="editdispage"  required>
                            <option value="y">Display</option>
                            <option value="n" selected>Hide</option>
                        </select>
                    @endif
                </div>
                <div class="form-group">
                    <label class="form-group" style="color: #2b015b;font-weight: 700;">Active:</label>
                    @if($content->active == 'y')
                        <input type="radio" class="form-group" id="priv" name="active" value="y" checked>
                        <label class="form-group" for="privyes">Yes</label>
                        <input type="radio" class="form-group" id="priv" name="active" value="n">
                        <label class="form-group" for="privno">No</label>
                    @else
                        <input type="radio" class="form-group" id="priv" name="active" value="y">
                        <label class="form-group" for="privyes">Yes</label>
                        <input type="radio" class="form-group" id="priv" name="active" value="n" checked>
                        <label class="form-group" for="privno">No</label>
                    @endif
                </div>
                <input type="hidden" id="pageid" name="id" value="{{ $content->id }}">
                <input type="submit" name="btneditSave" id="btneditSave" value="Save" class="btn btn-primary btn-lg" form="frmeditpage"> 
            </form>
        </div>
    </section>
</body>
@endsection