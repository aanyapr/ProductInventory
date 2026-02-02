<?php 
require "../includes/auth.php";

include "../includes/header.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
} ?>
<h2 class="live-search-title">Live Product Search</h2>


<input
    type="text"
    id="searchBox"
    placeholder="Search by product name or category..."
>

<table>
<thead>
<tr>
    <th>Name</th>
    <th>Category</th>
    <th>Price</th>
    <th>Quantity</th>
</tr>
</thead>
<tbody id="result">
</tbody>
</table>

<script src="../assets/js/live_search.js"></script>

<?php include "../includes/footer.php"; ?>
