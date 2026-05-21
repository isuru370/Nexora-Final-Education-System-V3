@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>

    <div>
        <p>Students: {{ $studentsCount }}</p>
        <p>Teachers: {{ $teachersCount }}</p>
        <p>Classes: {{ $classesCount }}</p>
        <p>Today Income: Rs. {{ number_format($todayIncome, 2) }}</p>
    </div>
@endsection