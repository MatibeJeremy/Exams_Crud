<script>
$('form#makeQuest').on('submit', function (e) {
    e.preventDefault();
    let form = $(this);
    let url = form.attr('action');
    let data = $(this).serialize();
    axios.post(url, data)
        .then(function (response) {
            if (response.data.success == true) {
                $('#exampleModal').modal('hide');
                $('#makeQuest')[0].reset();
            } else {
                console.log(response.data.message)
            }
        })
        .catch(function (error) {
            console.log(error)

        });
});
</script>
