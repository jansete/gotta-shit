<div class="place">
  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="place-title">
    <div class="actions">
      <ul>
        @if(Auth::check())
          <li>
            <a class="button button-action" href="{{$place->fast_pokemap_url}}" target="_blank">{{ trans('pokemonbuddy.place.show_pokemap') }}</a>
          </li>
        @endif
        @if($place->isAuthor)
          @if(! $place->trashed())
            <li>
              <form method="post" action="{{ route('place.enable', ['language' => App::getLocale(), 'place' => $place->id]) }}">
                {!! csrf_field() !!}
                @if($place->is_active)
                  {!! method_field('DELETE') !!}
                  <button class="button button-action button-disable-place" type="submit" id="disable-place-{{ $place->id }}">
                    {{ trans('pokemonbuddy.place.disable_place', ['remain_time' => $place->remain_time]) }}
                  </button>
                @else
                  {!! method_field('PATCH') !!}
                  <button class="button button-action button-enable-place" type="submit" id="enable-place-{{ $place->id }}">
                    {{ trans('pokemonbuddy.place.enable_place') }}
                  </button>
                @endif
              </form>
            </li>
            <li>
              <a  class="button button-action" href="{{ route('place.edit', ['language' => App::getLocale(), 'place' => $place->id]) }}">{{ trans('pokemonbuddy.place.edit_place') }}</a>
            </li>
          @else
            <li>
              <form method="post" action="{{ route('place.restore', ['language' => App::getLocale(), 'place' => $place->id]) }}">
                {!! csrf_field() !!}
                <input name="_method" type="hidden" value="POST">
                <button class="button button-action" type="submit">
                  {{ trans('pokemonbuddy.place.restore_place') }}
                </button>
              </form>
            </li>
          @endif
          <li>
            <form method="post" action="{{ route('place.destroy', ['language' => App::getLocale(), 'place' => $place->id]) }}">
              {!! csrf_field() !!}
              <input name="_method" type="hidden" value="DELETE">
              <button class="button button-action button-delete-place" type="submit" id="delete-place-{{ $place->id }}">
                @if($place->trashed())
                  {{ trans('pokemonbuddy.place.delete_place_permanently') }}
                @else
                  {{ trans('pokemonbuddy.place.delete_place') }}
                @endif
              </button>
            </form>
          </li>
        @else
          @if($place->is_active)
            <li>
              <button class="button button-action" type="button">
                {{ trans('pokemonbuddy.place.remain_time_place', ['remain_time' => $place->remain_time]) }}
              </button>
            </li>
          @else
            @if(Auth::check())
              <li>
                <form method="post" action="{{ route('place.enable', ['language' => App::getLocale(), 'place' => $place->id]) }}">
                  {!! csrf_field() !!}
                  {!! method_field('PATCH') !!}
                  <button class="button button-action button-enable-place" type="submit" id="enable-place-{{ $place->id }}">
                    {{ trans('pokemonbuddy.place.enable_place') }}
                  </button>
                </form>
              </li>
            @else
              <li>
                <button class="button button-action" type="button">
                  {{ trans('pokemonbuddy.place.disabled') }}
                </button>
              </li>
            @endif
          @endif
        @endif
      </ul>
    </div>
    <h2>{{ $place->name }}</h2>
    @if(! $place->trashed())
      @if(Auth::check())
        <div class="star-rate actions-rate">
          <ul>
            <li>
              <form method="POST" action="{{ route('place.stars.update', ['language' => App::getLocale(), 'place' => $place->id]) }}">
                {!! csrf_field() !!}
                <input name="_method" type="hidden" value="PUT">
                @include('place.partials.form_stars')
                <button class="button button-rate button-rate-this" type="submit">{{ trans('pokemonbuddy.star.rate_place') }}</button>
              </form>
            </li>

            @if($place->user_has_voted)
              @include('place.partials.delete_rate')
            @endif

          </ul>
        </div>
      @endif
    @endif
  </div>

  <div class="place-map-render" id="map-{{ $place->id }}"></div>
  <div class="place-footer">
    <div class="place-stars">
      <div class="place-stars-background">
        <div class="place-stars-points" id="place-stars-points-{{ $place->id }}">
        </div>
      </div>
      <div class="place-stars-text">{{ $place->stars_average }} / {{ trans('pokemonbuddy.star.votes') }}: {{ $place->stars_amount }}</div>
    </div>
    <div class="place-comments">
      <div class="place-comments-number">
        @if (! $place->trashed())
          @if(Auth::check())
            <div class="actions actions-subscribe">
              <ul>
                @if(! $place->isSubscribed)
                  <li>
                    @include('place.subscription.add')
                  </li>
                @else
                  <li>
                    @include('place.subscription.remove')
                  </li>
                @endif
              </ul>
            </div>
          @endif
        @endif
        <p>{{ trans_choice('pokemonbuddy.comment.comments', $place->numberOfComments, ['number_of_comments' => $place->numberOfComments]) }}</p>
      </div>

      <div id="place-comments-list">
        @foreach($place->commentsWithTrashed as $comment)
          @include('place.comment.view')
        @endforeach
      </div>
      @if(! $place->trashed())
        @if(Auth::check())
          <div class="forms">
            <form method="POST" action="{{ route('place.comment.store', ['language' => App::getLocale(), 'place' => $place->id]) }}" class="create-comment-form">
              {!! csrf_field() !!}
              <div>
                <label class="input-label" for="comment">
                  {{ trans('pokemonbuddy.comment.create_comment_label') }}
                </label>
                @if(old('comment') != "")
                  <textarea class="textarea" name="comment" id="comment-textarea">{{ old('comment') }}</textarea>
                @else
                  <textarea class="textarea" name="comment" id="comment-textarea"></textarea>
                @endif
              </div>

              <div>
                <button class="button button-create-comment" type="submit">{{ trans('pokemonbuddy.comment.create_comment') }}</button>
              </div>
            </form>
          </div>
        @endif
      @endif
    </div>
  </div>
</div>
