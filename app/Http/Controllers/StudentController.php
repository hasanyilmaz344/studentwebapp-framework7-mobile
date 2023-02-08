<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isNull;

class StudentController extends Controller
{
    public function mainpage(Request $request)
    {
        // filters
        $orderby = ($request->orderby != null ? $request->orderby : 'id');
        $theascdesc = ($request->theascdesc != null ? $request->theascdesc : 'ASC');
        $likes = [$likeid = $request->likeid, $likefname = $request->likefname, $likelname = $request->likelname, $likesnumber = $request->likesnumber, $likedepartment = $request->likedepartment, $likeage = $request->likeage];
        // sql query
        $students = DB::table('students')
            ->where('id', 'LIKE', '%' . $likeid . '%')
            ->where('fname', 'LIKE', '%' . $likefname . '%')
            ->where('lname', 'LIKE', '%' . $likelname . '%')
            ->where('snumber', 'LIKE', '%' . $likesnumber . '%')
            ->where('department', 'LIKE', '%' . $likedepartment . '%')
            ->where('age', 'LIKE', '%' . $likeage . '%')
            ->orderBy($orderby, $theascdesc)
            ->paginate(10);

        return view("mainpage", compact('students'));
    }

    public function createstudent(Request $request)
    {
        $newStudent = new Student;
        $newStudent->fname = $request->newfname;
        $newStudent->lname = $request->newlname;
        $newStudent->snumber = $request->newsnumber;
        $newStudent->department = $request->newdepartment;
        $newStudent->age = $request->newage;
        $newStudent->save();

        $students = DB::table('students')
            ->orderBy('id', 'ASC')
            ->paginate(10);
        return view("mainpage", compact('students'));
    }

    public function updatestudent(Request $request)
    {
        $data = Student::query()->find($request->upid);
        $data->fname = $request->upfname;
        $data->lname = $request->uplname;
        $data->snumber = $request->upsnumber;
        $data->department = $request->updepartment;
        $data->age = $request->upage;
        $data->save();
        //
        $students = DB::table('students')
            ->orderBy('id', 'ASC')
            ->paginate(10);
        return view("mainpage", compact('students'));
    }

    public function deletestudent(Request $request)
    {
        $data = Student::query()->find($request->delid);
        $data->delete();
        //
        $students = DB::table('students')
            ->orderBy('id', 'ASC')
            ->paginate(10);
        return view("mainpage", compact('students'));
    }
}
