<div>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="w-full {{ $errors->has('customer_name') ? 'has-error' : '' }}">
            Customer name
            <input type="text" name="customer_name" class="form-control"
                   value="{{ old('customer_name') }}" required>
            @if($errors->has('customer_name'))
                <em class="invalid-feedback">
                    {{ $errors->first('customer_name') }}
                </em>
            @endif
        </div>
        <div class="mb-4form-group {{ $errors->has('customer_email') ? 'has-error' : '' }}">
            Customer email
            <input type="email" name="customer_email" class="form-control"
                   value="{{ old('customer_email') }}">
            @if($errors->has('customer_email'))
                <em class="invalid-feedback">
                    {{ $errors->first('customer_email') }}
                </em>
            @endif
        </div>

        <div class="card">
            <div class="card-header">
                Products
            </div>

            <div class="card-body">
                <table class="table" id="products_table">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Total price<th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orderProducts as $index => $orderProduct)
                        <tr>
                            <td>
                                <select name="orderProducts[{{$index}}][product_id]"
                                        wire:model="orderProducts.{{$index}}.product_id"
                                        class="form-control">
                                    <option value="">-- choose product --</option>
                                    @foreach ($allProducts as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->name }} (€{{ number_format($product->price, 2) }})
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number"
                                       name="orderProducts[{{$index}}][quantity]"
                                       class="form-control"
                                       min="0"
                                       wire:model="orderProducts.{{$index}}.quantity" />
                            </td>
                            <td>
                                @if($orderProduct['product_id'])
                                  {{ $allProducts->where('id', $orderProduct['product_id'])->first()->price * $orderProduct['quantity']  }}
                                @endif
                            </td>
                            <td>
                                <a href="#" wire:click.prevent="removeProduct({{$index}})">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @forelse ($orderProducts as $index => $orderProduct)
                    @if($orderProduct['product_id'])
                        @php $total +=  $allProducts->where('id', $orderProduct['product_id'])->first()->price * $orderProduct['quantity']
                        @endphp
                    @endif


                @empty

                @endforelse
            <div>
                <h1 class="text-3xl font-bold">
               {{ "Total €" . $total }}
               </h1>
            </div>

                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-secondary"
                            wire:click.prevent="addProduct">+ Add Another Product</button>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div>
            <input class="btn btn-primary" type="submit" value="Save Order">
        </div>
    </form>
</div>

