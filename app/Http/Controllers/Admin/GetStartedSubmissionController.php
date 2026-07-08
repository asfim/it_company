<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GetStartedSubmissionController extends Controller
{
    public function index()
    {
        $submissions = DB::table('get_started_submissions')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.get-started.index', compact('submissions'));
    }

    public function destroy($id)
    {
        DB::table('get_started_submissions')->where('id', $id)->delete();

        return redirect()->route('admin.get-started.index')->with('success', 'Submission deleted successfully.');
    }
}
