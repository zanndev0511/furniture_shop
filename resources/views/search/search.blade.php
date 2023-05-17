<div class="search_input" id="search_input_box">
    <div class="container">
        <form action="/search" class="d-flex justify-content-between" method="POST">
            @csrf
            <input type="text" class="form-control" id="search_input" name="search_input" placeholder="Search Here" />
            <button type="submit" class="btn"></button>
            <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
        </form>
    </div>
</div>