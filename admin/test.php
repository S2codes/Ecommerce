<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js/script.js"></script>
<script>

    //Document Init
    $(document).ready(function() {

        api_key = "123534"; //Mandatory to make requests

        // Manufacturers();
        Categories();

        function Products() {

            subcategory = "";
            category = "";
            search = "";
            filter = "";

            form = new FormData();
            form.append("api_key", api_key);
            form.append("subcategory", subcategory);
            form.append("category", category);
            form.append("search", search);
            form.append("filter", filter);

            HttpRequest("api/fetch_products", form, function(data) {
                document.write(data);
            });

        }

        function Categories() {

            form = new FormData();
            form.append("api_key", api_key);

            HttpRequest("api/fetch_categories", form, function(data) {
                document.write(data);
            });

        }

        function Subcategories() {

            form = new FormData();
            form.append("api_key", api_key);

            HttpRequest("api/fetch_subcategories", form, function(data) {
                document.write(data);
            });

        }

        function Manufacturers() {

            form = new FormData();
            form.append("api_key", api_key);

            HttpRequest("api/fetch_manufacturers", form, function(data) {
                document.write(data);
            });

        }

    })
</script>