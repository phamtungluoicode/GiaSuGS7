<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactManageController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);

        return view('admin.contacts.index', compact('contacts'));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Xóa liên hệ thành công.');
    }
}
