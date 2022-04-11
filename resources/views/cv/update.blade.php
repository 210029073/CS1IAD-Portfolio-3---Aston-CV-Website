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
            <header>
                <br/><br/>
                <h1 style="text-align: center">Update a CV</h1>
            </header>

            <div class="cvBody card-body" style="margin:auto;">

                <form method="POST" action="update" id="regForm">
                    @csrf

{{--                    <label>Full Name</label>--}}
{{--                    <br/>--}}
{{--                    <input class="form-control" type="text" name="name" placeholder="Enter your full name" required/>--}}

{{--                    <br/>--}}
{{--                    <br/>--}}

                    <label>Email</label>
                    <br/>
                    <input class="form-control" type="email" name="email" placeholder="Enter your Email Address" required/>

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
                        <input class="btn btn-primary" type="submit" value="Update"/>
                        <input class="btn btn-primary" type="reset" value="Clear All" onclick="window.location.replace('update')"/>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
