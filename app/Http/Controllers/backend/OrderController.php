<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $list = Order::where('status', '!=', 0)
        ->orderBy('created_at', 'DESC')
        ->select('id', 'delivery_name', 'delivery_email', 'delivery_phone', 'delivery_address', 'note','created_at', "status")
        ->paginate(7);
        return view('backend.order.index', compact("list"));
    }
    public function create()
    {
        return view('backend.order.create');
    }

    public function store(Request $request)
    {
        $order = new Order();
        $order->delivery_name = $request->delivery_name;
        $order->user_id = $request->user_id;
        $order->delivery_gender = $request->delivery_gender;
        $order->delivery_phone = $request->delivery_phone;
        $order->delivery_email = $request->delivery_email;
        $order->delivery_address = $request->delivery_address;
        $order->save();

        return redirect()->route('admin.order.index')->with('success', 'Order created successfully.');
    }
    public function status($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->route('admin.order.index')->with('error', 'Không tồn tại.');
        }

        $order->status = $order->status == 1 ? 2 : 1;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = Auth::id() ?? 1;
        $order->save();

        return redirect()->route('admin.order.index')->with('success', 'Thay đổi trạng thái thành công.');
    }
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('backend.order.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('backend.order.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'delivery_name' => 'required|string|max:255',
            'delivery_phone' => 'required|string|max:15',
            'delivery_email' => 'required|string|email|max:255',
            'delivery_address' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $order = Order::findOrFail($id);
        $order->delivery_name = $request->delivery_name;
        $order->delivery_phone = $request->delivery_phone;
        $order->delivery_email = $request->delivery_email;
        $order->delivery_address = $request->delivery_address;
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.order.index')->with('success', 'Order updated successfully.');
    }
    public function delete($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->route('admin.order.index')->with('error', 'Danh mục không tồn tại.');
        }

        $order->status = 0;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = Auth::id() ?? 1;
        $order->save();

        return redirect()->route('admin.order.index')->with('success', 'Danh mục đã được đưa vào thùng rác.');
    }
    public function trash()
    {
        $list = Order::where('status', 0)
        ->orderBy('created_at', 'DESC')
        ->select('id', 'delivery_name', 'delivery_email', 'delivery_phone', 'delivery_address', 'note', 'created_at', "status")
        ->paginate(7);
        return view('backend.order.trash', compact('list'));
    }
    public function restore($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->route('admin.order.index')->with('error', 'Danh mục không tồn tại.');
        }

        $order->status = 2;
        $order->updated_at = now();
        $order->updated_by = Auth::id() ?? 1;
        $order->save();

        return redirect()->route('admin.order.trash')->with('success', 'Khôi phục danh mục thành công.');
    }
    public function destroy($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->delete();
            return redirect()->route('admin.order.trash')->with('success', 'Xóa thương hiệu thành công.');
        }
        return redirect()->route('admin.order.trash')->with('error', 'Không tìm thấy thương hiệu.');
    }
}
