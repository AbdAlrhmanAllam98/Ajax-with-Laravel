<div class="container">
    <div class="form my-2 bg-light">
        <form action="" id="input-form">
            @csrf
            <div class="d-flex justify-content-between">
                <input type="text" name="keyword" id="keyword" placeholder="Keyword">
                <input type="number" name="page" id="page" placeholder="page">
                <input type="number" name="per-page" id="per-page" placeholder="per page">
                <select name="language" id="language">
                    <option value="C++">C++</option>
                    <option value="TypeScript">TypeScript</option>
                    <option value="Java">Java</option>
                    <option value="C">C</option>
                </select>
            </div>
            <div class="d-flex justify-content-between py-2">
                <input type="date" name="date" id="date">
                <select class="w-75" name="order" id="order">
                    <option value="asc">Asc</option>
                    <option value="desc">Desc</option>
                </select>
            </div>
            <button id="submit" type="submit" class="btn btn-success w-100">Search</button>
        </form>
    </div>
    <div class="alert alert-success d-flex justify-content-between">
        <div class="total-count">
            Total Count : <span></span>
        </div>
        <div class="current-page">
            Current Page : <span></span>
        </div>
        <div class="per-page">
            Per Page : <span></span>
        </div>
    </div>