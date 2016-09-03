<div class="places">
  @foreach($places as $place)
    <div class="place-card">
      <div class="place-title-card" id="place-title-card-{{ $place->id }}">
        <h2><a class="place-title-link-card" href="{{ route('place.show', ['language' => App::getLocale(), 'place' => $place->id]) }}" id="place-title-link-card-{{ $place->id }}">{{ str_limit($place->name, 14) }}</a></h2>
        <div class="card actions actions-card">
          <ul>
            @if($place->isAuthor)
              @if(! $place->trashed())
                <li>
                  <form method="post" action="{{ route('place.enable', ['language' => App::getLocale(), 'place' => $place->id]) }}">
                    {!! csrf_field() !!}
                    @if($place->is_active)
                      {!! method_field('DELETE') !!}
                      <button class="button button-card button-disable-place" type="submit" id="disable-place-{{ $place->id }}">
                        {{ trans('pokemonbuddy.place.disable_place', ['remain_time' => $place->remain_time]) }}
                      </button>
                    @else
                      {!! method_field('PATCH') !!}
                      <button class="button button-card button-enable-place" type="submit" id="enable-place-{{ $place->id }}">
                        {{ trans('pokemonbuddy.place.enable_place') }}
                      </button>
                    @endif
                  </form>
                </li>
                <li>
                  <a class="button button-card" href="{{ route('place.edit', ['language' => App::getLocale(), 'place' => $place->id]) }}" id="button-edit-card-{{ $place->id }}">{{ trans('pokemonbuddy.place.edit_place') }}</a>
                </li>
              @endif
              <li>
                <form method="post" action="{{ route('place.destroy', ['language' => App::getLocale(), 'place' => $place->id]) }}">
                  {!! csrf_field() !!}
                  {!! method_field('DELETE') !!}
                  <button class="button button-card button-delete-place" type="submit" id="delete-place-{{ $place->id }}">
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
                  <button class="button button-card" type="button">
                    {{ trans('pokemonbuddy.place.remain_time_place', ['remain_time' => $place->remain_time]) }}
                  </button>
                </li>
              @else
                @if(Auth::check())
                  <li>
                    <form method="post" action="{{ route('place.enable', ['language' => App::getLocale(), 'place' => $place->id]) }}">
                      {!! csrf_field() !!}
                      {!! method_field('PATCH') !!}
                      <button class="button button-card button-enable-place" type="submit" id="enable-place-{{ $place->id }}">
                        {{ trans('pokemonbuddy.place.enable_place') }}
                      </button>
                    </form>
                  </li>
                @else
                  <li>
                    <button class="button button-card" type="button">
                      {{ trans('pokemonbuddy.place.disabled') }}
                    </button>
                  </li>
                @endif
              @endif
            @endif
          </ul>
        </div>
      </div>
      <div class="place-map-render card" id="map-{{ $place->id }}"></div>
      <div class="place-footer card-footer">
        <div class="place-stars card-stars">
          <div class="place-stars-background">
            <div class="place-stars-points" id="place-stars-points-{{ $place->id }}">
            </div>
          </div>
          <div class="place-stars-text">{{ $place->stars_average }} / {{ trans('pokemonbuddy.star.votes') }}: {{ $place->stars_amount }}</div>
        </div>
        <div class="place-comments card-comments">
          <p>
            {{ $place->numberOfComments }}
          </p>
        </div>
      </div>
    </div>
  @endforeach
</div>
