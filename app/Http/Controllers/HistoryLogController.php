<?php
namespace App\Http\Controllers;

use App\Models\HistoryLog;
use Illuminate\Http\Request;

class HistoryLogController extends Controller
{
    public function index()
    {
        // Retrieve and display a list of user history log entries
        $historyLogs = HistoryLog::latest()->paginate(10); // Adjust as needed
        return view('history_logs.index', compact('historyLogs'));
    }

    public function show($id)
    {
        // Display details of a specific history log entry
        $historyLog = HistoryLog::findOrFail($id);
        return view('history_logs.show', compact('historyLog')); // Create a show.blade.php view for displaying a single log entry
    }

    // Add more methods as needed (e.g., create, edit, update, delete)
}

