<div class="filter">
    <div class="search">
        <div class='input-container'>
            <input class='input-field-filter' type='text' placeholder='Search supplier' id="search" name='search' onkeyup="showResult()">
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
                <li><input type="checkbox" name="supType" onchange="showResult()" id="Beverages" value="Beverages">Beverages</li>
                <li><input type="checkbox" name="supType" onchange="showResult()" id="Florists" value="Florists">Florists</li>
                <li><input type="checkbox" name="supType" onchange="showResult()" id="Decoration" value="Decoration">Decoration</li>
                <li><input type="checkbox" name="supType" onchange="showResult()" id="Lighting" value="Lighting">Lighting</li>
                <li><input type="checkbox" name="supType" onchange="showResult()" id="Audio/Video" value="Audio/Video">Audio/Video</li>
            </ul>
        </div>
        <div class="sort">
            <div class="filter-heading">Filter by Date</div>
            <div class="sort-list">
                <ul>
                    <li>
                        <select name="date" id="date-sort">
                            <option value="oldest">Oldest on Top</option>
                            <option value="newest">Newest on Top</option>
                        </select>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>