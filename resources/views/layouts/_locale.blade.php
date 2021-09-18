
<div class="nav d-flex justify-content-end">
<li class="nav-item py-2 ">
    <form action="{{route('locale',['locale'=>$lang])}}" method="POST">
        @csrf
        <button type="submit" class="nav-link" style="border:none;background-color:transparent">
            <span class="flag-icon flag-icon-{{$nation}}"></span>
        </button>
    </form>
</li>
</div>