<div class="ps-list">
    <div class='grid-main' id='rs-list'>
        <div class="cards">
            <div class='ps-card-title' id='title'>
                <div class='rs-title t2'></div>
                <div class='rs-title sq'>Product / Service</div>
                <div class='rs-title sq'>Request ID</div>
                <div class='rs-title sq'>Date</div>
                <div class='rs-title sq'>Budget (Rs.)</div>
                <div class='rs-title sq'>Status</div>
                <div class='rs-title t2'></div>
            </div>

            <?php
            $sql = "SELECT * FROM supplier_quotation WHERE ep_id='$_SESSION[user_id]'";

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $qid = $row['quotation_id'];
                        $title = $row['title'];
                        $request_id = $row['req_id'];
                        $date = $row['date'];
                        $cost = formatCurrency($row['cost']);
                        $status = $row['status'];

                        

                        echo "<div class='ps-card'>
                                    <div class='ps-card-desc' id='rs'>
                                        <a class='rs-title t2' href='Request-view.php?reqID=1' id='a-card'>
                                            <div>#Q$qid</div>
                                        </a>
                                        <a class='rs-type sq' href='Request-view.php?reqID=1' id='a-card'>
                                            <div>$title</div>
                                        </a>
                                        <a class='rs-type sq' href='Request-view.php?reqID=1' id='a-card'>
                                            <div>#R$request_id</div>
                                        </a>
                                        <a class='rs-type sq' href='Request-view.php?reqID=1' id='a-card'>
                                            <div>$date</div>
                                        </a>
                                        <a class='rs-type sq' href='Request-view.php?reqID=1' id='a-card'>
                                            <div>$cost</div>
                                        </a>
                                        <a class='rs-type sq' href='Request-view.php?reqID=1' id='a-card'>
                                            <div>$status</div>
                                        </a>
                                        <div class='rs-type t2 menu'>&#10247
                                                <ul>
                                                <li>
                                                    <button type='button' onclick='view($request_id)' class='view'>
                                                        View
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type='button' onclick='view($request_id)' class='sendQuotation'>
                                                        Send Quotation
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type='button' onclick='view($request_id)' class='sendQuotation'>
                                                        Send Message
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type='button' onclick='view($request_id)' class='destructive'>Decline</button>
                                                </li>
                                                </ul>
                                        </div>
                                    </div>
                                </div>";
                    }
                } else {
                    echo "<div class='no-requests'>No declined quotation requests</div>";
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