<!DOCTYPE html>
<html>
    <head>
        <title>Home laravel</title>
    </head>
    <body>
        <h1>My Student List</h1>
        <table border="1" width="100%">
            <tr>
            <th>id</th>
                <th>Name</th>
                <th>Age</th>
                <th>DOB</th>
                <th>Email</th>
                <th>Mobile</th>
            </tr>

        @foreach($student as $stu)
        <tr>
                <td>{{$stu->id}}</td>
                <td>{{$stu->name}}</td>
                <td>{{$stu->age}}</td>
                <td>{{$stu->dob}}</td>
                <td>{{$stu->email}}</td>
                <td>{{$stu->mobile}}</td>
            </tr>
        @endforeach
        </table>

        <form action="{{route('create')}}" method="POST">
        {{csrf_field()}}
            <table>
                <tr>
                    <td>Name</td><td>:</td><td>

                        <input type="text" name="name"/>

                    </td>
                </tr>

                <tr>
                    <td>Age</td><td>:</td><td>

                        <input type="text" name="age"/>

                    </td>
                </tr>

                <tr>
                    <td>Date of Birth</td><td>:</td><td>

                        <input type="text" name="dob"/>

                    </td>
                </tr>

                <tr>
                    <td>Mobile Number</td><td>:</td><td>

                        <input type="text" name="mobile"/>

                    </td>
                </tr>

                <tr>
                    <td>Email</td><td>:</td><td>

                        <input type="text" name="email"/>

                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" value="Save">
                    </td><td>

                      <input type="reset" value="clear">

                    </td>
                </tr>
            </table>
        </form>

        <!-- <?php
            print_r($student);
        ?> -->
    </body>
    </html>