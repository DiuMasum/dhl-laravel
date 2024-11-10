<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem; // Ensure you import the OrderItem model
use App\Models\PurchaseOrder; // Import the PurchaseOrder model for relationships
use Validator;

class OrderItemsController extends Controller
{
    // Show the form for creating a new Order Item
    public function create($purchaseOrderId)
    {
        // Fetch the purchase order for context
        $purchaseOrder = PurchaseOrder::findOrFail($purchaseOrderId);
        return view('purchase_order.create', compact('purchaseOrder'));
    }

    // Store a new Order Item
    public function store(Request $request)
    {
        // Define your validation rules
        $validator = Validator::make($request->all(), [
            'purchase_order_no' => 'required|exists:purchase_orders,po_number', // Validate against existing purchase order
            'sl_no' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'item_name' => 'nullable|string|max:255',
            'style_article_no' => 'nullable|string|max:255',
            'lab_dip_no' => 'nullable|string|max:255',
            'approve_option' => 'nullable|string|max:255',
            'match_ref' => 'nullable|string|max:255',
            '9_12_qty' => 'nullable|string|max:255',
            '9_12_ratio' => 'nullable|string|max:255',
            '9_12_total' => 'nullable|string|max:255',
            '12_18_qty' => 'nullable|string|max:255',
            '12_18_ratio' => 'nullable|string|max:255',
            '12_18_total' => 'nullable|string|max:255',
            '18_24_qty' => 'nullable|string|max:255',
            '18_24_ratio' => 'nullable|string|max:255',
            '18_24_total' => 'nullable|string|max:255',
            '2_3_qty' => 'nullable|string|max:255',
            '2_3_ratio' => 'nullable|string|max:255',
            '2_3_total' => 'nullable|string|max:255',
            '3_4_qty' => 'nullable|string|max:255',
            '3_4_ratio' => 'nullable|string|max:255',
            '3_4_total' => 'nullable|string|max:255',
            '4_5_qty' => 'nullable|string|max:255',
            '4_5_ratio' => 'nullable|string|max:255',
            '4_5_total' => 'nullable|string|max:255',
            '5_6_qty' => 'nullable|string|max:255',
            '5_6_ratio' => 'nullable|string|max:255',
            '5_6_total' => 'nullable|string|max:255',
            'order_qty' => 'nullable|string|max:255',
            'order_ratio' => 'nullable|string|max:255',
            'order_total' => 'nullable|string|max:255',
        ]);

        // If validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new Order Item
        OrderItem::create($request->all());

        return redirect()->route('purchase_order.index')->with('success', 'Order Item created successfully!');
    }

    // Show Order Items for a specific Purchase Order with pagination
    public function index($purchaseOrderId)
    {
        $orderItems = OrderItem::where('purchase_order_no', $purchaseOrderId)->paginate(10);
        return view('purchase_order.index', compact('orderItems'));
    }

    // Show the form for editing a specific Order Item
    public function edit($id)
    {
        $orderItem = OrderItem::findOrFail($id);
        return view('purchase_order.edit', compact('orderItem'));
    }

    // Update a specific Order Item
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            // Similar validation rules as store
            'purchase_order_no' => 'required|exists:purchase_orders,po_number', // Validate against existing purchase order
            'sl_no' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'item_name' => 'nullable|string|max:255',
            'style_article_no' => 'nullable|string|max:255',
            'lab_dip_no' => 'nullable|string|max:255',
            'approve_option' => 'nullable|string|max:255',
            'match_ref' => 'nullable|string|max:255',
            '9_12_qty' => 'nullable|string|max:255',
            '9_12_ratio' => 'nullable|string|max:255',
            '9_12_total' => 'nullable|string|max:255',
            '12_18_qty' => 'nullable|string|max:255',
            '12_18_ratio' => 'nullable|string|max:255',
            '12_18_total' => 'nullable|string|max:255',
            '18_24_qty' => 'nullable|string|max:255',
            '18_24_ratio' => 'nullable|string|max:255',
            '18_24_total' => 'nullable|string|max:255',
            '2_3_qty' => 'nullable|string|max:255',
            '2_3_ratio' => 'nullable|string|max:255',
            '2_3_total' => 'nullable|string|max:255',
            '3_4_qty' => 'nullable|string|max:255',
            '3_4_ratio' => 'nullable|string|max:255',
            '3_4_total' => 'nullable|string|max:255',
            '4_5_qty' => 'nullable|string|max:255',
            '4_5_ratio' => 'nullable|string|max:255',
            '4_5_total' => 'nullable|string|max:255',
            '5_6_qty' => 'nullable|string|max:255',
            '5_6_ratio' => 'nullable|string|max:255',
            '5_6_total' => 'nullable|string|max:255',
            'order_qty' => 'nullable|string|max:255',
            'order_ratio' => 'nullable|string|max:255',
            'order_total' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $orderItem = OrderItem::findOrFail($id);
        $orderItem->update($request->all());

        return redirect()->route('purchase_order.index')->with('success', 'Order Item updated successfully!');
    }

    // Delete a specific Order Item
    public function destroy($id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $orderItem->delete();

        return redirect()->route('purchase_order.index')->with('success', 'Order Item deleted successfully!');
    }
}
