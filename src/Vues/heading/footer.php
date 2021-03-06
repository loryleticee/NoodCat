</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })



    let uri = window.location.pathname;

    $('.nav-item').each(function(i, element) {
        if ($(element).find(".nav-link").hasClass("active")) {
            $(element).find(".nav-link").removeClass("active")
        }

        if (uri === $(element).find(".nav-link").attr("data-route")) {
            $(element).find(".nav-link").addClass("active")
        }
    })

    $(".transport-type").each(function(i, element) {
        $(element).on("click", () => {
            hideTransportType();
        })
    })

    function hideTransportType() {
        $('.transport-type').each(function(i, element) {
            if ($(element).is(":checked")) {
                console.log($(element).attr("data-transport_type"))
                $('.' + $(element).attr("data-transport_type")).removeClass("visually-hidden")
            } else {
                $('.' + $(element).attr("data-transport_type")).addClass("visually-hidden")
            }
        })
    }
</script>
</body>

<style>
    .content {
        display: flex;
        flex-flow: column wrap;
        justify-content: center;
        align-items: center;
    }
</style>
<footer class="bg-light d-flex flex-column">
    <div class="p-3 bg-light text-dark text-center d-flex flex-column align-items-center">
        <span><small>&#169; 2022 NoodCat</small></span>
    </div>
</footer>