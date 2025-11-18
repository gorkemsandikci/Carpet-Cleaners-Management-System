<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactMessageController extends Controller
{
    public function index()
    {
        $companyId = Auth::user()->company_id;
        $messages = ContactMessage::where('company_id', $companyId)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('backend.pages.contact-message.index', compact('messages'));
    }

    public function show(ContactMessage $contactMessage)
    {
        $companyId = Auth::user()->company_id;
        if ($contactMessage->company_id != $companyId) {
            abort(403);
        }

        // Mark as read
        if ($contactMessage->status == 'unread') {
            $contactMessage->update(['status' => 'read']);
        }

        return view('backend.pages.contact-message.show', compact('contactMessage'));
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $companyId = Auth::user()->company_id;
        if ($contactMessage->company_id != $companyId) {
            abort(403);
        }

        $contactMessage->delete();

        return redirect()->route('panel.contact-message.index')
            ->with('success', 'Message deleted successfully.');
    }
}
