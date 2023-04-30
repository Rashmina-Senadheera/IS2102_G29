<div class="ps-list">
    <div class='grid-main' id='rs-list'>
        <div class="cards">

            <?php
            $sql = "SELECT * FROM request_supplier_quotation WHERE status='Declined' AND EP_id='$_SESSION[user_id]'";

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $r_id = $row['request_id'];
                        $r_title = $row['product_title'];
                        $r_type = $row['event_type'];
                        $r_requested_on = $row['requested_on'];
                        echo "<a href='order-view.php' id='a-card'>
                                    <div class='ps-card'>
                                        <div class='rs-card-img'>
                                            <img src='../../images/cs1.jpg' alt=''>
                                        </div>
                                        <div class='ps-card-desc' id='rs'>
                                            <div class='rs-title'>Request for $r_title</div>
                                            <div class='rs-type'>#Q$r_id</div>
                                            <div class='rs-type'>$r_type</div>
                                            <div class='rs-type' id='urg'>$r_requested_on</div>
                                        </div>
                                    </div>
                                    </a>";
                    }
                } else {
                    echo "<div class='no-records'>
                            No Declined Quotations
                            <img src='../../images/no-record.png' alt='No Requests'>
                        </div>";
                }
            }
            ?>

        </div>
    </div>
    <div class="filter">
        <div class="search">
            <div class='input-container'>
                <input class='input-field-filter' type='text' placeholder='Search payments' name='search'>
                <i class='fa fa-search icon'></i>
            </div>
        </div>
        <div class="category">
            <div class="filter-heading">Filter by Category</div>
            <div class="category-list">
                <ul>
                    <li><input type="checkbox">All</li>
                    <li><input type="checkbox">Venue</li>
                    <li><input type="checkbox">Entertainment</li>
                    <li><input type="checkbox">Catering</li>
                    <li><input type="checkbox">Photography</li>
                    <li><input type="checkbox">Transport</li>
                    <li><input type="checkbox">Beverages</li>
                    <li><input type="checkbox">Florists</li>
                    <li><input type="checkbox">Decoration</li>
                    <li><input type="checkbox">Lighting</li>
                    <li><input type="checkbox">Audio/Vedio</li>
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
</div>