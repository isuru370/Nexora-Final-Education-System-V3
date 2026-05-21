<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\StudentClass;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index', [
            'studentsCount' => Student::count(),
            'teachersCount' => Teacher::count(),
            'classesCount' => StudentClass::count(),

            'todayIncome' => Payment::whereDate('paid_at', today())
                ->where('status', 'completed')
                ->sum('amount'),
        ]);
    }
}