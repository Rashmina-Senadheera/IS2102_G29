<div class="filter">
    <div class="search">
        <div class='input-container'>
            <input class='input-field-filter' type='text' placeholder='Search supplier' id="search" name='search' onkeyup="showResult(<?php echo $reqID; ?>)">
            <div id="livesearch"></div>
            <i class='fa fa-search icon'></i>
        </div>
    </div>
    <div class="category">
        <div class="filter-heading">Filter by Category</div>
        <div class="category-list">
            <ul>
                <li><input type="checkbox" name="supType" onchange="showResult(<?php echo $reqID; ?>)" id="Decoration" value="Decoration">Decorations</li>
                <li><input type="checkbox" name="supType" onchange="showResult(<?php echo $reqID; ?>)" id="Entertainment" value="Entertainment">Entertainment</li>
                <li><input type="checkbox" name="supType" onchange="showResult(<?php echo $reqID; ?>)" id="Florists" value="Florists">Floral Decorations</li>
                <li><input type="checkbox" name="supType" onchange="showResult(<?php echo $reqID; ?>)" id="FoodBev" value="FoodBev">Food & Beverages</li>
                <li><input type="checkbox" name="supType" onchange="showResult(<?php echo $reqID; ?>)" id="Lighting" value="Lighting">Lighting</li>
                <li><input type="checkbox" name="supType" onchange="showResult(<?php echo $reqID; ?>)" id="Photography" value="Photography">Photography</li>
                <li><input type="checkbox" name="supType" onchange="showResult(<?php echo $reqID; ?>)" id="Sounds" value="Sounds">Sounds</li>
                <li><input type="checkbox" name="supType" onchange="showResult(<?php echo $reqID; ?>)" id="Transport" value="Transport">Transport</li>
                <li><input type="checkbox" name="supType" onchange="showResult(<?php echo $reqID; ?>)" id="Venue" value="Venue">Venue</li>
                <li><input type="checkbox" name="supType" onchange="showResult(<?php echo $reqID; ?>)" id="Other" value="Other">Other</li>
            </ul>
        </div>
    </div>
</div>