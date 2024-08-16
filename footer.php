</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.view_btn').click(function (e) { 
                e.preventDefault();
               
                var intern_id= $(this).closest('tr').find('.intern_id').text();
                // console.log(intern_id);
                $.ajax({
                    type: "POST",
                    url: "view_page.php",
                    data: {
                        'checking_viewbtn':true,
                        'intern_id':intern_id,

                    },

                    success: function (response) {
                        console.log(response);
                        $('.intern-viewing-modal').html(response);
                        $('#internviewModal').modal('show');
                    }
                });
            });
        });
    </script>
</body>
</html>