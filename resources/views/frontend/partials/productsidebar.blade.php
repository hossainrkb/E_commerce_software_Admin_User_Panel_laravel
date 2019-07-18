<div class="list-group">

  @foreach (App\Models\category::orderBy('name','asc')->where('parent_id', NULL)->get() as $parent)
<a href="#main-{{$parent->id}}" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample"
  class="list-group-item list-group-item-action">
  <img class="" src="{{asset('images/categories/'. $parent->image ) }}" alt="{{$parent->name}}" width="40" height="40">
  {{$parent->name}}
</a>


<div class="child-row collapse
        @if(Route :: is('categories.show'))
        @if(App\Models\category::parentornot($parent->id,$category->id ))
        show
        @endif
        @endif
        " id="main-{{$parent->id}}">
  <div class="child-row">
    @foreach (App\Models\category::orderBy('name','asc')->where('parent_id', $parent->id)->get() as $sub_cat)
    <a href="{{route('categories.show' ,$sub_cat->id)}}" class="list-group-item list-group-item-action
        @if(Route :: is('categories.show'))
        @if($sub_cat->id == $category->id)
        active
        @endif
        @endif

              ">
      <img class="" src="{{asset('images/categories/'. $sub_cat->image ) }}" alt="{{$sub_cat->name}}" width="20" height="20">
      {{$sub_cat->name}}
    </a>
  @endforeach

  </div>
</div>


  @endforeach


</div>
