@extends('adminlte::page')

@section('title', 'Student Management')

@section('content_header')
    <h1>Edit Student</h1>
@stop

@section('content')
    <form id="form" action="{{route('student.edit.post',['id'=>$data[0]->id])}}" method="post">
        @csrf
        <div class="container">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="student_name" name="name" value="{{$data[0]->name}}">
                <span class="text-danger">
                    @error('name')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <div>
                    <label class="radio-inline">
                        <input type="radio" name="gender" id="male" value="Male" @if($data[0]->gender == 'Male') checked @endif > Male
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" id="female" value="Female" @if($data[0]->gender == 'Female') checked @endif> Female
                    </label>
                    <div>
                        <span id="gender_error" class="text-danger">
                        @error('gender')
                            {{$message}}
                        @enderror
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="phone" class="form-control" id="phone" name="phone" value="{{$data[0]->phone}}">
                <span class="text-danger">
                    @error('phone')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{$data[0]->address}}">
                <span class="text-danger">
                    @error('address')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="dept_id">Department</label>
                <select class="form-control" id="dept_id" name="dept_id">
                    <option value="" selected disabled>Select Department</option>
                    @if($dept->count()>0)
                        @foreach ($dept as $arr)
                            <option value="{{ $arr->id }}" @if($data[0]->dept_id == $arr->id) selected @endif>{{ $arr->department_name }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="text-danger">
                    @error('dept_id')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <input type="submit" name="submit" value="Update" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Update">
            <a href="{{url('admin/student/list')}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Back">Back</a>
        </div>
    </form>
@stop

@section('css')

@stop

@section('js')
<script src="{{ asset('admin/student_management/js/index.js') }}" type="text/javascript"></script>
<script>
   $( document ).ready(function()
    {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

@stop
