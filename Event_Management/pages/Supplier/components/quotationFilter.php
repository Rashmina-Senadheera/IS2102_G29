<div class="filter">
    <div class="search">
        <div class='input-container'>
            <input class='input-field-filter' type='text' placeholder='Search Quoatation' id="search" name='search' onkeyup="showResult()">
            <div id="livesearch"></div>
            <i class='fa fa-search icon'></i>
        </div>
    </div>
    <div class="category">
        <div class="filter-heading">Filter by Category</div>
        <div class="category-list">
            <ul>
                <li><input type="checkbox" name="supType" onchange="showResult()" id="Venue" value="Venue">Venue</li>
                <li><input type="checkbox" name="supType" onchange="showResult()" id="Entertainment" value="Entertainment">Entertainment</li>
                <li><input type="checkbox" name="supType" onchange="showResult()" id="Catering" value="Catering">Catering</li>
                <li><input type="checkbox" name="supType" onchange="showResult()" id="Photography" value="Photography">Photography</li>
                <li><input type="checkbox" name="supType" onchange="showResult()" id="Transport" value="Transport">Transport</li>
                <li><input type="checkbox" name="supType" onchange="showResult()" id="Florists" value="Florists">Florists</li>
                <li><input type="checkbox" name="supType" onchange="showResult()" id="Decoration" value="Decoration">Decoration</li>
                <li><input type="checkbox" name="supType" onchange="showResult()" id="Lighting" value="Lighting">Lighting</li>
                <li><input type="checkbox" name="supType" onchange="showResult()" id="AudioVideo" value="AudioVideo">Audio/Video</li>
            </ul>
        </div>
    </div>
    <div class="category">
        <div class="filter-heading">Order by Request Date </div>
        <div class="category-list">
            <ul>
                <li><input type="radio" name="supType" onchange="showResult()" id="old" value="old">Oldest First</li>
                <li><input type="radio" name="supType" onchange="showResult()" id="new" value="new">Newest First</li>
            </ul>
        </div>
    </div>
</div>