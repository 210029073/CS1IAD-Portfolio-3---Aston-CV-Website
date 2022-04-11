@extends('layouts.app')
<head>
        <meta charset="utf-8"/>
        <title>Create CV</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <style>

            .cvBody
            {
                width: 100%;
            }

        </style>
    </head>

@section('createCV')

        <section>
            <br/><br/>
            <div class="card" style="margin: auto; width: 60%;">
                <div class="cvBody card-body" style="margin:auto;">
                    <header>
                        <br/>
                        <h1 style="text-align: center;">Create a CV</h1>
                    </header>
                <form method="POST" action="create" id="regForm">

                    @csrf

                    <label>Full Name</label><span style="color: red;">*</span>
                    <br/>
                    <input class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter your full name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <br/>
                    <br/>

                    <label>Email</label><span style="color: red;">*</span>
                    <br/>
                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{old('email')}}" placeholder="Enter your Email Address" required/>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <br/>
                    <br/>

                    <label>Key Programming Language</label>
                    <br/>
                    <textarea class="form-control" name="keyprogramming" form="regForm"></textarea>

                    <br/>
                    <br/>

                    <label>Education</label>
                    <br/>
                    <textarea class="form-control" name="education" form="regForm"></textarea>

                    <br/>
                    <br/>

                    <label>Profile</label>
                    <br/>
                    <textarea class="form-control" name="profile" form="regForm"></textarea>

                    <br/>
                    <br/>

                    <label>URL Links</label>
                    <br/>
                    <textarea class="form-control" name="URLlinks" form="regForm"></textarea>

                    <br/>
                    <br/>

                    <div>
                        <input class="btn btn-primary" type="submit" value="Register"/>
                        <input class="btn btn-primary" type="reset" value="Clear All" onclick="window.location.replace('create')"/>
                    </div>
                </form>
                </div>
            </div>
        </section>
@endsection
