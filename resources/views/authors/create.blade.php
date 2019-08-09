@extends('layouts.app')

@section('content')
  <div class="w-2/3 bg-gray-200 mx-auto p-6 shadow">
    <form action="/authors" class="flex flex-col items-center" method="POST">
      <h2>Add New Author</h2>
      @csrf
      <div class="pt-4">
        <input name="name" type="text" placeholder="Full name" class="rounded px-4 py-2 w-64">
        @error('name')
        <p class="text-red-600">{{$message}}</p>
        @enderror
      </div>
      <div class="pt-4">
        <input name="dob" type="text" placeholder="Date of Birth" class="rounded px-4 py-2 w-64">
        @error('dob')
        <p class="text-red-600">{{$message}}</p>
        @enderror
      </div>
      <div class="pt-4">
        <button class="bg-blue-400 text-white rounded py-2 px-4" type="submit">Add New Author</button>
      </div>
    </form>
  </div>
@endsection