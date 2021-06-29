    <div class="flex">
        <button style = "margin-right: 20px; width:100px; background-color:orange" wire:click="decrement"><h1>-</h1></button>
        <h1 wire:model="count" style = "margin-right: 20px">{{$count}}</h1>
        <button style = "margin-right: 20px; width:100px; background-color:orange" wire:click="increment"><h1>+</h1></button>
    </div>
