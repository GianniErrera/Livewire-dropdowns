<div>

    @livewire('publish-comment')

    <div class="border border-b-gray-300 rounded-xl">

        @forelse ($comments as $comment)
        <div class="p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400 rounded-xl' }}">
            <div class="flex flex-row justify-between">
                <div>
                    <p class="text-sm mb-3"> {{ $comment->body }} </p>
                </div>
                <div class="icon-container col-xs-12 col-sm-4">
                    <button wire:click="delete({{ $comment }}) class="svg-icon">
                        <svg class="w-4 text-gray-500" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g class="fill-current">
                                <path d="M2,2 L18,2 L18,4 L2,4 L2,2 Z M8,0 L12,0 L14,2 L6,2 L8,0 Z M3,6 L17,6 L16,20 L4,20 L3,6 Z M8,8 L9,8 L9,18 L8,18 L8,8 Z M11,8 L12,8 L12,18 L11,18 L11,8 Z" id="Combined-Shape"></path>

                            </g>
                        </g>
                        </svg>
                    </button>
                </div>

            </div>


            @if($comment->attached_image)
                <img
                    src={{asset('storage/' .  $comment->attached_image) }}
                    class = "my-2"
                />
            @endif


        </div>
        @empty
            <p class="p-4">No tweets yet</p>
        @endforelse

        {{ $comments->links() }}

    </div>
</div>

