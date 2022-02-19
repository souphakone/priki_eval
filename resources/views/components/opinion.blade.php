<div class="row">
    <div class="col-2 small text-gray-500 toggling mb-2" data-target="comments{{ $opinion->id }}">
        <div class="{{ ($opinion->user->id == Auth::user()->id) ? 'bg-warning' : '' }}">
            {{ Carbon\Carbon::make($opinion->updated_at)->isoformat('D MMM YY') }}, <a href="/user/{{ $opinion->user->id }}">{{ $opinion->user->name }}</a>
        </div>
        <div class="text-right">{{ $opinion->comments()->count() }} <i class="fa fa-comments"></i> ( {{ $opinion->upvotes() }} <i class="fa fa-thumbs-up"></i> {{ $opinion->downvotes() }} <i class="fa fa-thumbs-down"></i> )</div>
    </div>
    <div class="col-10">
    {{ $opinion->description }}
    <!-- References backing this opinions -->
        @if ($opinion->references()->count() > 0)
            <hr>
            <div class="small text-gray-500 mb-2 text-right">
                Refs:
                @foreach ($opinion->references as $reference)
                    @if ($reference->url)
                        <a href="{{ $reference->url }}" target="_blank">{{ $reference->description }}</a>
                    @else
                        {{ $reference->description }}
                    @endif
                    @if (!$loop->last)
                        ,
                    @endif
                @endforeach
            </div>
        @endif
    </div>

    <!-- Comments made by users on that opinion -->
    <div id="comments{{ $opinion->id }}" class="d-none">
        @foreach ($opinion->comments as $comment)
            <div class="row">
                <div class="col-3 small text-gray-500 text-right">
                    {{ $comment->name }}
                    @if ($comment->pivot->points > 0)
                        <i class="fa fa-thumbs-up"></i>
                    @elseif($comment->pivot->points < 0)
                        <i class="fa fa-thumbs-down"></i>
                    @endif
                </div>
                <div class="col-9 small text-gray-500 mb-2">
                    {{ $comment->pivot->comment }}
                </div>
            </div>
        @endforeach
    </div>

    <!-- My comment on that opinion -->
    @if (!$opinion->isCommentedBy(Auth::user()))
        <p class="toggling ml-5 pl-5" data-target="divComment{{ $opinion->id }}"><i class="fa fa-comments bg-warning"></i></p>
        <div id="divComment{{ $opinion->id }}" class="row d-none">
            <div class="col-2 small text-gray-500 toggling mb-2" data-target="opinions">
                <div class="bg-warning">
                    Mon commentaire à {{ $opinion->user->name }}:
                </div>
            </div>
            <div class="col-10 row">
                <form action="/opinion/comment" method="post">
                    @csrf
                    <input type="hidden" value="{{ $opinion->id }}" name="opinion">
                    <div class="row">
                        <input type="text" name="comment" class="col-8" required></input>
                        <div class="col-3">
                            <input type="radio" name="vote" value="-1" /><i class="fa fa-thumbs-down ml-1 mt-1 mr-3"></i>
                            <input type="radio" name="vote" value="0" checked /><i class="fa fa-minus ml-1 mt-1 mr-3"></i>
                            <input type="radio" name="vote" value="1" /><i class="fa fa-thumbs-up ml-1 mr-3"></i>
                        </div>
                        <button type="submit" class="btn btn-sm btn-light col-1">Ok</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
