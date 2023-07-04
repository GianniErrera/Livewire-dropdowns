<div>
    <div>
        @if (session()->has('message'))
        <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
            {{ session('message') }}
        </div>
        @endif
    </div>

    <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
        <form wire:submit.prevent="comment">
            <textarea
                wire:model="body"
                class="w-full p-4"
                name="body"
                id="body"
                cols="30"
                rows="10"
                placeholder="What's up, doc?"
               >{{old('body')}}
            </textarea>

               @error('body')
                    <p class="text-red-500 text-sm mt-2"> {{ $message}}</p>
               @enderror

            <hr class="my-4">

            <footer class="flex justify-between items-center">
                <div class="flex items-center">
                    <img class="rounded-full"
                        src="https://i.pravatar.cc/100"
                        width="65"
                        alt="">
                </div>
                <div class="mb-6 items-center">
                    <input
                        wire:model="attached_image"
                        class="border border-gray-400 p-2 w-full"
                        type="file"
                        name="attached_image"
                        id="{{ $counter }}"
                        accept="image/*"
                    >
                @error('attached_image')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
                </div>
                @if($attached_image)
                    <div>
                        <img src="{{$attached_image}}" alt="">
                    </div>
                @endif
                <button
                    type="submit"
                    class="bg-blue-500 rounded-lg shadow py-2 px-3 text-white"
                    >Tweet a roo!
                </button>

            </footer>
        </form>
    </div>

</div>


