<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Dish;
use App\Models\Table;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $orders = Order::paginate();

        return view('order.index', compact('orders'))
            ->with('i', ($request->input('page', 1) - 1) * $orders->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $order = new Order();
        $dishes = Dish::all();
        $tables = Table::all();

        return view('order.create', compact('order', 'dishes', 'tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request;
        $order = new Order();
        $order->user_id = $request->user_id;
        $order->table_id = $request->table;
        $order->save();
        foreach ($request->dishes as $dish) {
            $order->dishOrders()->attach($dish);
        }


        return Redirect::route('orders.index')
            ->with('success', 'Order created successfully.');
        //OrderRequest $request
        // Order::create($request->validated());

        // return Redirect::route('orders.index')
        //     ->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $order = Order::find($id);

        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $order = Order::find($id);

        return view('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, Order $order): RedirectResponse
    {
        $order->update($request->validated());

        return Redirect::route('orders.index')
            ->with('success', 'Order updated successfully');
    }

    public function updateState(Request $request){
        $order = Order::find($request->state);
        $order->state = 1;
        $order->save();
        return redirect()->to('dashboard/orders');
    }

    public function destroy($id): RedirectResponse
    {
        Order::find($id)->delete();

        return Redirect::route('orders.index')
            ->with('success', 'Order deleted successfully');
    }

    public function create_nl(){
        $dishes = Dish::all();
        $tables = Table::all();
        $order = new Order();

        return view('order.createnl', compact('order', 'dishes', 'tables'));
    }

    public function store_nl(Request $request)
    {
        $order = new Order();
        $order->user_id = $request->user_id;
        foreach ($request->dishes as $dish) {
            $order->dishOrders()->attach($dish);
        }

        return Redirect::route('menu')
            ->with('success', 'Order created successfully.');
    }
}
