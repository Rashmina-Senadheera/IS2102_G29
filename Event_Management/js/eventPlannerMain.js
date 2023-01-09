
// view event planner's package details
function viewPackageDetails(packageId) {
    // encode the packageId to avoid any special characters
    var enPackageId = encodeURIComponent(packageId);
    var url = "PackagesServices-more.php?packageId=" + enPackageId;
    window.location.href = url;
}