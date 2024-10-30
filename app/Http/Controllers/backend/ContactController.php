<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function index()
    {
        $list = Contact::where("status", "!=", 0)
        ->orderBy("created_at", "DESC")
        ->select('id','name','phone','email', 'content','created_at', "status")
        ->paginate(7);
        return view('backend.contact.index',compact("list"));
    }
    public function status($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return redirect()->route('admin.contact.index')->with('error', 'Liên hệ không tồn tại.');
        }

        $contact->status = ($contact->status == 1) ? 2 : 1;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1;
        $contact->save();

        return redirect()->route('admin.contact.index')->with('success', 'Thay đổi trạng thái thành công.');
    }
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('backend.contact.show', compact('contact'));
    }
    
    public function delete($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return redirect()->route('admin.contact.index')->with('error', 'Danh mục không tồn tại.');
        }

        $contact->status = 0;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1;
        $contact->save();

        return redirect()->route('admin.contact.index')->with('success', 'Danh mục đã được đưa vào thùng rác.');
    }
    public function trash()
    {
        $list = Contact::where('contact.status', 0)
        ->orderBy("created_at", "DESC")
        ->select('id', 'name', 'phone', 'email', 'content', 'created_at', "status")
        ->paginate(7);
        return view('backend.contact.trash', compact('list'));
    }
    public function restore($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return redirect()->route('admin.contact.index')->with('error', 'Danh mục không tồn tại.');
        }

        $contact->status = 2;
        $contact->updated_at = now();
        $contact->updated_by = Auth::id() ?? 1;
        $contact->save();

        return redirect()->route('admin.contact.trash')->with('success', 'Khôi phục danh mục thành công.');
    }
    public function destroy($id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->delete();
            return redirect()->route('admin.contact.trash')->with('success', 'Xóa thương hiệu thành công.');
        }
        return redirect()->route('admin.contact.trash')->with('error', 'Không tìm thấy thương hiệu.');
    }
    
}
